<?php

namespace App\Http\Controllers\Api;

use App\DeliveryDates;
use App\DeliveryTimes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DeliveryTimes::all();
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
            'span' => 'required',
        ]);
        return DeliveryTimes::create($data);


    }

    /**
     * this function to exclude de Delvirytimes to deliveryDates
     */
public function excludetimestodate()
{

    $delivery_time=DeliveryTimes::with('deliverydates')->find(1);
    return $delivery_time->deliverydates()->detach([1,2,3]);

}



public function excludeAllDeliveryTimesDate($id)
{
    $delivery_date=DeliveryDates::with('delivery_times')->find($id);

    //  if we want to delete records we can make this
    //$delivery_time->deliverydates()->delete();
    //$delivery_time->delete();

    return $delivery_date->delivery_times()->detach();

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DeliveryTimes::find($id);
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
        $del = DeliveryTimes::findOrFail($id);
        return $del->delete();

    }
}
