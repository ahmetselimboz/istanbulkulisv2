<?php

namespace App\Http\Controllers;

use App\Models\Ceremony;
use Illuminate\Http\Request;

class CeremonyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ceremonies = Ceremony::orderBy('id', 'desc')->paginate(20);
        return view('admin.ceremony.index', compact('ceremonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ceremony.create');
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
                'name.required' => 'İsim gereklidir.',
            ]
        );

        $ceremony = new Ceremony();
        $ceremony->name = strip_tags(request('name'));
        $ceremony->birthday = date("Y-m-d H:i:s", strtotime(request('birthday')));
        $ceremony->deathday = date("Y-m-d H:i:s", strtotime(request('deathday')));
        $ceremony->burail = request('burail');
        $ceremony->burailday = date("Y-m-d H:i:s", strtotime(request('burailday')));
        $ceremony->detail = request('detail');

        if (request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'image|mimes:png,jpg,jpeg,gif|max:4096'));

            $image = request()->file('image');
            $filename = time() . '-taziye-' . $ceremony->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "uploads/".$filename;
                $image->move($endfolder, $filename);
                $ceremony->image = $file_dir;
            }
        }

        $ceremony->save();

        if($ceremony){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return redirect()->route('ceremony.edit', ['id' => $ceremony->id]);
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
        $ceremony = Ceremony::find($id);
        return view('admin.ceremony.edit', compact('ceremony'));
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
                'name.required' => 'Başlık gereklidir.',
            ]
        );

        $ceremony = Ceremony::find($id);
        $ceremony->name = strip_tags(request('name'));
        $ceremony->birthday = date("Y-m-d H:i:s", strtotime(request('birthday')));
        $ceremony->deathday = date("Y-m-d H:i:s", strtotime(request('deathday')));
        $ceremony->burail = request('burail');
        $ceremony->burailday = date("Y-m-d H:i:s", strtotime(request('burailday')));
        $ceremony->detail = request('detail');

        if (request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'image|mimes:png,jpg,jpeg,gif|max:4096'));

            $image = request()->file('image');
            $filename = time() . '-taziye-' . $ceremony->slug . '.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "uploads/".$filename;
                $image->move($endfolder, $filename);
                $ceremony->image = $file_dir;
            }
        }

        $ceremony->save();

        if($ceremony){
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
        $ceremony = Ceremony::destroy($id);
        if($ceremony){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }
}
