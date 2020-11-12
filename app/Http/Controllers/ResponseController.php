<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResponseController extends Controller
{
    // id do usuario pra fazer ligamento do topico com usuário
    public function new($id)
    {
        $topic = Topic::find($id);
        return view('response.new', compact('topic'));
    }

    public function create(Request $request, $id)
	{
		$datas = $request->all();
		$user = User::find($id);
		$topic = Topic::find($id);
		$reponse = new Response();


		$validator = Validator::make($datas, [
			'content' => 'required',
			'attachments.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
			return view('topic.new', compact('reponse'))->withErrors($validator);
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
        
        $reponse->attachments = json_encode($data);
        $reponse->content = $request->content;
        $reponse->user_id = $user->id;
        $reponse->topic_id = $topic->id;
        $reponse->save();

        return redirect()->route('index.topic')->with('success', 'Tópico adicionado com sucesso');
	}
}
