<?php


namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Models\BusinessTable;
use App\Models\Feedback;
use App\Models\Post;
use App\Http\Controllers\Controller;
class FeedBackController extends Controller

{
public function __construct(){
     $this->activeTheme = active_theme();
}


 public function sendUserFeedBack(Request $request){
       // Form verilerini doğrula
    $validated = $request->validate([
     'rating' => 'required|integer|min:1|max:5',
     'comment' => 'required|string|max:1000',
 ]);

 // Geri bildirimi veritabanına kaydet
 Feedback::create([
     'table_id' => $request->tableid,
     'restaurant_id' => $request->postid, // Dinamik olarak ayarlamalısın
     'rating' => $validated['rating'],
     'comment' => $validated['comment'],
     'created_at' => now(),
 ]);

 // Kullanıcıya teşekkür mesajı dönebilir
 return response()->json(['message' => $validated]);
 }

 function index(){
     $getUser=auth()->user();
     $getUserPosts=Post::where('user_id',$getUser->id)->get();
     $feedbacks=[];
     if (!$getUserPosts->isEmpty()) {
          $feedbackModel = Feedback::where('restaurant_id',$getUserPosts[0]->id)
          ->with('status') // Durum bilgisi
          ->get();
      
          foreach($feedbackModel as $feedback){
            
     
              $item=["id"=>$feedback->id,"rating"=>$feedback->rating,"comment"=>$feedback->comment,"restoranname"=>$getUserPosts[0]->title];
              array_push($feedbacks,$item);
          }
       
     }
  
     return view($this->activeTheme.'user.feedbacks.index',compact('feedbacks'));

 }
}
