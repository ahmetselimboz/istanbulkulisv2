<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Helpers\UserActivity;
use App\Models\PhotoGallery;
use App\Models\Post;
use App\Models\Source;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();
        $photogalleries = PhotoGallery::where('publish', 0)->orderBy('id', 'desc')->take(10)->get();
        $videogalleries = VideoGallery::where('publish', 0)->orderBy('id', 'desc')->take(10)->get();

        return view('admin.post.create', compact('categories', 'photogalleries', 'videogalleries','sources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'detail' => 'required',
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'detail.required' => 'Haber detayı gereklidir.',
            ]
        );

        $post = new Post();
        $post->category_id = request('category_id');
        $post->title = strip_tags(request('title'));

        if (!empty(request('slug'))) {
            $post->slug = str_slug(request('slug'));
        } else {
            $post->slug = str_slug(request('title'));
        }


        $post->short_detail = request('short_detail');
        $post->detail = request('detail');
        $post->keywords = request('keywords');
        $post->publish = request('publish');
        $post->location = request('location');
        $post->photogallery_id = request('photogallery_id');
        $post->videogallery_id = request('videogallery_id');
        $post->meta_keywords = request('meta_keywords');
        $post->meta_description = request('meta_description');
        $post->user_id = Auth::user()->id;
        $post->source_id = request('source_id');
        $post->mtitle = request('mtitle');

        $now = strtotime(date('Y-m-d H:i:s'));
        $newdate = strtotime(date('Y-m-d H:i:s', strtotime($request->date)));
        if($newdate>$now){
            $post->created_at = date('Y-m-d H:i:s', strtotime($request->date));
        }

        if(!empty(request('image-select'))){
            $post->image = strip_tags(request('image-select'));
        }else{
            if (request()->hasFile('image')) {
                $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096'));
                $image = request()->file('image');
                $filename = time() . '-' . $post->slug . '.' . $image->extension();
                if ($image->isValid()) {
                    $endfolder = 'uploads';
                    $file_dir = "/uploads/".$filename;
                    $image->move($endfolder, $filename);
                    $post->image = $file_dir;
                    $imagerepo1 = new \App\ImageRepo();
                    $imagerepo1->title = strip_tags(request('title'));
                    $imagerepo1->slug = $post->image;
                    $imagerepo1->save();
                }
            }
        }

        if (request()->hasFile('image_top')) {
            $this->validate(request(), array('image_top' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096'));
            $image = request()->file('image_top');
            $filename = time() . '-top-' . $post->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $image->move($endfolder, $filename);
                $post->image_top = $file_dir;
                $imagerepo2 = new \App\ImageRepo();
                $imagerepo2->title = strip_tags(request('title'));
                $imagerepo2->slug = $post->image_top;
                $imagerepo2->save();
            }
        }

        if (request()->hasFile('image_mini')) {
            $this->validate(request(), array('image_mini' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096'));
            $image = request()->file('image_mini');
            $filename = time() . '-mini-' . $post->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $image->move($endfolder, $filename);
                $post->image_mini = $file_dir;
                $imagerepo3 = new \App\ImageRepo();
                $imagerepo3->title = strip_tags(request('title'));
                $imagerepo3->slug = $post->image_mini;
                $imagerepo3->save();
            }
        }

        if (request()->hasFile('image_main')) {
            $this->validate(request(), array('image_main' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096'));
            $image = request()->file('image_main');
            $filename = time() . '-main-' . $post->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $image->move($endfolder, $filename);
                $post->image_main = $file_dir;
                $imagerepo3 = new \App\ImageRepo();
                $imagerepo3->title = strip_tags(request('title'));
                $imagerepo3->slug = $post->image_main;
                $imagerepo3->save();
            }
        }


        if(!empty(request('bot'))){
            $post->image = request('image');
            $post->bot = request('bot');
        }

        $post->save();

        /*
        if($request->pushbildirim=='on'){
            \OneSignal::sendNotificationToAll(
                $post->title,
                $url =  route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) ,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }
        */

        if($post){
            UserActivity::addToLog('Haber Ekledi');
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return redirect()->route('post.edit', ['id' => $post->id]);
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $sources = Source::all();
        $photogalleries = PhotoGallery::where('publish', 0)->orderBy('id', 'desc')->take(10)->get();
        $videogalleries = VideoGallery::where('publish', 0)->orderBy('id', 'desc')->take(10)->get();

        return view('admin.post.edit', compact('post', 'categories', 'photogalleries', 'videogalleries','sources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'detail' => 'required',
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'detail.required' => 'Haber detayı gereklidir.',
            ]
        );

        $post = Post::find($id);
        $post->category_id = request('category_id');
        $post->title = strip_tags(request('title'));

        if(!empty(request('slug'))) {
            $post->slug = str_slug(request('slug'));
        }else{
            $post->slug = str_slug(request('title'));
        }

        $post->short_detail = request('short_detail');
        $post->detail = request('detail');
        $post->keywords = request('keywords');
        $post->publish = request('publish');
        $post->location = request('location');
        $post->photogallery_id = request('photogallery_id');
        $post->videogallery_id = request('videogallery_id');
        $post->meta_keywords = request('meta_keywords');
        $post->meta_description = request('meta_description');
        $post->source_id = request('source_id');
        $post->mtitle = request('mtitle');

        if(!empty(request('image-select'))){
            $post->image = strip_tags(request('image-select'));
        }else{
            if (request()->hasFile('image')){
                $this->validate(request(),array( 'image' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096' ));

                $image = request()->file('image');
                $filename = time().'-'.$post->slug.'.'.$image->extension();
                if ($image->isValid()){
                    $endfolder = 'uploads';
                    $file_dir = "/uploads/".$filename;
                    $image->move($endfolder,$filename);
                    $post->image = $file_dir;
                    $imagerepo1 = new \App\ImageRepo();
                    $imagerepo1->title = strip_tags(request('title'));
                    $imagerepo1->slug = $post->image;
                    $imagerepo1->save();
                }
            }
        }

        if (request()->hasFile('image_top')) {
            $this->validate(request(), array('image_top' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096'));
            $image = request()->file('image_top');
            $filename = time() . '-top-' . $post->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $image->move($endfolder, $filename);
                $post->image_top = $file_dir;
                $imagerepo2 = new \App\ImageRepo();
                $imagerepo2->title = strip_tags(request('title'));
                $imagerepo2->slug = $post->image_top;
                $imagerepo2->save();
            }
        }

        if (request()->hasFile('image_mini')) {
            $this->validate(request(), array('image_mini' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096'));
            $image = request()->file('image_mini');
            $filename = time() . '-mini-' . $post->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $image->move($endfolder, $filename);
                $post->image_mini = $file_dir;
                $imagerepo3 = new \App\ImageRepo();
                $imagerepo3->title = strip_tags(request('title'));
                $imagerepo3->slug = $post->image_mini;
                $imagerepo2->save();
            }
        }

        if (request()->hasFile('image_main')) {
            $this->validate(request(), array('image_main' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096'));
            $image = request()->file('image_main');
            $filename = time() . '-main-' . $post->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $image->move($endfolder, $filename);
                $post->image_main = $file_dir;
                $imagerepo3 = new \App\ImageRepo();
                $imagerepo3->title = strip_tags(request('title'));
                $imagerepo3->slug = $post->image_main;
                $imagerepo3->save();
            }
        }

        $post->save();


        /*
        if($request->pushbildirim=='on'){
            \OneSignal::sendNotificationToAll(
                $post->title,
                $url =  route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]),
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }
        */

        if($post){
            UserActivity::addToLog('Haberi Düzenledi');
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::destroy($id);
        if($post){
            UserActivity::addToLog('Haberi Sildi');
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }
}
