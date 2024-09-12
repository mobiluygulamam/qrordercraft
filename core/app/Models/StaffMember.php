<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    use HasFactory;

    protected $table = 'staff_members';

    protected $fillable = [
        'name',
        'position',
        'email',
        'phone',
        'photo_url',
        'hire_date',
        'salary',
        'surname',
        'restaurant_id'
    ];

    /**
     * A staff member may have many feedbacks.
     */
    public function feedbacks()
    {
        return $this->hasMany(StaffFeedback::class);
    }
}
