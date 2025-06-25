<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // تأكد من أن اسم الجدول صحيح
    protected $fillable = ['title'];

    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }
}

