<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyAnswer;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::orderBy('id', 'desc')->paginate(20);
        return view('admin.survey.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.survey.create');
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

        $survey = new Survey();
        $survey->title = strip_tags(request('title'));
        $survey->description = strip_tags(request('description'));
        $survey->publish = request('publish');

        $survey->save();

        if($survey){
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
        $survey = Survey::find($id);
        return view('admin.survey.edit', compact('survey'));
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

        $survey = Survey::find($id);
        $survey->title = strip_tags(request('title'));
        $survey->description = strip_tags(request('description'));
        $survey->publish = request('publish');

        $survey->save();

        if($survey){
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
        $survey = Survey::destroy($id);
        if($survey){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    public function surveyanswerindex($id)
    {
        $survey = Survey::find($id);
        $surveyanswers = SurveyAnswer::where('survey_id', $survey->id)->orderBy('id', 'asc')->get();

        return view('admin.survey.answerindex', compact('survey','surveyanswers'));
    }

    public function surveyanswercreate(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required',
            ],
            [
                'title.required' => 'Seçenek gereklidir.',
            ]
        );

        $surveyanswer = new SurveyAnswer();
        $surveyanswer->survey_id = $id;
        $surveyanswer->title = strip_tags(request('title'));
        $surveyanswer->vote = 0;
        $surveyanswer->ip = 0;

        $surveyanswer->save();

        if($surveyanswer){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    public function surveyanswerdestroy(Request $request, $id)
    {
        $surveyanswer = SurveyAnswer::destroy($id);

        if($surveyanswer){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    public function surveyansweredit(Request $request, $id)
    {
        $survey = Survey::find($id);
        $surveyanswers = SurveyAnswer::where('survey_id', $id)->orderBy('id', 'asc')->get();
        return view('admin.survey.answerindex', compact('surveyanswers', 'survey'));
    }

    public function surveyanswerupdate(Request $request, $id)
    {
        $surveyanswer = SurveyAnswer::find($id);
        $surveyanswer->title = strip_tags(request('title'));

        $surveyanswer->save();

        if($surveyanswer){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

}
