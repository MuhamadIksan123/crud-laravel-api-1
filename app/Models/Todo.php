<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'name', 'status', 'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
