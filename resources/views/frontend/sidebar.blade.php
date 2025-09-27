@php
    if (\Illuminate\Support\Facades\Storage::disk('public')->exists('sidebar.json')) {
        $sidebar = json_decode(\Illuminate\Support\Facades\Storage::get('sidebar.json'), true);

        if (is_array($sidebar)) {
@endphp
            @foreach($sidebar as $item)
                @includeIf("frontend.sidebar.$item")
            @endforeach
@php
        } else {
            echo "<h1>Geçersiz JSON formatı</h1>";
        }
    } else {
        echo "<h1>Panelden Json Güncelleyin</h1>";
    }
@endphp
