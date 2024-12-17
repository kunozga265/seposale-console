<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function inventorySummary()
    {
        return $this->belongsTo(InventorySummary::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function siteSaleSummary()
    {
        return $this->belongsTo(SiteSaleSummary::class);
    }

    public function logs()
    {
        return $this->hasMany(SystemLog::class);
    }


    protected $fillable= [
        "code",
        "client_id",
        "photo",
        "collected_by",
        "collected_by_phone_number",
        "inventory_id",
        "inventory_summary_id",
        "site_sale_summary_id",
        "site_id",
        "quantity",
        "balance",
        "user_id",
        "date",
    ];
}
