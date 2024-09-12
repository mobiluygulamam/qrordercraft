<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class DeviceUser extends Model
{
    use HasFactory;

    /**
     * Tablonun adı
     *
     * @var string
     */
    protected $table = 'device_users';

    /**
     * Toplu atanabilir alanlar.
     *
     * @var array
     */
    protected $fillable = [
        'device_id',
        'last_active_at',
    ];

    /**
     * last_active_at alanını otomatik olarak bir Carbon nesnesine dönüştür.
     *
     * @var array
     */
    protected $dates = ['last_active_at'];

    /**
     * StaffFeedback modeline olan ilişki.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function staffFeedbacks()
    {
        return $this->hasMany(StaffFeedback::class);
    }
}
