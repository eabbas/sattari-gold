<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'family',
        'phoneNumber',
        'nationalCode',
        // 'birthDate',
        'isApproved',
        // 'accountingCode',
        // 'referralCode',
        // 'note',
        'isActive',
        // 'loginWithPass',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function roles()
    {
        return $this->belongsToMany(role::class, 'user_roles');
    }
    public function wallet()
    {
        return $this->hasOne(wallet::class);
    }
    public function walletTransactions()
    {
        return $this->hasManyThrough(transaction::class, wallet::class);
    }
    public function hasRole($roles)
    {
        return $this->roles()->whereIn('name', $roles)->exists();
    }
    public function deals(){
        return $this->hasMany(deal::class);
    }
}
