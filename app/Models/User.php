<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable implements MustVerifyEmail
{ 
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type_id',
    ];
    public function notes(){
        return $this->hasMany(Backend\Note::class);
    }
    // public function skills(){
    //     return $this->hasOne(Backend\Skill::class);
    // }
    public function employerReviews(){
        return $this->hasMany(Backend\ReviewEmployer::class);
    }
    public function freelancerReviews(){
        return $this->hasMany(Backend\ReviewFreelancer::class);
    }
    public function freelancerActivity(){
        return $this->hasOne(Backend\FreelancerActivity::class);
    }
    public function employerActivity(){
        return $this->hasOne(Backend\EmployerActivity::class);
    }
    public function socialMedia(){
        return $this->hasOne(Backend\SocialMedia::class);
    }
    public function skill(){
        return $this->hasOne(Backend\Skill::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
