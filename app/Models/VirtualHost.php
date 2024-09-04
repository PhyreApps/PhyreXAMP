<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualHost extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'document_root',
        'php_version',
    ];

}
