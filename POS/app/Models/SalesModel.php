<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesModel extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'sales_id';
    protected $fillable = ['user_id', 'buyer', 'sales_code', 'sales_date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}
