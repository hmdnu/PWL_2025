<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesDetailModel extends Model
{
    use HasFactory;
    protected $table = 'sales_detail';
    protected $primaryKey = 'sales_detail_id';
    protected $fillable = ['sales_id', 'item_id', 'price', 'amount'];

    public function sales(): BelongsTo
    {
        return $this->belongsTo(SalesModel::class, 'sales_id', 'sales_id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(ItemModel::class, 'item_id', 'item_id');
    }
}