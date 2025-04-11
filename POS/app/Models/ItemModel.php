<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemModel extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $primaryKey = 'item_id';
    protected $fillable = [
        'item_code',
        'item_name',
        'buy_price',
        'sell_price',
        'category_id',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'category_id');
    }
    public function sales_detail(): HasMany
    {
        return $this->hasMany(SalesDetailModel::class);
    }
}
