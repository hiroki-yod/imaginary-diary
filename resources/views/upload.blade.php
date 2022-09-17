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
        <form action="/upload" method="POST" enctype="multipart/form-data">
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
                    <input type="input" name="diary[month]" value="{{ old('diary.month') }}">月
                    <input type="input" name="diary[day]" value="{{ old('diary.date') }}">日
                </h3>
            </div>
            <div class="diary-body">
                <input type="file" name="image">
            </div>
            <input type="submit" value="保存"/>
        </form>
        <hr>
        
        <a href="/">戻る</a>
    </body>
</html>