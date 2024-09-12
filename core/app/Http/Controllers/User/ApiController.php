<?php 
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Plan;
use App\Models\BusinessTable;

class ApiController extends Controller{
     public function setUserTables(Request $request){
         
           $user = User::where('id',$request->userid)->first();
           $post = Post::find($request->postid);
          
         $planidstr=  $user->group_id;
         $tablecount=0;
         $avaibletablecount=0;
         if ($planidstr=="free") {
                $tablecount=10;
         }
         else {
          $plan=
               Plan::where('id',intval($planidstr))->first();
          $tablecount=$plan->tablecount;
      
                }
          $userTableCount=BusinessTable::where('userid', $user->id)->count();
          $avaibletablecount=$tablecount-$userTableCount;
          $tablesArr=[];
               for ($i=1; $i <=$avaibletablecount ; $i++) { 
                    $table=BusinessTable::create(
                         ["userid"=>$user->id,
                         "restoid"=>$post->id,
                         "table_id"=>$i,
                         "qr_text"=>coffecraft_xor_encrypt($post->slug,$i),
                         "url"=>strval($i),
     
                    ]);
                    $tablesArr[$i]=$table;
               }
          
                $result = array('success' => true, "tables"=>json_encode($tablesArr),
                 'message' => ___('Created Successfully'));
             return response()->json($result, 200)->header('Content-Type', 'application/json');;
         } 
}