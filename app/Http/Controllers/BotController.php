<?php

namespace App\Http\Controllers;

use App\Models\Category;

class BotController extends Controller
{

    public function siteCurl($url, $type = NULL)
    {
        $repo = array();
        foreach ($url as $key => $item){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $item);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);

            if($type=="haberler"){
                preg_match_all('@<h1 class="haber_baslik">(.*?)</h1>@si',$output,$title);
                //preg_match_all('@<p class="haber_ozet selectionShareable">(.*?)</p>@si',$output,$desc);
                preg_match_all('@<div class="hbptContent haber_metni">(.*?)</div>@si',$output,$content);
                preg_match_all('@<meta name="image" content="(.*?)"/>@si',$output,$image);
                preg_match_all('@<div class="hbptDate">(.*?)</div>@si',$output,$date);
                $repo[$key]["title"] = trim($title[1][0]);
                //$repo[$key]["desc"] = $desc[1][0] ?? "";
                $repo[$key]["content"] = str_replace("\r\n",'', strip_tags($content[1][0],"<img>"));
                $repo[$key]["image"] = $image[1][0];
                $repo[$key]["date"] = trim($date[1][0]);
            }
            if($type=="ensonhaber"){
                preg_match_all('@<title>(.*?)</title>@si',$output,$title);
                //preg_match_all('@<meta name="description" content="(.*?)" />@si',$output,$desc);
                preg_match_all('@<article class="body">(.*?)</article>@si',$output,$content);
                preg_match_all('@<meta name="twitter:image:src" content="(.*?)" />@si',$output,$image);
                preg_match_all('@<div class="c-date">(.*?)</div>@si',$output,$date);
                $repo[$key]["title"] = trim($title[1][0]);
                //$repo[$key]["desc"] = $desc[1][0] ?? "";
                $repo[$key]["content"] = trim(str_replace("\r\n",'', strip_tags($content[1][0], "<img>")));
                $repo[$key]["image"] = $image[1][0];
                $repo[$key]["date"] = trim(str_replace("\r\n",'', strip_tags(explode("<li>", $date[1][0])[2])));
            }
        }

        return $repo;
    }

    public function siteXmlParse($xmllink)
    {
        libxml_use_internal_errors(TRUE);
        $objXmlDocument = simplexml_load_file($xmllink);
        if ($objXmlDocument === FALSE) {
            echo "There were errors parsing the XML file.\n";
            foreach(libxml_get_errors() as $error) {
                echo $error->message;
            }
            exit;
        }
        $objJsonDocument = json_encode($objXmlDocument);
        $arrOutput = json_decode($objJsonDocument, TRUE);

        return $arrOutput;
    }


    public function startBot($slug=NULL)
    {
        $categories = Category::all();

        if($slug=="haberler"){
            $bot = "haberler";
            $site = file_get_contents("https://www.haberler.com/son-dakika/");
            preg_match_all('@<a href="(.*?)" title="(.*?)" class="hblnTitle" style="(.*?)">(.*?)</a>@si',$site,$sonuc);
            unset($sonuc[1][0]);
            $result = $this->siteCurl($sonuc[1], "haberler");
        }

        if($slug=="ensonhaber"){
            $bot = "ensonhaber";
            $en = "https://www.ensonhaber.com/rss/ensonhaber.xml";
            $getxml = $this->siteXmlParse($en);

            $ensonarray = array();
            foreach ($getxml["channel"]["item"] as $key => $enson){
                $ensonarray[$key] = $enson["link"];
            }
            $result = $this->siteCurl($ensonarray, "ensonhaber");
        }

        //return $result;
        return view('admin.bot.create', compact('result', 'categories', 'bot'));
    }

}















