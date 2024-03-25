<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'username',
        // porque me permite rellenar la imagen?
        //creo que esto solo restringue para peticiones apirest
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

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);

    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function likes(): HasMany{
        return $this->hasMany(Like::class);
    }
    public function followers(): BelongsToMany{
        return $this->belongsToMany(User::class,'followers','user_id','follower_id');
    }
    public function followings(): BelongsToMany{
        return $this->belongsToMany(User::class,'followers','follower_id','user_id');
    }
    #esta funcion obtiene los seguidores de la pagina actual, y busca entre los seguidores si hay uno con el id igual al usuario autenticado
    public function siguiendo(User $user):bool{
        return $this->followers->contains($user->id);
        #se lee: entre los seguidores de este perfil hay uno que contiene el id del usuario autenticado?
    }
    #este metodo es similar al siguiente:
    #$user->followers()->where('follower_id',auth()->user()->id)->first()
}
