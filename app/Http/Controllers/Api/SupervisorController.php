<?php

namespace App\Http\Controllers\Api;

use App\Models\Ride;
use App\Models\User;
use App\Models\ParkTime;
use App\Models\Attraction;
use App\Models\Observation;

;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\AttractionInfo;
use App\Models\PreopeningList;
use Illuminate\Support\Carbon;
use App\Models\GeneralQuestion;

use App\Traits\Api\ApiResponse;
use App\Models\CustomerFeedbacks;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerFeedbackImage;
use Illuminate\Support\Facades\Storage;
use App\Notifications\UserNotifications;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Api\ObservationRequest;
use App\Http\Resources\User\Zone\ZoneResource;
use App\Http\Requests\Api\CustomerFeedbackRequest;
use App\Http\Requests\Api\UpdateInspectionsRequest;
use App\Http\Resources\User\Ride\QuestionsResource;
use App\Http\Resources\User\Ride\PreopeningListResource;

class SupervisorController extends Controller
{
    use ApiResponse;

    protected function home()
    {
        $user = Auth::user();
        $this->body['zones'] = ZoneResource::collection($user->zones);
        return self::apiResponse(200, __('home page supervisor'), $this->body);
    }

    protected function preopeningList($id)
    {
        $ride = Ride::find($id);
        if (!$ride) {
            return self::apiResponse(200, __('ride not found'), []);
        }
        $ridePre = $ride->preopening_lists ?? collect(); // Provide an empty collection if $ride->preopening_lists is null

        $pre = $ridePre->where('lists_type', 'preopening')->whereBetween('opened_date', [dateTime()?->date, dateTime()?->close_date]);

        if ($pre->isEmpty()) {
            return self::apiResponse(200, __('not found'), []);
        }
        $this->body['preopening_list'] = PreopeningListResource::collection($pre);
        return self::apiResponse(200, __('preopening list'), $this->body);
    }

    protected function storeCustomerFeedback(CustomerFeedbackRequest $request)
    {
        $validate = $request->validated();
        $ride = Ride::find($validate['ride_id']);
        $is_skill_game = $ride->ride_type?->name;

        if ($is_skill_game == 'Skill Game') {
            $validate['is_skill_game'] = 'skill_game';
        }

        $validated = Arr::except($validate, 'image');
        $cs = CustomerFeedbacks::query()->create($validated);
        if (!empty($validate['image'])) {
            $this->Images($validate['image'], new CustomerFeedbackImage(), ['customer_feedback_id' => $cs->id]);
        }

        return self::apiResponse(200, __('send customer feedback successfully'), []);

    }

    private function Images($images, $model, $item)
    {
        foreach ($images as $image) {
            $path = Storage::disk('s3')->put('images', $image);
            $model->create(['image' => $path] + $item);
        }
    }

    protected function preclosingList($id)
    {
        $ride = Ride::find($id);
        if (!$ride) {
            return self::apiResponse(200, __('ride not found'), []);
        }
        $ridePre = $ride->preopening_lists ?? collect(); // Provide an empty collection if $ride->preopening_lists is null

        $pre = $ridePre->where('lists_type', 'preclosing')->whereBetween('opened_date', [dateTime()?->date, dateTime()?->close_date]);

        if ($pre->isEmpty()) {
            return self::apiResponse(200, __('not found'), []);
        }
        $this->body['preclosing_list'] = PreopeningListResource::collection($pre);
        return self::apiResponse(200, __('preopening list'), $this->body);
    }

    protected function updateInspectionList(UpdateInspectionsRequest $request)
    {
        $validate = $request->validated();
        foreach ($validate['id'] as $key => $id) {
            $inpection = PreopeningList::find($id);
            $inpection->update([
                'is_checked' => $validate['is_checked'][$key] ?? null,
                'status' => $validate['status'][$key] ?? null,
                'comment' => $validate['comment'][$key] ?? null,
            ]);
        }
        $user = User::find($inpection->created_by_id);
        $data = [
            'title' => 'supervisor update inspection to ' . $inpection->ride?->name,
            'ride_id' => $inpection->ride_id,
            'user_id' => Auth::user()->id
        ];
        if ($user) {
            Notification::send($user, new UserNotifications($data));
        }

        return self::apiResponse(200, __(' update inspections successfully'), []);
    }

    protected function observation(ObservationRequest $request)
    {
        $validate = $request->validated();
        $data = [
            'ride_id' => $validate['ride_id'],
            'date_reported' => $validate['date'],
            'snag' => $validate['snag'],
        ];
        $observation = Observation::query()->create($data);
        if (!empty($validate['image'])) {
            $path = Storage::disk('s3')->put('images', $validate['image']);
            $observation->update(['image' => $path]);
        }
        return self::apiResponse(200, __('create observation successfully'), []);

    }

    protected function questions()
    {
        $questions = GeneralQuestion::get();
        $this->body['questions'] = QuestionsResource::collection($questions);

        return self::apiResponse(200, __('questions'), $this->body);

    }

    protected function addAttraction(Request $request)
    {
        $request->validate([
            'ride_id' => 'required|exists:rides,id',
            'park_time_id' => 'required|exists:park_times,id',
            'question_id' => 'required|array|exists:general_questions,id',
            'status' => 'required|array',
            'note' => 'nullable|array',
            'corrective_action' => 'nullable|array',
        ]);

        $ride = Ride::findOrFail($request->ride_id);
        $park_time = ParkTime::findOrFail($request->park_time_id);

        $attraction = Attraction::create([
            'ride_id' => $request->ride_id,
            'park_time_id' => $request->park_time_id,
            'date' => Carbon::now()->toDateString(),
            'zone_id' => $ride->zone_id,
            'park_id' => $park_time->park_id,
            'created_by_id' => auth()->id()
        ]);
        foreach ($request->question_id as $key => $value) {
            AttractionInfo::create([
                'attraction_id' => $attraction->id,
                'general_question_id' => $value,
                'status' => $request->status[$key] ?? null,
                'note' => $request->note[$key] ?? null,
                'corrective_action' => $request->corrective_action[$key] ?? null,
            ]);
        }

        return self::apiResponse(200, __('add attraction list successfully'), []);

    }

}
