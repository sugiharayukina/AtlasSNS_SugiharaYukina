<!-- 自分でミドルウェア作ったけどできなかったページ -->

<?php

use Closure;
use Auth;

class LoginUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // ログインユーザーIDを取得
        $loginId = Auth::id();
        // アクセス可能ページのIDを取得
        $requestId = $request->user_id;
        // IDが一致しなければloginページにリダイレクト
        if ($loginId != $requestId) {
            return redirect(route('login'));
        }

    return $next($request);
    }
}
