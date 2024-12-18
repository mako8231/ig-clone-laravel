<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Mail\NewUserWelcome;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;

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
        'username',
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

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user){
            $user->profile()->create([
                'title' => 'Hey there!'
            ]);

            Mail::to($user->email)->send(new NewUserWelcome());
        });
    }

    //Relacionamentos de 1:n, ou seja várias postagens
    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function profile()
    {
        //Não é necessário escrever assim pois o namespace no topo do arquivo já definiu
        //return $this->hasOne(\App\Models\Profile::class);
        return $this->hasOne(Profile::class);
    }

    //Relacionamento de muitos para muitos:
    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }
}
