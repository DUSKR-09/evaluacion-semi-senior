<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'telefono',
    ];

    public static $rules = [
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:clientes',
        'telefono' => 'required|string|max:255',
    ];

    public static $loginRules = [
        'email' => 'required|email|max:255',
        'password' => 'required|string|max:255',
    ];

    public static $messages = [
        'required' => 'El campo :attribute es requerido',
        'string' => 'El campo :attribute debe ser una cadena de texto',
        'max' => 'El campo :attribute no debe exceder los :max caracteres',
        'email' => 'El campo :attribute debe ser un correo electrónico válido',
        'unique' => 'El campo :attribute ya ha sido registrado',
        'numeric' => 'El campo :attribute debe ser un número',
    ];
}
