<section class="section single-box">
    <div class="container">
        <div class="content">
            <div class="row">
                @foreach($single_box_trees as $single_box_tree)
                <div class="col-md-3">
                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($single_box_tree->category->name), 'id' => $single_box_tree->id, 'slug' => $single_box_tree->slug ]) }}" class="item mb-4 shadow-sm">
                        <div class="image">
                            <img src="{{ $single_box_tree->image }}" alt="{{ $single_box_tree->title }}" class="w-100">
                        </div>
                        <div class="title">
                            <span>{{ str_limit(html_entity_decode($single_box_tree->title), $limit='38', $end='...') }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
