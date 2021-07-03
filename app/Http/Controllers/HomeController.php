<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(News $favorite)
    {
        $id=Auth::id();
        $post = News::all();
        $counts = $post->count();
        $ff=[];
        for ($i = 0;$i<$counts; $i++){
            if ($post[$i]['name'] == $id){
                array_push($ff, [
                    'id' => $post[$i]['id'],
                    'name' => $post[$i]['name'],
                    'url' => $post[$i]['url'],
                    'title' => $post[$i]['title']
                ]);
            }
        }
        //return view('home')->with(['favorites'=> $ff -> getByLimit()]);
        return view('home')->with(['favorites'=> $ff ]);
    }
    

}
