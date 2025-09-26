@if($modules[13]['publish']==0 and isset($survey))
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget">
            <h3 class="secondry-heading">Anket</h3>
            <div class="pool-widget">
                <p>{{ $survey->title }}</p>
                <form role="form" action="{{ route('frontend.surveyanswer') }}" method="post">
                    @csrf
                    @foreach($survey->answers as $answer)
                        <div class="radio">
                            <label><input type="radio" name="answer" value="{{ $answer->id }}">{{ $answer->title }}</label>
                        </div>
                    @endforeach
                    <div class="group">
                        <button type="submit" href="#" class="btn red">Oy Ver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif