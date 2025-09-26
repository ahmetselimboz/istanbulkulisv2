@extends('layout-frontend')

@section('meta')
    <title>@if(isset($category->name)) {{ $category->name }} @endif</title>
    <meta name="description" content="@if(isset($category->description)) {{ str_limit(strip_tags($category->description), $limit='145', $end='') }} @endif">
    <meta name="keywords" content="@if(isset($category->keywords)) @foreach(explode(',', $category->keywords) as $key){{ $key }},@endforeach @endif">


    @if($route=="frontend.categoryslug")
        <link rel="canonical" href="{{ route('frontend.categoryslug', ['slug' => $category->slug ] ) }}" />
    @endif

    @if(isset($category->id))
        <meta property="og:sitename"           content="{{ $general->site_title }}" />
        <meta property="og:url"                content="{{ route('frontend.category', ['id' => $category->id, 'slug' => $category->slug ]) }}" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="{{ $category->name }}" />
        <meta property="og:description"        content="{{ str_limit(strip_tags($category->detail), $limit='145', $end='') }}" />
        <meta property="og:image"              content="{{ route('frontend.index') }}/uploads/{{ $category->image }}" />

        <meta name="twitter:url" content="{{ route('frontend.category', ['id' => $category->id, 'slug' => $category->slug ]) }}" />
        <meta name="twitter:domain" content="{{ $general->site_url }}" />
        <meta name="twitter:site" content="{{ $general->site_title }}" />
        <meta name="twitter:title" content="{{ $category->name }}" />
        <meta name="twitter:description" content="{{ str_limit(strip_tags($category->detail), $limit='145', $end='') }}" />
        <meta name="twitter:image:src" content="{{ route('frontend.index') }}/uploads/{{ $category->image }}" />
    @endif

@endsection

@section('css')
@endsection

@section('content')

 <main>

<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://www.sonsayfa.com/">Anasayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('frontend.categoryslug', ['slug' => $category->slug ] ) }}">{{ $category->name }} haberleri </a></li>
  </ol>
</nav>	
</div>
	 

     @if($id11['publish']==0)
        <section class="section ads text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="">
                            {!! $id11['code'] !!}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

         <section class="section headlines">
             <div class="container">
                 <div class="row">
                     @if(count($slides)>0)
                         <div class="col-md-8">
                             <div class="left-headline">
                                 <div class="main-slider mb-4">
                                     <div class="content">
                                         <div class="swiper-container js-site-slide" data-slide-type="main">
                                             <div class="swiper-wrapper">
                                                 @foreach($slides as $key => $slide)
                                                     <a href="{{ route('frontend.post', ['categoryslug' => str_slug($slide->category->name), 'id' => $slide->id, 'slug' => $slide->slug ]) }}" class="swiper-slide">
                                                         <img src="@if($slide->id<221) {{ $slide->image }} @else {{ $slide->image_main }} @endif" alt="{{$slide->title}}">
														 @if($slide->mtitle==0)
                                                            <div class="info">
                                                                <span class="title">{{ $slide->title }}</span>
                                                                <span class="sub-title">{{ $slide->short_custom }}</span>
                                                            </div>
                                                        @endif
                                                     </a>
                                                 @endforeach
                                             </div>
                                             <div class="swiper-pagination"></div>
                                         </div>
                                     </div>
                                     <div class="clear"></div>
                                 </div>
                             </div>
                         </div>
                     @endif
                     <div class="col-md-4">
                         <div class="right-headline">
                             <div class="row">
                                 @if($id25['publish']==0)
                                     <div class="col-md-12 mb-4">
                                         <div class="ads-box">
                                             {!! $id25['code'] !!}
                                         </div>
                                     </div>
                                 @endif
                                 @if(!is_null($singlenew))
                                     <div class="col-md-12">
                                         <a href="{{ route('frontend.post', ['categoryslug' => str_slug($singlenew->category->name), 'id' => $singlenew->id, 'slug' => $singlenew->slug ]) }}" class="single-item mb-4 shadow-sm">
                                             <div class="row">
                                                 <div class="col-md-5">
                                                     <div class="title">
                                                         <span>{{$singlenew->title}}</span>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-7">
                                                     <div class="image">
                                                         <img src="{{$singlenew->image}}" alt="{{$singlenew->title}}" class="w-100">
                                                     </div>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>
                                 @endif
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
 

        <section class="section single-box">
            <div class="container">
                <div class="content">
                    <div class="row">
						
                        @foreach ($posts as $rkey => $post)
						
							@if($rkey !=0 and $rkey % 3 == 0)
								@if($id24['publish']==0) 
								<div class="col-md-12 my-2"> 
									<div class="text-center"> 
										{!! $id24['code'] !!} 
									</div> 
								</div> 
								@endif
							@endif
							
                            <div class="col-md-4">
                                <a href="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" class="item mb-4 shadow-sm">
                                    <div class="image">
                                        <img src="{{$post->image}}" alt="{{$post->image}}" class="w-100">
                                    </div>
                                    <div class="title">
                                        <span>{{ $rkey }} {{$post->title}}</span>
                                    </div>
                                </a>
                            </div>
			
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

       <section class="section pagination">
         <ul>
             <li>{{ $posts->links() }}</li>           
         </ul>
     </section>
	 
<?php $actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
	 
	 @if(strpos($actual_link, "page") == false)
	 <div class="container">
		 {{ $category->cat_seo_content }}
	 </div>
	 @endif

	 
 </main>

@endsection

@section('js')
@endsection

