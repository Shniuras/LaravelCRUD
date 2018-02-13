<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests\CreateCommentRequest;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function Create(CreateCommentRequest $request, $id){
//        $create = new Comments();
//        $create->name = $request->get('commentName');
//        $create->content = $request->get('comment');
//        $create->date = Carbon::now();
//        $create->post_id = $id;
//        $create->save();
// Tas pats kas zemiau
        Comments::create($request->except('_token')+[
            'date' => Carbon::now(),
            'post_id' => $id
            ]);
        return redirect()->route('single',$id);
    }
    public function Delete($id){
        Comments::destroy($id);
        return redirect()->route('all');
    }
}
