@if($id2['publish']==0) 
<div class="container my-2"> 
	<div class="text-center">
{!! $id2['code'] !!} 
		</div>
	</div>
@endif

<section class="section single-box">
    <div class="container">
        <div class="content">
            <div class="row">
                @foreach($single_box_ones as $single_box_one)
                    <div class="col-md-3">
                        <a href="{{ route('frontend.post', ['categoryslug' => str_slug($single_box_one->category->name), 'id' => $single_box_one->id, 'slug' => $single_box_one->slug ]) }}" class="item shadow-sm mb-4">
                            <div class="image">
                                <img src="{{ $single_box_one->image }}" alt="{{ $single_box_one->title }}" class="w-100">
                            </div>
                            <div class="title">
                                <span>{{ str_limit(html_entity_decode($single_box_one->title), $limit='38', $end='...') }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</section>

@if($id3['publish']==0) 
<div class="container my-2"> 
	<div class="text-center">
{!! $id3['code'] !!} 
		</div>
	</div>
@endif
