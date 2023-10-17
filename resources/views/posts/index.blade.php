@extends('layouts.login')

@section('content')
    <div class="new-post">
        <div class="post-item">
            <h3 class="new-post-icon"><img src="images/icon1.png"></h3>
            {{ Form::open(['url' => '/top']) }}
            <!-- {{Form::token()}} -->
            @csrf
            {{ Form::textarea('post', null, ['class' => 'post-text', 'placeholder' => '投稿内容を入力してください。']) }}
            <button type="submit" class="post-button"><img src="images/post.png" alt="送信"></button>
            {{ Form::close() }}
        </div>
    </div>

    <div class="post-chart">
        <ul class="posted">
          <li>
            <table>
                @foreach($posts as $post)
                <tr>
                  <td>{{ $post->user->user_id }}</td>
                  <td>{{ $post->user->username }}</td>
                  <td>{{ $post->post }}</td>
                  <td>{{ $post->created_at }}</td>
                </tr>
              <!-- <div class="content">
                <!-- 投稿の編集ボタン -->
                <!-- <a class="js-modal-open" href="/" post="{{ $post->post }}" post_id="{{ $value->id }}">編集</a> -->
                @endforeach
                <!-- モーダルの中身 -->
                <!-- <div class="modal js-modal">
                  <div class="modal__bg js-modal-close"></div>
                  <div class="modal__content">
                    <form action="" method="">
                      <textarea name="" class="modal_post"></textarea>
                      <input type="hidden" name="" class="modal_id" value="">
                      <input type="submit" value="更新">
                      {{ csrf_field() }}
                    </form>
                    <a class="js-modal-close" href="/top">閉じる</a>
                  </div> -->
                <!-- </div>
              </div> -->
            </table>
          </li>
        </ul>
    </div>
@endsection
