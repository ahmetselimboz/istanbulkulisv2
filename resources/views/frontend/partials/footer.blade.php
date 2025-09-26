@if($id23['publish']==0) <div class="container my-2"> <div class="text-center"> {!! $id23['code'] !!} </div> </div> @endif

<footer class="footer mt-4">
	
	<div class="container">
		<ul>
			@foreach($footercategories as $fpost)
			
			<li><a href="{{ route('frontend.post', ['categoryslug' => str_slug($fpost->category->name), 'id' => $fpost->id, 'slug' => $fpost->slug ]) }}"> {{ $fpost->title }}  </a></li>
			@endforeach
        </ul>
	</div>

  <div class="container">
        <div class="top">
            <div class="d-block d-sm-flex">
                <div class="logo">
                    <a href="">
                        <img  src="/uploads/{{ $general->site_logo }}" alt="{{ $general->site_title }}">
                    </a>
                </div>
                <div class="menu">
                    <ul>
                        @foreach($pages as $page)
                            <li><a href="{{ route('frontend.page', ['id' => $page->id, 'slug' => $page->slug ] ) }}"> {{ $page->title }} </a></li>
                        @endforeach
                            <li><a href="{{ route('frontend.contact') }}"> İletişim </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="middle">
            <p>Türkiye'den ve Dünya'dan son dakika haberler, günün öne çıkan siyaset, ekonomi ve spor haberleri, magazin dünyasından flaş olaylar sonsayfa.com da. Sonsayfa.com sitesinde yayınlanan haber içerikleri izin alınmadan, kaynak gösterilmeden kopyalanamaz, alıntılanamaz, yayınlanamaz.</p>
        </div>
        <div class="bottom">
            <div class="row">
                <div class="col-md-9">
                    <p>{{ $general->site_copyright }} <strong>© 2021 Sonsayfa.com</strong></p>
                   
                </div>
                <div class="col-md-3 mr-auto text-right">
                    <ul class="social">
                        <li>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 315 255.99"><defs><style>.cls-1{fill:#959595;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M0,227a182.9,182.9,0,0,0,99.07,29c118.87,0,183.87-98.47,183.87-183.88q0-4.19-.19-8.36A131.17,131.17,0,0,0,315,30.3a129.09,129.09,0,0,1-37.12,10.18A64.82,64.82,0,0,0,306.3,4.73a129.62,129.62,0,0,1-41,15.68A64.67,64.67,0,0,0,155.14,79.35,183.47,183.47,0,0,1,21.93,11.83a64.69,64.69,0,0,0,20,86.28A64.43,64.43,0,0,1,12.66,90v.82A64.66,64.66,0,0,0,64.5,154.21a65.1,65.1,0,0,1-17,2.27,64.11,64.11,0,0,1-12.16-1.17,64.68,64.68,0,0,0,60.37,44.88,129.63,129.63,0,0,1-80.26,27.67A130.71,130.71,0,0,1,0,227Z"/></g></g></svg>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 147.01 315"><defs><style>.cls-1{fill:#fff;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M31.77,315H97V157.41h43.8s4.1-25.43,6.1-53.23H97.29V67.91c0-5.41,7.11-12.69,14.16-12.69H147V0H98.64C30.16,0,31.77,53.08,31.77,61v43.35H0v53H31.77Z"/></g></g></svg>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 409.6 409.61"><defs><style>.cls-1{fill:#949494;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M307.2,0H102.4C46.09,0,0,46.08,0,102.4V307.21c0,56.3,46.09,102.4,102.4,102.4H307.2c56.32,0,102.4-46.1,102.4-102.4V102.4C409.6,46.08,363.51,0,307.2,0Zm68.27,307.21a68.34,68.34,0,0,1-68.27,68.26H102.4a68.34,68.34,0,0,1-68.26-68.26V102.4A68.34,68.34,0,0,1,102.4,34.14H307.2a68.34,68.34,0,0,1,68.27,68.26V307.21Z"/><circle class="cls-1" cx="315.75" cy="93.86" r="25.6"/><path class="cls-1" d="M204.8,102.4A102.41,102.41,0,1,0,307.2,204.8,102.39,102.39,0,0,0,204.8,102.4Zm0,170.68a68.27,68.27,0,1,1,68.27-68.28A68.28,68.28,0,0,1,204.8,273.08Z"/></g></g></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</footer>