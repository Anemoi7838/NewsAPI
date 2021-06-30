
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!---<div class="card-header">Dashboard</div>--->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>ようこそ、{{ Auth::user()->name}}さん</h1>
                        <form method="GET" action="/search">
                            <h2>Input keywords</h2>
                            <input type="radio" name="method" value="AND" checked="checked">AND
                            <input type="radio" name="method" value="OR">OR
                            <input type="text" name="keywords" value="{{ old('keywords') }}" ></br>
                            <p class="keywords__error" style="color:red">{{ $errors->first( "keywords") }}</p>
                            <h2>Select option</h2>
                            <input type="radio" name="sortBy" value="relevancy" checked="checked">relevancy
                            <input type="radio" name="sortBy" value="popularity">popularity
                            <input type="radio" name="sortBy" value="publishedAt">publishedAt<br>
                            <!---
                            <h2>Input article counts</h2>
                            <input type="text" name="count" value="{{ old('count') }}">
                            <p class="count__error" style="color:red">{{ $errors->first( "count") }}</p>
                            --->
                            <input type="submit" value="submit">
                        </form>
                        <h2>Choose category</h2>
                        <form method="GET" action="/category">
                            <input type="submit" name="category" value="business">
                            <input type="submit" name="category" value="entertainment">
                            <input type="submit" name="category" value="general">
                            <input type="submit" name="category" value="health">
                            <input type="submit" name="category" value="science">
                            <input type="submit" name="category" value="sports">
                            <input type="submit" name="category" value="technology">
                        </form>
                        <h2>Favorite articles</h2>
                    @foreach ($favorites as $favorite)
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
 
                                    if (!window.confirm('本当に削除していいですか?')) {
                                        window.alert('キャンセルされました');
                                        return false;
                                        }
                                        document.deleteform.submit();
                                    }
                                    
                                    </script>
                                </form>    
                            @endif
                    @endforeach
                </div>
                <!---
                <div class="paginate">
                    {{ $favorites->links() }}
                </div>
                --->
            </div>
        </div>
    </div>
</div>
</body>
</html>
    
@endsection
