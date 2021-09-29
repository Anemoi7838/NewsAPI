<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
            data-toggle="collapse" data-target="#navbar"
            aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">NewsApp </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <form method="GET" action="/category">
                    <input class="cbutton" type="submit" name="category" value="business">
                    <input class="cbutton" type="submit" name="category" value="entertainment">
                    <input class="cbutton" type="submit" name="category" value="general">
                    <input class="cbutton" type="submit" name="category" value="health">
                    <input class="cbutton" type="submit" name="category" value="science">
                    <input class="cbutton" type="submit" name="category" value="sports">
                    <input class="cbutton" type="submit" name="category" value="technology">
                </form>
            </ul>
        </div>
    </div>
    <div class="hamburger-menu">
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
            <!--ここからメニュー-->
    <div class="menu-content">
    <h1 class = "loginUser">Login with {{ Auth::user()->name }}</h1>
    <a  class = "loginUser"href="/home">HOME</a>
        <form method="GET" action="/search">
            <h2 class = "loginUser">1.Input keywords</h2>
            <p class = "search"><input  type="radio" name="method" value="AND" checked="checked">AND
            <input  type="radio" name="method" value="OR">OR
            <input  type="text" name="keywords" value="{{ old('keywords') }}" ></p>
            <p class="keywords__error" style="color:red">{{ $errors->first( "keywords") }}</p>
            <h2 class = "loginUser">2.Select option</h2>
            <p class = "loginUser"><input type="radio" name="sortBy" value="relevancy" checked="checked">relevancy
            <input type="radio" name="sortBy" value="popularity">popularity
            <input type="radio" name="sortBy" value="publishedAt">publishedAt</p>
            <h2 class = "loginUser">3.Push submit button</h2>
            <input class="box" type="submit" value="submit">
        </form>
        <h1></h1>
        <h2 class = "loginUser">OR</h2>
        <h2 class = "loginUser">Choose category</h2>
        <form method="GET" action="/category">
            <input class="box" type="submit" name="category" value="business">
            <input class="box" type="submit" name="category" value="entertainment">
            <input class="box"type="submit" name="category" value="general">
            <input class="box"type="submit" name="category" value="health">
            <input class="box"type="submit" name="category" value="science">
            <input class="box"type="submit" name="category" value="sports">
            <input class="box"type="submit" name="category" value="technology">
        </form>
    </div>
        <!--ここまでメニュー-->
</div>

</nav>
