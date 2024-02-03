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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <div class="bar-list">
                <p>フォロー数</p>
                <p class="list-count">{{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                <p class="followList-btn"><a href="/follow-list">フォローリスト</a></p>
                <div class="bar-list">
                <p>フォロワー数</p>
                <p class="list-count">{{ Auth::user()->follower()->get()->count() }}名</p>
                </div>
                <p class="followerList-btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <button type="submit" class="s-btn"><a href="/search">ユーザー検索</a></button>
        </div>
    </div>
    <footer>
    </footer>
    <script src="..../public/js/app.js"></script>
    <script src="..../public/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
