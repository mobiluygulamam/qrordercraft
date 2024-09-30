<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Order extends Model
{
     protected static function boot()
     {
         parent::boot();
 
         // Her yeni sipariş eklenmeden önce benzersiz bir kod oluştur
         static::creating(function ($order) {
             $order->unique_code = self::generateUniqueCode();
         });
     }
 
     private static function generateUniqueCode()
    {
        do {
            $code = strtoupper(Str::random(8)); // 8 haneli rastgele bir kod üret
        } while (self::codeExists($code)); // Kod var mı kontrol et, varsa tekrar oluştur
        
        return $code;
    }

    // Kodu veritabanında kontrol eden metod
    private static function codeExists($code)
    {
        return self::where('unique_code', $code)->exists();
    }
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class)->with(['menu', 'itemExtras', 'variant']);
    }
public function lastOrderByTableId(){}
    public function restaurant()
    {
        return $this->belongsTo(Post::class, 'restaurant_id');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('d/m/Y H:i');
    }
}
