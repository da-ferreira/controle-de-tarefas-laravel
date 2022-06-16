<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tarefa', 'data_limite_conclusao'];

    /**
     * Relacionamento 1:N. Uma tarefa pertence a um usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
