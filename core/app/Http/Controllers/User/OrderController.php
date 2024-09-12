<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BusinessTable;
use App\Models\Post;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Language;
class OrderController extends Controller
{
     public function __construct()
     {
         $this->activeTheme = active_theme();
     }

     public function addOrder($restaurant, $tableId)
     {
         // İlgili restoran ve masa bilgilerini alıyoruz
         $post = Post::findOrFail($restaurant);
         $table = BusinessTable::findOrFail($tableId);

         //Load menu languages Start 
         $menu_languages = $default_menu_language = [];
    
             $menu_languages = Language::all();
             if (!empty($menu_languages)) {
                 if (!empty($_COOKIE['Quick_user_lang_code'])) {
                     /* Get default language by cookie if user changed it */
                     $default_menu_language = $menu_languages
                         ->where('code', $_COOKIE['Quick_user_lang_code'])
                         ->first();
                 }
                 if (empty($default_menu_language)) {
                     /* Get default language */
                     $default_menu_language = $menu_languages
                         ->where('code', post_options($post->id, 'default_language'))
                         ->first();
                 }
          }
         

         // Load menu languages End

         // Sipariş ekleme sayfasına yönlendirme veya işlem
         return view($this->activeTheme.'.user.orders.add', compact('post', 'table', 'menu_languages', 'default_menu_language'));
     }
          public function orderByTableIdAndPostId(Request $request, int $table_id, int $post_id){
               $table=BusinessTable::find($table_id);
               $post=Post::find($post_id);
               $menus=Menu::all();

          
          return view($this->activeTheme.".user.orders.createorder", compact('table', 'post'));
          }
}
