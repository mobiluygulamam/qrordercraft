<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserOption;
use Symfony\Component\Console\Output\ConsoleOutput;
class PlanChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:plan-checker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bu bir açıklama yazısıdır';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Tüm kullanıcıları al
        $users = User::all();

        foreach ($users as $user) {
            // Kullanıcı 'free' grupta mı?
            if ($user->group_id == 'free') {
                // Kullanıcının oluşturulma tarihi ile şu anki tarih arasındaki gün farkını hesapla
                $daysSinceCreated = Carbon::now()->diffInDays($user->created_at);

                // Eğer 7 günden fazlaysa
                if ($daysSinceCreated > 7) {
                    // Kullanıcının group_id'sini güncelle (örneğin, boş yapıyoruz)
                    $user->group_id = '';
                    $user->save();

                    // Log kaydı
                    $this->info("{$user->id} numaralı kullanıcının deneme süresi bitti.");
                }
            }
            else if($user->group_id!=''){
               
            }
        }

        // İşlem bittiğinde bilgi mesajı
        $this->info('Tüm kullanıcılar kontrol edildi.');
    }

}
