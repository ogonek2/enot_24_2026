<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_COPYWRITER = 'copywriter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'role',
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
        'is_admin' => 'boolean',
    ];
    
    /**
     * Проверка доступа к админ-панели Filament
     */
    public function canAccessFilament(): bool
    {
        return $this->is_admin === true || $this->role === self::ROLE_ADMIN;
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function hasAnyRole(array $roles): bool
    {
        if ($this->is_admin === true) {
            return true;
        }

        return in_array($this->role, $roles, true);
    }
}
