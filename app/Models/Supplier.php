<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        "serial",
        "name",
        "phone_number",
        "phone_number_other",
        "address",
        "email",
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];
}
