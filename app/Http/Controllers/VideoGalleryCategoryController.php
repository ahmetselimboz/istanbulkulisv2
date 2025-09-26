<?php

namespace App\Http\Controllers;

use App\Models\VideoGalleryCategory;
use Illuminate\Http\Request;

class VideoGalleryCategoryController extends Controller
{
    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $categories = VideoGalleryCategory::orderBy('id', 'desc')->paginate(20);
        return view('admin.videocategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = VideoGalleryCategory::where('parent_id', 0)->get();
        return view('admin.videocategory.create', compact('parent_category'));
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
                'name' => 'required',
            ],
            [
                'name.required' => 'Kategori adı gereklidir.',
            ]
        );

        $category = new VideoGalleryCategory();
        $category->name = strip_tags(request('name'));
        $category->slug = str_slug(request('name'));
        $category->description = request('description');
        $category->sortby = request('sortby');

        $category->save();

        if($category){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
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
        $category = VideoGalleryCategory::find($id);
        $categories = VideoGalleryCategory::all();
        return view('admin.videocategory.edit', compact('category', 'categories'));
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
                'name' => 'required',
            ],
            [
                'name.required' => 'Kategori adı gereklidir.',
            ]
        );

        $category = VideoGalleryCategory::find($id);
        $category->name = strip_tags(request('name'));
        $category->slug = str_slug(request('name'));
        $category->description = request('description');
        $category->sortby = request('sortby');

        $category->save();

        if($category){
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
        $category = VideoGalleryCategory::destroy($id);
        if($category){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }
}
