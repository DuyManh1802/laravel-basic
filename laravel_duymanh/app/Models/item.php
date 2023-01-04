<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $fillable = [
        'item_name',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}