<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(SignInRequest $request)
    {
        $credentials = $request -> validated();

        
    }
}
