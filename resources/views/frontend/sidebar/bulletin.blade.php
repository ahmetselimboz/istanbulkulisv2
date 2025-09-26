@if($modules[4]['publish']==0 and $modules[4]['value']==0)
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget">
            <h3 class="secondry-heading">E Bülten</h3>
            <div class="pool-widget">
                <p>Güncel haberlerden anında haberdar olmak için e posta adresinizi kayıt ederek bilgilendirmeleri alabilirsiniz.</p>
                <form action="{{ route('newsletter.save') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" id="newsletter-form-email" class="form-control form-control-lg" placeholder="E posta" autocomplete="off">
                        <button class="btn btn-primary">Kayıt Et</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif