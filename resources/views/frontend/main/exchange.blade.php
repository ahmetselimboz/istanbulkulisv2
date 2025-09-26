@if (!empty($exchange) && isset($modules[14]) && $modules[14]['publish'] == 0)


    <section class="section exchange d-none d-sm-block mb-4">
        <div class="container">
            <div class="content">
                {{-- Dolar --}}
                <div class="item">
                    <div class="status">
                        <img src="{{ asset('frontend/sonsayfa/img/exchange-up.png') }}" alt="status">
                    </div>
                    <div class="detail">
                        <span class="title">{{ $exchange['currencies']['USD']['name'] ?? 'USD' }}</span>
                        <span
                            class="value">{{ isset($exchange['currencies']['USD']['selling']) ? number_format($exchange['currencies']['USD']['selling'], 2, ',', '.') : '-' }}</span>
                    </div>
                </div>

                {{-- Euro --}}
                <div class="item">
                    <div class="status">
                        <img src="{{ asset('frontend/sonsayfa/img/exchange-up.png') }}" alt="status">
                    </div>
                    <div class="detail">
                        <span class="title">{{ $exchange['currencies']['EUR']['name'] ?? 'EUR' }}</span>
                        <span
                            class="value">{{ isset($exchange['currencies']['EUR']['selling']) ? number_format($exchange['currencies']['EUR']['selling'], 2, ',', '.') : '-' }}</span>
                    </div>
                </div>

                {{-- Gram Altın --}}
                <div class="item">
                    <div class="status">
                        <img src="{{ asset('frontend/sonsayfa/img/exchange-up.png') }}" alt="status">
                    </div>
                    <div class="detail">
                        <span class="title">{{ $exchange['gold']['name'] ?? 'Gram Altın' }}</span>
                        <span class="value">{{ $exchange['gold']['sell'] ?? '-' }}</span>
                    </div>
                </div>

                {{-- Bist 100 --}}
                <div class="item">
                    <div class="status">
                        <img src="{{ asset('frontend/sonsayfa/img/exchange-up.png') }}" alt="status">
                    </div>
                    <div class="detail">
                        <span class="title">BIST 100</span>
                        <span
                            class="value">{{ isset($exchange['borsaIstanbul']) ? number_format($exchange['borsaIstanbul'], 3, ',', '.') : '-' }}</span>
                    </div>
                </div>

                {{-- Bitcoin --}}
                <div class="item mobile-hidden">
                    <div class="status">
                        <img src="{{ asset('frontend/sonsayfa/img/exchange-up.png') }}" alt="status">
                    </div>
                    <div class="detail">
                        <span class="title">Bitcoin</span>
                        <span class="value">{{ $exchange['coin'] ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
