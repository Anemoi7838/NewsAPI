<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest; 
use App\News;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
class FavoriteNewsController extends Controller
{
    public function __invoke(News $favorite, Request $test)
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
        $lang = $test -> lang;
        //return view('home')->with(['favorites'=> $ff -> getByLimit()]);
        if($lang =='ja'){
            return view('jfavorite')->with(['favorites'=> $ff ]);
        }else{
            return view('favorite')->with(['favorites'=> $ff ]);
        }
        
    }
}
