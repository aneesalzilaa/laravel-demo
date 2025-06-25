<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'artist', 'category_id',
        'contact_number', 'email', 'image_path', 'price', 'is_sold'
    ];

    // ✅ العلاقة الصحيحة مع الفئات (Category)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
