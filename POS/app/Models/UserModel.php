<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticate;

class UserModel extends Authenticate
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['username', 'password', 'name', 'level_id'];
    protected $hidden = ['password'];
    protected $casts = [
        'password' => 'hashed',
    ];
    private mixed $level;

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function sales(): HasMany
    {
        return $this->hasMany(SalesModel::class, 'item_id', 'item_id');
    }

    public function getRoleName()
    {
        return $this->level->levelName;
    }

    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }

    public function getRole()
    {
        return $this->level->level_kode;
    }
}
