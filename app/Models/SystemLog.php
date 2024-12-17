<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        "user_id",
        "message",
        "delivery_id",
        "sale_id",
        "site_sale_id",
        "request_form_id",
        "collection_id",
        "inventory_id",
        "contents",
    ];
}
