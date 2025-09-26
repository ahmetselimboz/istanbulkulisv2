<?php

namespace App\Http\Controllers;

use App\Helpers\UserActivity;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ],
            [
                'email.unique' => 'Bu e posta hesabı kayıtlıdır.',
                'password.confirmed' => 'Şifreler eşleşmiyor.',
                'password.min' => 'Şifre minumum 6 karakter olmalıdır.',
            ]
        );

        $user = new User();
        $user->name = strip_tags(request('name'));
        $user->email = strip_tags(request('email'));
        $user->password = Hash::make(request('password'));
        $user->status = request('status');
        $user->about = request('about');
        $user->fb = request('fb');
        $user->tw = request('tw');
        $user->gp =request('gp');
        $user->in = request('in');
        $user->yt = request('yt');
        $user->linkedin = request('linkedin');

        if(!$user->facebook_id){$user->facebook_id=0;}



        if (request()->hasFile('avatar')){
            $this->validate(request(),array(
                'avatar' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'
            ));

            $image = request()->file('avatar');
            $filename = 'avatar'.'-'.time().'.'.$image->extension();
            if ($image->isValid()){
                $endfolder = 'uploads';
                $file_dir = $filename;
                $image->move($endfolder,$filename);
                $user->avatar = $file_dir;
            }
        }

        $user->save();

        if($user){
            UserActivity::addToLog('Kişi Ekledi');
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
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
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
        $user = User::find($id);
        $user->name = strip_tags(request('name'));
        $user->email = strip_tags(request('email'));

        if(!empty(request('password'))) {
            if(request('password') != request('password_confirmation')){
                alert()->error('Başarısız','Şifreler eşleşmiyor')->autoClose(2000);
                return back();
            }else{
                $user->password = Hash::make(request('password'));
            }
        }else{}

        $user->status = request('status');
        $user->about = request('about');
        $user->fb = request('fb');
        $user->tw = request('tw');
        $user->gp =request('gp');
        $user->in = request('in');
        $user->yt = request('yt');
        $user->linkedin = request('linkedin');


        if (request()->hasFile('avatar')){
            $this->validate(request(),array(
                'avatar' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'
            ));

            $image = request()->file('avatar');
            $filename = 'avatar'.'-'.time().'.'.$image->extension();
            if ($image->isValid()){
                $endfolder = 'uploads';
                $file_dir = $filename;
                $image->move($endfolder,$filename);
                $user->avatar = $file_dir;
            }
        }

        $user->save();

        if($user){
            UserActivity::addToLog('Kişi Güncelledi');
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
        $user = User::destroy($id);
        if($user){
            UserActivity::addToLog('Kişi Sildi');
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }

    }
}
