<?php

namespace App\Models;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name','ad_id'];

    public function ads(){
        return $this->belongsTo(Ad::class, 'ad_id', 'id');
    }
}
