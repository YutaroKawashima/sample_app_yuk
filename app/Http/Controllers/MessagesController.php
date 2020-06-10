<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index() {
        $title = 'シンプルな掲示板';

        $messages = \App\Message::all();

        return view( 'messages.index', [
            'title' => $title,
            'messages' => $messages,
        ]);
    }

    public function create( Request $request ) {
        $request->validate([
            //'name' => 'required|max:20',
            'body' => 'required|max:100',
            'image' => [
                'file',
                'image',
                'mimes:jpg,jpeg,png',
                'dimensions:min_width=100,min_height=100,max_width=600,max_height=600',
            ],
        ]);
        $file_name = '';
        $image = $request->file('image');

        if (isset($image) === TRUE ) {
            $ext = $image->guessExtension();

            $file_name = str_random(20). ".{$ext}";

            $path = $image->storeAs('photos',$file_name,'public');
        }

        $message = new \App\Message;

        //$message->name = $request->name;

        $message->name = \Auth::user()->name;
        $message->body = $request->body;
        $message->image = $file_name;

        $message->save();

        return redirect( '/messages' );
    }

    public function __construct()
    {

        $this->middleware('auth');
    }
}
