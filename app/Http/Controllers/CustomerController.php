<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

#Recursos
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCustomers()
    {
        $customers = Customer::with('Department', 'City','CompanyCustomer', 'Order', 'Sale')->get();

        if (!empty($customers)) {
            return json_encode($customers);
        }
        else
        {
            return "No customers";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCustomer(Request $request) {

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCustomerXamarin(Request $request) {

        $customer = new Customer();

        $customer->customer_username = $request->customer_username;
        $customer->customer_firstname = $request->customer_firstname;
        $customer->customer_lastname = $request->customer_lastname; 
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImageCustomerXamarin(Request $request) {

        //$request = $request->all();

        //$id =  $request['id'];
        //dd($request);
        $imagen = $request->file('image');
        $id =  $request->id;

        //dd($imagen);

        if (!empty($imagen))
        {

            $customer = \App\Customer::find($id);

            $ruta   = '/images/customers/';
            $nombre = sha1(Carbon::now()) . '.' . $imagen->guessExtension();

            $imagen->move(getcwd() . $ruta, $nombre);
            $customer->customer_photo = $ruta . $nombre;

            $customer->save();
        }
        
        

      return $customer;
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
    public function destroyCustomer($id)
    {
        $customer = \App\Customer::find($id);
        if ($customer === null) {
            return response()->json([
                    'Error' => "No se encuentra el Horario.",      
                ], 404
            );
        }else{
            $customer->delete();
            return response()->json([
                    'msg' => "Eliminado Exitosamente",      
                ], 200
            );
        }
    }
}
