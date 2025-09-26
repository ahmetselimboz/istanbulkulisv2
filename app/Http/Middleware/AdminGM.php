<?php

namespace App\Http\Middleware;

use App\Models\Article;
use App\Models\Comment;
use App\Models\GeneralSetting;
use Closure;
use Illuminate\Support\Facades\View;


class AdminGM
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $general = GeneralSetting::find(1);
        $comment_count = Comment::where("publish", 1)->count();
        $article_count = Article::where("publish", 1)->count();

        $push_count = $comment_count + $article_count;

        View::share([
            'general' => $general,
            'push_count' => $push_count,
            'comment_count' => $comment_count,
            'article_count' => $article_count,
        ]);

        return $next($request);
    }
}







