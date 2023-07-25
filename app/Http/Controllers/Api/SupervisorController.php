<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomerFeedbackRequest;
use App\Http\Requests\Api\ObservationRequest;
use App\Http\Requests\Api\UpdateInspectionsRequest;
use App\Http\Resources\User\Ride\PreopeningListResource;

;

use App\Http\Resources\User\Zone\ZoneResource;
use App\Models\CustomerFeedbackImage;
use App\Models\CustomerFeedbacks;
use App\Models\Observation;
use App\Models\PreopeningList;
use App\Models\Ride;

use App\Models\User;
use App\Notifications\UserNotifications;
use App\Notifications\ZoneSupervisorNotifications;
use App\Traits\Api\ApiResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

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
            'date_reported' => $validate['date_reported'],
            'snag' => $validate['snag'],
            'created_by_id' => \auth()->id(),
        ];
        Observation::query()->create($data);
        return self::apiResponse(200, __('create observation successfully'), []);

    }

}
