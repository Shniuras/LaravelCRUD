<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

        $edit = Post::find($id);
        $edit->title = $request->get('title');;
        $edit->content = $request->get('content');
        $edit->date = $request->get('date');
        $edit->save();

        return redirect()->route('edit',$id);
    }

    public function Store(StorePostRequest $request){

        $storing = new Post;
        $storing->title = $request->get('title');
        $storing->content = $request->get('content');
        $storing->date = Carbon::now();
        $storing->save();

        return redirect()->route('create');
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
        $single = Post::where('id',$id)->get();
        $viewComments = Comments::where('post_id',$id)->get();

        return view('posts.single',['single' => $single, 'comments' => $viewComments]);
    }
    public function Delete($id){
        Post::destroy($id);
        return redirect()->route('all');
    }

}
