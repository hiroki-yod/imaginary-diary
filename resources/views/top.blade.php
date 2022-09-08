<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>架空日記 | 第2回松本家展</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('caf0c3d50f55bd484ac0', {
                cluster: 'ap3'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                FadeInLinkClick();
            });
        </script>
    </head>
    <body id="top">
        <div class="title">
            <h1>松本家架空日記</h1>
        </div>
        <a href='/diaries'><div class="menu">
            <h1>一覧を見る</h1>
        </div></a>
        <a href='/diary/random'><div class="menu">
            <h1>日記を開く</h1>
        </div></a>
        <a href='/diary/create'><div class="menu">
            <h1>日記を書く</h1>
        </div></a>
        <button type="button" onclick="FadeInLinkClick()">暗転テスト</button>
        <button type="button" onclick="location.href='{{ route('register') }}'">ユーザー登録</button>
        <div id="fadeLayer" class="FadeInFrame"></div>
    </body>
    <script type="text/javascript">
        function FadeInLinkClick() {
            var frame = document.getElementById("fadeLayer");
            frame.className = "FadeInFrame fadein";
            frame.style.visibility = "visible";
            frame.addEventListener('transitionend', () => {
                FadeOut();
            })
        }
        function FadeOut() {
            var frame = document.getElementById("fadeLayer");
            frame.className = "FadeInFrame";
            frame.style.visibility = "hidden";
        }
    </script>
</html>
