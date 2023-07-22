<?php

namespace App\Http\Resources\User\Ride;

use App\Http\Resources\User\ParkResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\ZoneResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RideInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'capacity_one_cycle' => $this->times?->first()?->no_of_seats,
            'one_cycle_duration_seconds' => $this->one_cycle_duration_seconds,
            'ride_cycle_mins' => $this->ride_cycle_mins,
            'ride_price' => $this->ride_price,
            'number_of_seats' => $this->number_of_seats,
            'theoretical_number' => $this->theoretical_number,
            'ride_price_ft' => $this->ride_price_ft,
            'minimum_height_requirement' => $this->minimum_height_requirement,
            'ride_cat' => $this->ride_cat,
            'no_of_gondolas' => $this->number_of_seats,
            'ride_type' => RideTypeResource::make($this->ride_type),
            'zone' => ZoneResource::make($this->zone),
            'park' => ParkResource::make($this->park),
            'status' => $this->rideStoppages?->last()->ride_status ?? 'active',

        ];
        $queues = $this->queue
            ? $this->queue
                ->whereBetween('start_time', [dateTime()?->date, dateTime()?->close_date])
                ->latest()
                ->first()
            : null;
        $riders = $this->cycle
            ? $this->cycle
                ->where('duration_seconds', 0)
                ->whereBetween('start_time', [dateTime()?->date, dateTime()?->close_date])
            : null;

        $cycles = $this->cycle
            ? $this->cycle
                ->whereBetween('start_time', [dateTime()?->date, dateTime()?->close_date])
            : null;

        $user = $this->users()?->whereHas('roles', function ($query) {
            return $query->whereIn('name', ['Operation', 'Operation ']);
        })->first();
        $inspaction = $this->preopening_lists?->where('lists_type', 'preopening')?->whereBetween('opened_date', [dateTime()?->date, dateTime()?->close_date])?->pluck('is_checked')?->toArray();
        if (!empty($inspaction) && in_array(null, $inspaction) || in_array('no', $inspaction)) {
            $inspaction = false;
        } elseif (empty($inspaction)) {
            $inspaction = false;
        } else {
            $inspaction = true;
        }
        $preclosing = $this->preopening_lists?->where('lists_type', 'preclosing')?->whereBetween('opened_date', [dateTime()?->date, dateTime()?->close_date])?->pluck('is_checked')?->toArray();
        if (!empty($preclosing) && in_array(null, $preclosing) || in_array('no', $preclosing)) {
            $preclosing = false;
        } elseif (empty($preclosing)) {
            $preclosing = false;
        } else {
            $preclosing = true;
        }
        $data['queues'] = QueueResource::make($queues);
        $data['queues_count'] = $this->queue?->whereBetween('start_time', [dateTime()?->date, dateTime()?->close_date])?->count();
        $data['total_riders'] = $riders?->sum('number_of_vip') + $riders?->sum('number_of_disabled') + $riders?->sum('riders_count') + $riders?->sum('number_of_ft');
        $data['stoppage_minutes'] = $this->rideStoppages?->where('ride_status', 'stopped')->whereBetween('date', [dateTime()?->date, dateTime()?->close_date])?->sum('down_minutes');
        $data['stoppage_count'] = $this->rideStoppages?->whereBetween('date', [dateTime()?->date, dateTime()?->close_date])?->count();
        $data['cycle_count'] = $cycles?->count();
        $data['user'] = UserResource::make($user);
        $data['open'] = $inspaction;
        $data['close'] = $preclosing;

        $stoppageNewDate = $this->rideStoppages?->where('ride_status', 'stopped')->first();
        $stoppageLastDate = $this->rideStoppages?->where('ride_status', 'stopped')->last();

        if ($stoppageLastDate && $stoppageLastDate?->date < dateTime()?->date && dateTime() != null) {
            addNewDateStappage($stoppageNewDate, $this);
        }
        return $data;
    }

}
