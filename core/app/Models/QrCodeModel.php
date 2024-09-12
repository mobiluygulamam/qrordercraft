<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeModel extends Model
{
    use HasFactory;
   

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'qr_codes';

    // Mass assignment korumasını devre dışı bırakmak veya alanları belirlemek için fillable kullanabilirsiniz.
    protected $fillable = ['file_path'];
}