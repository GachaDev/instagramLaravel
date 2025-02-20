<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //

    public function doLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email:rfc,dns',
            'password' => 'required|string'
        ], [
            "email.required" => 'Por favor, ingrese el email',
            "password.required" => 'Por favor, ingrese la contraseña'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('');
        }

        return redirect()->back()->withErrors([
            'email' => 'Email o contraseña incorrectos.',
        ])->onlyInput('email');
    }

    public function doRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'email' => 'required|string|email:rfc,dns|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:6',
                'max:20',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
            'repeat_password' => 'required|string|same:password'
        ], [
            "name.required" => 'Por favor, ingrese el nombre',
            "name.max" => 'El nombre no debe superar los 20 caracteres',
            "email.required" => 'Por favor, ingrese el email',
            "email.email" => 'El formato del email no es válido',
            "email.unique" => 'El email ya está en uso',
            "password.required" => 'Por favor, ingrese la contraseña',
            "password.min" => 'La contraseña debe tener al menos 6 caracteres',
            "password.max" => 'La contraseña no debe superar los 20 caracteres',
            "password.regex" => 'La contraseña debe contener al menos una mayúscula, una minúscula y un número',
            "repeat_password.required" => 'Por favor, ingrese el campo de repetir contraseña',
            "repeat_password.same" => 'Las contraseñas no coinciden'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->get("name");
        $user->email = $request->get("email");
        $user->password = Hash::make($request->get("password"));

        $user->save();

        return redirect()->to('/login');
    }

    public function doLogout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
