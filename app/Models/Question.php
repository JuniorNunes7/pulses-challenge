<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['dimension_id', 'title', 'active'];

    /**
     * Question belongsTo Dimension
     */
    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}