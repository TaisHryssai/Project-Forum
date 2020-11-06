<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    // id do usuario pra fazer ligamento do topico com usuário
    public function new()
    {
    	//$user = User::find($id);
    	return view('response.new');
    }
}
