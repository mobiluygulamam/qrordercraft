<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Language;
use App\Models\Page;
use App\Models\User;
use App\Models\Plan;
use App\Models\StaffFeedback;
use App\Models\Testimonial;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\Models\Subscriber;
use Illuminate\Support\Str;

use App\Mails\InviteMail;

use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
     /**
      * Constructor
      */
     public function __construct()
     {
          $this->activeTheme = active_theme();

     }
     public function landingpage()
     {

          return view('landingpage.index');
     }public function integrationspage()
     {
         
$isUserSubscriber=isUserSubscriber();
          return view($this->activeTheme . '.home.integrations',compact('isUserSubscriber'));
     }          public function blankpage()
     {
          $sifre = coffecraft_xor_decrypt("G7u0991F+Xzf4Cv5LMP7NZB2AjJW", "3");

          return view($this->activeTheme . '.home.blank', compact('sifre'));
     }

     public function testpage(Request $request)
     {
          $unsplash = new UnSplashController();
          $json = $unsplash->loadImages($request);
          return view($this->activeTheme . '.home.test', compact('json'));
     }
     public function loadImages(Request $request)
     {
          $query = $request->input('query');
          $response = $this->getUnSplashOptions()
               ->get($this->unsplashApiBaseUrl . 'search/photos', [
                    'query' => $query,
                    'per_page' => 12,
                    'orientation' => 'landscape'
               ]);

          $data = json_decode($response->getBody()->getContents(), true);
          $smallImageUrls = [];

          foreach ($data['results'] as $photo) {
               $smallImageUrls[] = $photo['urls']['thumbnail'];
          }
          return response()->json($smallImageUrls)->header('Content-Type', 'application/json');

     }

     /**
      * Display the home page
      *
      * @return \Illuminate\Contracts\View\View
      */
     public function index()
     {
          if (config('settings.disable_landing_page')) {
               return redirect()->route('login');
          }
          /* Redirect to dashboard if user login */
          if (auth()->check()) {
               return redirect()->route('dashboard');
          }

          $testimonials = Testimonial::limit(10)->get();
          $blogArticles = Blog::with('user')->where('status', 'publish')->limit(3)->get();
          $faqs = Faq::where('active', 1)->where(
               function ($query) {
                    $query->where('translation_lang', get_lang())
                         ->orWhereNull('translation_lang');
               }
          )->limit(10)->get();

          $plans = Plan::where('status', 1)->get();
          $total_monthly = $plans->sum('monthly_price');
          $total_annual = $plans->sum('annual_price');
          $total_lifetime = $plans->sum('lifetime_price');

          $free_plan = config('settings.free_membership_plan');
          $trial_plan = config('settings.trial_membership_plan');

          /* Whatsapp Ordering Plugin */
          if (is_plugin_enabled('quickorder') && config('settings.quickorder_homepage_enable')) {
               return view('quickorder::home')->with(compact(
                    'testimonials',
                    'faqs',
                    'blogArticles',
                    'plans',
                    'total_monthly',
                    'total_annual',
                    'total_lifetime',
                    'free_plan',
                    'trial_plan'));
          } else {

               return view($this->activeTheme . '.home.index')->with(compact(
                    'testimonials',
                    'faqs',
                    'blogArticles',
                    'plans',
                    'total_monthly',
                    'total_annual',
                    'total_lifetime',
                    'free_plan',
                    'trial_plan'));
          }


     }

     /**
      * Display the pricing page
      *
      * @return \Illuminate\Contracts\View\View
      */
     public function pricing()
     {
          $plans = Plan::where('status', 1)->get();
          $total_monthly = $plans->sum('monthly_price');
          $total_annual = $plans->sum('annual_price');
          $total_lifetime = $plans->sum('lifetime_price');

          $free_plan = config('settings.free_membership_plan');
          $trial_plan = config('settings.trial_membership_plan');

          return view($this->activeTheme . '.home.pricing', compact(
               'plans',
               'total_monthly',
               'total_annual',
               'total_lifetime',
               'free_plan',
               'trial_plan'));
     }

     /**
      * Display the faq page
      *
      * @return \Illuminate\Contracts\View\View
      */
     public function faqs()
     {
          abort_if(! config('settings.enable_faqs'), 404);

          $faqs = Faq::where('active', 1)->where(
               function ($query) {
                    $query->where('translation_lang', get_lang())
                         ->orWhereNull('translation_lang');
               }
          )->paginate(20);
          return view($this->activeTheme . '.home.faqs', compact('faqs'));
     }

     /**
      * Display the testimonials page
      *
      * @return \Illuminate\Contracts\View\View
      */
     public function testimonials()
     {
          abort_if(! config('settings.testimonials_enable'), 404);

          $testimonials = Testimonial::paginate(21);
          return view($this->activeTheme . '.home.testimonials', compact('testimonials'));
     }

     /**
      * Display the static page
      *
      * @return \Illuminate\Contracts\View\View
      */
     public function page($slug)
     {
          $page = Page::where('slug', $slug)
               ->where('active', 1)
               ->where(
                    function ($query) {
                         $query->where('translation_lang', get_lang())
                              ->orWhereNull('translation_lang');
                    }
               )->firstOrFail();



          abort_if($page->type == 1 && ! auth()->check(), 404);

          return view($this->activeTheme . '.home.page', compact('page', ));
     }

     public function termsandconditions()
     {
          return view($this->activeTheme . '.home.terms-and-conditions');
     }
     public function contactInformation()
     {
          return view($this->activeTheme . '.home.contact-information
');
     }
     public function aboutUs()
     {
          return view($this->activeTheme . '.home.about-us');
     }


     public function cookiePolicy()
     {
          return view($this->activeTheme . '.home.cookie-policy');
     }


     public function privacyPolicy()
     {

          return view($this->activeTheme . '.home.privacy-policy');
     }
     /**
      * Display the contact page
      *
      * @return \Illuminate\Contracts\View\View
      */
     public function contact()
     {
          return view($this->activeTheme . '.home.contact');
     }


     /**
      * Handle contact requests
      */
     public function contactSend(Request $request)
     {
          if (! config('settings.contact_email')) {
               quick_alert_error(___('Email sending is disabled.'));
               return back();
          }

          $request->validate([
               'name' => ['required', 'string', 'max:255'],
               'email' => ['required', 'email', 'max:255'],
               'subject' => ['required', 'string', 'max:255'],
               'message' => ['required', 'string'],
          ] + validate_recaptcha());

          try {
               $name = $request->name;
               $email = $request->email;

               $short_codes = [
                    '{SITE_TITLE}' => config('settings.site_title'),
                    '{SITE_URL}' => route('home'),
                    '{NAME}' => $name,
                    '{EMAIL}' => $email,
                    '{CONTACT_SUBJECT}' => $request->subject,
                    '{MESSAGE}' => nl2br($request->message),
               ];

               $subject = str_replace(array_keys($short_codes), array_values($short_codes),
                    config('settings.email_sub_contact'));
               $msg = str_replace(array_keys($short_codes), array_values($short_codes),
                    config('settings.email_message_contact'));

               \Mail::send([], [], function ($message) use ($msg, $email, $subject, $name) {
                    $message->to(config('settings.contact_email'))
                         ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                         ->replyTo($email)
                         ->subject($subject)
                         ->html($msg);
               });

               quick_alert_success(___('Thank you for contacting us.'));
               return back();

          } catch (\Exception $e) {
               quick_alert_error(___('Email sending failed, please try again.'));
               return back();
          }
     }

     /**
      * Display the feedback page
      *
      * @return \Illuminate\Contracts\View\View
      */
     public function feedback()
     {
          return view($this->activeTheme . '.home.feedback');
     }

     /**
      * Handle contact requests
      */
     public function feedbackSend(Request $request)
     {
          if (! config('settings.contact_email')) {
               quick_alert_error(___('Email sending is disabled.'));
               return back();
          }

          $request->validate([
               'name' => ['required', 'string', 'max:255'],
               'email' => ['required', 'email', 'max:255'],
               'subject' => ['required', 'string', 'max:255'],
               'message' => ['required', 'string'],
          ] + validate_recaptcha());

          try {
               $name = $request->name;
               $email = $request->email;
               $phone = $request->phone;

               $short_codes = [
                    '{SITE_TITLE}' => config('settings.site_title'),
                    '{SITE_URL}' => route('home'),
                    '{NAME}' => $name,
                    '{EMAIL}' => $email,
                    '{PHONE}' => $phone,
                    '{FEEDBACK_SUBJECT}' => $request->subject,
                    '{MESSAGE}' => nl2br($request->message),
               ];

               $subject = str_replace(array_keys($short_codes), array_values($short_codes),
                    config('settings.email_sub_feedback'));
               $msg = str_replace(array_keys($short_codes), array_values($short_codes),
                    config('settings.email_message_feedback'));

               \Mail::send([], [], function ($message) use ($msg, $email, $subject, $name) {
                    $message->to(config('settings.contact_email'))
                         ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                         ->replyTo($email)
                         ->subject($subject)
                         ->html($msg);
               });

               quick_alert_success(___('Thank you for your feedback.'));
               return back();

          } catch (\Exception $e) {
               quick_alert_error(___('Email sending failed, please try again.'));
               return back();
          }
     }
     public function newsletter(Request $request)
     {

          try {

               $request->validate([
                    'email' => ['required', 'email', 'max:255', 'unique:subscriber']
               ]);

               $mail = $request->email;
               if (User::where("email", $request->email)->exists()) {
                    quick_alert_error(___('Mail zaten kayıtlı.'));
                    return array(
                         'success' => false,

                    );
               }
               if (! Subscriber::where('email', $request->email)->exists()) {
                    $token = Str::random(32);

                    // Davet linkini oluşturma
                    $inviteUrl = route('subscriber.invite', ['token' => $token]);

                    Mail::to($mail)->send(mailable: new InviteMail($inviteUrl));
                    $subscriber = Subscriber::create([
                         'email' => $request->email,
                         'joined' => Carbon::now(),
                         'token' => $token, // Benzersiz token'ı kaydet
                         'trial_ends_at' => null // Deneme süresi henüz başlatılmadı
                    ]);

                    return response()->json(array(
                         'success' => false
                    ), 200);

               } else {
                    $result = array(
                         'success' => false,
'message'=>'Mail zaten kayıtlı.'
                    );
                    quick_alert_error(___('Mail zaten kayıtlı.'));
                    return $result;
               }

          } catch (\Exception $e) {
               // Mail gönderimi sırasında hata oluşursa dönecek cevap
               $result = array(
                    'success' => false,
                    'message' => 'Mail gönderimi başarısız: ' . $e->getMessage()
               );
          }

          // Sonuç döndürülüyor
          return response()->json($result, 200);
     }




     /**
      * Change the language
      *
      * @param $code
      * @return \Illuminate\Http\RedirectResponse
      */
     public function localize($code)
     {
          $language = Language::where('code', $code)->firstOrFail();
          App::setLocale($language->code);
          Session::forget('locale');
          Session::put('locale', $language->code);

          return redirect()->back();
     }

     public function inviteRoute($token)
     {
          // Token ile aboneyi bul
          $subscriber = Subscriber::where('token', $token)->first();

          if (! $subscriber) {
               // Eğer token geçersizse hata döndür
               return redirect('/')->with('error', 'Geçersiz davet linki.');
          }

          if ($subscriber->trial_ends_at) {
               // Deneme süresi zaten başlatıldıysa hata döndür
               return redirect('/')->with('error', 'Bu davet linki zaten kullanılmış.');
          }

          // Deneme süresini başlat (1 aylık)
          $subscriber->trial_ends_at = Carbon::now()->addMonth();
          $subscriber->token = null; // Tokeni geçersiz yap
          $subscriber->save();

          // Aboneyi giriş sayfasına veya başka bir sayfaya yönlendir
          return redirect('/signup')->with('success', 'Deneme süreniz başlatıldı. Panele erişmek için kaydolunuz!');
     }
}
