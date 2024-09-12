<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackResponse extends Model
{
    use HasFactory;

    protected $table = 'feedback_responses';

    protected $fillable = ['feedback_id', 'response', 'responded_by'];

    /**
     * Yanıtın hangi geri bildirimle ilişkili olduğunu belirtir.
     */
    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

    /**
     * Yanıtı veren kullanıcının bilgilerine erişim.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'responded_by');
    }

    /**
     * Feedback'e bir yanıt ekle.
     */
    public static function addResponse($feedbackId, $responseText, $userId)
    {
        return self::create([
            'feedback_id' => $feedbackId,
            'response' => $responseText,
            'responded_by' => $userId
        ]);
    }
}
