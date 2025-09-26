@if(isset($othercategory))
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget">
            <h3 class="secondry-heading">{{ $category->name }} alt kategorileri</h3>
            <ul class="categories-widget">
                @foreach($othercategory as $category)
                    <li>
                        <a href="{{ route('frontend.category', ['id' => $category->id, 'slug' => $category->slug, ]) }}">
                            <em>{{ $category->name }}</em>
                            <span class="bg-green" style="display: none">15</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif