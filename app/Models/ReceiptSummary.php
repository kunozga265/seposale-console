<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptSummary extends Model
{
    use HasFactory;

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    public function summary()
    {
        return $this->belongsTo(Summary::class);
    }

    public function siteSaleSummary()
    {
        return $this->belongsTo(SiteSaleSummary::class);
    }

    protected $fillable = [
        "name",
        "balance",
        "amount",
        "cost",
        "units",
        "summary_id",
        "site_sale_summary_id",
        "receipt_id",
    ];
}
