<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VideoGalleryCategoryController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\PhotoGalleryCategoryController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\PhotoGalleryImageController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\CeremonyController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Auth::routes();
Route::prefix('manage')->middleware(['checkrole', 'checkactive', 'admingm'])->group(function () {

    Route::get('/', [GeneralSettingController::class, 'index'])->name('manage.index');
    Route::get('/generalsetting', [GeneralSettingController::class, 'generalsettingedit'])->name('generalsetting.edit');
    Route::post('/generalsetting', [GeneralSettingController::class, 'generalsettingupdate'])->name('generalsetting.update');
    Route::get('/logout', [GeneralSettingController::class, 'logout'])->name('logoutt');


    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');


    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


    Route::get('sortable', [GeneralSettingController::class, 'sortable'])->name('category.sortable');
    Route::post('sortable', [GeneralSettingController::class, 'sortableStore']);



    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/edit/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');


    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/create', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/article/edit/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/article/delete/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');


    Route::get('/page', [PageController::class, 'index'])->name('page.index');
    Route::get('/page/create', [PageController::class, 'create'])->name('page.create');
    Route::post('/page/create', [PageController::class, 'store'])->name('page.store');
    Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
    Route::post('/page/edit/{id}', [PageController::class, 'update'])->name('page.update');
    Route::get('/page/delete/{id}', [PageController::class, 'destroy'])->name('page.destroy');


    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/comment/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
    Route::post('/comment/edit/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::get('/comment/delete/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');


    Route::get('/videogallerycategory', [VideoGalleryCategoryController::class, 'index'])->name('videogallerycategory.index');
    Route::get('/videogallerycategory/create', [VideoGalleryCategoryController::class, 'create'])->name('videogallerycategory.create');
    Route::post('/videogallerycategory/create', [VideoGalleryCategoryController::class, 'store'])->name('videogallerycategory.store');
    Route::get('/videogallerycategory/edit/{id}', [VideoGalleryCategoryController::class, 'edit'])->name('videogallerycategory.edit');
    Route::post('/videogallerycategory/edit/{id}', [VideoGalleryCategoryController::class, 'update'])->name('videogallerycategory.update');
    Route::get('/videogallerycategory/delete/{id}', [VideoGalleryCategoryController::class, 'destroy'])->name('videogallerycategory.destroy');


    Route::get('/videogallery', [VideoGalleryController::class, 'index'])->name('videogallery.index');
    Route::get('/videogallery/create', [VideoGalleryController::class, 'create'])->name('videogallery.create');
    Route::post('/videogallery/create', [VideoGalleryController::class, 'store'])->name('videogallery.store');
    Route::get('/videogallery/edit/{id}', [VideoGalleryController::class, 'edit'])->name('videogallery.edit');
    Route::post('/videogallery/edit/{id}', [VideoGalleryController::class, 'update'])->name('videogallery.update');
    Route::get('/videogallery/delete/{id}', [VideoGalleryController::class, 'destroy'])->name('videogallery.destroy');


    Route::get('/photogallerycategory', [PhotoGalleryCategoryController::class, 'index'])->name('photogallerycategory.index');
    Route::get('/photogallerycategory/create', [PhotoGalleryCategoryController::class, 'create'])->name('photogallerycategory.create');
    Route::post('/photogallerycategory/create', [PhotoGalleryCategoryController::class, 'store'])->name('photogallerycategory.store');
    Route::get('/photogallerycategory/edit/{id}', [PhotoGalleryCategoryController::class, 'edit'])->name('photogallerycategory.edit');
    Route::post('/photogallerycategory/edit/{id}', [PhotoGalleryCategoryController::class, 'update'])->name('photogallerycategory.update');
    Route::get('/photogallerycategory/delete/{id}', [PhotoGalleryCategoryController::class, 'destroy'])->name('photogallerycategory.destroy');


    Route::get('/photogallery', [PhotoGalleryController::class, 'index'])->name('photogallery.index');
    Route::get('/photogallery/create', [PhotoGalleryController::class, 'create'])->name('photogallery.create');
    Route::post('/photogallery/create', [PhotoGalleryController::class, 'store'])->name('photogallery.store');
    Route::get('/photogallery/edit/{id}', [PhotoGalleryController::class, 'edit'])->name('photogallery.edit');
    Route::post('/photogallery/edit/{id}', [PhotoGalleryController::class, 'update'])->name('photogallery.update');
    Route::get('/photogallery/delete/{id}', [PhotoGalleryController::class, 'destroy'])->name('photogallery.destroy');


    Route::get('/photogalleryimage/{id}', [PhotoGalleryImageController::class, 'poll'])->name('photogalleryimage.poll');
    Route::post('/photogallery/image{id}', [PhotoGalleryImageController::class, 'update'])->name('photogalleryimage.update');
    Route::post('/imagedescription/{id}', [PhotoGalleryImageController::class, 'description'])->name('image.description');
    Route::get('/imagedelete/{id}', [PhotoGalleryImageController::class, 'destroy'])->name('image.delete');


    Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');
    Route::get('/survey/create', [SurveyController::class, 'create'])->name('survey.create');
    Route::post('/survey/create', [SurveyController::class, 'store'])->name('survey.store');
    Route::get('/survey/edit/{id}', [SurveyController::class, 'edit'])->name('survey.edit');
    Route::post('/survey/edit/{id}', [SurveyController::class, 'update'])->name('survey.update');
    Route::get('/survey/delete/{id}', [SurveyController::class, 'destroy'])->name('survey.destroy');


    //  Route::get('/surveyanswer/{id}', 'SurveyController@surveyanswerindex')->name('surveyanswer.index');
    Route::post('/surveyanswer/{id}', [SurveyController::class, 'surveyanswercreate'])->name('surveyanswer.create');
    Route::get('/surveyansweredit/{id}', [SurveyController::class, 'surveyansweredit'])->name('surveyanswer.edit');
    Route::post('/surveyansweredit/{id}', [SurveyController::class, 'surveyanswerupdate'])->name('surveyanswer.update');
    Route::get('/surveyanswerdelete/{id}', [SurveyController::class, 'surveyanswerdestroy'])->name('surveyanswer.destroy');


    Route::get('/advert', [AdvertController::class, 'index'])->name('advert.index');
    Route::get('/advert/edit/{id}', [AdvertController::class, 'edit'])->name('advert.edit');
    Route::post('/advert/edit/{id}', [AdvertController::class, 'update'])->name('advert.update');
    Route::get('/advert/custom', [AdvertController::class, 'custom'])->name('advert.custom');
    Route::post('/advert/custom', [AdvertController::class, 'customresult'])->name('advert.post.customresult');
    Route::get('/advert/customresult', [AdvertController::class, 'customresult'])->name('advert.customresult');

    Route::get('/modul', [ModulController::class, 'index'])->name('modul.index');
    Route::post('/modulupdate/{id}', [ModulController::class, 'update'])->name('modul.update');

    Route::get('/message', [GeneralSettingController::class, 'messageindex'])->name('message.index');
    Route::get('/message/{id}', [GeneralSettingController::class, 'messageedit'])->name('message.edit');

    Route::get('/themeoptions', [GeneralSettingController::class, 'themeoptions'])->name('themeoptions');
    Route::post('/themeoptions/{id}', [GeneralSettingController::class, 'themeoptionsupdate'])->name('themeoptionsupdate');


    Route::get('/bot/{slug}', [BotController::class, 'startBot'])->name('bot');
    Route::get('/sidebar-sortable/', [GeneralSettingController::class, 'sidebarsortable'])->name('sidebar.sortable');
    Route::post('/sidebar-sortable', [GeneralSettingController::class, 'sidebarSortableStore']);
    Route::get('/prayer', [GeneralSettingController::class, 'prayer']);

    Route::get('/ceremony', [CeremonyController::class, 'index'])->name('ceremony.index');
    Route::get('/ceremony/create', [CeremonyController::class, 'create'])->name('ceremony.create');
    Route::post('/ceremony/create', [CeremonyController::class, 'store'])->name('ceremony.store');
    Route::get('/ceremony/edit/{id}', [CeremonyController::class, 'edit'])->name('ceremony.edit');
    Route::post('/ceremony/edit/{id}', [CeremonyController::class, 'update'])->name('ceremony.update');
    Route::get('/ceremony/delete/{id}', [CeremonyController::class, 'destroy'])->name('ceremony.destroy');

    Route::get('/themeoptions', [GeneralSettingController::class, 'themeoptions'])->name('themeoptions');
    Route::post('/themeoptions/{id}', [GeneralSettingController::class, 'themeoptionsupdate'])->name('themeoptionsupdate');

    Route::get('/language', [GeneralSettingController::class, 'languageIndex'])->name('language.index');
    Route::get('/language/create', [GeneralSettingController::class, 'languageCreate'])->name('language.create');
    Route::post('/language/create', [GeneralSettingController::class, 'languageStore'])->name('language.store');
    Route::get('/language/edit/{id}', [GeneralSettingController::class, 'languageEdit'])->name('language.edit');
    Route::post('/language/edit/{id}', [GeneralSettingController::class, 'languageUpdate'])->name('language.update');
    Route::get('/language/delete/{id}', [GeneralSettingController::class, 'languageDestroy'])->name('language.destroy');

    Route::get('/translate/{postId}/{postType}', [GeneralSettingController::class, 'translate'])->name('admin.translate');
    Route::post('/translate/{postId}/{postType}', [GeneralSettingController::class, 'translateUpdate'])->name('admin.translateupdate');

    Route::get('/staticword/{langId}', [GeneralSettingController::class, 'staticword'])->name('language.staticword');



    Route::get('/cache-clear', [GeneralSettingController::class, 'optimize'])->name('clear-cache');
    Route::get('/runjson/', [GeneralSettingController::class, 'runjson'])->name('runjson');
});





Route::prefix('manage')->middleware(['checkroleeditor'])->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/edit/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/editorlogout', [GeneralSettingController::class, 'logout'])->name('editor.logout');

    Route::get('/source', [SourceController::class, 'index'])->name('source.index');
    Route::get('/source/create', [SourceController::class, 'create'])->name('source.create');
    Route::post('/source/create', [SourceController::class, 'store'])->name('source.store');
    Route::get('/source/edit/{id}', [SourceController::class, 'edit'])->name('source.edit');
    Route::post('/source/edit/{id}', [SourceController::class, 'update'])->name('source.update');
    Route::get('/source/delete/{id}', [SourceController::class, 'destroy'])->name('source.destroy');

    Route::post('/imagerepo', [GeneralSettingController::class, 'imagerepo'])->name('imagerepo');
    Route::post('/fmsearch', [GeneralSettingController::class, 'fmsearch'])->name('fmsearch');
    Route::get('/searchfmkeyword', [GeneralSettingController::class, 'searchfmkeyword'])->name('searchfmkeyword');


});




//// Front End Route
Route::get('/maintenance', function () {
    return view('frontend.maintenance');
})->name('frontend.maintenance');

Route::get('/categoryjson', [HomeController::class, 'categoryJson']);


Route::middleware(['maintenance', 'generalmiddleware', 'checkdomain', 'setlocale'])->group(function () {



    Route::get('/', [HomeController::class, 'index'])->name('frontend.index');
    Route::post('/yorumgonder/{id}', [HomeController::class, 'commentsubmit'])->name('comment.submit');
    Route::get('/kategori/{id}/{slug}', [HomeController::class, 'category'])->name('frontend.category');
    Route::get('/video-galeriler', [HomeController::class, 'videoall'])->name('frontend.videoall');
    Route::get('/video-kategori/{id}/{slug}', [HomeController::class, 'videocategory'])->name('frontend.videocategory');
    Route::get('/video/{id}/{slug}', [HomeController::class, 'video'])->name('frontend.video');
    Route::get('/foto-galeriler', [HomeController::class, 'photogalleryall'])->name('frontend.photogalleryall');
    Route::get('/foto-galeri-kategori/{id}/{slug}', [HomeController::class, 'photogallerycategory'])->name('frontend.photogallerycategory');
    Route::get('/foto-galeri/{id}/{slug}', [HomeController::class, 'photogallery'])->name('frontend.photogallery');
    Route::get('/sayfa/{id}/{slug}', [HomeController::class, 'page'])->name('frontend.page');
    Route::post('/arama', [HomeController::class, 'search'])->name('frontend.search');
    Route::get('/makale/{id}/{slug}', [HomeController::class, 'article'])->name('frontend.article');
    Route::get('/kose-yazari/{id}', [HomeController::class, 'author'])->name('frontend.author');
    Route::get('/kose-yazarlari', [HomeController::class, 'authorall'])->name('frontend.authorall');
    Route::get('/profilim', [HomeController::class, 'myprofile'])->name('myprofile');
    Route::post('/makalegonder', [HomeController::class, 'articlesubmit'])->name('article.submit');
    Route::post('/profilguncelle', [HomeController::class, 'profileupdate'])->name('profile.update');
    Route::post('/newsletter', [HomeController::class, 'newsletter'])->name('newsletter.save');
    Route::get('/postamp/{id}/{slug}', [HomeController::class, 'postamp'])->name('frontend.postamp');
    Route::get('/rss', [HomeController::class, 'rss'])->name('frontend.rss');
    Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('frontend.sitemap');
    Route::get('/newsmap.xml', [HomeController::class, 'newsmap'])->name('frontend.newsmap');
    Route::get('/iletisim', [HomeController::class, 'contact'])->name('frontend.contact');
    Route::post('/iletisim', [HomeController::class, 'contactsubmit'])->name('frontend.contactsubmit');
    Route::post('/anket', [HomeController::class, 'surveyanswer'])->name('frontend.surveyanswer');
    Route::get('/burclar/{slug}', [HomeController::class, 'astrology'])->name('frontend.astrology');
    Route::get('/gazete-oku/{slug}', [HomeController::class, 'newspaper'])->name('frontend.newspaper');
    Route::get('/facebook', [HomeController::class, 'facebookrss'])->name('frontend.facebookrss');

    Route::get('login/facebook', [LoginController::class, 'redirectToFacebook']);
    Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
    Route::get('login/google', [LoginController::class, 'redirectToGoogle']);
    Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

    Route::post('/click', [HomeController::class, 'advetClick'])->name("click");
    Route::post('/click-empty/{id}', [HomeController::class, 'advetClickEmpty'])->name("click.empty");
    Route::post('/new-user', [HomeController::class, 'new_user'])->name('frontend.new_user');
    Route::get('/language/{id}', [HomeController::class, 'languageSet'])->name('frontend.language');
    Route::get('/l/{language}', [HomeController::class, 'setLanguage'])->name('setLanguage');
    Route::get('/dilsorgula', [HomeController::class, 'dilsorgula'])->name('dilsorgula');

    Route::get('/ampindex', [HomeController::class, 'ampindex'])->name('frontend.ampindex');
    Route::get('/amp/{categoryslug}/{slug}/{id}', [HomeController::class, 'amppost'])->name('frontend.amppost');
    Route::get('/ampcategory/{slug}', [HomeController::class, 'ampcategoryslug'])->name('frontend.ampcategoryslug');

    Route::get('/{slug}', [HomeController::class, 'categoryslug'])->name('frontend.categoryslug');
    Route::get('/{categoryslug}/{slug}/{id}', [HomeController::class, 'post'])->name('frontend.post');





    Route::get('/mylogout', [HomeController::class, 'mylogout'])->name('mylogout');
    // Route::any('{any}', 'HomeController@notfound')->name('frontend.notfound');
    Route::fallback(function () {
        return view('frontend.notfound');
    });
});
//// Front End Route































Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
