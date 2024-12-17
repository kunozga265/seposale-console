<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorySummary extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function sales()
    {
        return $this->hasMany(SiteSale::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function totalSales()
    {
        $sum = 0;
        foreach ($this->sales as $sale) {
            $sum += $sale->total;
        }
        return $sum;
    }

    protected $fillable = [
        "code",
        "opening_stock",
        "closing_stock",
        "comments",
        "user_id",
        "site_id",
        "date",
    ];
}
