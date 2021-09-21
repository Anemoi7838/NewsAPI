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

class UserAgentController extends Controller
{
    public function __invoke(Request $request){
        $ua = $_SERVER['HTTP_USER_AGENT'];
        if ((strpos($ua, 'Android') !== false) 
        && (strpos($ua, 'Mobile') !== false) 
        || (strpos($ua, 'iPhone') !== false) 
        || (strpos($ua, 'Windows Phone') !== false)) {
            $terminal ='mobile';
        }elseif((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)){
            $terminal = 'pc';
        }else{
            $terminal = 'pc';
        }

        return $terminal;
    }
}