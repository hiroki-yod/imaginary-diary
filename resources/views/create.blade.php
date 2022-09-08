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

        <hr>
        <form action="/diary" method="POST">
            @csrf
            <div class="diary-title">
                <h2>タイトル</h2>
                <input type="text" name="diary[title]" placeholder="タイトル" value="{{ old('diary.title') }}"/>
                @error('diary.title')
                    <p class=error>タイトルは100字以内で必ず記入してください</p>
                @enderror
            </div>
            <div>
                <h2>日付</h2>
                <h3>
                    <input type="input" name="diary[year]" value="{{ old('diary.year') }}">年
                    <input type="date" name="diary[date]" min="2022-01-01" max="2022-12-31" value="{{ old('diary.date') }}">
                </h3>
            </div>
            <div class="diary-body">
                <h2>本文</h2>
                <textarea name="diary[body]" placeholder="本文">{{ old('diary.body') }}</textarea>
                @error('diary.body')
                    <p class=error>本文は1000字以内で必ず記入してください</p>
                @enderror
            </div>
            <input type="submit" value="保存"/>
        </form>
        <hr>
        
        <a href="/">戻る</a>
    </body>
</html>