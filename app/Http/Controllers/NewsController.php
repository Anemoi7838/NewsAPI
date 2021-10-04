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

class NewsController extends Controller
{
    public function search(NewsRequest $request)
    {
        $keywords = $request -> keywords;
        $sortBy = $request -> sortBy;
        $method = $request -> method;
        $news = $this->getNews_keywords($keywords,$sortBy,$method);
        $user_info = new Request();
        $user_agent = app()->make('App\Http\Controllers\UserAgentController');
        $user = $user_agent->__invoke($user_info);
        return view('index', compact('news','user','keywords'));
    }
    public function getNews_keywords($keywords,$sortBy,$method)
    {
        try {
            $keyword = str_replace("　", " ", $keywords);
            $array = explode(" ",$keyword);
            $key = "%20";
            for ($i=0;$i<count($array);$i++){
                if ( $i==0){
                    $sentence = http_build_query(["q"=>$array[$i]]);
                    //$sentence = "q=".$array[$i];
                    $keys = $sentence;
                }else{
                    $sentence = $key.$method.$key.$array[$i];
                    $keys = $keys.$sentence;
                }
                
            }
            $url = config('newsapi.news_api_url') . "everything?".$keys."&language=en&sortBy=".$sortBy."&apiKey=" . config('newsapi.news_api_key');
            Log::debug($url);
            
            $method = "GET";
            $options = [  
                'http' => [  
                'method'           => 'GET',  
                'protocol_version' => 1.1,  
                'header' => 'user-agent:MyUserAgent'
                ]  
            ];  
          

            $client = new Client();
            $response = $client->request($method, $url);

            $results = $response->getBody();
            $articles = json_decode($results, true);
            $counts = count($articles['articles']);
            $news = [];

            for ($id = 0; $id < $counts; $id++) {
                if ( $articles['articles'][$id]['urlToImage'] == null){
                        $thumbnail = "image/earth.jpg";
                }else{
                    $thumbnail =$articles['articles'][$id]['urlToImage'];
                }
                    
                array_push($news, [
                    'name' => $articles['articles'][$id]['title'],
                    'url' => $articles['articles'][$id]['url'],
                    'thumbnail' => $thumbnail,
                    'content' => $articles['articles'][$id]['content']
                ]);
            }
            
            }catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
        return $news;
    }
    public function category(NewsRequest $request)
    {
        $category = $request -> category;
        $news = $this->getNews_category($category);
        $user_info = new Request();
        $user_agent = app()->make('App\Http\Controllers\UserAgentController');
        $user = $user_agent->__invoke($user_info);
        return view('index', compact('news','user','category'));
    }
    
    public function getNews_category($category)
    {
            $url = config('newsapi.news_api_url') . "top-headlines?category=".$category."&country=us&apiKey=" . config('newsapi.news_api_key');
            Log::debug($url);
            $method = "GET";
           

            $client = new Client();
            $response = $client->request($method, $url);

            $results = $response->getBody();
            $articles = json_decode($results, true);
            $counts = count($articles['articles']);
            $news = [];
            
            
            for ($id = 0; $id < $counts; $id++) {
                if ( $articles['articles'][$id]['urlToImage'] == null){
                        $thumbnail = "image/earth.jpg";
                }else{
                    $thumbnail =$articles['articles'][$id]['urlToImage'];
                }
                    
                array_push($news, [
                    'name' => $articles['articles'][$id]['title'],
                    'url' => $articles['articles'][$id]['url'],
                    'thumbnail' => $thumbnail,
                    'content' => $articles['articles'][$id]['content']
                ]);
            }
        return $news;
    }
    public function store(News $favorite, Request $request)
    {
        $post = News::all();
        $counts = $post->count();
        $id=Auth::id();
        $url = $request->news['url'];
        if($counts==0){
            $input=$request["news"];
            $favorite->fill($input)->save();
            session()->flash('msg_success', '登録しました');
            return redirect()->back();
        }
        for ($i = 0;$i<$counts; $i++){
            if ($post[$i]['name'] == $id && $post[$i]['url'] != $url){
                if ( $i == $counts-1 ){
                     $input=$request["news"];
                     $favorite->fill($input)->save();
                     session()->flash('msg_success', '登録しました');
                     return redirect()->back();
                }
            }elseif($post[$i]['name'] == $id && $post[$i]['url'] == $url){
                    session()->flash('msg_danger', 'すでに登録済みです');
                    return redirect()->back();
            }
            elseif($post[$i]['name'] != $id && $i==$counts-1 ){
                $input=$request["news"];
                $favorite->fill($input)->save();
                session()->flash('msg_success', '登録しました');
                return redirect()->back();
            }
        }
    }
    public function delete(News $favorite)
    {
        //dd($favorite->all());
        $favorite->delete();
        return redirect("/home");
    }
    public function howToSearch(){
        $user_info = new Request();
        $user_agent = app()->make('App\Http\Controllers\UserAgentController');
        $user = $user_agent->__invoke($user_info);
        return view('howToSearch',compact('user'));
    }
    
}