<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected $fillable = [
        "code",
        "client_id",
        "location",
        "recipient_name",
        "recipient_profession",
        "recipient_phone_number",
        "information",
        "total",
        "quotes",
        "user_id",
        "sale_id",
    ];
}
