<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "units",
        "cost",
        "site_id",
        "available_stock",
        "uncollected_stock",
        "threshold",
    ];
}
