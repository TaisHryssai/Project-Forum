<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ResponseController extends Controller
{
    public function new($id, $topic_id)
    {
        $user = User::find($id);
        $topic = Topic::find($topic_id);
        $response = new Response();
        return view('response.new', compact('topic', 'user'));
    }

    public function create(Request $request, $id, $topic_id)
	{
		$datas = $request->all();
		$user = User::find($id);
		$topic = Topic::find($topic_id);
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
                $image->move(public_path('images'), $name);
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
