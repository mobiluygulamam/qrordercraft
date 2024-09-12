<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $userid
 * @property integer $restoid
 * @property string $url
 * @property string $createdDateTime
 * @property string $updatedDateTime
 * @property string $qr_text
 * @property User $user
 */
class BusinessTable extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tables';

    /**
     * @var array
     */
    protected $fillable = ['userid', 'restoid',  'created_at', 'updated_at', 'qr_text','status','url','table_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid');
    }
    public static function getBusinessTablesByRestoId($restoId, $key, $default = null)
    {
        $business = BusinessTable::where([['id', $restoId]])->first();
        if ($business) {
            return Str::isJson($business) ? json_decode($business) : "";
        }
        return (!empty($default)) ? $default : false;
    }


}
