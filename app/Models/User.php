<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phoneNumber',
        'family'
    ];

    public function leitnaries()
    {
        return $this->hasMany(leitnary::class, 'user_id');
    }

    public function partnerRequests()
    {
        return $this->hasMany(partnerRequests::class, 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany(course::class, 'user_courses');
    }

    public function role()
    {
        return $this->belongsToMany(role::class, 'role_users');
    }

    public function hasRoles($role)
    {
        return $this->role()->whereIn('title', $role)->exists();
    }

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

    public function course()
    {
        return $this->hasMany(course::class, 'user_id');
    }
}
