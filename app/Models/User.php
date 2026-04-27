<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasUuid; // Pastikan ini sudah terpanggil
use Spatie\Permission\Traits\HasRoles;

// Tambahkan 'position_id' di sini agar bisa diisi (Mass Assignment)
#[Fillable(['name', 'email', 'password', 'position_id'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasUuid, HasRoles; // HasUuid ditambahkan di sini

    // Pastikan ini ada agar UUID tidak dianggap integer 0
    public $incrementing = false;
    protected $keyType = 'string';

   protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }
}
