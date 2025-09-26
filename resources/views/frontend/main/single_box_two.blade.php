<section class="section single-box">
    <div class="container">
        <div class="content">
            <div class="row">
                @foreach($single_box_twos as $single_box_two)
                <div class="col-md-4">
                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($single_box_two->category->name), 'id' => $single_box_two->id, 'slug' => $single_box_two->slug ]) }}" class="item mb-4 shadow-sm">
                        <div class="image">
                            <img src="{{ $single_box_two->image }}" alt="{{ $single_box_two->title }}" class="w-100">
                        </div>
                        <div class="title">
                            <span>{{ str_limit(html_entity_decode($single_box_two->title), $limit='72', $end='...') }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
