<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use App\Models\PhotoGalleryImage;
use Illuminate\Http\Request;

class PhotoGalleryImageController extends Controller
{
    public function poll($id)
    {
        $photogallery = PhotoGallery::find($id);
        $pgimages = PhotoGalleryImage::where('gallery_id', $id)->get();
        return view('admin.photogallery.imagepoll', compact('photogallery', 'pgimages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'images' => 'required',
                'images.*' => 'sometimes|mimes:jpeg,png,jpg,gif|max:4096'
            ],
            [
                'images.required' => 'Resim gereklidir.',
                'images.image' => 'Resim tipi gereklidir.',
            ]
        );

        $arrayimages = request('images');
        foreach ($arrayimages as $image) {
            $name = time().str_slug(substr($image->getClientOriginalName(), 0, -4)).'.'.$image->extension();
            $imagepath = 'uploads';
            $dbimage = $name;
            $image->move($imagepath, $name);
            $imagedata[] = $name;

            $imagefile =  new PhotoGalleryImage();
            $imagefile->gallery_id = $id;
            $imagefile->image = $dbimage;
            $imagefile->save();
        }
        return back();
    }

    public function description(Request $request, $id)
    {
        if (request()->has('description')){
            $image = PhotoGalleryImage::find($id);
            $image->description = request('description');
            $image->save();
        }
        return back();

    }


    public function destroy($id)
    {
        $image = PhotoGalleryImage::destroy($id);

        if($image){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }
}
