@extends('layout-admin')

@section('title', 'Döviz Kurları Yönetimi')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-clock"></i> Döviz Kurları Yönetimi
                        </h3>
                    </div>
                    <div class="card-body">

                        {{-- Cron Durum --}}
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Otomatik Güncelleme</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="cronToggle"
                                                {{ $cronSettings['active'] ? 'checked' : '' }}>
                                            <label class="form-check-label" for="cronToggle">
                                                <span id="cronStatus">
                                                    {{ $cronSettings['active'] ? 'Aktif' : 'Pasif' }}
                                                </span>
                                            </label>
                                        </div>
                                        <small class="text-muted">
                                            Cron job'u aktif/pasif yapmak için kullanın
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Otomatik Güncelleme URL</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{ route('cron.exchange') }}"
                                                readonly>
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="copyToClipboard('{{ route('cron.exchange') }}')">
                                                <i class="fas fa-copy"></i> Kopyala
                                            </button>
                                        </div>
                                        <small class="text-muted">
                                            Bu URL'yi CPanel otomatik güncelleme yapısı ile kullanın
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CPanel Talimatları --}}
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5><i class="fas fa-info-circle"></i> CPanel Kurulum Talimatları</h5>
                            </div>
                            <div class="card-body">
                                <h6>1. CPanel → Cron Jobs bölümüne gidin</h6>
                                <h6>2. Yeni cron job oluşturun:</h6>
                                <ul>
                                    <li><strong>Dakika:</strong> 0</li>
                                    <li><strong>Saat:</strong> 6,18 (sabah 6:00 ve akşam 18:00)</li>
                                    <li><strong>Gün:</strong> *</li>
                                    <li><strong>Ay:</strong> *</li>
                                    <li><strong>Hafta:</strong> *</li>
                                </ul>
                                <h6>3. Komut:</h6>
                                <div class="bg-light p-3 rounded">
                                    <code>/usr/bin/curl -s {{ route('cron.exchange') }}</code>
                                </div>
                            </div>
                        </div>

                        {{-- Son Çalışma Bilgileri --}}
                        <div class="row">
                            @if ($lastSuccess)
                                <div class="col-md-6">
                                    <div class="card border-success">
                                        <div class="card-header bg-success text-white">
                                            <h5><i class="fas fa-check-circle"></i> Son Başarılı Çalışma</h5>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Zaman:</strong> {{ $lastSuccess['timestamp'] }}</p>
                                            <p><strong>IP:</strong> {{ $lastSuccess['ip'] }}</p>
                                            <p><strong>Durum:</strong> {{ $lastSuccess['message'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($lastError)
                                <div class="col-md-6">
                                    <div class="card border-danger">
                                        <div class="card-header bg-danger text-white">
                                            <h5><i class="fas fa-exclamation-circle"></i> Son Hata</h5>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Zaman:</strong> {{ $lastError['timestamp'] }}</p>
                                            <p><strong>IP:</strong> {{ $lastError['ip'] }}</p>
                                            <p><strong>Hata:</strong> {{ $lastError['message'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                         {{-- Cron Monitoring --}}
                         <div class="card mb-4">
                             <div class="card-header">
                                 <h5><i class="fas fa-chart-line"></i> Cron Job Monitoring</h5>
                             </div>
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-md-4">
                                         <strong>Son Exchange Güncellemesi:</strong>
                                         <p id="lastExchangeUpdate" class="text-info">Yükleniyor...</p>
                                     </div>
                                     <div class="col-md-4">
                                         <strong>Şimdiki Zaman:</strong>
                                         <p id="currentTime" class="text-primary">{{ now()->format('d.m.Y H:i:s') }}</p>
                                     </div>
                                     <div class="col-md-4">
                                         <strong>Bir Sonraki Beklenen Çalışma:</strong>
                                         <p id="nextRun" class="text-warning">Hesaplanıyor...</p>
                                     </div>
                                 </div>
                                 <div class="row mt-3">
                                     <div class="col-md-6">
                                         <strong>Cron Durumu:</strong>
                                         <span id="cronHealthStatus" class="badge badge-secondary">Kontrol ediliyor...</span>
                                     </div>
                                     <div class="col-md-6">
                                         <strong>Son 24 Saat İçinde Çalışma:</strong>
                                         <span id="last24Hours" class="badge badge-secondary">Kontrol ediliyor...</span>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         {{-- Test Butonu --}}
                         <div class="mt-4">
                             <button type="button" class="btn btn-primary" id="testCron">
                                 <i class="fas fa-play"></i> Cron Job'u Test Et
                             </button>
                             <button type="button" class="btn btn-info" id="refreshLogs">
                                 <i class="fas fa-sync"></i> Log'ları Yenile
                             </button>
                             <button type="button" class="btn btn-success" id="checkHealth">
                                 <i class="fas fa-heartbeat"></i> Sağlık Kontrolü
                             </button>
                         </div>

                        {{-- Test Sonucu --}}
                        <div id="testResult" class="mt-3" style="display: none;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Cron toggle
            $('#cronToggle').change(function() {
                const isActive = $(this).is(':checked');

                $.post('{{ route('admin.cron.toggle') }}', {
                    _token: '{{ csrf_token() }}',
                    active: isActive
                }).done(function(response) {
                    $('#cronStatus').text(isActive ? 'Aktif' : 'Pasif');
                    toastr.success(response.message);
                }).fail(function() {
                    toastr.error('Bir hata oluştu');
                    $('#cronToggle').prop('checked', !isActive);
                });
            });

            // Test cron
            $('#testCron').click(function() {
                const btn = $(this);
                btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Test ediliyor...');

                $.get('{{ route('cron.exchange') }}').done(function(response) {
                    $('#testResult').html(`
                <div class="alert alert-success">
                    <strong>Başarılı!</strong> ${response.message}
                    <br><small>Zaman: ${response.timestamp}</small>
                </div>
            `).show();
                    toastr.success('Test başarılı!');
                }).fail(function(xhr) {
                    const response = xhr.responseJSON;
                    $('#testResult').html(`
                <div class="alert alert-danger">
                    <strong>Hata!</strong> ${response ? response.message : 'Bilinmeyen hata'}
                </div>
            `).show();
                    toastr.error('Test başarısız!');
                }).always(function() {
                    btn.prop('disabled', false).html(
                        '<i class="fas fa-play"></i> Cron Job\'u Test Et');
                });
            });

         // Refresh logs
             $('#refreshLogs').click(function() {
                 loadCronStatus();
                 toastr.info('Log\'lar yenilendi');
             });

             // Health check
             $('#checkHealth').click(function() {
                 loadCronStatus();
                 toastr.info('Sağlık kontrolü yapıldı');
             });

             // Sayfa yüklendiğinde status'u yükle
             loadCronStatus();

             // Her 30 saniyede bir otomatik yenile
             setInterval(function() {
                 loadCronStatus();
             }, 30000);
         });

         function loadCronStatus() {
             $.get('{{ route("admin.cron.logs") }}').done(function(response) {
                 // Son exchange güncellemesi
                 if (response.status && response.status.exchange_last_update) {
                     $('#lastExchangeUpdate').text(response.status.exchange_last_update);
                 }

                 // Şimdiki zaman
                 if (response.status && response.status.current_time) {
                     $('#currentTime').text(response.status.current_time);
                 }

                 // Bir sonraki çalışma
                 if (response.status && response.status.next_expected_run) {
                     $('#nextRun').text(response.status.next_expected_run);
                 }

                 // Cron sağlık durumu
                 let healthStatus = 'Bilinmiyor';
                 let healthClass = 'badge-secondary';
                 
                 if (response.status && response.status.cron_settings) {
                     if (response.status.cron_settings.active) {
                         healthStatus = '✅ Aktif';
                         healthClass = 'badge-success';
                     } else {
                         healthStatus = '❌ Pasif';
                         healthClass = 'badge-danger';
                     }
                 }
                 
                 $('#cronHealthStatus').removeClass().addClass('badge ' + healthClass).text(healthStatus);

                 // Son 24 saat kontrolü
                 let last24Status = 'Veri yok';
                 let last24Class = 'badge-warning';
                 
                 if (response.success && response.success.timestamp) {
                     const lastRun = new Date(response.success.timestamp.replace(/(\d{2})\.(\d{2})\.(\d{4}) (\d{2}):(\d{2}):(\d{2})/, '$3-$2-$1T$4:$5:$6'));
                     const now = new Date();
                     const diffHours = (now - lastRun) / (1000 * 60 * 60);
                     
                     if (diffHours <= 24) {
                         last24Status = '✅ Son 24 saatte çalıştı';
                         last24Class = 'badge-success';
                     } else {
                         last24Status = '⚠️ 24 saatten fazla çalışmadı';
                         last24Class = 'badge-warning';
                     }
                 }
                 
                 $('#last24Hours').removeClass().addClass('badge ' + last24Class).text(last24Status);
             }).fail(function() {
                 console.log('Cron status yüklenemedi');
             });
         }

         function copyToClipboard(text) {
             navigator.clipboard.writeText(text).then(function() {
                 toastr.success('URL kopyalandı!');
             });
         }
    </script>
@endsection
