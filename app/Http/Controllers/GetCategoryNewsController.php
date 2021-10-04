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
class GetCategoryNewsController extends Controller
{
    public function __invoke($category)
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
}
