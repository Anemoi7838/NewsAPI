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
            <form action="/put" name="category" method="POST" >
            @method('PUT')
            @csrf
            <ul class="nav navbar-nav">
                <input type="hidden" name="category" value="business"><li class="active"><a href="#" onclick="document.category.submit();">business</a></li>
                <input type="hidden" name="category" value="entertainment"><li class="active"><a href="#" onclick="document.category.submit();">entertainment</a></li>
                <input type="hidden" name="category" value="general"><li class="active"><a href="#" onclick="document.category.submit();">general</a></li>
                <input type="hidden" name="category" value="health"><li class="active"><a href="#" onclick="document.category.submit();">health</a></li>
                <input type="hidden" name="category" value="science"><li class="active"><a href="#" onclick="document.category.submit();">science</a></li>
                <input type="hidden" name="category" value="sports"><li class="active"><a href="#" onclick="document.category.submit();">sports</a></li>
                <input type="hidden" name="category" value="technology"><li class="active"><a href="#" onclick="document.category.submit();">technology</a></li>
                

                </form>
            </ul>
        </div>
    </div>
</nav>
