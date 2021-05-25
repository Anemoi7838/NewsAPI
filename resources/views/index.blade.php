<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>News</title>

        <!-- Fonts -->
        <link rel="canonical" href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="container ">
        <form method="GET" action="/search">
            <h2>Input keywords</h2>
            <input type="text" name="keywords" value="{{ old('keywords') }}" ></br>
            <p class="keywords__error" style="color:red">{{ $errors->first( "keywords") }}</p>
            <h2>Select option</h2>
            <input type="radio" name="sortBy" value="relevancy">relevancy
            <input type="radio" name="sortBy" value="popularity">popularity
            <input type="radio" name="sortBy" value="publishedAt">publishedAt<br>
            <h2>Input article counts
            <input type="text" name="count" value="{{ old('count') }}">
            <p class="count__error" style="color:red">{{ $errors->first( "keywords") }}</p>
            <input type="submit" value="submit">
        </form>
        @foreach($news as $data)
        <div class="card-body pt-0 pb-2">
            <h3 class="h5 card-title">
                <hr size=3 color="black">
                <a href="{{$data['url']}}">{{$data['name']}}</a>
            </h3>
            <div class="card-text">
                <p>{{$data['content']}}</p>
                <img src="{{$data['thumbnail']}}" width="500" height="400">
            </div>
        </div>
        @endforeach
       
    </div>
    </body>
</html>