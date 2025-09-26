<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use App\Models\PhotoGalleryCategory;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photogalleries = PhotoGallery::orderBy('id', 'desc')->paginate(20);
        return view('admin.photogallery.index', compact('photogalleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PhotoGalleryCategory::all();
        return view('admin.photogallery.create', compact('categories'));
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

        $photogallery = new PhotoGallery();
        $photogallery->category_id = request('category_id');
        $photogallery->title = strip_tags(request('title'));
        $photogallery->slug = str_slug(request('title'));
        $photogallery->detail = request('detail');
        $photogallery->keywords = request('keywords');
        $photogallery->publish = request('publish');

        if (request()->hasFile('image')){
            $this->validate(request(),array( 'image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096' ));

            $image = request()->file('image');
            $filename = time().'-'.$photogallery->slug.'.'.$image->extension();
            if ($image->isValid()){
                $endfolder = 'uploads';
                $file_dir = $filename;
                $image->move($endfolder,$filename);
                $photogallery->image = $file_dir;
            }
        }

        $photogallery->save();

        if($photogallery){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return redirect()->route('photogallery.edit', ['id' => $photogallery->id]);
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
        $photogallery = PhotoGallery::find($id);
        $categories = PhotoGalleryCategory::all();
        return view('admin.photogallery.edit', compact('photogallery', 'categories'));
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

        $photogallery = PhotoGallery::find($id);
        $photogallery->category_id = request('category_id');
        $photogallery->title = strip_tags(request('title'));
        $photogallery->slug = str_slug(request('title'));
        $photogallery->detail = request('detail');
        $photogallery->keywords = request('keywords');
        $photogallery->publish = request('publish');

        if (request()->hasFile('image')){
            $this->validate(request(),array( 'image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096' ));

            $image = request()->file('image');
            $filename = time().'-'.$photogallery->slug.'.'.$image->extension();
            if ($image->isValid()){
                $endfolder = 'uploads';
                $file_dir = $filename;
                $image->move($endfolder,$filename);
                $photogallery->image = $file_dir;
            }
        }

        $photogallery->save();

        if($photogallery){
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
        $photogallery = PhotoGallery::destroy($id);
        if($photogallery){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }
}
