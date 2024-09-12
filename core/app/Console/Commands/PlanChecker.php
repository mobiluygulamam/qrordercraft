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
   //Userları çek
     $users=User::all();
     //created_at yani oluşturulma zamanlarını gez foreach ile
     foreach ($users as $user) {
          // Şu anki zaman ile oluşturulma zamanını karşılaştır
          // Eğer oluşturulma tarihinden 7 gün geçmişse
          if($user->groud_id=="free")
        {  if (Carbon::now()->diffInDays($user->created_at) > 7) {
              // group_id'yi güncelle
              $user->group_id = ""; // Örneğin, group_id'yi 2 yapalım
              $user->save(); // Değişikliği kaydet
              info(" {$user->id } user deneme sürümü bitti.");
          }}

      }

    }
}
