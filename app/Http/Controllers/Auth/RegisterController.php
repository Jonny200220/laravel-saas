<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(SignUpRequest $request){
        
        $data = $request -> validated();

        $user = User::create($data);

        event(new Registered($user));
    }

}
