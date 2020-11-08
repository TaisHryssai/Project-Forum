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
    	return view('topic.identification', compact($user));
    }

    public function create(Request $request)
    {
    	$data = $request->all();

    	$validator = Validator::make($data, [
            'name'       => 'required',
        ]);

    	$user = new User($data);

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('topic.identification', compact('user'))->withErrors($validator);
        }

        $user->save();
        return redirect()->route('new.topic', $user)->with('success', 'Identificação realizada com sucesso');
    }

    public function logout()
    {
        return redirect('/');
    }
}
