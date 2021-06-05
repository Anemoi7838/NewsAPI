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
                            <p class="count__error" style="color:red">{{ $errors->first( "count") }}</p>
                            <input type="submit" value="submit">
                        </form>
                        <h2>Favorite articles</h2>
                     @foreach ($favorites as $favorite)
                        <div class='post'>
                            <?php $cid=Auth::id();$aid=$favorite->name;?>
                            @if ( $cid==$aid )
                                <a href="{{ $favorite->url}}">{{ $favorite->title }}</a>
                                <form action="/delete/{{ $favorite->id }}" id="form_delete"  method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" style="display:none" value="delete">
                                    <button><span onclick="return deleteNews(this);">delete</span></button>
                                    <script>
                                    function deleteNews(e) {
                                    'use strict';
 
                                    if (confirm('本当に削除していいですか?')) {
                                        document.getElementById('form_delete').submit();
                                        }
                                    }
                                    </script>
                                </form>    
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
