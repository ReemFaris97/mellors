<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RideStoppages extends Model
{
    use HasFactory;

    protected $fillable = [
        'ride_id',
        'park_id',
        'number_of_seats',
        'operator_number',
        'operator_name',
        'ride_status',
        'stopage_sub_category_id',
        'stopage_category_id',
        'ride_notes',
        'date',
        'time',
        'opened_date',
        'date_time',
        'down_minutes',
        'user_id',
        'stoppage_status',
        'type',
        'time_slot_start',
        'time_slot_end','end_date',
        'park_time_id','description','zone_id','parent_id'
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class)->withDefault();
    }
    public function park()
    {
        return $this->belongsTo(Park::class)->withDefault();
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class,'zone_id')->withDefault([
            'name'=>'not found'
        ]);

    }
    public function stopageSubCategory()
    {
        return $this->belongsTo(StopageSubCategory::class,'stopage_sub_category_id')->withDefault()->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public  function album(){

        return $this->hasMany(rideStoppagesImages::class,'ride_stoppages_id','id');
    }
}
