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
class CategorySearchController extends Controller
{
    public function __invoke(NewsRequest $request)
    {
        $category = $request -> category;
        //$news = $this->getNews_category($category);
        $search = app() -> make('App\Http\Controllers\GetCategoryNewsController');
        $news = $search->__invoke($category);
        $user_info = new Request();
        $user_agent = app()->make('App\Http\Controllers\UserAgentController');
        $user = $user_agent->__invoke($user_info);
        $lang = $request->lang;
        if ( $lang =="ja"){
            return view('jindex', compact('news','user','category'));
        }else{
            return view('index', compact('news','user','category'));
        }
        
    } 
}
