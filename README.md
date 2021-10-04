<h1>NewsAPIを用いた英文ニュースアプリケーション</h1>
<p>キーワード検索でそのキーワードに関する英文ニュースを閲覧できます。</p>
<p>気に入ったニュースを登録できます。</p>
<a href="#pur">作成目的</a>
<h3 class = "userInfo">検索機能について</h3>
<ul>
    <li><a href="#Single">単体検索</a></li>
    <li><a href="#Multiple">複数検索</a></li>
    <li><a href="#Category">カテゴリー検索</a></li>
    <li><a href="#Options">オプションについて</a></li>
</ul>   
<h3>お気に入り機能について</h3>
<ul>
    <li><a href="#Add">お気に入り記事の追加</a></li>
    <li><a href="#Delete">お気に入り記事の削除</a></li>   
</ul>
<a href="#use">使用技術</a>
<h2 id = "pur">作成の目的</h2>
週に1回、大学で研究に関する英文のニュースを紹介するので、そのニュースのネタ探しと英語の勉強のため作成しました。
<h2 id="Single">単体検索</h2>
<p>右上のハンバーガーメニューをクリックしましょう。<br>
    因みにホームではその操作は必要ありません。<br>
    <img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/01.png" width="100%">
    <p>検索したいキーワードを検索欄に入れましょう。<br>
    次にオプションを選択します。<br>
    デフォルトでは、関連順になっています。<br>
    オプションについて詳しくはこちらから<br>
    最後に検索ボタンをクリックしましょう。</p>
    <img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/02.png" width="100%">
<h2 id="Multiple">複数検索</h2>
<p>右上のハンバーガーメニューをクリックしましょう。<br>
    因みにホームではその操作は必要ありません。</p>
    <img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/01.png" width="100%">
    <p>検索したい複数のキーワードをスペースを空けて入力しましょう。<br>
    入力欄の左側でAND検索かOR検索を選ぶことができます。<br>
    AND検索とは、2つ以上のキーワードを入力したときに、両方の単語を含む記事が検索されます。<br>
    一方、OR検索では、2つ以上のキーワードが入力された場合に、2つの用語のいずれかを含む記事が検索されます。<br>
    デフォルトでは、AND検索です。<br>
    オプションを選択します。<br>
    デフォルトでは、関連順になっています。<br>
    オプションについて詳しくはこちらから<br>
    最後に検索ボタンをクリックしましょう。</p>
    <img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/03.png" width="100%">
<h2 id="Category">カテゴリー検索</h2>
<p>右上のハンバーガーメニューをクリックしましょう。<br>
    因みにホームではその操作は必要ありません。<br>
    カテゴリ検索では、7つのカテゴリから選択して、そのカテゴリーに関連する記事を検索します。<br>
    7つのカテゴリは、ビジネス、エンターテインメント、一般、健康、科学、スポーツ、テクノロジーです。<br>
    ボタンを押すだけで検索できます。<br>
    <img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/04.png" width="100%">
    <p>キーワード検索との併用はできません。<br>
    上のナビゲーションバーからカテゴリーで検索することもできます。<br>
    <img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/05.png" width="100%">
<h2 id="Options">オプションについて</h2>
<p>オプションについて説明します。<br>
    このアプリケーションには3つのオプションがあります。<br>
    関連順は、検索するキーワードに最も関連性の高い20の記事を順番に検索します。<br>
    人気順はあなたが検索したいキーワードで最も読まれた20の記事を検索します。<br>
    新着順は、検索するキーワードの中で新しい順で20の記事を検索します。</p>
<h2 id="Add">お気に入り記事の追加</h2>
<p>検索後、検索に一致する記事が20件表示されます。<br>
    記事のタイトルの下には、お気に入りボタンがあります。</p>
    <img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/06.png" width="100%">
    <p>ここをクリックすると、右上に登録したことが通知されます。</p>
    <img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/07.PNG" width="100%">
    <p>また、すでに登録されている記事については、登録済みであることが通知されます。</p>
    <img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/08.PNG" width="100%">
    <p>ホームページに戻ると、お気に入りの記事ページに登録した記事が表示されます。</p>
<h2 id="Delete">お気に入り記事の削除</h2>
<p>お気に入りの記事を削除したい場合は、ホームページのお気に入りの記事のタイトルの下に削除ボタンがありますので、そのボタンをクリックしてください。</p>
<img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/09.png" width="100%">
<p>確認のポップアップ画面が表示されます。 OKをクリックして削除します。</p>
<img src="https://github.com/Anemoi7838/NewsAPI/blob/master/public/image/10.png" width="100%">
<h2>URL</h2>
<a href="https://thawing-fortress-57866.herokuapp.com/">https://thawing-fortress-57866.herokuapp.com/</a>
<h2 id="use">使用技術</h2>
<li>HTML/CSS</li>
<li>PHP7.3</li>
<li>Laravel6.20</li>
<li>MySQL15.1</li>
<h2>機能一覧</h2>
<li>ユーザ登録/ログイン機能</li>
<li>キーワード複数検索機能</li>
<li>カテゴリー検索機能</li>
<li>ニュース登録機能</li>
<li>日本語と英語対応</li>