<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'address',
    ];

    protected $hidden=[
        "created_at",
        "updated_at",
    ];
}
