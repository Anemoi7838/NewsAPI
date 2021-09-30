@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!---<div class="card-header">Dashboard</div>--->
                <div class="card-body">
                    <h2>Favorite articles</h2>
                    <form method="GET" action="/favorite">
                        <input type="hidden" name="lang" value="ja">
                        <input type="submit" value="Japanese">
                    </form>
                    <form method="GET" action="/home">
                        <input type="hidden" name="lang" value="en">
                        <input type="submit" value="home">
                    </form>
                    <?php $counts=count($favorites); ?>
                    @for($i=0;$i<$counts;$i++)
                        <a href="{{ $favorites[$i]['url']}}">{{ $favorites[$i]['title'] }}</a><br>
                        <form action="/delete/{{ $favorites[$i]['id'] }}" id="form_delete"  method="post" >
                            @csrf
                            @method('DELETE')
                            <input type="submit" style="display:none" value="delete">
                            <button><span onclick="return deleteNews(this);">delete</span></button>
                            <script>
                                function deleteNews(e) {
                                'use strict';

                                if (!window.confirm('本当に削除していいですか?')) {
                                    window.alert('キャンセルされました');
                                    return false;
                                    }
                                    document.deleteform.submit();
                                }
                            </script>
                        </form>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
    
@endsection