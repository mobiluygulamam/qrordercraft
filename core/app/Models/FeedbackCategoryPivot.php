<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackCategoryPivot extends Model
{
    use HasFactory;

    protected $table = 'feedback_category_pivot';

    protected $fillable = ['feedback_id', 'category_id'];

    /**
     * Belirli bir geri bildirimin kategorilerini getirir.
     */
    public static function getCategoriesByFeedback($feedbackId)
    {
        return self::where('feedback_id', $feedbackId)
                    ->with('category')  // Kategori bilgilerini çek
                    ->get();
    }

    /**
     * Belirli bir kategoriye ait tüm geri bildirimleri getirir.
     */
    public static function getFeedbacksByCategory($categoryId)
    {
        return self::where('category_id', $categoryId)
                    ->with('feedback')  // Geri bildirim bilgilerini çek
                    ->get();
    }

    /**
     * Geri bildirim ve kategori arasında ilişki kur (kategori ekle).
     */
    public static function addCategoryToFeedback($feedbackId, $categoryId)
    {
        return self::create([
            'feedback_id' => $feedbackId,
            'category_id' => $categoryId
        ]);
    }

    /**
     * Geri bildirim ve kategori arasındaki ilişkiyi kaldır (kategori çıkar).
     */
    public static function removeCategoryFromFeedback($feedbackId, $categoryId)
    {
        return self::where('feedback_id', $feedbackId)
                    ->where('category_id', $categoryId)
                    ->delete();
    }

    /**
     * Geri bildirime ait tüm kategorileri sil.
     */
    public static function removeAllCategoriesFromFeedback($feedbackId)
    {
        return self::where('feedback_id', $feedbackId)->delete();
    }

    /**
     * İlişkiyi tanımlamak için kategori modeline bağlantı.
     */
    public function category()
    {
        return $this->belongsTo(FeedbackCategory::class, 'category_id');
    }

    /**
     * İlişkiyi tanımlamak için geri bildirim modeline bağlantı.
     */
    public function feedback()
    {
        return $this->belongsTo(Feedback::class, 'feedback_id');
    }
}
