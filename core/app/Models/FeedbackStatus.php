<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackStatus extends Model
{
    use HasFactory;

    protected $table = 'feedback_statuses';

    protected $fillable = ['feedback_id', 'status'];

    /**
     * Durumun hangi geri bildirimle ilişkili olduğunu belirtir.
     */
    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

    /**
     * Geri bildirimin durumunu günceller.
     */
    public static function updateStatus($feedbackId, $status)
    {
        $feedbackStatus = self::where('feedback_id', $feedbackId)->first();
        if ($feedbackStatus) {
            $feedbackStatus->update(['status' => $status]);
        } else {
            self::create([
                'feedback_id' => $feedbackId,
                'status' => $status
            ]);
        }
    }
}
