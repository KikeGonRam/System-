<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Obtener el nombre del identificador para autenticación.
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Obtener el identificador para autenticación.
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Obtener la contraseña para autenticación.
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Obtener el token de "recuérdame".
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Establecer el token de "recuérdame".
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Obtener el nombre de la columna para el token de "recuérdame".
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}