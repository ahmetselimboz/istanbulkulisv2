<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::orderBy('id', 'asc')->paginate(20);
        return view('admin.advert.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $advert = Advert::find($id);
        return view('admin.advert.edit', compact('advert'));
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

        $advert = Advert::find($id);
        $advert->code = request('code');
        $advert->publish = request('publish');

        $advert->save();

        if($advert){
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
        //
    }

    public function custom()
    {
        return view('admin.advert.custom');
    }

    public function customresult(Request $request)
    {



        $request->validate(
            [
                'advert_image' => 'required',
            ],
            [
                'advert_image.required' => 'Resim gereklidir.',
            ]
        );

        if (request('advert_url')){
            $advert_url = strip_tags(request('advert_url'));
        }else{
            $advert_url = '';
        }

        if (request('advert_width')){
            $advert_width = request('advert_width');
        }else{
            $advert_width = '';
        }

        if (request('advert_height')){
            $advert_height = request('advert_height');
        }else{
            $advert_height = '';
        }


        if (request()->hasFile('advert_image')){
            $this->validate(request(),array( 'advert_image' => 'image|mimes:png,jpg,jpeg,gif|max:9000' ));


            $image = request()->file('advert_image');
            $filename = time().'.'.$image->extension();
            if ($image->isValid()){
                $endfolder = 'uploads';
                $file_dir = $filename;
                $image->move($endfolder,$filename);
                $advert_image = $file_dir;
            }
        }


        $result = '<a href="'.$advert_url.'" target="_blank"><img src="/uploads/'.$advert_image.'" alt="Reklam" width="'.$advert_width.'" height="'.$advert_height.'"></a>';
        return view('admin.advert.customresult', compact('result'));


    }

}
