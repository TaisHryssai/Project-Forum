<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{

	// mostrar todos os topicos do mais novop  para o mais antigo
	public function index()
	{
		return view('topic.index');
	}


	// id do usuario pra fazer ligamento do topico com usuário
    public function new($id)
    {
    	$user = User::find($id);
    	return view('topic.new', compact('user'));
	}
	
	public function create(Request $request, $id)
	{
		$data = $request->all();

		$validator = Validator::make($data, [
            'topic'       => 'required',
            'content' => 'required',
            'keyword'  => 'required',
		]);
		$user = User::find($id);
		$topic = new Topic($data);

		if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('new topic', $id, compact('topic'))->withErrors($validator);
        }


	}

    // mostrar dados do topico
    public function show()
    {
    	//$user = User::find($id);
    	return view('topic.show');
    }
}
