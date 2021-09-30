<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
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
    public function index(News $favorite, Request $test)
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
        $lang = $test->lang;
        //return view('home')->with(['favorites'=> $ff -> getByLimit()]);
        if ($lang =='ja'){
            return view('jhome')->with(['favorites'=> $ff ]);
        }else{
            return view('home')->with(['favorites'=> $ff ]);
        }
        
    }
    

}
