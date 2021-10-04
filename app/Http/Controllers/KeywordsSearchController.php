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
class KeywordsSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $keywords = $request -> keywords;
        $sortBy = $request -> sortBy;
        $method = $request -> method;
        //$news = $this->getNews_keywords($keywords,$sortBy,$method);
        $search = app()->make('App\Http\Controllers\GetKeywordsNewsController');
        $news = $search->__invoke($keywords,$sortBy,$method);
        $user_info = new Request();
        $user_agent = app()->make('App\Http\Controllers\UserAgentController');
        $user = $user_agent->__invoke($user_info);
        $lang = $request -> lang;
        if($lang == 'ja'){
            return view('jindex', compact('news','user','keywords'));
        }else{
            return view('index', compact('news','user','keywords'));
        }
        
    }
}
