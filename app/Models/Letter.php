<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['reference_number', 'sender', 'letter_date', 'received_date', 'subject', 'file_path'];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn ($model) => $model->id = (string) \Illuminate\Support\Str::uuid());
    }
}
