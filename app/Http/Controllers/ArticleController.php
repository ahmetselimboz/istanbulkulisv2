<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(20);
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status', 2)->get();
        return view('admin.article.create', compact('users'));
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
                'detail.required' => 'Makale detayı gereklidir.',
            ]
        );

        $article = new Article();
        $article->title = strip_tags(request('title'));
        $article->slug = str_slug(request('title'));
        $article->detail = request('detail');
        $article->publish = request('publish');
        $article->user_id = request('user_id');

        $article->save();

        if ($article) {
            alert('Başarılı', 'İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return redirect()->route('article.edit', ['id' => $article->id]);
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
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
        $article = Article::find($id);
        $users = User::where('status', 2)->get();
        return view('admin.article.edit', compact('article', 'users'));
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
                'detail.required' => 'Makale detayı gereklidir.',
            ]
        );

        $article = Article::find($id);
        $article->title = strip_tags(request('title'));
        $article->slug = str_slug(request('title'));
        $article->detail = request('detail');
        $article->publish = request('publish');
        $article->user_id = request('user_id');

        $article->save();

        if ($article) {
            alert('Başarılı', 'İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
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
        $article = Article::destroy($id);
        if ($article) {
            alert('Başarılı', 'İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    public function uploadMultipleEditorImages(Request $request)
    {
        if (!$request->hasFile('images')) {
            return response()->json([
                'success' => false,
                'message' => 'Herhangi bir dosya gönderilmedi.'
            ], 400);
        }

        $uploadedImageUrls = [];

        foreach ((array) $request->file('images') as $imageFile) {
            if (!$imageFile->isValid()) {
                continue;
            }

            $extension = $imageFile->extension();
            if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                continue;
            }

            try {
                $imageName = time() . '_' . uniqid('edtr_', true) . '.' . $extension;
                $imageFile->move(public_path('uploads/'), $imageName);
                $uploadedImageUrls[] = asset('uploads/' . $imageName);
            } catch (\Exception $e) {
                // tek tek hataları atla, kalanları yüklemeye devam et
                continue;
            }
        }

        if (empty($uploadedImageUrls)) {
            return response()->json([
                'success' => false,
                'message' => 'Yüklenebilir geçerli bir resim bulunamadı.'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Resimler başarıyla yüklendi.',
            'images' => $uploadedImageUrls,
        ]);
    }
}
