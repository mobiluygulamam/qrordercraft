<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffFeedback extends Model
{
    use HasFactory;

    protected $table = 'staff_feedback';

    protected $fillable = [
        'staff_member_id',
        'order_id',
        'customer_name',
        'rating',
        'comments',
    ];

    /**
     * Feedback belongs to a staff member.
     */
    public function staffMember()
    {
        return $this->belongsTo(StaffMember::class);
    }

    /**
     * Feedback may be related to an order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
