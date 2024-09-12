<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackCategory extends Model
{
    use HasFactory;

    protected $table = 'feedback_categories';

    protected $fillable = ['name', 'description'];

    /**
     * Kategoriye ait geri bildirimler ile Many-to-Many ilişkisi.
     */
    public function feedbacks()
    {
        return $this->belongsToMany(Feedback::class, 'feedback_category_pivot');
    }

    /**
     * Kategori adı ile geri bildirimlerin sayısını döndüren bir metod.
     */
    public static function getFeedbackCountByCategory($categoryName)
    {
        return self::where('name', $categoryName)->first()->feedbacks()->count();
    }
}
