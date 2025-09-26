<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use App\Models\Category;
use App\Models\Comment;
use App\Models\GeneralSetting;
use App\Models\Language;
use App\Mail\LicenseError;
use App\Models\Message;
use App\Models\Modul;
use App\Models\Page;
use App\Models\PhotoGallery;
use App\Models\Post;
use App\Models\Sortable;
use App\Models\Translate;
use App\Models\User;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class GeneralSettingController extends Controller
{




    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->take(5)->get();
        $comments = Comment::orderBy('id', 'desc')->take(5)->get();
        $users = User::where("active", 1)->orderBy('id', 'desc')->take(5)->get();
        $postcount = count(Post::all());
        $commentcount = count(Comment::all());
        $videocount = count(VideoGallery::all());
        $photocount = count(PhotoGallery::all());
        $activities = UserActivity::orderBy('id', 'desc')->take(10)->get();

        return view('admin.index', compact('posts', 'comments', 'users', 'postcount', 'commentcount', 'videocount', 'photocount', 'activities'));
    }


    public function generalsettingedit()
    {
        $general = GeneralSetting::find(1);
        $categories = Category::orderBy('sortby', 'asc')->get();
        return view('admin.generalsetting', compact('general', 'categories'));
    }

    public function generalsettingupdate(Request $request)
    {
        $implode = array();
        foreach ($request->categorybox as $categorybox) {
            $implode[] = $categorybox;
        }
        $put = implode(',', $implode);
        $request->validate(
            [
                'site_title' => 'required',
                'site_logo' => 'mimes:png,jpg,jpeg,gif',
            ],
            [
                'title.required' => 'Site başlığı gereklidir.',
                'site_logo.mimes' => 'Yüklenen resim doğru türde değil.',
            ]
        );

        $general = GeneralSetting::find(1);
        $general->site_title = strip_tags(request('site_title'));
        $general->site_keywords = strip_tags(request('site_keywords'));
        $general->site_description = strip_tags(request('site_description'));
        $general->site_newsname = strip_tags(request('site_newsname'));
        $general->site_email = strip_tags(request('site_email'));
        $general->site_phone = strip_tags(request('site_phone'));
        $general->site_address = strip_tags(request('site_address'));
        $general->site_copyright = strip_tags(request('site_copyright'));
        $general->site_url = strip_tags(request('site_url'));
        $general->site_facebookapp_id = strip_tags(request('site_facebookapp_id'));
        $general->site_googleplus_id = strip_tags(request('site_googleplus_id'));
        $general->site_facebook_url = strip_tags(request('site_facebook_url'));
        $general->site_twitter_url = strip_tags(request('site_twitter_url'));
        $general->site_instagram_url = strip_tags(request('site_instagram_url'));
        $general->site_youtube_url = strip_tags(request('site_youtube_url'));
        $general->site_cookie_text = strip_tags(request('site_cookie_text'));
        $general->site_cookie_url = strip_tags(request('site_cookie_url'));
        $general->site_meta_tag = request('site_meta_tag');
        $general->site_analytics = request('site_analytics');
        $general->site_publish = request('site_publish');
        $general->site_refresh = request('site_refresh');
        $general->author_name = request('author_name');
        $general->author_surname = request('author_surname');
        $general->author_title = request('author_title');
        $general->author_link = request('author_link');
        $general->home_box_list = $put;


        if (request()->hasFile('site_logo')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));

            $image = request()->file('site_logo');
            $filename = 'logo.' . $image->extension();
            if ($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = $filename;
                $image->move($endfolder, $filename);
                $general->site_logo = $file_dir;
            }
        }

        if (request()->hasFile('site_menu_logo')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));

            $site_menu_logo = request()->file('site_menu_logo');
            $filename = 'logo-menu.' . $site_menu_logo->extension();
            if ($site_menu_logo->isValid()) {
                $endfolder = 'uploads';
                $file_dir = $filename;
                $site_menu_logo->move($endfolder, $filename);
                $general->site_menu_logo = $file_dir;
            }
        }

        if (request()->hasFile('author_image')) {

            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));

            $author_image_logo = request()->file('author_image');

            $filename = '$author_image_logo.' . $author_image_logo->extension();

            if ($author_image_logo->isValid()) {
                $endfolder = 'uploads';
                $file_dir = $filename;
                $author_image_logo->move($endfolder, $filename);
                $general->author_image = $file_dir;
            }
        }

        $general->save();

        if ($general) {
            alert('Başarılı', 'İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    public function themeoptions()
    {
        $themeoptions = DB::table("themeoptions")->find(1);
        $sidebar = Sortable::where("slug", "sidebar")->orderBy("sortby", "asc")->get();

        return view('admin.themeoptions', compact('themeoptions', "sidebar"));
    }

    public function themeoptionsupdate(Request $request, $id)
    {
        unset($request['_token']);
        $themeoptions = DB::table('themeoptions')->where('id', 1)->update($request->all());

        if ($themeoptions) {
            alert('Başarılı', 'İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    public function sidebarsortable()
    {
        $sidebar = Sortable::where("slug", "sidebar")->orderBy("sortby", "asc")->get();
        $main = Sortable::where("slug", "main")->orderBy("sortby", "asc")->get();

        return view('admin.sidebarsortable', compact('sidebar', 'main'));
    }

    public function sidebarSortableStore()
    {
        $sidebar = Sortable::orderBy('sortby', 'asc')->get();
        $itemID = Input::get('itemID');
        $itemIndex = Input::get('itemIndex');

        foreach ($sidebar as $item) {
            return DB::table('sortable')->where('id', '=', $itemID)->update(array('sortby' => $itemIndex));
        }
    }

    public function messageindex()
    {
        $messages = Message::orderBy('id', 'desc')->paginate(20);
        return view('admin.message', compact('messages'));
    }

    public function messageedit(Request $request, $id)
    {
        $message = Message::find($id);
        $message->publish = 0;
        $message->save();
        return back();
    }

    public function sortable()
    {
        $category = Category::orderBy('sortby', 'asc')->get();
        return view('admin.sortable', compact('category'));
    }

    public function sortableStore()
    {
        $category = Category::orderBy('sortby', 'asc')->get();
        $itemID = Input::get('itemID');
        $itemIndex = Input::get('itemIndex');

        foreach ($category as $item) {
            return DB::table('category')->where('id', '=', $itemID)->update(array('sortby' => $itemIndex));
        }

    }


    public function scoretable()
    {
        $puandurumu = file_get_contents("https://www.haberler.com/spor/");
        preg_match_all('@<div class="hbssSlider active SL">(.*?)</div>@si', $puandurumu, $puantablo);

        $remove = explode('<div class="hbssAllMoreScope">', $puantablo[1][0]);

        Storage::disk('public')->put('scoretable.html', $remove[0]);
    }

    public function sidebarJson()
    {

        $datamain = Sortable::where("slug", "main")->orderBy("sortby", "asc")->get();
        $datasidebar = Sortable::where("slug", "sidebar")->orderBy("sortby", "asc")->get();

        $listmain = array();
        foreach ($datamain as $main) {
            $listmain[$main->sortby] = $main->title;
        }
        $sidebar = array();
        foreach ($datasidebar as $item) {
            $sidebar[$item->sortby] = $item->title;
        }

        Storage::disk('public')->put('main.json', json_encode($listmain));
        Storage::disk('public')->put('sidebar.json', json_encode($sidebar));
    }

    public function covid19()
    {
        $covid19 = file_get_contents("https://covid19.saglik.gov.tr/");
        preg_match_all('@var sondurumjson = (.*?);//]]>@si', $covid19, $covid);
        $data = str_replace(["[", "]"], "", $covid[1][0]);

        $mahkum = array("tarih", "gunluk_test", "gunluk_vaka", "gunluk_hasta", "gunluk_vefat", "gunluk_iyilesen");
        $infaz = array("Tarih", "Günlük Test", "Günlük Vaka", "Günlük Hasta", "Günlük Vefat", "Günlük İyileşen");

        $result = str_replace($mahkum, $infaz, $data);

        Storage::disk('public')->put('covid.json', $result);
    }

    public function weather()
    {
        $wcity = Modul::where('id', 11)->first()->value;
        $connectAir = get_headers("https://www.hurriyet.com.tr/hava-durumu/$wcity/");

        if ($connectAir[0] == 'HTTP/1.1 200 OK') {
            $weathers = file_get_contents("https://www.hurriyet.com.tr/hava-durumu/$wcity/");
            preg_match_all('@<p class="weather-detail-hightemp">(.*?)<sup class="degree">@si', $weathers, $degree, PREG_SET_ORDER);
            preg_match_all('@<p class="weather-detail-condition-text">(.*?)</p>@si', $weathers, $degree_text, PREG_SET_ORDER);

            $wdegree = html_entity_decode($degree[0][1]);
            $degree_text = html_entity_decode($degree_text[0][1]);
        } else {
            $wdegree = 'Bekliyor';
            $degree_text = 'Bekliyor';
        }

        $result = array(
            'wcity' => ucwords($wcity),
            'wdegree' => $wdegree,
            'degree_text' => $degree_text
        );

        Storage::disk('public')->put('weather.json', json_encode($result));
    }


    public function prayer()
    {
        $pcity = Modul::where('id', 12)->first()->value;
        $connectPrayer = get_headers("https://www.haberler.com/$pcity/namaz-vakitleri/");
        if ($connectPrayer[0] == 'HTTP/1.1 200 OK') {
            $prayertimes = file_get_contents("https://www.haberler.com/$pcity/namaz-vakitleri/");
            preg_match_all('@<span class="hbptTitle">İmsak</span>(.*?)</span>@si', $prayertimes, $imsak, PREG_SET_ORDER);
            preg_match_all('@<span class="hbptTitle">Güneş</span>(.*?)</span>@si', $prayertimes, $gunes, PREG_SET_ORDER);
            preg_match_all('@<span class="hbptTitle">Öğle</span>(.*?)</span>@si', $prayertimes, $ogle, PREG_SET_ORDER);
            preg_match_all('@<span class="hbptTitle">İkindi</span>(.*?)</span>@si', $prayertimes, $ikindi, PREG_SET_ORDER);
            preg_match_all('@<span class="hbptTitle">Akşam</span>(.*?)</span>@si', $prayertimes, $aksam, PREG_SET_ORDER);
            preg_match_all('@<span class="hbptTitle">Yatsı</span>(.*?)</span>@si', $prayertimes, $yatsi, PREG_SET_ORDER);
            preg_match_all('@ <h1 class="hblnhTitle black">(.*?)</h1>@si', $prayertimes, $pcityname, PREG_SET_ORDER);

            //$pcityy = $pcityname[0][1];
            $pcityy = $pcity;

            $imsak = explode('<span class="hbptTitle">İmsak </span>', $imsak[0][1]);
            $imsak = explode('<span class="hbptTime">', $imsak[0]);
            $imsak = html_entity_decode($imsak[1]);

            $gunes = explode('<span class="hbptTitle">Güneş</span>', $gunes[0][1]);
            $gunes = explode('<span class="hbptTime">', $gunes[0]);
            $gunes = html_entity_decode($gunes[1]);

            $ogle = explode('<span class="hbptTitle">Öğle</span>', $ogle[0][1]);
            $ogle = explode('<span class="hbptTime">', $ogle[0]);
            $ogle = html_entity_decode($ogle[1]);

            $ikindi = explode('<span class="hbptTitle">İkindi</span>', $ikindi[0][1]);
            $ikindi = explode('<span class="hbptTime">', $ikindi[0]);
            $ikindi = html_entity_decode($ikindi[1]);

            $aksam = explode('<span class="hbptTitle">Akşam</span>', $aksam[0][1]);
            $aksam = explode('<span class="hbptTime">', $aksam[0]);
            $aksam = html_entity_decode($aksam[1]);

            $yatsi = explode('<span class="hbptTitle">Yatsı</span>', $yatsi[0][1]);
            $yatsi = explode('<span class="hbptTime">', $yatsi[0]);
            $yatsi = html_entity_decode($yatsi[1]);
        } else {
            $pcityy = 'Bekliyor';
            $imsak = 'Bekliyor';
            $gunes = 'Bekliyor';
            $ogle = 'Bekliyor';
            $ikindi = 'Bekliyor';
            $aksam = 'Bekliyor';
            $yatsi = 'Bekliyor';
        }


        $result = array(
            "pcityy" => $pcityy,
            "imsak" => $imsak,
            "gunes" => $gunes,
            "ogle" => $ogle,
            "ikindi" => $ikindi,
            "aksam" => $aksam,
            "yatsi" => $yatsi
        );

        Storage::disk('public')->put('prayer.json', json_encode($result));
    }


    public function currency()
    {

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.collectapi.com/economy/allCurrency",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "authorization: apikey 5hOQ598TUvXDRjWXcW45rz:755cIAEmeJ7YmoSTUR7xnq",
                "content-type: application/json"
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $currencies = json_decode($response, true);

        $currencyData = collect($currencies['result'])
            ->whereIn('code', ['USD', 'EUR'])
            ->mapWithKeys(function ($item) {
                return [
                    $item['code'] => [
                        'name' => $item['name'],
                        'selling' => $item['selling'],
                    ]
                ];
            })
            ->toArray();


        return $currencyData;

    }

    public function gold()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.collectapi.com/economy/goldPrice",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "authorization: apikey 5hOQ598TUvXDRjWXcW45rz:755cIAEmeJ7YmoSTUR7xnq",
                "content-type: application/json"
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $golds = json_decode($response, true);

        $goldData = collect($golds['result'])
            ->firstWhere('name', 'Gram Altın');

        //dd($goldData);

        $goldData = [
            'name' => $goldData['name'],
            'buy' => $goldData['buyingstr'],
            'sell' => $goldData['sellingstr'],
        ];

        return $goldData;

    }


    public function bist()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.collectapi.com/economy/borsaIstanbul",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "authorization: apikey 5hOQ598TUvXDRjWXcW45rz:755cIAEmeJ7YmoSTUR7xnq",
                "content-type: application/json"
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $borsa = json_decode($response, true);
        $borsaData = $borsa['result'] ?? [];

        $borsaFirst = is_array($borsaData) ? reset($borsaData) : $borsaData;

        $currentStr = $borsaFirst['currentstr'] ?? null;

        return $currentStr;
    }

    public function coin()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.collectapi.com/economy/cripto",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: apikey 5hOQ598TUvXDRjWXcW45rz:755cIAEmeJ7YmoSTUR7xnq",
                "content-type: application/json"
            ),
        ));


        $response = curl_exec($curl);
        $coin = json_decode($response, true);
        $coinData = $coin['result'] ?? [];

        $coinFirst = is_array($coinData) ? reset($coinData) : $coinData;

        $pricestr = $coinFirst['pricestr'] ?? null;

        return $pricestr;
    }

    public function exchange()
    {
        //$doviz = json_decode(file_get_contents("http://hakandoviz.com/data_matriks.php?d=doviz"));
        //$repo = array("usd" => $doviz->doviz[0]->satis, "usd_simge" => $doviz->doviz[0]->simge, "euro" => $doviz->doviz[1]->satis,  "euro_simge" => $doviz->doviz[1]->simge,  "sterlin" => $doviz->doviz[2]->satis, "sterlin_simge" => $doviz->doviz[2]->simge);
        //$exchange = file_get_contents("https://finans.truncgil.com/v3/today.json");


        $finalData = [
            'currencies' => $this->currency(),
            'gold' => $this->gold(),
            'borsaIstanbul' => $this->bist(),
            "coin" => $this->coin(),
            'last_update' => now()->toDateTimeString(),
        ];


        $jsonData = json_encode($finalData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);




        // $exchange = file_get_contents('https://api.genelpara.com/embed/para-birimleri.json');



        Storage::disk('public')->put('exchange.json', $jsonData);
    }


    public function imagerepo(Request $request)
    {
        $imagerepo = \App\ImageRepo::orderBy('id', 'desc')->take(10)->get();

        if ($imagerepo) {
            return response()->json(['images' => $imagerepo]);
        } else {
            return response()->json(array(['error_register' => 'İşlem sırasında bir hata meydana geldi.']));
        }
    }

    public function fmsearch(Request $request)
    {
        return response()->json("maraba");
    }

    public function searchfmkeyword(Request $request)
    {
        $imagerepo = \App\ImageRepo::where('title', 'LIKE', '%' . request("q") . '%')->get();

        return json_encode($imagerepo);
    }

    public function languageIndex()
    {
        $languages = Language::orderBy('id', 'desc')->paginate(20);
        return view('admin.language.index', compact('languages'));
    }

    public function languageCreate()
    {
        return view('admin.language.create');
    }

    public function languageStore(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'slug' => 'required',
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'slug.required' => 'Kısa isim gereklidir.',
            ]
        );

        $language = new Language();
        $language->title = strip_tags(request('title'));
        $language->slug = str_slug(request('slug'));

        $language->save();

        if ($language) {
            alert('Başarılı', 'İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return redirect()->route('language.edit', ['id' => $language->id]);
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    public function languageEdit($id)
    {
        $language = Language::find($id);
        return view('admin.language.edit', compact('language'));
    }

    public function languageUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'slug' => 'required',
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'slug.required' => 'Kısa isim gereklidir.',
            ]
        );

        $language = Language::find($id);
        $language->title = strip_tags(request('title'));
        $language->slug = str_slug(request('slug'));

        $language->save();

        if ($language) {
            alert('Başarılı', 'İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    public function languageDestroy($id)
    {
        $language = Language::destroy($id);
        if ($language) {
            alert('Başarılı', 'İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        } else {
            alert()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    public function staticword($langId)
    {
        return "merhaba";
    }

    public function translate(Request $request, $postId, $postType)
    {
        $default = Page::find($postId);
        $lang = Language::all();

        return view('admin.translate', compact('default', 'lang', 'postType'));
    }

    public function translateUpdate(Request $request)
    {
        foreach (request('lang') as $item) {
            $post_id = strip_tags(request("postid"));
            $post_type = strip_tags(request("posttype"));
            $id = strip_tags($item["item_id"]);

            if (!empty($id)) {
                $update = Translate::find($id);
                $update->lang_id = strip_tags($item["lang_id"]);
                $update->post_id = $post_id;
                $update->post_type = $post_type;
                $update->title = strip_tags($item["title"]);
                $update->slug = str_slug($item["title"]);
                $update->description = strip_tags($item["description"]);
                $update->detail = $item["detail"];
                $update->keywords = strip_tags($item["keywords"]);
                $update->save();
            } else {
                $create = new Translate();
                $create->lang_id = strip_tags($item["lang_id"]);
                $create->post_id = $post_id;
                $create->post_type = $post_type;
                $create->title = strip_tags($item["title"]);
                $create->slug = str_slug($item["title"]);
                $create->description = strip_tags($item["description"]);
                $create->detail = $item["detail"];
                $create->keywords = strip_tags($item["keywords"]);
                $create->save();
            }
        }
        alert('Başarılı', 'Çeviri Kaydedildi', 'success')->autoClose(2000);
        return back();
    }

    // Her bir eklemede üst satırları kullan
    public function optimize()
    {
        Artisan::call('route:clear');
        Artisan::call('optimize:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        alert('Başarılı', 'Cache ve Route güncellenmiştir.', 'success')->autoClose(3000);
        return back();
    }

    public function runjson()
    {
        $this->scoretable();
        $this->sidebarJson();
        $this->covid19();
        $this->weather();
        $this->prayer();
        $this->exchange();

        alert('Başarılı', 'Json Dosyaları Güncellendi', 'success')->autoClose(3000);
        return back();
    }

    public function logout()
    {
        $user = User::find(auth::user()->getAuthIdentifier());
        $user->active = 0;
        $user->save();
        \App\Helpers\UserActivity::addToLog('Çıkış Yaptı');

        auth::logout();
        return redirect('/');
    }

}
