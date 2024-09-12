<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\StaffMember;
use Illuminate\Http\Request;

class StaffController extends Controller
{
     public function __construct()
     {
         $this->activeTheme = active_theme();
     }
 
     /**
      * Display the page
      *
      * @return \Illuminate\Contracts\View\View
      */
      public function index(Request $request)
      {
          $posts = $request->user()->posts;
      
          // Tek bir dizi olarak tüm StaffMember verilerini topla
          $staffMembers = StaffMember::whereIn('restaurant_id', $posts->pluck('id'))->get();
      
          return view($this->activeTheme.'.user.staffs.index', compact('staffMembers'));
      }
     public function create(Request $request)
     { 
          $userId = $request->user()->id;
         $restaurants= $this->getPostNamesByUserId($userId);
     
         return view($this->activeTheme.'user.staffs/create', compact('restaurants'));
     }

     // public function store(StaffMember $staff){

     // }

     public function store(Request $request)
{
    // Form verilerini doğrula ve kaydet
    $validated = $request->validate([
        'restaurant_id' => 'required|exists:posts,id',
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
'hire_date'=>'nullable|date',
'salary'=>'nullable|string',
        'position' => 'required|string|max:255',
 
    ]);

    
    // Yeni personel kaydı oluştur
    $staff = new StaffMember($validated);
    $staff->save();

//     return response()->json(['message' => 'Personel başarıyla eklendi!']);
return response()->json(json_encode($validated));
}

     private function getPostNamesByUserId($userId)
     {
         return Post::where('user_id', $userId)->select('id', 'title')->get();
     }
     
}
