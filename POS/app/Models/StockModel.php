<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockModel extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $primaryKey = 'stock_id';
    protected $fillable = ['item_id', 'user_id', 'stocked_date', 'stock_amount'];


    public function item(): BelongsTo
    {
        return $this->belongsTo(ItemModel::class, 'item_id', 'item_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }
}
