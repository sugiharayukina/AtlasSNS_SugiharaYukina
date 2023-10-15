@extends('layouts.login')

@section('content')
    <div class="new-post">
        <div class="post-item">
            <h3 class="new-post-icon"><img src="images/icon1.png"></h3>
            {{ Form::open(['url' => '/index']) }}
            {{Form::token()}}
            {{ Form::textarea('post', null, ['class' => 'post-text', 'placeholder' => '投稿内容を入力してください。']) }}
            <button type="submit" class="post-button"><img src="images/post.png" alt="送信"></button>
            {{ Form::close() }}
        </div>
    </div>

    <div class="post-chart">
        <ul class="posted">
          <li>
            <!-- {{ Form::open(['url' => '/']) }}
            {{ Form::close() }} -->
          </li>
        </ul>
    </div>
@endsection
