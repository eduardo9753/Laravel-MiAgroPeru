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
       //CON ESTA FUNCION PODEMOS AMARRAR CON LA TABLÑA USERS Y TRAER DATOS SEGUN CRITERIO 
       //EN LA VISTA PARA MOSTRAR
       //TRAENDO LOS DATOS DEL POST "nombre,usuario y celular"
       return $this->belongsTo(User::class)->select(['name','username','celular']);
    }

    
    //UN POST VA TENER MULTIPLES COMENTARIOS
    public function comentarios()
    {
       //UN POST TIENE MUCHOS COMENTARIOS "se retorna esos datos"
       return $this->hasMany(Comentario::class);  
    }

    //UN POST VA TENER MUCHOS LIKES
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    //VERIFICAR SI YA DIO LIKE EL USUARIO
    public function checkLike(User $user)
    {
        //VERIFICA EN LA TABLA DE LIKE QUE HAYA UN USUARIO QUE DIO LIKE O VALIDA POR EL ID QUE
        //QUE SE PASA POR PARAMETRO CON EL VALOR DE LA TABLA 
        return $this->likes->contains('user_id',$user->id);
    }

}
