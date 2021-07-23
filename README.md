<h1>NewsAPIを用いた英文ニュースアプリケーション</h1>
<p>キーワード検索でそのキーワードに関する英文ニュースを閲覧できます。</p>
<p>気に入ったニュースを登録できます。</p>
<h2>作成の目的</h2>
週に1回、大学で研究に関する英文のニュースを紹介するので、そのニュースのネタ探しと英語の勉強のため作成しました。
<h2>使い方</h2>
<h3>ログイン画面</h3>
<img src="https://github.com/Anemoi7838/NewsAPI/blob/master/img/readme_01.PNG">
<p>アプリケーションを起動すると、ログイン画面になります。<br>
ここでログインしてください。はじめての方は、右上のRegisterで登録してください。<br>
また、デフォルトでEmail：Test@gmail.com、PW：hogehogeというユーザがありますので、こちらでもログインできます。</p>

<h3>トップ画面</h3>
<img src="https://github.com/Anemoi7838/NewsAPI/blob/master/img/readme_02.PNG">
<p>Input keywordsに検索したいキーワード(英単語)を入力します。<br>
また、複数検索も可能で、スペースを空けてキーワードを入力してください。<br>
左のラジオボタンでAND検索かOR検索を選択できます。<br>
Select optionでは、relevancyは、そのキーワードで最も関連性が高いニュース、popularityは、最も閲覧されているニュース、publishedAtは、最も新しいニュースが先頭に表示されます。<br>
最後に、submitというボタンをクリックすると検索されます。<br>
カテゴリー検索もでき、business、entertainment、general、health、science、sports、technologyから選択できます。<br>
Favorite articlesの下にお気に入りの記事が表示されます。</p>

<h3>検索、結果画面</h3>
<img src="https://github.com/Anemoi7838/NewsAPI/blob/master/img/readme_03.PNG">
<p>先ほどのキーワードに関するニュースが20記事表示されます。<br>
ニュースタイトルをクリックすると、情報元にとび、内容が確認できます。<br>
その下のfavoriteというボタンをクリックすることで、お気に入り記事として、登録され、トップ画面で表示されます。</p>
<h2>URL</h2>
<a herf="https://thawing-fortress-57866.herokuapp.com/">
<h2>使用技術</h2>
<li>HTML/CSS</li>
<li>PHP</li>
<li>Laravel</li>
<li>MySQL</li>
<h2>機能一覧</h2>
<li>ユーザ登録/ログイン機能</li>
<li>キーワード複数検索機能</li>
<li>カテゴリー検索機能</li>
<li>ニュース登録機能</li>