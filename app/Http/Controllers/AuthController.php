<?php

namespace AdmSus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AdmSus\Http\Controllers\Controller;
use AdmSus\User;

class AuthController extends Controller
{
    public function index()
    {
        // $user = User::where('id', 1)->first();
        // $user->password = bcrypt('123');
        // $user->save();

        if (Auth::check() === true) {
            return redirect()->route('atendimentos');
        }

        return view('index');
    }

    public function login(Request $request)
    {
        if (in_array('', $request->only('user', 'password'))) {
            $json['message'] = 'Ooops, informe todos os dados para efetuar o login';
            return response()->json($json);
        }

        $credentials = [
            'user' => $request->user,
            'password' => $request->password
        ];

        if(!Auth::attempt($credentials)) {
            $json['message'] = 'Ooops, usuário e senha não conferem';
            return response()->json($json);
        }

        $json['redirect'] = route('atendimentos');
        return response()->json($json);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }


}
