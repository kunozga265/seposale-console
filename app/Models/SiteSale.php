<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSale extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function products()
    {
        return $this->hasMany(SiteSaleSummary::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function inventorySummary()
    {
        return $this->belongsTo(InventorySummary::class);
    }

    protected $fillable = [
        "code",
        "status",
        "client_id",
        "total",
        "balance",
        "date",
        "editable",
        "user_id",
        "site_id",
        "inventory_summary_id",
    ];
}
