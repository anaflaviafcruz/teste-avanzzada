<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permission'
    ];

    protected $appends = [
        'is_produto',
        'is_categoria',
        'is_marca'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsProdutoAttribute()
    {
        return $this->permission[0];
    }

    public function getIsCategoriaAttribute()
    {
        return $this->permission[1];
    }

    public function getIsMarcaAttribute()
    {
        return $this->permission[2];
    }

    public function permissaoProduto()
    {
        return $this->permission[0];
    }

    public function permissaoCategoria()
    {
        return $this->permission[1];
    }

    public function permissaoMarca()
    {
        return $this->permission[2];
    }
}
