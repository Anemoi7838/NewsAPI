<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X=UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1">
        <meta http-equiv="Content-Language" content="ja">
        <meta name="google" content="notranslate">
        <title>NewsApp</title>
        <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="./favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png"> 
        
        <!-- Fonts -->
        <link rel="canonical" href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        @if($user === 'pc')
            @include('jnavbar')
        @else
            @include('jhamburger')
        @endif
    </head>
    <body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="container ">
        @if( isset($keywords) )
            <h1 class="userInfo">キーワード検索: <strong>{{$keywords}}</strong></h1>
        @elseif( isset($category) )
            <h1 class="userInfo">カテゴリー検索: <strong>{{$category}}</strong></h1>
        @endif
        @foreach($news as $data)
        <?php $id=Auth::id(); ?>
        <div class="card-body pt-0 pb-2">
            <h1 class="h3 card-title">
                <hr size=3 color="black">
                <a href="{{ $data['url'] }}">{{ $data['name'] }}</a>
                <form action="/store" method="POST">
                    @csrf
                    <input type="hidden"name="news[name]" value="<?php echo $id;?>">
                    <input type="hidden"name="news[title]" value="{{ $data['name'] }}">
                    <input type="hidden"name="news[url]" value="{{ $data['url'] }}">
                    <input type="submit" value="お気に入り追加">
                </form>
            </h1>
            <div class="card-text">
                <p>{{$data['content']}}</p>
                <img src="{{$data['thumbnail']}}" width="500" height="400">
            </div>
        </div>
        @endforeach
        <script type="text/javascript">
            @if (session('msg_success'))
                $(function () {
                        toastr.success('{{ session('msg_success') }}');
                });
            @endif
             @if (session('msg_danger'))
                $(function () {
                        toastr.warning('{{ session('msg_danger') }}');
                });
            @endif
        </script>
    </div>
    </body>
</html>