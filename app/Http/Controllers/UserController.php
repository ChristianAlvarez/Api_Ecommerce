<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use App\User;
use Crypt;

class UserController extends Controller
{
   

    public function registerUser(Request $profile) {
        //dd($profile);
      //$user = User::find($profile->user_id);

      //if ($user === null) {
          // If not, create one
          $user = new User();
          $user->user_name = $profile->user_name;
          $user->user_first_name = $profile->user_first_name;
          $user->user_last_name = $profile->user_last_name;
          $user->user_photo = $profile->user_photo;
          $user->user_phone = $profile->user_phone;
          $user->user_address = $profile->user_address;
          $user->department_id = $profile->department_id;
          $user->city_id = $profile->city_id;
          $user->company_id = $profile->company_id;
          $user->user_email = $profile->user_email;
          $user->user_password = encrypt($profile->user_password);
          $user->role_id = $profile->role_id;
          $user->remember_token = $user->getRememberToken();
          $user->save();
      //}

      return $user;
    }

    public function loginUser(Request $request) {
        

        $user = User::where('user_email', $request['user_email'])->first();
        if (empty($user)) {
            return "Email no existe";
        }
        else{
            if ($request['user_password'] === decrypt($user->user_password)) {
                Auth::login($user, false);

                $userfull = User::with('Department', 'City','Company', 'Role')->where('user_id', $user->user_id)->get();
              
                return Response()->json($userfull); 
            }
            else{
                return "Password erronea";
            }
            
        }

       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
