<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\DeviceUser;
use App\Models\StaffFeedback;
use App\Models\StaffMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;


class StaffFeedBackController extends Controller
{
     public function store(Request $request)
     {
         $validated = $request->validate([
             'staff_member_id' => 'required|exists:staff_members,id',
             'order_id' => 'nullable|exists:orders,id',
             'customer_name' => 'required|string|max:255',
             'rating' => 'required|integer|min:1|max:5',
             'comments' => 'required|string',
         ]);
 
         StaffFeedback::create($validated);
 
         return redirect()->back()->with('success', 'Feedback submitted successfully!');
     }


public function getDeviceUser()
{
    // Cihaz kimliğini çerezde kontrol et
    $deviceId = Cookie::get('device_id');

    if (!$deviceId) {
        // UUID oluştur ve çereze kaydet
        $deviceId = (string) Str::uuid();
        Cookie::queue('device_id', $deviceId, 60 * 24 * 7); // 7 gün geçerli olacak

        // Veritabanına kaydet
        $deviceUser = DeviceUser::create([
            'device_id' => $deviceId,
            'last_active_at' => now(),
        ]);
    } else {
        // Mevcut cihazı veritabanından bul
        $deviceUser = DeviceUser::where('device_id', $deviceId)->first();
        if ($deviceUser) {
            $deviceUser->update(['last_active_at' => now()]);
        } else {
            // Cihazı bulamazsan tekrar oluştur
            $deviceUser = DeviceUser::create([
                'device_id' => $deviceId,
                'last_active_at' => now(),
            ]);
        }
    }

    return $deviceUser;
}
}
