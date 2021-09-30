<div class="hamburger-menu">
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
            <!--ここからメニュー-->
    <div class="menu-content">
    <h1 class = "loginUser">{{ Auth::user()->name }}さんでログイン中</h1>
    <a  class = "loginUser"href="/home">ホーム</a>
        <form method="GET" action="/search">
            <h2 class = "loginUser">1.キーワード入力欄</h2>
            <p class = "loginUser"><input  type="radio" name="method" value="AND" checked="checked">かつ
            <input  type="radio" name="method" value="OR">あるいは
            <input  type="text" name="keywords" value="{{ old('keywords') }}" ></p>
            <p class="keywords__error" style="color:red">{{ $errors->first( "keywords") }}</p>
            <h2 class = "loginUser">2.オプション選択</h2>
            <p class = "loginUser"><input type="radio" name="sortBy" value="relevancy" checked="checked">関連順
            <input type="radio" name="sortBy" value="popularity">人気順
            <input type="radio" name="sortBy" value="publishedAt">新着順</p>
            <h2 class = "loginUser">3.検索</h2>
            <input class="box" type="submit" value="検索">
        </form>
        <h1></h1>
        <h2 class = "loginUser">あるいは</h2>
        <h2 class = "loginUser">カテゴリー検索</h2>
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
        <!--ここまでメニュー-->
</div>