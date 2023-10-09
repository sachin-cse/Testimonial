<?php

namespace Modules\Testimonial\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Testimonial\Models\User;

use Hash;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('testimonial::index');
    }


    public function login(){
        return view('testimonial::signin');
    }

    public function userlogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'this is required',
            'password.required' => 'this is required',
        ]);

        $creadentials = $request->only(['email', 'password']);

        // dd($creadentials);

        $username = User::where('email', $creadentials['email'])->first();

        $password = Hash::check($creadentials['password'], $username->password);
        dd($password);

        if($username && $password){
            return 1;
        } else {
            return 0;
        }
    }

    public function signup(){
        return view('testimonial::signup');
    }

    public function usersignup(Request $request){

        // dd($request);
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ],
        [
            'username.required' => 'username is required',
            'email.unique' => 'email must be unique',
            'password.min' => 'password must be at least 8 characters long',
        ]);

        // if($validator->fails()){
        //     return redirect()->back()->with('error', 'email already in use');
        // }

        $user = new User();
        $email = 

        $user->fill($request->all());
        

        if($user->save()){
            return 1;
        } else {
            return 0;
        }

        // $request->password = Hash::make($request->input('password'));

        
    }
}
