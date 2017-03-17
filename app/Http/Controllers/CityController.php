<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

#Recursos
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCities()
    {
        $cities = City::with('Department')->get();

        if (!empty($cities)) {
            return json_encode($cities);
        }
        else
        {
            return "No cities";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCities(Request $request) {

        $customer = new Customer();

        $imagen = $request->file('customer_photo');

        $customer->customer_username = $request->customer_username;
        $customer->customer_firstname = $request->customer_firstname;
        $customer->customer_lastname = $request->customer_lastname;

        if (!empty($imagen))
        {
            $ruta   = '/images/customers/';
            $nombre = sha1(Carbon::now()) . '.' . $imagen->guessExtension();

            $imagen->move(getcwd() . $ruta, $nombre);
            $customer->customer_photo = $ruta . $nombre;
        }
          
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        $customer->customer_latitude = $request->customer_latitude;
        $customer->customer_longitude = $request->customer_longitude;
        $customer->IsUpdated = $request->IsUpdated;
        $customer->department_id = $request->department_id;
        $customer->city_id = $request->city_id;
        $customer->customer_email = $request->customer_email;
         
        $customer->save();

      return $customer;
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
