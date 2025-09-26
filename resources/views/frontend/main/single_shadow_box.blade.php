<section class="section single-shadow-box">
    <div class="container">
        <div class="content">
            <div class="row">
                @foreach($single_shadow_boxs as $single_shadow_box)
                <div class="col-md-6">
                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($single_shadow_box->category->name), 'id' => $single_shadow_box->id, 'slug' => $single_shadow_box->slug ]) }}" class="item mb-4">
                        <div class="image">
                            <img src="{{ $single_shadow_box->image }}" alt="{{ $single_shadow_box->title }}" class="w-100">
                        </div>
                        <div class="title">
                            <span>{{ str_limit(html_entity_decode($single_shadow_box->title), $limit='41', $end='...') }}</span>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
