<?php

namespace App\Models;

use App\Http\Controllers\AppController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payable extends Model
{
    use HasFactory;

    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    public function getName()
    {
        if($this->transporter != null){
            return $this->transporter->name;
        }else if($this->supplier != null){
            return $this->supplier->name;
        }else if($this->requestForm != null) {
            return $this->requestForm->user->fullName();
        }else 
        return "Other";
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
    public function requestFormItem()
    {
        return $this->hasOne(RequestFormItem::class);
    }
    public function creditVoucher()
    {
        return $this->hasOne(CreditVoucher::class);
    }

    public function requestForm()
    {
        return $this->belongsTo(RequestForm::class, "request_id", "id");
    }

    public function transporter()
    {
        return $this->belongsTo(Transporter::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function account()
    {
        return $this->belongsTo(AccountingAccount::class);
    }

    public function formattedCode()
    {
        return (new AppController())->getZeroedNumber($this->code);
    }


    protected $fillable = [
        "serial",
        "code",
        "description",
        "total",
        "date",
        "contents",
        "expense_type_id",
        "account_id",
        "sale_id",
        "delivery_id",
        "transporter_id",
        "supplier_id",
        "request_id",
        "paid",
    ];
}
