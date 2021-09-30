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

class NewsDeleteController extends Controller
{
    public function __invoke(News $favorite)
    {
        //dd($favorite->all());
        $favorite->delete();
        return redirect("/home");
    }

}