<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $weatherApi = file_get_contents('https://api.darksky.net/forecast/c6f0e3d7bfa76ce805ac15a68dced8a9/54.687157,25.279652');
        $weather = json_decode($weatherApi, true);

        $post1 = new \stdClass();
        $post1->title = 'Siandien Vilniuje salta!!';
        $post1->content = "Siuo metu Vilniuje yra: " . round((($weather['currently']['apparentTemperature']) - 32)/1.8) . "&#x2103;";
        $post1->date = Carbon::createFromFormat('Y-m-d','2018-02-06');

        // Pridedu API pradzia
        $chuck = file_get_contents('https://api.chucknorris.io/jokes/random');
        $mas = json_decode($chuck, true);
        // pabaiga

        $post2 = new \stdClass();
        $post2->title = 'Chuck Noris API';
        $post2->content = $mas['value'];
        $post2->date = Carbon::createFromFormat('Y-m-d','2018-02-06');

        // Pridedu API pradzia
        $dataFromApi = file_get_contents('http://loremricksum.com/api/?paragraphs=1&quotes=3');
        $masyvas = json_decode($dataFromApi,true);
        // pabaiga

        $post3 = new \stdClass();
        $post3->title = 'Rick and Morty API';
        $post3->content = $masyvas['data'][0];
        $post3->date = Carbon::createFromFormat('Y-m-d','2018-02-06');

        $posts = [$post1,$post2,$post3];
        return view('index', ['posts'=>$posts]);
    }

    public function admin(){
        $showData = Post::all();
//        $showData = DB::table('posts')->get();
        return view('posts.all',['postai' => $showData]);
    }
}
?>

