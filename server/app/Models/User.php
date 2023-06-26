<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * A TABELA USERS, PODE TER MUITOS ADMINISTRADORES VINCULADOS
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function administrators()
    {
        return $this->hasMany(Administrator::class);
    }

    /**
     * A TABELA USERS, PODE TER MUITOS FINANCEIROS VINCULADOS
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function financials()
    {
        return $this->hasMany(Financial::class);
    }

    /**
     * A TABELA USERS, PODE TER MUITOS MODERADORES VINCULADOS
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moderators()
    {
        return $this->hasMany(Moderator::class);
    }
}
