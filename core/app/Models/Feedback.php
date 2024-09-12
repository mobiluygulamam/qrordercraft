<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = ['restaurant_id', 'table_id', 'order_id', 'rating', 'comment'];

    /**
     * Feedback'in kategorileri ile Many-to-Many ilişkisi.
     */
    public function categories()
    {
        return $this->belongsToMany(FeedbackCategory::class, 'feedback_category_pivot');
    }

    /**
     * Feedback'e verilen yanıt ile One-to-One ilişkisi.
     */
    public function response()
    {
        return $this->hasOne(FeedbackResponse::class);
    }

    /**
     * Feedback'in durumu ile One-to-One ilişkisi.
     */
    public function status()
    {
        return $this->hasOne(FeedbackStatus::class);
    }

    /**
     * Ortalama puanı hesaplama gibi özel metodlar.
     */
    public static function getAverageRatingForRestaurant($restaurant_id)
    {
        return self::where('restaurant_id', $restaurant_id)->avg('rating');
    }
}
