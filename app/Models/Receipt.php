<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function siteSale()
    {
        return $this->belongsTo(SiteSale::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected $fillable=[
        "client_id",
        "sale_id",
        "site_sale_id",
        "payment_method_id",
        "user_id",
        "amount",
        "code",
        "information",
        "reference",
        "date",
    ];
}
