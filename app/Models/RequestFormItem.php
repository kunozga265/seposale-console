<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestFormItem extends Model
{
   use HasFactory;

   public function __get($name)
   {
      if ($name === 'product_name') {
         $split = explode('for', $this->details);
         return trim($split[1]);
      }

      // It's important to call the parent __get() method
      // to allow other properties to be accessed normally.
      return parent::__get($name);
   }


   public function account()
   {
      return $this->belongsTo(AccountingAccount::class, "accounting_account_id", "id");
   }

   public function records()
   {
      return $this->hasMany(AccountingRecord::class);
   }

   public function transporter()
   {
      return $this->belongsTo(Transporter::class, "transporter_id");
   }
   public function supplier()
   {
      return $this->belongsTo(Supplier::class, "supplier_id");
   }
   public function payable()
   {
      return $this->belongsTo(Payable::class, "payable_id");
   }

   public function requestForm()
   {
      return $this->belongsTo(RequestForm::class, "request_id");
   }
   public function inventory()
   {
      return $this->belongsTo(Inventory::class, "inventory_id");
   }



   protected $fillable = [
      "details",
      "units",
      "quantity",
      "unit_cost",
      "total_cost",
      "balance",
      "status",
      "request_id",
      "accounting_account_id",
      "transporter_id",
      "supplier_id",
      "inventory_id",
      "material_id",
      "payable_id",
      "comments",
   ];
}
