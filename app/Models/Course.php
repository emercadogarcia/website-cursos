<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function user() {
        // Un curso == Pertenece a un usuario
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        // Un CURSO tiene muchos POST
        return $this->hasMany(Post::class);
    }

    public function getExcerptAttribute()
    {
        return substr($this->description,0,80) . "...";
    }

    public function similar()
    {
        return $this->where('category_id', $this->category_id)
                ->with('user')
                ->take(2)
                ->get();
    }
}
