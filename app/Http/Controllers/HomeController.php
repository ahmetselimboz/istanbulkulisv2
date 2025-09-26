<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\GeneralSetting;
use App\Models\Language;
use App\Models\Message;
use App\Models\Modul;
use App\Models\Page;
use App\Models\PhotoGallery;
use App\Models\PhotoGalleryCategory;
use App\Models\PhotoGalleryImage;
use App\Models\Post;
use App\Models\Sortable;
use App\Models\SurveyAnswer;
use App\Models\User;
use App\Models\VideoGallery;
use App\Models\VideoGalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Newsletter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($_SERVER["REQUEST_URI"] == "/home") {
            return redirect()->route('frontend.index');
        }

        $slides = Post::where(['publish' => 0, 'location' => 1])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(22)->get();
        $minislides = Post::where(['publish' => 0, 'location' => 2])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(2)->get();
        $topslides = Post::where(['publish' => 0, 'location' => 3])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(5)->get();
        $adverthome = Advert::all();
        if (!empty($adverthome[1])) {
            $id2 = $adverthome[1];
        } else {
            $id2['code'] = "";
        }
        if (!empty($adverthome[2])) {
            $id3 = $adverthome[2];
        } else {
            $id3['code'] = "";
        }
        if (!empty($adverthome[3])) {
            $id4 = $adverthome[3];
        } else {
            $id4['code'] = "";
        }
        if (!empty($adverthome[25])) {
            $id26 = $adverthome[25];
        } else {
            $id26['code'] = "";
        }
        if (!empty($adverthome[26])) {
            $id27 = $adverthome[26];
        } else {
            $id27['code'] = "";
        }
        if (!empty($adverthome[27])) {
            $id28 = $adverthome[27];
        } else {
            $id28['code'] = "";
        }
        if (!empty($adverthome[28])) {
            $id29 = $adverthome[28];
        } else {
            $id29['code'] = "";
        }
        if (!empty($adverthome[29])) {
            $id30 = $adverthome[29];
        } else {
            $id30['code'] = "";
        }

 

        $single_box_ones = Post::where(['publish' => 0, 'location' => 0])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(4)->get();

        $ones = [];
        foreach ($single_box_ones as $one) {
            $ones[$one["id"]] = $one["id"];
        }
        $single_shadow_boxs = Post::where(['publish' => 0, 'location' => 0])->whereNotIn('id', $ones)->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(2)->get();

        $twos = [];
        foreach ($single_shadow_boxs as $two) {
            $twos[$two["id"]] = $two["id"];
        }
        $twos = array_merge($twos, $ones);
        $single_box_twos = Post::where(['publish' => 0, 'location' => 0])->whereNotIn('id', $twos)->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(6)->get();

        $general = GeneralSetting::find(1);
        foreach (explode(",", $general->pluck("home_box_list")->first()) as $key => $box) {
            if ($key == 0) {
                $thumbs_slider_sports = Post::where(['publish' => 0, 'category_id' => $box])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(5)->get();
            } else if ($key == 1) {
                $thumbs_slider_magazines = Post::where(['publish' => 0, 'category_id' => $box])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(5)->get();
            }
        }

        $threes = [];
        foreach ($single_box_twos as $three) {
            $threes[$three["id"]] = $three["id"];
        }
        $threes = array_merge($twos, $ones, $threes);
        $single_box_trees = Post::where(['publish' => 0, 'location' => 0])->whereNotIn('id', $threes)->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(4)->get();

        $fours = [];
        foreach ($single_box_trees as $four) {
            $fours[$four["id"]] = $four["id"];
        }
        $fours = array_merge($twos, $ones, $threes, $fours);
        $single_box_fours = Post::where(['publish' => 0, 'location' => 0])->whereNotIn('id', $fours)->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(6)->get();


        $fives = [];
        foreach ($single_box_fours as $five) {
            $fives[$five["id"]] = $five["id"];
        }
        $fives = array_merge($twos, $ones, $threes, $fours, $fives);
        $single_box_fives = Post::where(['publish' => 0, 'location' => 0])->whereNotIn('id', $fives)->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(6)->get();

        //dd($single_box_trees);

        return view('frontend.index', compact('slides', 'minislides', 'id2', 'id3', 'id4', 'id26', 'id27', 'id28', 'id29', 'id30', 'topslides', 'single_box_ones', 'single_shadow_boxs', 'single_box_twos', 'single_box_trees', 'single_box_fours', 'single_box_fives', 'thumbs_slider_sports', 'thumbs_slider_magazines'));
    }

    public function ampindex()
    {
        $slides = Post::where(['publish' => 0, 'location' => 1])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(11)->get();

        if (Storage::disk('public')->exists('exchange.json')) {
            $exchange = json_decode(Storage::get('public/exchange.json'), JSON_OBJECT_AS_ARRAY);
        } else {
            $exchange = NULL;
        }

        $single_box_ones = Post::where(['publish' => 0, 'location' => 0])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(14)->get();

        return view('frontend.ampindex', compact('slides', 'exchange', 'single_box_ones'));

    }

    public function category(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $othercategory = Category::where("parent_id", $id)->get();
        if (isset($category->name)) {
            $ctitle = $category->name;
        } else {
            $ctitle = 'Kategorisiz';
        }
        $slides = Post::where(['publish' => 0, 'location' => 1, 'category_id' => $id])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(22)->get();
        $singlenew = Post::where(['publish' => 0, 'location' => 2, 'category_id' => $id])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->first();
        $posts = Post::where(['publish' => 0, 'location' => 0, 'category_id' => $id])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->paginate(20);
        $adverthome = Advert::all();
        if (!empty($adverthome[10])) {
            $id11 = $adverthome[10];
        } else {
            $id11['code'] = "";
        }
        if (!empty($adverthome[24])) {
            $id25 = $adverthome[24];
        } else {
            $id25['code'] = "";
        }


        return view('frontend.category', compact('posts', 'ctitle', 'category', 'id11', 'id25', 'othercategory', 'slides', 'singlenew'));
    }

    public function categoryslug(Request $request, $slug)
    {

        if ($slug == "home") {
            return redirect()->route('frontend.index');
            exit();
        }
        $slug = strip_tags($slug);
        $category = Category::where('slug', $slug)->first();
        $id = $category->id;
        $othercategory = Category::where("parent_id", $id)->get();
        if (isset($category->name)) {
            $ctitle = $category->name;
        } else {
            $ctitle = 'Kategorisiz';
        }
        $slides = Post::where(['publish' => 0, 'location' => 1, 'category_id' => $id])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(22)->get();
        $singlenew = Post::where(['publish' => 0, 'location' => 2, 'category_id' => $id])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->first();
        $posts = Post::where(['publish' => 0, 'location' => 0, 'category_id' => $id])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->paginate(20);
        $adverthome = Advert::all();
        if (!empty($adverthome[10])) {
            $id11 = $adverthome[10];
        } else {
            $id11['code'] = "";
        }
        if (!empty($adverthome[24])) {
            $id25 = $adverthome[24];
        } else {
            $id25['code'] = "";
        }
        if (!empty($adverthome[23])) {
            $id24 = $adverthome[23];
        } else {
            $id24['code'] = "";
        }


        return view('frontend.category', compact('posts', 'ctitle', 'category', 'id11', 'id25', 'id24', 'othercategory', 'slides', 'singlenew'));
    }

    public function ampcategoryslug(Request $request, $slug)
    {
        $slug = strip_tags($slug);
        $category = Category::where('slug', $slug)->first();
        $id = $category->id;
        if (isset($category->name)) {
            $ctitle = $category->name;
        } else {
            $ctitle = 'Kategorisiz';
        }
        $slides = Post::where(['publish' => 0, 'location' => 1, 'category_id' => $id])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(22)->get();
        $posts = Post::where(['publish' => 0, 'location' => 0, 'category_id' => $id])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->paginate(20);

        return view('frontend.ampcategory', compact('posts', 'ctitle', 'category', 'slides'));
    }

    public function post(Request $request, $categoryslug, $slug, $id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where(['post_id' => $id, 'publish' => 0])->get();
        $adverthome = Advert::all();
        $otherpost = Post::where([['publish', '=', '0'], ['id', '!=', $post->id], ['category_id', '=', $post->category->id]])->limit(3)->get();
        $otherIds = [];
        foreach ($otherpost as $one) {
            $otherIds[$one["id"]] = $one["id"];
        }
        $latestnews = Post::where([['publish', '=', '0'], ['id', '!=', $id]])->whereNotIn('id', $otherIds)->orderBy('id', 'desc')->limit(5)->get();
        if (!empty($adverthome[6])) {
            $id7 = $adverthome[6];
        } else {
            $id7['code'] = "";
        }
        if (!empty($adverthome[7])) {
            $id8 = $adverthome[7];
        } else {
            $id8['code'] = "";
        }
        if (!empty($adverthome[8])) {
            $id9 = $adverthome[8];
        } else {
            $id9['code'] = "";
        }
        if (!empty($adverthome[9])) {
            $id10 = $adverthome[9];
        } else {
            $id10['code'] = "";
        }
        if (!empty($adverthome[31])) {
            $id32 = $adverthome[31];
        } else {
            $id32['code'] = "";
        }

        $post->addView();

        return view('frontend.post', compact('post', 'latestnews', 'comments', 'id7', 'id8', 'id9', 'id10', 'id32', 'otherpost'));
    }

    public function amppost(Request $request, $categoryslug, $slug, $id)
    {
        $post = Post::findOrFail($id);
        $otherpost = Post::where([['publish', '=', '0'], ['id', '!=', $post->id], ['category_id', '=', $post->category->id]])->limit(3)->get();
        $otherIds = [];
        foreach ($otherpost as $one) {
            $otherIds[$one["id"]] = $one["id"];
        }
        $latestnews = Post::where([['publish', '=', '0'], ['id', '!=', $id]])->whereNotIn('id', $otherIds)->limit(5)->get();

        return view('frontend.amppost', compact('post', 'otherpost', 'latestnews'));
    }

    public function commentsubmit(Request $request, $id)
    {
        $request->validate(
            [
                'comment' => 'required',
                'g-recaptcha-response' => 'required|captcha',
            ],
            [
                'comment.required' => 'Yorum alanı gereklidir.',
                'g-recaptcha-response.required' => 'Robot olmadığınızı kanıtlayın.',
                'g-recaptcha-response.captcha' => 'Robot alanını işaretleyiniz.'
            ]
        );

        $submit = new Comment();
        $submit->comment = request('comment');
        $submit->user_id = Auth::user()->id;
        $submit->post_id = $id;
        $submit->publish = 1;
        $submit->ip = \Request::ip();

        $submit->save();

        if ($submit) {
            alert('Başarılı', 'Yorumunuz yönetici onayına gönderilmiştir. Teşekkürler', 'success')->autoClose(2000);
            return back();
        } else {
            alert()->error('Başarısız', 'Bir hata meydana geldi.')->autoClose(4000);
            return back();
        }
    }

    public function videoall()
    {
        $videos = VideoGallery::where('publish', 0)->orderBy('id', 'desc')->paginate(20);
        $videocategories = VideoGalleryCategory::all();
        $adverthome = Advert::all();
        if (!empty($adverthome[11])) {
            $id12 = $adverthome[11];
        } else {
            $id12['code'] = "";
        }

        return view('frontend.videoall', compact('videos', 'videocategories', 'id12'));
    }

    public function videocategory(Request $request, $id)
    {
        $videos = VideoGallery::where(['category_id' => $id, 'publish' => 0])->orderBy('id', 'desc')->paginate(20);
        $videocategory = VideoGalleryCategory::findOrFail($id);
        $adverthome = Advert::all();
        if (!empty($adverthome[11])) {
            $id12 = $adverthome[11];
        } else {
            $id12['code'] = "";
        }

        return view('frontend.videocategory', compact('videos', 'videocategory', 'id12'));
    }

    public function video(Request $request, $id)
    {
        $video = VideoGallery::findOrFail($id);
        $othervideos = VideoGallery::where([['publish', '=', '0'], ['id', '!=', $video->id]])->get();
        $adverthome = Advert::all();
        if (!empty($adverthome[13])) {
            $id14 = $adverthome[13];
        } else {
            $id14['code'] = "";
        }
        if (!empty($adverthome[14])) {
            $id15 = $adverthome[14];
        } else {
            $id15['code'] = "";
        }
        if (!empty($adverthome[15])) {
            $id16 = $adverthome[15];
        } else {
            $id16['code'] = "";
        }
        if (!empty($adverthome[16])) {
            $id17 = $adverthome[16];
        } else {
            $id17['code'] = "";
        }

        $video->addView();
        return view('frontend.video', compact('video', 'othervideos', 'id14', 'id15', 'id16', 'id17'));
    }

    public function photogalleryall()
    {
        $photogalleries = PhotoGallery::where('publish', 0)->orderBy('id', 'desc')->paginate(20);
        $photocategories = PhotoGalleryCategory::all();
        $adverthome = Advert::all();
        if (!empty($adverthome[12])) {
            $id13 = $adverthome[12];
        } else {
            $id13['code'] = "";
        }

        return view('frontend.photogalleryall', compact('photogalleries', 'photocategories', 'id13'));
    }

    public function photogallerycategory(Request $request, $id)
    {
        $photogalleries = PhotoGallery::where(['category_id' => $id, 'publish' => 0])->orderBy('id', 'desc')->paginate(20);
        $photogallerycategory = PhotoGalleryCategory::findOrFail($id);
        $adverthome = Advert::all();
        if (!empty($adverthome[12])) {
            $id13 = $adverthome[12];
        } else {
            $id13['code'] = "";
        }

        return view('frontend.photogallerycategory', compact('photogalleries', 'photogallerycategory', 'id13'));
    }

    public function photogallery(Request $request, $id)
    {
        $photogallery = PhotoGallery::findOrFail($id);
        $othergalleries = PhotoGallery::where([['publish', '=', '0'], ['id', '!=', $photogallery->id]])->get();
        $images = PhotoGalleryImage::where('gallery_id', $id)->paginate(4);
        $adverthome = Advert::all();
        if (!empty($adverthome[17])) {
            $id18 = $adverthome[17];
        } else {
            $id18['code'] = "";
        }
        if (!empty($adverthome[18])) {
            $id19 = $adverthome[18];
        } else {
            $id19['code'] = "";
        }
        if (!empty($adverthome[19])) {
            $id20 = $adverthome[19];
        } else {
            $id20['code'] = "";
        }

        $photogallery->addView();
        return view('frontend.photogallery', compact('photogallery', 'othergalleries', 'images', 'id18', 'id19', 'id20'));
    }

    public function page(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        if ($page->pageTranslate($id) != NULL) {
            $page = $page->pageTranslate($id);
        }


        return view('frontend.page', compact('page'));
    }

    public function search(Request $request)
    {
        $request->validate(
            [
                'search' => 'required',
            ],
            [
                'search.required' => 'Arama kelimesi gereklidir.',
            ]
        );

        $searchtext = request('search');
        $searchresult = Post::where('title', 'LIKE', '%' . $searchtext . '%')
            ->where('created_at', '<=', date("Y-m-d H:i:s"))
            ->orwhere('detail', 'LIKE', '%' . $searchtext . '%')
            ->orWhere('keywords', 'LIKE', '%' . $searchtext . '%')
            ->orderBy('id', 'desc')
            ->get();
        /// publlih olanları listeli

        return view('frontend.search', compact('searchtext', 'searchresult'));
    }

    public function article(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $adverthome = Advert::all();
        if (!empty($adverthome[20])) {
            $id21 = $adverthome[20];
        } else {
            $id21['code'] = "";
        }
        if (!empty($adverthome[21])) {
            $id22 = $adverthome[21];
        } else {
            $id22['code'] = "";
        }

        $article->addView();
        return view('frontend.article', compact('article', 'id21', 'id22'));
    }

    public function author(Request $request, $id)
    {
        $author = User::findOrFail($id);
        $articles = Article::where(['publish' => 0, 'user_id' => $author->id])->paginate(10);
        return view('frontend.author', compact('author', 'articles'));
    }

    public function authorall()
    {
        $authorall = User::where('status', 2)->get();
        return view('frontend.authorall', compact('authorall'));
    }

    public function myprofile()
    {
        $profile = User::findOrFail(Auth::user()->id);
        $articles = Article::where(['user_id' => $profile->id])->orderBy('id', 'desc')->get();
        return view('frontend.profile', compact('profile', 'articles'));
    }

    public function articlesubmit(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'detail' => 'required',
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'detail.required' => 'İçerik gereklidir.',
            ]
        );

        $article = new Article();
        $article->title = strip_tags(request('title'));
        $article->slug = str_slug(request('title'));
        $article->detail = strip_tags(request('detail'));
        $article->publish = 1;
        $article->user_id = Auth::user()->id;

        $article->save();

        if ($article) {
            alert('Başarılı', 'Makaleniz onay için gönderilmiştir.', 'success')->autoClose(3000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(3000);
            return back();
        }
    }

    public function profileupdate(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if (!empty(request('password'))) {
            if (request('password') != request('password_confirmation')) {
                alert()->error('Başarısız', 'Şifreler eşleşmiyor')->autoClose(2000);
                return back();
            } else {
                $user->password = Hash::make(request('password'));
            }
        } else {
        }

        $user->about = strip_tags(request('about'));
        $user->fb = strip_tags(request('fb'));
        $user->tw = strip_tags(request('tw'));
        $user->gp = strip_tags(request('gp'));
        $user->in = strip_tags(request('in'));
        $user->yt = strip_tags(request('yt'));
        $user->linkedin = strip_tags(request('linkedin'));

        if (request()->hasFile('avatar')) {
            $this->validate(request(), array(
                'avatar' => 'image|mimes:png,jpg,jpeg,gif|max:4096'
            ));

            $image = request()->file('avatar');
            $filename = 'avatar' . '-' . time() . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = $filename;
                $image->move($endfolder, $filename);
                $user->avatar = $file_dir;
            }
        }

        $user->save();

        if ($user) {
            alert('Başarılı', 'İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(3000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(3000);
            return back();
        }
    }

    public function newsletter(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
            ],
            [
                'email.required' => 'E Posta adresi gereklidir.',
            ]
        );


        $saved = Newsletter::isSubscribed(request('email'));
        if ($saved) {
            alert()->error('Başarısız', 'Bu E Posta Hesabı Kayıtlı Görünüyor.')->autoClose(4000);
            return back();
        } else {
            Newsletter::subscribe(request('email'));
            alert('Başarılı', 'E Posta Hesabınız Kayıt Edilmiştir. Teşekkürler', 'success')->autoClose(2000);
            return back();
        }
    }


    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactsubmit(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'phone' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Konu gereklidir.',
                'phone.required' => 'Telefon gereklidir.',
                'content.required' => 'Mesaj gereklidir.',
            ]
        );


        $contact = new Message();
        $contact->title = strip_tags(request('title'));
        $contact->phone = strip_tags(request('phone'));
        $contact->content = strip_tags(request('content'));
        $contact->publish = 1;
        $contact->ip = \Request::ip();

        $contact->save();

        if ($contact) {
            alert('Başarılı', 'Mesajınız yöneticiye gönderilmiştir', 'success')->autoClose(3000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(3000);
            return back();
        }
    }





    public function surveyanswer(Request $request)
    {
        $request->validate(
            [
                'answer' => 'required'
            ],
            [
                'answer.required' => 'Bir seçenek seçilmeli'
            ]
        );

        $lastid = SurveyAnswer::where('ip', \Request::ip())->get();

        if ($lastid->count()) {
            alert()->error('Başarısız', 'Birden fazla oy veremezsiniz.')->autoClose(3000);
            return back();
        } else {
            $id = $request->answer;
            $answer = SurveyAnswer::findOrFail($id);
            $answer->vote = $answer->vote + 1;
            $answer->ip = \Request::ip();
            $answer->save();
            if ($answer) {
                alert('Başarılı', 'Oyunuz verildi', 'success')->autoClose(2000);
                return back();
            } else {
                alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(3000);
                return back();
            }
        }
    }


    public function astrology(Request $request, $slug)
    {
        $slug = str_slug($slug);
        $astrology = file_get_contents("https://twitburc.com.tr/gunluk-burc-yorumlari/$slug.html");
        preg_match_all('@<div class="thumbnail">(.*?)</div>@si', $astrology, $astro, PREG_SET_ORDER);
        preg_match_all('@<title>(.*?) - Astrolog Zeynep Turan - Twitburc.com</title>@si', $astrology, $astroname, PREG_SET_ORDER);

        $detail = str_replace('</strong>', '. ', $astro[0][1]);
        $astro = html_entity_decode(strip_tags($detail));
        $astroname = $astroname[0][1];

        return view('frontend.astrology', compact('astro', 'astroname'));
    }


    public function newspaperHaberler(Request $request, $slug)
    {
        $slug = str_slug($slug);
        $nresponse = get_headers("https://www.haberler.com/$slug-gazetesi/");
        if ($nresponse[0] == 'HTTP/1.1 200 OK') {
            $site = file_get_contents("https://www.haberler.com/$slug-gazetesi/");
            preg_match_all('@<div class="gazete-title">(.*?)<div>@si', $site, $title, PREG_SET_ORDER);
            preg_match_all('@<div class="gazeteMetin">(.*?)<div>@si', $site, $description, PREG_SET_ORDER);
            preg_match_all('@<div class="gazeteler-content">(.*?)<div class="gazete-links-div" style="margin-top: 50px; margin-bottom: 15px; overflow: hidden;">@si', $site, $images, PREG_SET_ORDER);

            $title = explode('<h1 class="gazete-h1">', $title[0][1]);
            $title = explode('</h1>', $title[1]);
            $title = html_entity_decode($title[0]);

            $description = explode('<p>', $description[0][1]);
            $description = explode('</p>', $description[1]);
            $description = html_entity_decode($description[0]);

            $image = explode('<img class="image-gazete" src="', $images[0][1]);
            $image = explode('" alt="', $image[1]);
            $image = html_entity_decode($image[0]);
        } else {
            $title = 'Bekleniyor';
            $description = 'Bekleniyor';
            $image = 'Bekleniyor';
        }
        return view('frontend.newspaper', compact('title', 'description', 'image'));
    }

    public function newspaper(Request $request, $slug)
    {
        $slug = str_slug($slug);
        $nresponse = get_headers("https://www.gazeteoku.com/gazeteler/$slug-gazetesi-manseti");
        if ($nresponse[0] == 'HTTP/1.1 200 OK') {
            $site = file_get_contents("https://www.gazeteoku.com/gazeteler/$slug-gazetesi-manseti");
            preg_match_all('@<meta property="og:image" content="(.*?)"/>@si', $site, $image, PREG_SET_ORDER);
            preg_match_all('@    <meta property="og:title" content="(.*?)"/>@si', $site, $title, PREG_SET_ORDER);
            $title = html_entity_decode($title[0][1]);
            $image = html_entity_decode($image[0][1]);
        } else {
            $title = 'Bekleniyor';
            $image = 'Bekleniyor';
        }
        return view('frontend.newspaper', compact('title', 'image'));
    }


    public function rss()
    {
        $posts = Post::where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(1000)->get();
        return view('frontend.rss', compact('posts'));
    }

    public function sitemap()
    {
        $posts = Post::where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(1000)->get();
        return view('frontend.sitemap', compact('posts'));
    }

    public function newsmap()
    {
        $posts = Post::where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(1000)->get();
        return view('frontend.newsmap', compact('posts'));
    }

    public function facebookrss()
    {
        $posts = Post::orderBy('id', 'desc')->take(50)->get();
        return view('frontend.facebook', compact('posts'));
    }

    public function maintenance()
    {
        return view('frontend.maintenance');
    }
    public function notfound()
    {
        return view('frontend.notfound');
    }

    public function mylogout()
    {
        auth::logout();
        return redirect('/');
    }


    public function sortable()
    {
        $category = Category::orderBy('sortby', 'asc')->get();
        return view('admin.sortable', compact('category'));
    }

    public function sortableStore()
    {
        $category = Category::orderBy('sortby', 'asc')->get();
        $itemID = Input::get('itemID');
        $itemIndex = Input::get('itemIndex');

        foreach ($category as $item) {
            return DB::table('category')->where('id', '=', $itemID)->update(array('sortby' => $itemIndex));
        }

    }

    public function advetClick(Request $request)
    {
        $id = $request->id;
        $advert = Advert::findOrFail($id);
        $advert->click = ($advert->click) + 1;

        $advert->save();
    }

    public function advetClickEmpty(Request $request, $id)
    {
        $advert = Advert::findOrFail($id);
        $advert->click = 0;
        $advert->save();

        if ($advert) {
            alert('Başarılı', 'İlgili Reklamın Tıklanma Sayısı Sıfırlandı', 'success')->autoClose(4000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(3000);
            return back();
        }

    }


    public function categoryJson(Request $request)
    {
        $slide = Post::where(['publish' => 0, 'location' => 1])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(10)->get();
        $slide_mini = Post::where(['publish' => 0, 'location' => 2])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(8)->get();
        $slide_top = Post::where(['publish' => 0, 'location' => 3])->where('created_at', '<=', date("Y-m-d H:i:s"))->orderBy('id', 'desc')->take(5)->get();
        Storage::disk('public')->put('slide.json', json_encode($slide));
        Storage::disk('public')->put('slide_mini.json', json_encode($slide_mini));
        Storage::disk('public')->put('slide_top.json', json_encode($slide_top));
        //dd(gettype($data));

        $bak = Storage::disk('public')->get('slide.json');
        $slides = json_decode($bak);
    }


    public function new_user(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'password' => 'required',
                'repassword' => 'required',
                'email' => 'required'
            ],
            [
                'name.required' => 'Konu gereklidir.',
                'password.required' => 'Şifre gereklidir.',
                'repassword.required' => 'Şifre Tekrarı gereklidir.',
                'email.required' => 'E posta gereklidir.'
            ]
        );

        if ($request->password != $request->repassword) {
            return response()->json(array(['error' => 'Şifreler aynı değil']));
        } else {
            $user = new User();
            $user->name = strip_tags(request('name'));
            $user->email = strip_tags(request('email'));
            $user->password = Hash::make(strip_tags(request('password')));
            $user->status = 0;
            $user->save();

            if ($user) {
                Auth::loginUsingId($user->id);
                return response()->json(array(['success' => 'Kayıt işlemi başarılı yönlendiriliyorsunuz.', 'new_user_id' => $user->id]));
            } else {
                return response()->json(array(['error_register' => 'İşlem sırasında bir hata meydana gelmiştir.']));
            }

        }
    }

    public function setLanguage(Request $request, $id)
    {
        $id = strip_tags($id);

        $request->session()->put('language', $id);
        $find = Language::where('id', $id)->first();
        $request->session()->put('locale_lang', $find->slug);

        return redirect()->route('frontend.index');
    }

    public function dilsorgula()
    {
        echo app()->getLocale();
        echo session()->get('locale_lang');
        echo session()->get('language');

        dd("dur");

    }









}
















