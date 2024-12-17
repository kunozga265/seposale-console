<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSaleSummary extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function sale()
    {
        return $this->belongsTo(SiteSale::class,"site_sale_id","id");
    }

    public function collections()
    {
        return $this->hasMany(Collection::class,);
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

    public function getFullPaymentStatus()
    {
        if (isset($this->balance)) {
            if ($this->balance == $this->amount) {
                return "Unpaid";
            } elseif ($this->balance > 0 && $this->balance < $this->amount) {
                return "Partially Paid";
            } elseif ($this->balance == 0) {
                return "Paid";
            }
        }
        return 3;
    }
    public function getCollectionStatus()
    {

            if ($this->collected == $this->quantity) {
                return 2;
            } elseif ($this->collected > 0 && $this->collected < $this->quantity) {
                return 1;
            } else{
                return 0;
            }
    }

    protected $fillable = [
        "inventory_id",
        "site_sale_id",
        "quantity",
        "amount",
        "balance",
        "collected",
    ];
}
