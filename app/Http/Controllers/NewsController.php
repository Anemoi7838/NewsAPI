<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest; 
use App\News;

use Illuminate\Support\Facades\Log;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class NewsController extends Controller
{
    public function index()
    {
        $keywords="meteorology";
        $sortBy="relevancy";
        $count=10;
        $news=$this->getNews($keywords,$sortBy,$count);
        return view('index', compact('news'));
    }
    public function search(NewsRequest $request)
    {
        //dd($request->toArray());
        $keywords = $request -> keywords;
        $sortBy = $request -> sortBy;
        $method = $request -> method;
        #$count = $request -> count;
        $news = $this->getNews_keywords($keywords,$sortBy,$method);
        return view('index', compact('news'));
    }
    public function getNews_keywords($keywords,$sortBy,$method)
    {
        try {
            $keyword = str_replace("　", " ", $keywords);
            $array = explode(" ",$keyword);
            $key = "%20";
            for ($i=0;$i<count($array);$i++){
                if ( $i==0){
                    $sentence = "q=".$array[$i];
                    $keys = $sentence;
                }else{
                    $sentence = $key.$method.$key.$array[$i];
                    $keys = $keys.$sentence;
                }
                
            }
            $url = config('newsapi.news_api_url') . "everything?".$keys."&language=en&sortBy=".$sortBy."&apiKey=" . config('newsapi.news_api_key');
            
            //$url = config('newsapi.news_api_url') . "top-headlines?country=us&category=business&apiKey=" . config('newsapi.news_api_key');
            //$url = config('newsapi.news_api_url') . "everything?q=".$keywords."&language=en&sortBy=".$sortBy."&apiKey=" . config('newsapi.news_api_key');
            Log::debug($url);
            
            $method = "GET";
            $counts = 20;

            $client = new Client();
            $response = $client->request($method, $url);

            $results = $response->getBody();
            $articles = json_decode($results, true);
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
        return view('index', compact('news'));
    }
     public function puts(NewsRequest $request)
    {
        $category = $request -> category;
        $news = $this->getNews_category($category);
        return view('index', compact('news'));
    }
    public function getNews_category($category)
    {
            $url = config('newsapi.news_api_url') . "top-headlines?category=".$category."&country=us&apiKey=" . config('newsapi.news_api_key');
            Log::debug($url);
            $method = "GET";
            $counts = 20;

            $client = new Client();
            $response = $client->request($method, $url);

            $results = $response->getBody();
            $articles = json_decode($results, true);

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
        $url = $request->news['url'];
        for ($id = 0;$id<$counts; $id++){
            if ($post[$id]['url'] != $url){
                if ( $id == $counts-1 ){
                     $input=$request["news"];
                     $favorite->fill($input)->save();
                     $favorites=$favorite;
                     session()->flash('msg_success', '登録しました');
                     //return redirect()->back();
                     return redirect("/home");
                }
                continue;
                
            }else{
                  session()->flash('msg_danger', 'すでに登録済みです');
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
   
}