<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_code', 'category_name'];

    public function category(): HasMany
    {
        return $this->hasMany(CategoryModel::class, 'category_id', 'category_id');
    }
}
