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

class NewsStoreController extends Controller
{
    public function __invoke(News $favorite, Request $request)
    {
        $post = News::all();
        $counts = $post->count();
        $id=Auth::id();
        $url = $request->news['url'];
        $lang = $request->lang;
        if($counts==0){
            $input=$request["news"];
            $favorite->fill($input)->save();
            if($lang =='ja'){
                session()->flash('msg_success', '登録しました');
            }else{
                session()->flash('msg_success', '登録しました');
            }
            
            return redirect()->back();
        }
        for ($i = 0;$i<$counts; $i++){
            if ($post[$i]['name'] == $id && $post[$i]['url'] != $url){
                if ( $i == $counts-1 ){
                     $input=$request["news"];
                     $favorite->fill($input)->save();
                     if ( $lang == 'ja'){
                        session()->flash('msg_success', '登録しました');
                     }else{
                        session()->flash('msg_success', 'Registered');
                     }
                     
                     return redirect()->back();
                }
            }elseif($post[$i]['name'] == $id && $post[$i]['url'] == $url){
                if( $lang == 'ja'){
                    session()->flash('msg_danger', 'すでに登録済みです');
                }else{
                    session()->flash('msg_danger', 'Already registered');
                }
                
                return redirect()->back();
            }
            elseif($post[$i]['name'] != $id && $i==$counts-1 ){
                $input=$request["news"];
                $favorite->fill($input)->save();
                if( $lang == 'ja'){
                    session()->flash('msg_success', '登録しました');
                }else{
                    session()->flash('msg_success', 'Registered');
                }
                
                return redirect()->back();
            }
        }
    }

}