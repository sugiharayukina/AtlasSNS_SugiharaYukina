@extends('layouts.login')

@section('content')

<div class="new-post">
  <div class="search-form">
      {{ Form::open(['url' => '/search', 'method' => 'Get']) }}
        @csrf
        {{ Form::text('keyword', null, ['class' => 'search-text', 'placeholder' => 'ユーザー名']) }}
      <button type="submit" class="search-button"><img src="{{ asset('images/search.png') }}" alt="検索"></button>
      {{ Form::close() }}
    @if (!empty($keyword))
    <p class="search-key">検索ワード：{{ $keyword }}</p>
    @endif
  </div>
</div>

<div class="list-block">
  <table class="user-list">
    @foreach ($users as $user)
    <tr>
      <div class="usList-1">
        <td class="user-title"><img src="{{ asset('images/icon1.png') }}"  class="post-icon" alt="アイコン" ></td>
        <td class="user-title">{{ $user->username }}</td>
      </div>
      <div class="usList-2">
        @if (Auth::user()->isFollowing($user->id))
        <td><button type="button" href="/users/{{$user->id}}/unfollow" class="btn btn-danger">フォロー解除</button></td>
        @else
        <td><button type="button" href="/users/{{$user->id}}/follow" class="btn btn-primary">フォローする</button></td>
        @endif
      </div>
    </tr>
    @endforeach
  </table>
</div>
@endsection
