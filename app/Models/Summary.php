<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Summary extends Model

{
    use HasFactory;
    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function fullName()
    {
        if($this->variant != null){
            return $this->product->name. " - ". $this->variant->description;
        }else{
            return $this->product->name;
        }
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class,"product_variant_id","id");
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function getPaymentStatus()
    {
        if (isset($this->balance)) {
            if ($this->balance == $this->amount) {
                return 0;
            } elseif ($this->balance > 0 && $this->balance < $this->amount) {
                return 1;
            } elseif ($this->balance == 0) {
                return 2;
            }
        }
        return 3;
    }



    protected $fillable=[
        "product_id",
        "product_variant_id",
        "sale_id",
        "date",
        "amount",
        "balance",
        "quantity",
        "description",
        "units",
    ];
}
