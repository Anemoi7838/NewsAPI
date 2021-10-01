<div class="hamburger-menu">
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
            <!--ここからメニュー-->
    <div class="menu-content">
    <h1 class = "loginUser">Login with {{ Auth::user()->name }}</h1>
    <a  class = "loginUser"href="/home">HOME</a>
        <form method="GET" action="/search">
            <h2 class = "loginUser">1.Input keywords</h2>
            <p class = "loginUser"><input  type="radio" name="method" value="AND" checked="checked">AND
            <input  type="radio" name="method" value="OR">OR
            <input  type="text" name="keywords" value="{{ old('keywords') }}" ></p>
            <p class="keywords__error" style="color:red">{{ $errors->first( "keywords") }}</p>
            <h2 class = "loginUser">2.Select option</h2>
            <p class = "loginUser"><input type="radio" name="sortBy" value="relevancy" checked="checked">relevancy
            <input type="radio" name="sortBy" value="popularity">popularity
            <input type="radio" name="sortBy" value="publishedAt">publishedAt</p>
            <h2 class = "loginUser">3.Push submit button</h2>
            <input type="hidden" name="lang" value="en">
            <input class="box" type="submit" value="submit">
        </form>
        <h1></h1>
        <h2 class = "loginUser">OR</h2>
        <h2 class = "loginUser">Choose category</h2>
        <div style="display:inline-flex">
            <form method="GET" action="/category">
                <input type="hidden" name="lang" value="en">
                <input type="submit" name="category" value="business">
            </form>
            <form method="GET" action="/category">
                <input type="hidden" name="lang" value="en">
                <input type="submit" name="category" value="entertainment">
            </form>
            <form method="GET" action="/category">
                <input type="hidden" name="lang" value="en">
                <input type="submit" name="category" value="general">
            </form>
            <form method="GET" action="/category">
                <input type="hidden" name="lang" value="en">
                <input type="submit" name="category" value="health">
            </form> 
            <form method="GET" action="/category">
                <input type="hidden" name="lang" value="en">
                <input type="submit" name="category" value="science">
            </form>
            <form method="GET" action="/category">
                <input type="hidden" name="lang" value="en">
                <input type="submit" name="category" value="sports">
            </form>
            <form method="GET" action="/category">
                <input type="hidden" name="lang" value="en">
                <input type="submit" name="category" value="technology">
            </form>
        </div>
    </div>
        <!--ここまでメニュー-->
</div>