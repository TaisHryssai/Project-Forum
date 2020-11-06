<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function new()
    {
    	$user = new User();
    	return view('identification', compact($user));
    }

    public function create(Request $request)
    {
    	$data = $request->all();

    	$validator = Validator::make($data, [
            'name'       => 'required',
        ]);


		if (User::where('name', '=', $request->get('name'))->exists()) {
           return redirect()->route('index.topic')->with('success', 'Login efetuado com sucesso');

		}else

    	$user = new User($data);

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('identification', compact('user'))->withErrors($validator);
        }

        $user->save();

        return redirect()->route('index.topic')->with('success', 'Bem vindo');
    }

    public function logout()
    {
        return redirect('/');
    }
}
