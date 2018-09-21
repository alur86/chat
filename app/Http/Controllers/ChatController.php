<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
  

 public function __construct()
    {
        return $this->middleware('auth');
    }





 public function index()
    {
        return view('chat.chat');
    }


public function store(Request $request)
{
     $message = $request->user()->messages()->create([
         'body' => $request->body
     ]);

     return response()->json($message);
}



}
