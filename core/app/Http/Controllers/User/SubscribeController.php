<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class SubscribeController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activeTheme = active_theme();
    }

    /**
     * Display the page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $plan = request()->user()->plan();
        $start_date = $expiry_date  =$planlastdate = '-';
        $pay_mode = 'one_time';
        $interval = null;
          $user=User::where('id',request()->user()->id)->get()->first();
          
        if ($upgrade = request()->user()->upgrade) {
            $start_date = date_formating($upgrade->upgrade_lasttime);
            $expiry_date = date_formating($upgrade->upgrade_expires);
            $pay_mode = $upgrade->pay_mode;
            $interval = $upgrade->interval;
          $planlastdate = $user->created_at->addDays(7);

        }
        else {
          
          $start_date=date_formating($user->created_at);  
           $expiry_date = $user->created_at->addDays(7);
          $planlastdate= date_formating(Carbon::parse($expiry_date)->diffInDays (Carbon::parse($user->created_at)));
       
        }

        return view($this->activeTheme.'.user.subscription',
            compact('plan', 'start_date', 'expiry_date', 'pay_mode', 'interval', 'planlastdate'));
    }

    /**
     * Cancel recurring subscription
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function cancelSubscription()
    {

        try {
            request()->user()->cancelRecurringSubscription();
        } catch (\Exception $e) {

            Log::info($e->getMessage());
            quick_alert_error($e->getMessage());
            return back();
        }

        quick_alert_success(___('Cancelled Successfully'));
        return back();
    }
}
