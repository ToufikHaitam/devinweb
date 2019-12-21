<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   protected $guarded = ['id'];

// this function to make relationship 1:n between city and  deliverydates

    public function DeliveryDates(){
        return $this->hasMany(DeliveryDates::class)->with("delivery_times");
    }

// this function to make relationship 1:n between city and  deliveryTimes By deliveryDate Models
// we can need it

public function deliveryTimes(){
   return $this->hasMany(DeliveryTimes::class);
}




}
