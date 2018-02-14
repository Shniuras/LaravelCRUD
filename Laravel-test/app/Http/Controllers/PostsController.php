<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Comment;
use stdClass;

class PostsController extends Controller
{
    public function Create(){
        return view('posts.create');
    }

    public function Edit($id){
        $edit = Post::where('id', $id)->get();
        return view('posts.edit',['edit' => $edit]);
    }

    public function Update(EditPostRequest $request, $id){

        $edit = Post::findOrFail($id);
        $edit->title = $request->get('title');;
        $edit->content = $request->get('content');
        $edit->date = $request->get('date');
        $edit->save();

        return redirect()->route('edit',$id);
    }

    public function Store(StorePostRequest $request){

        Post::create($request->except('_token') + [
            'date' => Carbon::now()
            ]);
    /*    $storing = new Post;
        $storing->title = $request->get('title');
        $storing->content = $request->get('content');
        $storing->date = Carbon::now();
        $storing->save();*/

        return redirect()->route('all');
    }

    public function Admin(){
        return view('posts.all');
    }

    public function Single($id){
//        // Pridedu API pradzia
//        $chuck = file_get_contents('https://api.chucknorris.io/jokes/random');
//        $mas = json_decode($chuck, true);
//        // pabaiga
//
//        $noris = new stdClass();
//        $noris->title = 'Chuck Noris API';
//        $noris->content = $mas['value'];
//        $noris->date = Carbon::createFromFormat('Y-m-d','2018-02-06');
//        $norisApi = [$noris];

        $single = Post::findOrFail($id);
        $viewComments = $single->comments;
        $commentPagination = Comments::paginate(3);

        return view('posts.single',['single' => $single, 'comments' => $viewComments, 'pagi' => $commentPagination]);
    }

    public function Delete($id){
        $post = Post::findOrFail($id);
        $post->comments()->where('post_id', $id)->delete();

        Post::destroy($id);
        return redirect()->route('all');
    }

}
