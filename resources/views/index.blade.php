<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>架空日記 | 第2回松本家展</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body class="wrapper" id="diary">
        <h1>松本家架空日記</h1>
        <div class='diaries'>
            @foreach($diaries as $diary)
                <hr>
                <div class='diary'>
                    <h2 class='diary-title'>
                        <a href="/diary/{{ $diary->id }}">{{ $diary->title }}</a>
                    </h2>
                    @if($diary->year < 0)
                        <h3 class='diary-date'>紀元前{{ -1*$diary->year }}年@date_jp($diary->date)</h3>
                    @else
                        <h3 class='diary-date'>{{ $diary->year }}年@date_jp($diary->date)</h3>
                    @endif
                </div>
            @endforeach
        </div>
        <hr>
        <a href="/">戻る</a>
    </body>
</html>