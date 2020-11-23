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
        $response = new Response();

		$validator = Validator::make($datas, [
            'content' => 'required',
            'attachments' => 'required',
			'attachments.*' => 'mimes:jpeg,png,jpg|max:2048'
		]);

		if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
			return view('response.new', compact('response', 'user', 'topic'))->withErrors($validator);
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

        $response->attachments = json_encode($data);
        $response->content = $request->content;
        $response->user_id = $user->id;
        $response->topic_id = $topic->id;
        $response->save();

        return redirect()->route('index.topic')->with('success', 'Tópico adicionado com sucesso');
	}
}
