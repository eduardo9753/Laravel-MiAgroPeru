<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'precio',
        'descripcion',
        'imagen',
        'user_id'
    ];

    protected $date = [
        'fechaRegistroPost',
    ];

    //UN POSTS PERTENECE A UN USUARIO 
    public function user()
    {
        //en belongsTo solo accedes a datos sin bucle
        //llamamos los valores en la vista: $post->user->name
        //llamamos los valores en la vista: $post->user->username
        //llamamos los valores en la vista: $post->user->celular
        return $this->belongsTo(User::class)->select(['name', 'username', 'celular']);
    }


    //UN POST VA TENER MULTIPLES COMENTARIOS
    public function comentarios()
    {
        //en hasmany lo tienes que recorrer en un bucle foreach() para acceder a los datos
        //@foreach ($post->comentarios as $item)
        //   {{$item->comentario}}
        //@endforeach
        return $this->hasMany(Comentario::class);
    }

    //UN POST VA TENER MUCHOS LIKES
    public function likes()
    {
        //en hasmany lo tienes que recorrer en un bucle foreach() para acceder a los datos
        //@foreach ($post->likes as $item)
        //   {{$item->post_id}}
        //@endforeach
        return $this->hasMany(Like::class);
    }

    //VERIFICAR SI YA DIO LIKE EL USUARIO
    public function checkLike(User $user)
    {
        //VERIFICA EN LA TABLA DE LIKE QUE HAYA UN USUARIO QUE DIO LIKE O VALIDA POR EL ID QUE
        //QUE SE PASA POR PARAMETRO CON EL VALOR DE LA TABLA 
        return $this->likes->contains('user_id', $user->id);
    }
}
