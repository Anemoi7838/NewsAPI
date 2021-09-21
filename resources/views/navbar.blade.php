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
            <a class="navbar-brand" href="/home">News </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <form method="GET" action="/category">
            <input type="submit" name="category" value="business">
            <input type="submit" name="category" value="entertainment">
            <input type="submit" name="category" value="general">
            <input type="submit" name="category" value="health">
            <input type="submit" name="category" value="science">
            <input type="submit" name="category" value="sports">
            <input type="submit" name="category" value="technology">
        </form>
        <div class="hamburger-menu">
            <input type="checkbox" id="menu-btn-check">
            <label for="menu-btn-check" class="menu-btn"><span></span></label>
            <!--ここからメニュー-->
            <div class="menu-content">
                <form method="GET" action="/category">
                    <input type="submit" name="category" value="business">
                    <input type="submit" name="category" value="entertainment">
                    <input type="submit" name="category" value="general">
                    <input type="submit" name="category" value="health">
                    <input type="submit" name="category" value="science">
                    <input type="submit" name="category" value="sports">
                    <input type="submit" name="category" value="technology">
                </form>
            </div>
        <!--ここまでメニュー-->
        </div>
        </div>
    </div>
</nav>

    <div class="hamburger-menu">
        <input type="checkbox" id="menu-btn-check">
        <label for="menu-btn-check" class="menu-btn"><span></span></label>
        <!--ここからメニュー-->
        <div class="menu-content">
            <form method="GET" action="/category">
                <input type="submit" name="category" value="business">
                <input type="submit" name="category" value="entertainment">
                <input type="submit" name="category" value="general">
                <input type="submit" name="category" value="health">
                <input type="submit" name="category" value="science">
                <input type="submit" name="category" value="sports">
                <input type="submit" name="category" value="technology">
            </form>
        </div>
        <!--ここまでメニュー-->
    </div>