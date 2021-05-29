<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    /**
     * Dimension hasMany Question
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Verificar se a dimensão pode ser removida
     *
     * @return boolean
     */
    public function canDelete()
    {
        return !$this->questions()->exists();
    }
}