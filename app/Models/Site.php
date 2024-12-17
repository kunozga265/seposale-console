<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    public function inventories()
    {
     return $this->hasMany(Inventory::class);
    }

    public function summaries()
    {
     return $this->hasMany(InventorySummary::class);
    }

    public function sales()
    {
     return $this->hasMany(SiteSale::class);
    }

    public function collections()
    {
     return $this->hasMany(Collection::class);
    }

    protected $fillable = [
        "name",
        "code",
        "location"
    ];
}
