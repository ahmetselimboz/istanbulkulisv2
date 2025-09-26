<div class="col-lg-4 col-md-4 col-xs-12">
    <div class="row">
        <aside class="side-bar grid">
            <?php if (\Illuminate\Support\Facades\Storage::disk('public')->exists('sidebar.json')) {
            $sidebar = json_decode(\Illuminate\Support\Facades\Storage::get('public/sidebar.json')); ?>
                @foreach($sidebar as $item)
                    @includeIf("frontend.sidebar.$item")
                @endforeach
            <?php
            }else{echo "<h1>Panelden Json Güncelleyin</h1>"; } ?>
        </aside>
    </div>
</div>



<!--  https://www.eczaneler.gen.tr/nobetci-istanbul-esenyurt -->