<?php

namespace App\Http\Controllers\Api;

use App\DeliveryDates;
use App\DeliveryTimes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return DeliveryDates::all();
    }

    /**
     * dettach DeliveryDate to DeliveryTime
     * Exclude some city delivery times span from some delivery dates 3 points
     */

     public function ExcludeDeliverytimes()
     {
        $deliverydate=DeliveryDates::findOrFail(1);
        $deliverydate->deliveryTimes()->detach([1, 2, 3]);
     }


     /**
      * Exclude a city delivery date by excluding all of the daily delivery times 3 points
      */
      public function ExcludeDeliveryDate($id)
      {
         $deliverydate=DeliveryDates::findOrFail(1);
         $deliverydate->deliveryTimes()->detach();
      }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'day_name' => 'required',
            'date'=>'required'
        ]);
        return DeliveryDates::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
