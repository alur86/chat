<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class ChatsController extends Controller
{
  

public function __construct()
{
  $this->middleware('auth');
}


public function index()
{

  $user = Auth::user();

  return view('chat')->with('user', $user);
}


public function fetchMessages()
{
  return Message::with('user')->get();
}


public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);

  broadcast(new MessageSent($user, $message))->toOthers();

  return ['status' => 'Message Sent!'];
}




}
