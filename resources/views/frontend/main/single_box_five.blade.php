<section class="section single-box">
    <div class="container">
        <div class="content">
            <div class="row">
                @foreach($single_box_fives as $single_box_five )
                <div class="col-md-4">
                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($single_box_five->category->name), 'id' => $single_box_five->id, 'slug' => $single_box_five->slug ]) }}" class="item mb-4 shadow-sm">
                        <div class="image">
                            <img src="{{ $single_box_five->image }}" alt="{{ $single_box_five->title }}" class="w-100">
                        </div>
                        <div class="title">
                            <span>{{ str_limit(html_entity_decode($single_box_five->title), $limit='72', $end='...') }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
