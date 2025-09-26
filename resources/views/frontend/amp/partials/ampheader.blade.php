<header class="header">
    <div class="container d-flex">
        <div class="logo">
            <a href="">
                <amp-img alt="logo" src="./assets/img/logo.png" width="234"height="48"></amp-img>
            </a>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <button on="tap:sidebar.open">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M16.71,2.57H9A1.29,1.29,0,1,1,9,0h7.71a1.29,1.29,0,1,1,0,2.57Z"/><path class="cls-1" d="M16.71,10.29H1.29a1.29,1.29,0,1,1,0-2.58H16.71a1.29,1.29,0,0,1,0,2.58Z"/><path class="cls-1" d="M16.71,18H1.29a1.29,1.29,0,1,1,0-2.57H16.71a1.29,1.29,0,1,1,0,2.57Z"/></g></g></svg>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</header>

<amp-sidebar id="sidebar" class="sidebar w-100" layout="nodisplay" side="right">
    <div class="menu">
        <ul>
            @foreach($ampcategories as $key => $c_other)
                <li>
                    <amp-accordion layout="container">
                        <section>
                            <header>
                                <a href="{{ route('frontend.categoryslug', ['slug' => $c_other->slug ] ) }}"> {{ $c_other->name }} </a>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.81 298.75"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="_15" data-name=" 15"><path d="M21.46,298.75A21.33,21.33,0,0,1,6.31,262.27L119.38,149.42,6.31,36.57A21.42,21.42,0,0,1,36.6,6.27l128,128a21.32,21.32,0,0,1,0,30.08l-128,128A21.27,21.27,0,0,1,21.46,298.75Z"></path></g></g></g></svg>
                            </header>
                            <ul>
                                @foreach($c_other->subCategory($c_other->id) as $sub)
                                    <li><a href="{{ route('frontend.categoryslug', ['slug' => $sub->slug ] ) }}">{{ $sub->name }}</a></li>
                                @endforeach
                            </ul>
                        </section>
                    </amp-accordion>
                </li>
            @endforeach

        </ul>
    </div>
    <!--
    <button on="tap:sidebar.close">Close sidebar</button>
    <button on="tap:sidebar.toggle">Toggle sidebar</button>
    -->
</amp-sidebar>