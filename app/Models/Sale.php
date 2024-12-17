<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Summary::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function expense()
    {
        return $this->hasOne(Expense::class);
    }


    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function quotation()
    {
        return $this->hasOne(Quotation::class);
    }

    protected $fillable = [
        "code",
        "code_alt",
        "status",
        "client_id",
        "total",
        "balance",
        "date",
        "editable",
        "comments",
        "location",
        "recipient_name",
        "recipient_profession",
        "recipient_phone_number",
        "user_id",
    ];
}
