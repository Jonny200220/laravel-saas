<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(SignInRequest $request)
    {
        $credentials = $request -> validated();

        if(!Auth::attempt($credentials)){
            return back()->with('error', 'Credenciales Incorrectas')->withInput();
        }
        return redirect()->route('dashboard');
    }
}
