@if(isset($photocategories))
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget">
            <h3 class="secondry-heading">Foto Galeri Kategorileri</h3>
            <ul class="categories-widget">
                @foreach($photocategories as $photocategory)
                    <li>
                        <a href="{{ route('frontend.photogallerycategory', ['id' => $photocategory->id, 'slug' => $photocategory->slug, ]) }}">
                            <em>{{ $photocategory->name }}</em>
                            <span class="bg-green" style="display: none">15</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif