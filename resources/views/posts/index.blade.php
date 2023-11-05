@extends('layouts.login')

@section('content')

    <div class="new-post">
        <div class="post-item">
            <h3 class="new-post-icon"><img src="{{ asset('images/icon1.png') }}" alt="アイコン"></h3>
            {{ Form::open(['url' => '/posts', 'method' => 'Post']) }}
            @csrf
            {{ Form::textarea('post', null, ['class' => 'post-text', 'placeholder' => '投稿内容を入力してください。']) }}
            <button type="submit" class="post-button"><img src="{{ asset('images/post.png') }}" alt="送信"></button>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            {{ Form::close() }}
        </div>
    </div>

    <div class="post-chart">
        <ul>
          @foreach($posts as $post)
            <li class="post-block">
                <table class="post-list">
                  <tr>
                    <td><img src="{{ asset('images/icon1.png') }}"  class="post-icon" alt="アイコン" ></td>
                    <td class="post"><p class="post-name">{{ $post->user->username }}</p><br><p class="text">{{ $post->post }}</p></td>
                    <td rowspan="2" class="post-time">{{ $post->created_at }}</td>
                  </tr>
                </table>
                  <div class="content">
                    <!-- 投稿の編集ボタン -->
                    <a type="submit" class="js-modal-open" post="{{ $post->post }}" post_id="{{ Auth::user()->id }}"><img src="{{ asset('images/edit.png') }}" alt="編集"></a>
                    @csrf
                    @method('DELETE')
                    <a type="submit" class="post-delete" href="/destroy"><img src="{{ asset('images/trash.png') }}" alt="削除">
                    <img src="{{ asset('images/trash-h.png') }}" alt="削除"></a>
                  </div>
            </li>
          @endforeach

                <!-- モーダルの中身 -->
                <div class="modal js-modal">
                  <div class="modal__bg js-modal-close"></div>
                  <div class="modal__content">
                    {{ Form::open(['url' => '/update', 'method' => 'Post']) }}
                      <textarea name="updatePost" class="modal_post"></textarea>
                      <input type="hidden" name="id" class="modal_id" value="">
                      <input type="submit" class="js-modal-close" value="更新">
                      <!-- <input type="submit" value="" class="js-modal-close"><img src="{{ asset('images/edit.png') }}" alt="更新"> -->
                      <!-- {{ csrf_field() }} -->
                    {{ Form::close() }}
                  </div>
                </div>
        </ul>
    </div>
@endsection
