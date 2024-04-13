@extends('layouts.login')

@section('content')

  <div class="new-post">
    <h1>Follow List</h1>
    <div class="follow-icon">
      @foreach($follows as $follow)
      <a><img src="{{ asset('storage/'.$follow->images) }}" alt="アイコン"></a>
      @endforeach
    </div>
  </div>

  <div class="post-chart">
    <ul>
      @foreach($posts as $post)
      <li class="post-block">
        <table class="post-list">
          <tr>
            <td><img src="{{ asset('storage/'.$follow->images) }}" class="post-icon" alt="アイコン" ></td>
            <td class="post"><p class="post-name">{{ $post->user->username }}</p><br><p class="text">{{ $post->post }}</p></td>
            <td rowspan="2" class="post-time">{{ $post->created_at }}</td>
          </tr>
        </table>
      </li>
      @endforeach
    </ul>
  </div>
@endsection
