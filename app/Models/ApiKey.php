<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use App\Models\User;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'uuid',
        'user_id',
        'name',
        'key'
    ];

    public function getRouteKeyName() {
        return 'uuid';
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($apiKey) {
            $apiKey->key = Str::random(32); // Génère une chaîne aléatoire de 32 caractères
            $apiKey->uuid = (string)Str::uuid(); // Génère un UUID
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}
