<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X=UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1">
        <meta http-equiv="Content-Language" content="us">
        <meta name="google" content="notranslate">
        <title>NewsApp</title>
        <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="./favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png"> 
        
        <!-- Fonts -->
        <link rel="canonical" href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        @if($user === 'pc')
            @include('navbar')
        @else
            @include('hamburger')
        @endif
    </head>
    <body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="container">
        <h1 class = "userInfo">About the search function</h1>
        <a href="/home">HOME</a>
        <ul>
            <li><a href="#Single">Single search</a></li>
            <li><a href="#Multiple">Multiple search</a></li>
            <li><a href="#Category">Category search</a></li>
            <li><a href="#Options">About options</a></li>
        </ul>   
        <h1>About favorite article function</h1>
        <ul>
            <li><a href="#Add">Add favorite articles</a></li>
            <li><a href="#Delete">Delete favorite articles</a></li>   
        </ul>
        <h2 id="Single">Single search</h2>
        <p>Enter the keyword you want to search in the search box.<br>
            Then select an option with the radio button.<br>
            The default is relevancy.<br>
            Learn more about options.<br>
            Finally, press the submit button.</p>
        <h2 id="Multiple">Multiple search</h2>
        <p>Enter multiple keywords you want to look up in the search box, separated by spaces.<br>
            With multiple searches, you can also perform AND search and OR search.<br>
            AND search is to search for articles that include both words when you enter two or more keywords.<br>
            On the other hand, OR search searches for articles that contain either of the two terms when two or more keywords are entered.<br>
            The default is AND search.<br>
            Then select an option with the radio button.<br>
            The default is relevancy.<br>
            Learn more about options.<br>
            Finally, press the submit button.</p>
        <h2 id="Category">Category search</h2>
        <p>Category search searches for articles related to that category by selecting from seven categories.<br>
            The seven categories are Business, Entertainment, General, Health, Science, Sports and Technology.<br>
            You can search by pressing the button under Choose Category.<br>
            Cannot be used in combination with keyword search.<br>
            You can also search by category from the navigation bar above.<br>
            On mobile devices, click on the hamburger menu in the upper right.</p>
        <h2 id="Options">About options</h2>
        <p>Describes the options.<br>
            This application has three options.<br>
            Relevancy searches 20 articles in order that are most relevant to the keyword you want to search.<br>
            Popularity is to search 20 articles in order for the most read articles by the keyword you want to search.<br>
            Published At is a search for 20 new articles in order with the keyword you want to search.</p>
        <h2 id="Add">Add favorite articles</h2>
        <p>After the search, 20 articles matching the search will be displayed.<br>
            Below the title of the article is a Favorites button.<br>
            If you click here, you will be notified that you have registered in the upper right corner.<br>
            Also, for articles that have already been registered, you will be notified that you have already registered.<br>
            When you return to the home page, you can see the articles you registered in the Favorites Articles column.</p>
        <h2 id="Delete">Delete favorite articles</h2>
        <p>If you want to delete your favorite articles, there is a delete button under the title of your favorite articles on your home page, so click that button.<br>
            A confirmation pop-up screen will appear. Click OK to delete it.</p>
    </div>
    </body>
</html>