<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{

	// mostrar todos os topicos do mais novop  para o mais antigo
	public function index()
	{
		return view('topic.index');
	}


	// id do usuario pra fazer ligamento do topico com usuário
    public function new()
    {
    	//$user = User::find($id);
    	return view('topic.new');
    }

    // mostrar dados do topico
    public function show()
    {
    	//$user = User::find($id);
    	return view('topic.show');
    }
}
