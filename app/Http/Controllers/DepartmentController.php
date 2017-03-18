<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

#Recursos
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDepartments()
    {
        $departments = Department::all();

        if (!empty($departments)) {
            return json_encode($departments);
        }
        else
        {
            return "No departments";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDepartments(Request $request) {

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
}
