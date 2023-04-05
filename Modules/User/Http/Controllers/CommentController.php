<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\User\Models\Branch;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;
use App\Models\Comment;
use Modules\User\Models\User;
use App\Notifications\MyFirstNotification;
class CommentController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;  
        $comment = Comment::create($input);
        // dd($comment->post->userId);
        // dd(auth()->user()->id);
        if(auth()->user()->id == $comment->post->userId){ 
            if ($comment->replie) {        
                $comment->replie->user->notify(new MyFirstNotification($comment));
            }     
        }elseif ($request->user_id == $comment->post->userId) {
            $comment->post->user->notify(new MyFirstNotification($comment));
        }
        else{  
            $comment->post->user->notify(new MyFirstNotification($comment));
            if ($comment->replie) {        
                $comment->replie->user->notify(new MyFirstNotification($comment));
            }              
        }  
        return back();
    }
}
