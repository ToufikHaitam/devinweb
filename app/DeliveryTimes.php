<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryTimes extends Model
{

    protected $guarded = ['id'];

    // this function to make a reverse relationship between  this model and deliverydate model

    protected $hidden = ['pivot','city_id'];


    public function deliverydates()
    {
        return $this->belongsToMany(DeliveryDates::class,'delivery_time_delivery_date','delivery_time_id','delivery_date_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }




}
