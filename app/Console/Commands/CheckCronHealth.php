<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CheckCronHealth extends Command
{
    protected $signature = 'cron:health';
    protected $description = 'Check cron job health and display status';

    public function handle()
    {
        $this->info('🔍 Cron Job Sağlık Kontrolü');
        $this->info('================================');

        // 1. Cron settings kontrolü
        $this->checkCronSettings();
        
        // 2. Exchange dosyası kontrolü
        $this->checkExchangeFile();
        
        // 3. Log dosyaları kontrolü
        $this->checkLogFiles();
        
        // 4. Sonraki çalışma zamanı
        $this->showNextRun();

        return 0;
    }

    private function checkCronSettings()
    {
        $cronFile = storage_path('app/public/cron_settings.json');
        
        if (!file_exists($cronFile)) {
            $this->warn('⚠️  Cron ayar dosyası bulunamadı');
            return;
        }

        $settings = json_decode(file_get_contents($cronFile), true);
        
        if ($settings['active']) {
            $this->info('✅ Cron job: AKTIF');
        } else {
            $this->error('❌ Cron job: PASIF');
        }
    }

    private function checkExchangeFile()
    {
        if (!Storage::disk('public')->exists('exchange.json')) {
            $this->warn('⚠️  Exchange dosyası bulunamadı');
            return;
        }

        $exchange = json_decode(Storage::disk('public')->get('exchange.json'), true);
        
        if (isset($exchange['last_update'])) {
            $this->info('📊 Son exchange güncellemesi: ' . $exchange['last_update']);
            
            // Güncelleme zamanını kontrol et
            $lastUpdate = Carbon::createFromFormat('d.m.Y H:i:s', $exchange['last_update']);
            $hoursAgo = $lastUpdate->diffInHours(now());
            
            if ($hoursAgo > 24) {
                $this->warn("⚠️  Son güncelleme {$hoursAgo} saat önce yapıldı");
            } else {
                $this->info("✅ Son güncelleme {$hoursAgo} saat önce yapıldı");
            }
        }
    }

    private function checkLogFiles()
    {
        // Başarı log'u
        if (Storage::disk('public')->exists('exchange_cron_log.json')) {
            $log = json_decode(Storage::disk('public')->get('exchange_cron_log.json'), true);
            $this->info('✅ Son başarılı çalışma: ' . $log['timestamp']);
        } else {
            $this->warn('⚠️  Başarılı çalışma log\'u bulunamadı');
        }

        // Hata log'u
        if (Storage::disk('public')->exists('exchange_cron_error.json')) {
            $log = json_decode(Storage::disk('public')->get('exchange_cron_error.json'), true);
            $this->error('❌ Son hata: ' . $log['timestamp'] . ' - ' . $log['message']);
        } else {
            $this->info('✅ Hata log\'u bulunamadı (iyi haber!)');
        }
    }

    private function showNextRun()
    {
        $now = now();
        $today6 = $now->copy()->hour(6)->minute(0)->second(0);
        $today18 = $now->copy()->hour(18)->minute(0)->second(0);
        $tomorrow6 = $now->copy()->addDay()->hour(6)->minute(0)->second(0);

        if ($now->lessThan($today6)) {
            $next = $today6;
        } elseif ($now->lessThan($today18)) {
            $next = $today18;
        } else {
            $next = $tomorrow6;
        }

        $this->info('⏰ Bir sonraki beklenen çalışma: ' . $next->format('d.m.Y H:i:s'));
        $this->info('🕐 Şimdiki zaman: ' . $now->format('d.m.Y H:i:s'));
    }
}
