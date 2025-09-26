<?php

namespace App\Http\Controllers;

use App\Models\VideoGallery;
use App\Models\VideoGalleryCategory;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videogalleries = VideoGallery::orderBy('id', 'desc')->paginate(20);
        return view('admin.videogallery.index', compact('videogalleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = VideoGalleryCategory::all();
        return view('admin.videogallery.create', compact('categories'));
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
            ],
            [
                'title.required' => 'Başlık gereklidir.',
            ]
        );

        $videogallery = new VideoGallery();
        $videogallery->category_id = request('category_id');
        $videogallery->title = strip_tags(request('title'));
        $videogallery->slug = str_slug(request('title'));
        $videogallery->detail = request('detail');
        $videogallery->embed = request('embed');
        $videogallery->keywords = request('keywords');
        $videogallery->publish = request('publish');

        if (request()->hasFile('image')){
            $this->validate(request(),array( 'image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096' ));

            $image = request()->file('image');
            $filename = time().'-'.$videogallery->slug.'.'.$image->extension();
            if ($image->isValid()){
                $endfolder = 'uploads';
                $file_dir = $filename;
                $image->move($endfolder,$filename);
                $videogallery->image = $file_dir;
            }
        }

        $videogallery->save();

        if($videogallery){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return redirect()->route('videogallery.edit', ['id' => $videogallery->id]);
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
        $videogallery = VideoGallery::find($id);
        $categories = VideoGalleryCategory::all();
        return view('admin.videogallery.edit', compact('videogallery', 'categories'));
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
            ],
            [
                'title.required' => 'Başlık gereklidir.',
            ]
        );

        $videogallery = VideoGallery::find($id);
        $videogallery->category_id = request('category_id');
        $videogallery->title = strip_tags(request('title'));
        $videogallery->slug = str_slug(request('title'));
        $videogallery->detail = request('detail');
        $videogallery->embed = request('embed');
        $videogallery->keywords = request('keywords');
        $videogallery->publish = request('publish');

        if (request()->hasFile('image')){
            $this->validate(request(),array( 'image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096' ));

            $image = request()->file('image');
            $filename = time().'-'.$videogallery->slug.'.'.$image->extension();
            if ($image->isValid()){
                $endfolder = 'uploads';
                $file_dir = $filename;
                $image->move($endfolder,$filename);
                $videogallery->image = $file_dir;
            }
        }

        $videogallery->save();

        if($videogallery){
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
        $videogallery = VideoGallery::destroy($id);
        if($videogallery){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }
}
