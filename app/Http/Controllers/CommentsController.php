<?php

namespace App\Http\Controllers;

use App\Models\CityStat;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comments::paginate(20);
        return view('comments', ["comments"=>$comments]);

    }

    public function add_form()
    {
       return view('comment_add');
    }

    public function create(Request $req)
    {
        $city = CityStat::find($req->input("city_stat_id"));
        if(!$city){
            return redirect()->route("home");
        }
        $validation = $req->validate([
            "username" => "required|min:3|max:30",
            "email"=> "required|email",
            "message"=>"required|min:10|max:255"
        ]);
        $comment = new Comments();
        $comment->username = $req->input("username");
        $comment->email = $req->input("email");
        $comment->message = $req->input("message");
        $comment->city_stat_id = $req->input("city_stat_id");
        $comment->save();
        return redirect()->route("comments_show");
    }

}
