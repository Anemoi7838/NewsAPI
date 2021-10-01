
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
                    <h1>ようこそ {{ Auth::user()->name}}!!!</h1>
                    <form method="GET" action="/home">
                        <input type="hidden" name="lang" value="en">
                        <input type="submit" value="English">
                    </form>
                    <form method="GET" action="/howToSearch">
                        <input type="hidden" name="lang" value="ja">
                        <input type="submit" value="使い方">
                    </form>
                    <form method="GET" action="/search">
                        <h2>1.キーワード入力欄</h2>
                        <input type="radio" name="method" value="AND" checked="checked">かつ
                        <input type="radio" name="method" value="OR">あるいは
                        <input type="text" name="keywords" value="{{ old('keywords') }}" ></br>
                        <p class="keywords__error" style="color:red">{{ $errors->first( "keywords") }}</p>
                        <h2>2.オプション選択</h2>
                        <input type="radio" name="sortBy" value="relevancy" checked="checked">関連順
                        <input type="radio" name="sortBy" value="popularity">人気順
                        <input type="radio" name="sortBy" value="publishedAt">新着順<br>
                        <!---
                        <h2>Input article counts</h2>
                        <input type="text" name="count" value="{{ old('count') }}">
                        <p class="count__error" style="color:red">{{ $errors->first( "count") }}</p>
                        --->
                        <h2>3.検索</h2>
                        <input type="hidden" name="lang" value="ja">
                        <input type="submit" value="検索">
                    </form>
                    <h1></h1>
                    <h2>あるいは</h2>
                    <h2>カテゴリー検索</h2>
                    <div style="display:inline-flex">
                    <form method="GET" action="/category">
                        <input type="hidden" name="category" value="business">
                        <input type="submit" value="ビジネス">
                    </form>
                    <form method="GET" action="/category">
                        <input type="hidden" name="category" value="entertainment">
                        <input type="submit" value="エンタメ">
                    </form>
                    <form method="GET" action="/category">
                        <input type="hidden" name="category" value="general">
                        <input type="submit" value="一般">
                    </form>
                    <form method="GET" action="/category">
                        <input type="hidden" name="category" value="health">
                        <input type="submit" value="健康">
                    </form> 
                    <form method="GET" action="/category">
                        <input type="hidden" name="category" value="science">
                        <input type="submit" value="科学">
                    </form>
                    <form method="GET" action="/category">
                        <input type="hidden" name="category" value="sports">
                        <input type="submit" value="スポーツ">
                    </form>
                    <form method="GET" action="/category">
                        <input type="hidden" name="category" value="technology">
                        <input type="submit" value="テクノロジー">
                    </form>
                    </div>
                    <hr color="black" width="100%" size="10">
                    <form method="GET" action="/favorite">
                        <input type="hidden" name="lang" value="ja">
                        <input type="submit" value="お気に入り記事">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
    
@endsection
