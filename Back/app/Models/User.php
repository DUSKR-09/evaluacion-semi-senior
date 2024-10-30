<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email',
        'password',
    ];

    public static $rules = [
        'primer_nombre' => 'required|string|max:255',
        'segundo_nombre' => 'nullable',
        'primer_apellido' => 'required|string|max:255',
        'segundo_apellido' => 'nullable',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];

    public static $messages = [
        'primer_nombre.required' => 'El primer nombre es obligatorio.',
        'primer_nombre.string' => 'El primer nombre debe consistir en texto.',
        'primer_nombre.max' => 'El primer nombre no puede exceder los 255 caracteres.',
        'segundo_nombre.string' => 'El segundo nombre debe consistir en texto.',
        'primer_apellido.required' => 'El primer apellido es obligatorio.',
        'primer_apellido.string' => 'El primer apellido debe consistir en texto.',
        'primer_apellido.max' => 'El primer apellido no puede exceder los 255 caracteres.',
        'segundo_apellido.string' => 'El segundo apellido debe consistir en texto.',
        'email.unique' => 'El correo electrónico ya está registrado.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'Por favor, ingrese un correo electrónico válido.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden. Por favor, verifique e intente nuevamente.',
    ];

    public static $loginRules = [
        'email' => 'required|email',
        'password' => 'required',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
