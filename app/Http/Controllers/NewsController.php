<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest; 
use App\News;


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
        $keywords = $request -> keywords;
        $sortBy = $request -> sortBy;
        $count = $request -> count;
        $news = $this->getNews($keywords,$sortBy,$count);
        return view('index', compact('news'));
    }
    
    public function getNews($keywords,$sortBy,$count)
    {
        try {
            
            //$url = config('newsapi.news_api_url') . "top-headlines?country=us&category=business&apiKey=" . config('newsapi.news_api_key');
            $url = config('newsapi.news_api_url') . "everything?q=".$keywords."&language=en&sortBy=".$sortBy."&apiKey=" . config('newsapi.news_api_key');
            
            $method = "GET";
            $counts = $count;

            $client = new Client();
            $response = $client->request($method, $url);

            $results = $response->getBody();
            $articles = json_decode($results, true);

            $news = [];

            for ($id = 0; $id < $counts; $id++) {
                array_push($news, [
                    'name' => $articles['articles'][$id]['title'],
                    'url' => $articles['articles'][$id]['url'],
                    'thumbnail' => $articles['articles'][$id]['urlToImage'],
                    'content' => $articles['articles'][$id]['content']
                ]);
            }
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
        return $news;
    }
    public function store(News $favorite, Request $request)
    {
        //dd($request->all());
        
        $input=$request["news"];
        //$fav->timestamps = false; 
        $favorite->fill($input)->save();
        return redirect('/home');
        #return view('index')->with(['favorite' => $fav->get()]);
    }
    public function delete(News $favorite)
    {
        //dd($favorite->all());
        $favorite->delete();
        return redirect("/home");
    }
   
}