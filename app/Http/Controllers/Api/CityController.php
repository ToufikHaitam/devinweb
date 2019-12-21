<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\DeliveryDates;
use App\DeliveryTimes;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResourceDate;
use http\Env\Response;
use http\Url;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return City::all();
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



    public function deliveryDates($city,$number){
        $cit=City::with('DeliveryDates')->findOrFail($city);
        return ['dates'=>$cit->DeliveryDates->take($number)];


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
            'name' => 'required',
            'slug' => 'required',
        ]);
        return City::create($data);
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
 * attache the city and deliveryTime
 *
 */
   public function attacheCityToDeliveryTime($id, Request $request)
  {

    $data =$request->json()->all();
    $data['span'];
    $deliveryTimes= DeliveryTimes::with('city')->findOrFail($data['id']);

    $city=City::with('deliveryTimes')->findOrFail($id);

    return $city->deliveryTimes()->save($deliveryTimes);

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
