<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporter extends Model
{
    use HasFactory;

    protected $fillable = [
        "serial",
        "name",
        "phone_number",
        "phone_number_other",
        "email",
        "location",
        "registration_number",
        "type",
        "make",
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];
}
