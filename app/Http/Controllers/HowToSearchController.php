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
class HowToSearchController extends Controller
{
    public function __invoke(){
        $user_info = new Request();
        $user_agent = app()->make('App\Http\Controllers\UserAgentController');
        $user = $user_agent->__invoke($user_info);
        return view('howToSearch',compact('user'));
    }
}
