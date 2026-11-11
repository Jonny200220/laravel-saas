<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'email',
        ], [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
        ]);

        // 
        dd($data);
    }

}
