<?php

namespace App\Models;

use App\Notifications\RedefinirSenhaNotification;
use App\Notifications\VerificarEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Sobrescreve o método padrão herdado de Authenticatable para customizar
     * o envio de emails personalizados para redefinir senhas de login.
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RedefinirSenhaNotification($token, $this->email, $this->name));
    }

    /**
     * Sobrescrevendo o método de verificação de email
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerificarEmailNotification($this->name));
    }

    /**
     * Relacionamento 1:N. Um usuário tem muitas tarefas
     */
    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
