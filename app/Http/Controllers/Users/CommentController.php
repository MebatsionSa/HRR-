<?php
namespace App\Http\Controllers\Users;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function giveCommentTohotel(Request $request,$id)
    {
//        $this->middleware('Users.Comment');
        $request->validate([
            'comment' =>'required|string',
        ]);
        Comment::create([
             'user_id'   => Auth::user()->id,
             'comment'  => $request->comment,
             'hotel_id' => $id,
         ]);

         return  back()->with('comment','thank you for your comment');
     }
}
