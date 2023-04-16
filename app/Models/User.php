<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'created_at',
        'imagen',
        'celular'
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
    ];


    //UN USUARIO PUEDE TENER MULTIPLES POST
    public function posts()
    {
        //ESTA SISTAXIS TE TRAE TODOS LOS POSTS RELACIONADOS CON LOS USUARIOS
        return $this->hasMany(Post::class); 
        // return $this->hasMany(Post::class , 'autor_id'); //SI NO SIGUES CON LA CONVENCIONES
    }

    //UN USUARIO PUEDE DAR LIKE A MUCHAS PUBLICACIONES
    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    //ALMACENAR LOS SEGUIDORES DE UN USUARIO
    public function followers()
    {
        //UN USUARIO PUEDE TENER MUCHOS SEGUIDORES
        return $this->belongsToMany(User::class, 'followers','user_id','follower_id');
    }


    //ALMACENAR LOS USUARIOS QUE SEGUIMOS
    public function followings()
    {
        //UN USUARIO PUEDE SEGUIR A MUCHAS PERSONAS
        return $this->belongsToMany(User::class, 'followers','follower_id','user_id');
    }


    //COMPROBAR SI UN USUARIO YA SIGUIO A OTRO
    public function siguiendo(User $user)
    {
        //LE PASAMOS EL ID PARA QUE PUEDA VERIFICAR EN LA TABLA
        return $this->followers->contains($user->id); 
    }

    
    
    

}
