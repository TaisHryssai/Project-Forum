<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
	public function createUser(Request $request)
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

	// mostrar todos os topicos do mais novop  para o mais antigo
	public function index()
	{
		$topics = Topic::all();
		return view('topic.index', compact('topics'));
	}


	// id do usuario pra fazer ligamento do topico com usuário
    public function new($id)
    {
    	$user = User::find($id);
    	return view('topic.new', compact('user'));
	}
	
	public function create(Request $request, $id)
	{
		$datas = $request->all();
		$user = User::find($id);
		$topic = new Topic();


		$validator = Validator::make($datas, [
            'title'       => 'required',
			'content' => 'required',
			'keywords' => 'required',
			'attachments.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
			return view('topic.new', compact('topic', 'user'))->withErrors($validator);
		}


		if($request->hasfile('attachments'))
        {
            foreach($request->file('attachments') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path('images'), $name);  // your folder path
                $data[] = $name;  
            }
        }
        
        
        $topic->attachments = json_encode($data);
        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->user_id = $user->id;
        $topic->keywords = $request->keywords;
        $topic->save();

       //$user->topic()->save($topic);
        return redirect()->route('index.topic')->with('success', 'Tópico adicionado com sucesso');
	}

    // mostrar dados do topico
    public function show($id)
    {
		$topics = Topic::all();
		$topic = Topic::find($id);
		$response = Response::find($id);
		
        return view('topic.show', compact('topic', 'response', 'topics'));
    }
}
