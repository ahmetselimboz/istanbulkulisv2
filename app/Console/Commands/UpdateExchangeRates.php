<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\GeneralSettingController;

class UpdateExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Döviz kurlarını günceller ve JSON dosyasına kaydeder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Döviz kurları güncelleniyor...');

        try {
            $controller = new GeneralSettingController();
            $controller->exchange();

            $this->info('✅ Döviz kurları başarıyla güncellendi!');
            $this->info('📅 Güncelleme zamanı: ' . now()->format('d.m.Y H:i:s'));

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('❌ Hata oluştu: ' . $e->getMessage());

            return Command::FAILURE;
        }
    }
}
