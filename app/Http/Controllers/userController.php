<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    function create(){
        return View('user.signup');
    }

    function auth(){
        return View('user.signin');
    }

    function store(Request $request){
        
    
        $formFields = $request->validate([
            'email' => [ 'required', 'email:rfc,dns', Rule::unique('users','email') ],
            'password' =>'required|confirmed|min:6'
           ]);
    
           $formFields['password'] = bcrypt($formFields['password']);

        $user =   User::create($formFields);
          
        auth()->login($user);
       return redirect('/Main');
    }


    function authenticate(Request $request){
    
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' =>'required'
        ]);
       

  

    if(auth()->attempt($formFields)){
        if($formFields['email'] = 'admin@redfenix.pt'){
            return view('admin.dashboard');
        }
        return redirect('/login');
        
    }
    return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }




    }
   
