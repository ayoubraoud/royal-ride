<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Utilisateur extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'utilisateurs';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'username',
        'email',
        'password_hash',
        'avatar_url',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays (e.g., JSON).
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /**
     * The attributes that should be type cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Custom password accessor to be compatible with Laravel's auth system
     */
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    /**
     * Role relationship
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Favorites relationship
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'utilisateur_id');
    }

    /**
     * Comments relationship
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'utilisateur_id');
    }
};