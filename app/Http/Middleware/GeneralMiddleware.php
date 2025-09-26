<?php

namespace App\Http\Middleware;

use App\Models\Advert;
use App\Models\Category;
use App\Models\Comment;
use App\Models\GeneralSetting;
use App\Models\Modul;
use App\Models\Page;
use App\Models\Post;
use App\Models\Survey;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;


class GeneralMiddleware
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
        $route = Route::currentRouteName();
        $pageAll = new Page();
        $pages = Page::orderBy('id', 'desc')->get();
        if (count($pageAll->pagesTranslate(1)) > 0) {
            $pages = $pageAll->pagesTranslate(1);
        }

        $general = GeneralSetting::find(1);
        $categories = Category::where(['parent_id' => 0])->orderBy('sortby', 'asc')->take(7)->get();
        $ampcategories = Category::where('parent_id', 0)->orderBy('sortby', 'asc')->get();

        $count = Category::count();
        $skip = $categories->count();
        $limit = $count - $skip; // the limit
        //$categories_other = Category::where('parent_id', 0)->orderBy('sortby', 'asc')->skip($skip)->take($limit)->limit(6)->get();

        $categories_other = Category::where(['parent_id' => 0, 'show' => 1])->orderBy('sortby', 'asc')->limit(6)->get();



        $lastcomments = Comment::where('publish', 0)->orderBy('id', 'desc')->take(5)->get();
        $modules = Modul::all();
        $bio = Post::where('category_id', $modules[18]["value"])->take(6)->get();
        $authors = User::where('status', 2)->limit(6)->get();
        $advertsidebar = Advert::all();
        if (!empty($advertsidebar[4])) {
            $id5 = $advertsidebar[4];
        } else {
            $id5['code'] = "";
        }
        if (!empty($advertsidebar[5])) {
            $id6 = $advertsidebar[5];
        } else {
            $id6['code'] = "";
        }
        if (!empty($advertsidebar[24])) {
            $id25 = $advertsidebar[24];
        } else {
            $id25['code'] = "";
        }
        if (!empty($advertsidebar[30])) {
            $id31 = $advertsidebar[30];
        } else {
            $id31['code'] = "";
        } // Popup Reklam
        if (!empty($advertsidebar[0])) {
            $id1 = $advertsidebar[0];
        } else {
            $id1['code'] = "";
        }
        if (!empty($advertsidebar[22])) {
            $id23 = $advertsidebar[0];
        } else {
            $id23['code'] = "";
        }


        $survey = Survey::orderBy('id', 'desc')->first();

        $footercategories = Post::where(['publish' => 0, 'category_id' => 28])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->get();

        // Exchange verilerini oku
        $exchange = null;
        $filePath = storage_path('app/public/exchange.json');
        if (file_exists($filePath)) {
            $exchangeData = file_get_contents($filePath);
            $exchange = json_decode($exchangeData, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $exchange = null;
            }
        }


        View::share([
            'route' => $route,
            'pages' => $pages,
            'general' => $general,
            'categories' => $categories,
            'ampcategories' => $ampcategories,
            'categories_other' => $categories_other,
            'authors' => $authors,
            'id5' => $id5,
            'id6' => $id6,
            'id25' => $id25,
            'modules' => $modules,
            'survey' => $survey,
            'id31' => $id31,
            'id1' => $id1,
            'id23' => $id23,
            'bio' => $bio,
            'footercategories' => $footercategories,
            'exchange' => $exchange,
        ]);

        return $next($request);
    }
}
