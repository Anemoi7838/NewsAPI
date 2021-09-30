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

class GetKeywordsNewsController extends Controller
{
    public function __invoke($keywords,$sortBy,$method)
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

}