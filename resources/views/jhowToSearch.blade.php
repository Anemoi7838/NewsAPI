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
    <div class="container">
        <h1 class = "userInfo">検索機能について</h1>
        <a href="/home">ホーム</a>
        <ul>
            <li><a href="#Single">単体検索</a></li>
            <li><a href="#Multiple">複数検索</a></li>
            <li><a href="#Category">カテゴリー検索</a></li>
            <li><a href="#Options">オプションについて</a></li>
        </ul>   
        <h1>お気に入り機能について</h1>
        <ul>
            <li><a href="#Add">お気に入り記事の追加</a></li>
            <li><a href="#Delete">お気に入り記事の削除</a></li>   
        </ul>
        <h2 id="Single">単体検索</h2>
        <p>右上のハンバーガーメニューをクリックしましょう。<br>
            因みにホームではその操作は必要ありません。<br>
            <img src="image/01.png" width="100%">
            <p>検索したいキーワードを検索欄に入れましょう。<br>
            次にオプションを選択します。<br>
            デフォルトでは、関連順になっています。<br>
            オプションについて詳しくはこちらから<br>
            最後に検索ボタンをクリックしましょう。</p>
            <img src="image/02.png" width="100%">
        <h2 id="Multiple">複数検索</h2>
        <p>右上のハンバーガーメニューをクリックしましょう。<br>
            因みにホームではその操作は必要ありません。</p>
            <img src="image/01.png" width="100%">
            <p>検索したい複数のキーワードをスペースを空けて入力しましょう。<br>
            入力欄の左側でAND検索かOR検索を選ぶことができます。<br>
            AND検索とは、2つ以上のキーワードを入力したときに、両方の単語を含む記事が検索されます。<br>
            一方、OR検索では、2つ以上のキーワードが入力された場合に、2つの用語のいずれかを含む記事が検索されます。<br>
            デフォルトでは、AND検索です。<br>
            オプションを選択します。<br>
            デフォルトでは、関連順になっています。<br>
            オプションについて詳しくはこちらから<br>
            最後に検索ボタンをクリックしましょう。</p>
            <img src="image/03.png" width="100%">
        <h2 id="Category">カテゴリー検索</h2>
        <p>右上のハンバーガーメニューをクリックしましょう。<br>
            因みにホームではその操作は必要ありません。<br>
            カテゴリ検索では、7つのカテゴリから選択して、そのカテゴリーに関連する記事を検索します。<br>
            7つのカテゴリは、ビジネス、エンターテインメント、一般、健康、科学、スポーツ、テクノロジーです。<br>
            ボタンを押すだけで検索できます。<br>
            <img src="image/04.png" width="100%">
            <p>キーワード検索との併用はできません。<br>
            上のナビゲーションバーからカテゴリーで検索することもできます。<br>
            <img src="image/05.png" width="100%">
        <h2 id="Options">オプションについて</h2>
        <p>オプションについて説明します。<br>
            このアプリケーションには3つのオプションがあります。<br>
            関連順は、検索するキーワードに最も関連性の高い20の記事を順番に検索します。<br>
            人気順はあなたが検索したいキーワードで最も読まれた20の記事を検索します。<br>
            新着順は、検索するキーワードの中で新しい順で20の記事を検索します。</p>
        <h2 id="Add">お気に入り記事の追加</h2>
        <p>検索後、検索に一致する記事が20件表示されます。<br>
            記事のタイトルの下には、お気に入りボタンがあります。</p>
            <img src="image/06.png" width="100%">
            <p>ここをクリックすると、右上に登録したことが通知されます。</p>
            <img src="image/07.PNG" width="100%">
            <p>また、すでに登録されている記事については、登録済みであることが通知されます。</p>
            <img src="image/08.PNG" width="100%">
            <p>ホームページに戻ると、お気に入りの記事ページに登録した記事が表示されます。</p>
        <h2 id="Delete">お気に入り記事の削除</h2>
        <p>お気に入りの記事を削除したい場合は、ホームページのお気に入りの記事のタイトルの下に削除ボタンがありますので、そのボタンをクリックしてください。</p>
        <img src="image/09.png" width="100%">
        <p>確認のポップアップ画面が表示されます。 OKをクリックして削除します。</p>
        <img src="image/10.png" width="100%">
    </div>
    </body>
</html>