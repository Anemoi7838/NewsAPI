@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>ようこそ、{{ Auth::user()->name}}さん</h1>
                        <form method="GET" action="/search">
                            <h2>Input keywords</h2>
                            <input type="text" name="keywords" value="{{ old('keywords') }}" ></br>
                            <p class="keywords__error" style="color:red">{{ $errors->first( "keywords") }}</p>
                            <h2>Select option</h2>
                            <input type="radio" name="sortBy" value="relevancy" checked="checked">relevancy
                            <input type="radio" name="sortBy" value="popularity">popularity
                            <input type="radio" name="sortBy" value="publishedAt">publishedAt<br>
                            <h2>Input article counts</h2>
                            <input type="text" name="count" value="{{ old('count') }}">
                            <p class="count__error" style="color:red">{{ $errors->first( "keywords") }}</p>
                            <input type="submit" value="submit">
                        </form>
                     @foreach ($favorites as $favorite)
                        <div class='post'>
                            <?php $aaa=Auth::id();$bbb=$favorite->name;?>
                            @if ( $aaa==$bbb )
                                <a href="{{ $favorite->url}}">{{ $favorite->title }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
