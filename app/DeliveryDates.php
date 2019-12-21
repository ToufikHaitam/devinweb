<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryDates extends Model
{
    protected $guarded = ['id'];
    // this function to make relationship 1:n between this model and deliverytime Model
    protected $hidden = ['pivot','city_id','created_at','updated_at'];


     public function delivery_times(){
        return $this->belongsToMany(DeliveryTimes::class,'delivery_time_delivery_date','delivery_date_id');
    }

     //this function to relay between this model and City Model

     public function city(){
         $this->belongsTo('App/City');
     }


}
