<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="SNSトップページ" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}" class="logo"></a></h1>
            <div class="accordion-item">
                <div class="accordion">
                    @auth
                    <h3 class="accordion-title js-accordion-title">
                        {{ Auth::user()->username }}  さん
                    </h3>
                    @endauth
                    <ul class="accordion-content">
                        <li class="accordion-lists"><a href="/top">HOME</a></li>
                        <li class="accordion-lists"><a href="/profile">プロフィール編集</a></li>
                        <li class="accordion-lists"><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
                <h3 class="accordion-icon"><img src="{{ asset('images/icon1.png') }}"></h3>
            <div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                @auth
                <p>{{ Auth::user()->username }}さんの</p>
                @endauth
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="..../public/js/app.js"></script>
    <script src="..../public/js/app.js"></script>
</body>
</html>
