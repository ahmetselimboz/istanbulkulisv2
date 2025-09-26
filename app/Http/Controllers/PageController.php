<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('id', 'desc')->paginate(20);
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::where('publish', 0)->get();
        return view('admin.page.create', compact('pages'));
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
                'detail.required' => 'Sayfa detayı gereklidir.',
            ]
        );

        $page = new Page();
        $page->title = strip_tags(request('title'));
        $page->slug = str_slug(request('title'));
        $page->detail = request('detail');
        $page->publish = request('publish');
        $page->post_type = request('post_type');
        $page->parentpage = request('parentpage');

        if (request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image');
            $filename = time() . '-image-' . $page->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $image->move($endfolder, $filename);
                $page->image = $file_dir;
            }
        }

        if (request()->hasFile('pdf')) {
            $this->validate(request(), array('pdf' => 'file|mimes:pdf|max:4096'));
            $pdf = request()->file('pdf');
            $filename = time() ."-". $page->slug . '.' . $pdf->extension();
            if ($pdf->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $pdf->move($endfolder, $filename);
                $page->pdf = $file_dir;
            }
        }

        $page->save();

        if($page){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return redirect()->route('page.edit', ['id' => $page->id]);
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
        $page = Page::find($id);
        $pages = Page::where('publish', 0)->get();
        return view('admin.page.edit', compact('page', 'pages'));
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
                'detail.required' => 'Sayfa detayı gereklidir.',
            ]
        );

        $page = Page::find($id);
        $page->title = strip_tags(request('title'));
        $page->slug = str_slug(request('title'));
        $page->detail = request('detail');
        $page->publish = request('publish');
        $page->post_type = request('post_type');
        $page->parentpage = request('parentpage');

        if (request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image');
            $filename = time() . '-image-' . $page->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $image->move($endfolder, $filename);
                $page->image = $file_dir;
            }
        }

        if (request()->hasFile('pdf')) {
            $this->validate(request(), array('pdf' => 'file|mimes:pdf|max:4096'));
            $pdf = request()->file('pdf');
            $filename = time() ."-". $page->slug . '.' . $pdf->extension();
            if ($pdf->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/".$filename;
                $pdf->move($endfolder, $filename);
                $page->pdf = $file_dir;
            }
        }

        $page->save();

        if($page){
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
        $page = Page::destroy($id);
        if($page){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }
}
