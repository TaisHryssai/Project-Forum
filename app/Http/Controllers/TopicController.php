<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    public function index()
    {
        $search = Request()->term;
        $topics = Topic::search($search);
        return view('topic.index')->with('topics', $topics);
    }

    public function new($id)
    {
        $user = User::find($id);
        $topic = new Topic();
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
            'keywords.*' => 'required|single_word',
            'attachments.*' => 'mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('danger', 'Existem dados incorretos! Por favor verifique!');
            return view('topic.new', compact('topic', 'user'))->withErrors($validator);
        }


        if ($request->hasfile('attachments')) {
            foreach ($request->file('attachments') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path('images'), $name);
                $data[] = $name;
            }
        $topic->attachments = json_encode($data);
        }

        foreach($request->keywords as $keyword){
            $key[] = $keyword;
        }


        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->user_id = $user->id;
        $topic->keywords = json_encode($key);
        $topic->save();

        return redirect()->route('index.topic')->with('success', 'Tópico adicionado com sucesso');
    }

    public function show($id)
    {
        $topic = Topic::find($id);
        $user = $topic->user;
        $response = Response::find($id);

        return view('topic.show', compact('topic', 'response', 'user'));
    }
}
