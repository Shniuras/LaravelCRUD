<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests\CreateCommentRequest;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function Create(CreateCommentRequest $request, $id){
        $create = new Comments();
        $create->name = $request->get('commentName');
        $create->content = $request->get('comment');
        $create->date = Carbon::now();
        $create->post_id = $id;
        $create->save();
        return redirect()->route('single',$id);
    }
}
