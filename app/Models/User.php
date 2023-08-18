<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'slug',
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relationships
    public function instructedCourses(): HasMany
    {
        return  $this->hasMany(Course::class, 'instructor_id');
    }

    //Attributes
    protected function link(): Attribute
    {
        return Attribute::make(
            get: fn () => route('users.show', ['user' => $this->slug])
        );
    }

    protected function photo(): Attribute
    {
        //https://carlesto.com/assets/img/user-default-avatar.png
        return Attribute::make(
            get: fn ($value) => is_null($value) ? 'https://carlesto.com/assets/img/user-default-avatar.png' : $value,
        );
    }
}
