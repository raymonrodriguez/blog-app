<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;

class Post extends Model
{

    use HasFactory, ApiTrait;

    const Borrador = 1;

    const Publicado = 2;

    protected $fillable  = ['name', 'slug','extract', 'body', 'status', 'category_id', 'user_id'];

    //Relation hasmany  inverse
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relation hasmany  inverse
    public function category()
    {
        return $this->belongsTo(User::class);
    }

    //Relation Belongstomany
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //Relation
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }
}
