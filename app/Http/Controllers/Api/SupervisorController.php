<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomerFeedbackRequest;
use App\Http\Requests\Api\InspectionsRequest;
use App\Http\Requests\Api\SubmitCycleRequest;
use App\Http\Requests\Api\SubmitQueuesRequest;
use App\Http\Requests\Api\SubmitStoppageRequest;
use App\Http\Requests\Api\UpdateCycleDurationRequest;
use App\Http\Requests\Api\UpdateCycleRequest;
use App\Http\Resources\User\InspectionResource;
use App\Http\Resources\User\Ride\PreopeningListResource;
use App\Http\Resources\User\Ride\RideCycleResource;
use App\Http\Resources\User\Ride\RideQueueResource;
use App\Http\Resources\User\Ride\RideResource;
use App\Http\Resources\User\Ride\StoppageResource;
use App\Http\Resources\User\Zone\ZoneResource;
use App\Models\CustomerFeedbackImage;
use App\Models\CustomerFeedbacks;
use App\Models\ParkTime;
use App\Models\PreopeningList;
use App\Models\Queue;
use App\Models\Ride;
use App\Models\RideCycles;
use App\Models\RideInspectionList;
use App\Models\RideStoppages;
use App\Models\StopageCategory;
use App\Models\Zone;
use App\Notifications\ZoneSupervisorNotifications;
use App\Traits\Api\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
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
            return self::apiResponse(404, __('ride not found'), []);
        }
        $ridePre = $ride->preopening_lists ?? collect(); // Provide an empty collection if $ride->rideStoppages is null

        $pre = $ridePre->where('lists_type', 'preopening')->whereBetween('opened_date', [dateTime()?->date, dateTime()?->close_date]);
        
        if ($pre->isEmpty()) {
            return self::apiResponse(400, __('not found'), []);
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
        if (isset($validate['image']) && $validate['image'] != null) {
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


}
