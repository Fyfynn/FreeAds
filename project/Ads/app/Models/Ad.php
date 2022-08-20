<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'price', 'category', 'localisation', 'image'];

    public function images()
    {
        return $this->hasMany(Image::class, 'ad_id', 'id');
    }
}
