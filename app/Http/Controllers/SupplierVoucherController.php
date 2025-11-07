<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierVoucher;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Rmunate\Utilities\SpellNumber;
use Illuminate\Support\Facades\Redirect;


class SupplierVoucherController extends Controller
{
     public function show(Request $request, $serial, $supplier_voucher_serial)
    {
        //find client model
        $supplier_voucher = SupplierVoucher::where("serial", $supplier_voucher_serial)
            ->where(function ($query) use ($serial) {
                $query->WhereHas('transporter', function ($q) use ($serial) {
                    $q->where("serial", $serial);
                })
                    ->orWhereHas('supplier', function ($q) use ($serial) {
                        $q->where("serial", $serial);
                    });
            })->first();

        //check if client model exists
        if (is_object($supplier_voucher)) {

                $total_in_words = SpellNumber::value($supplier_voucher->amount)
                    ->locale('en')
                    ->currency('Kwacha')
                    ->fraction('Tambala')
                    ->toMoney();

                 $total_in_words = str_replace(" of ", " ", $total_in_words);

                return view('pages.supplier-voucher', [
                    'supplier_voucher' => $supplier_voucher,
                    'total_in_words' => $total_in_words,
                ]);
          
        } else {
            return Redirect::route('home')->with('error', 'Supplier voucher does not exist');
        }
    }

    public function download(Request $request,  $serial, $supplier_voucher_serial)
    {
          $supplier_voucher = SupplierVoucher::where("serial", $supplier_voucher_serial)
            ->where(function ($query) use ($serial) {
                $query->WhereHas('transporter', function ($q) use ($serial) {
                    $q->where("serial", $serial);
                })
                    ->orWhereHas('supplier', function ($q) use ($serial) {
                        $q->where("serial", $serial);
                    });
            })->first();

              if (is_object($supplier_voucher)) {

                $filename = "SUPPLIER VOUCHER #" . (new AppController())->getZeroedNumber($supplier_voucher->code) . " - " . $supplier_voucher->getName() . "-" . date('Ymd', $supplier_voucher->date);

                $pdf = PDF::loadView('downloads.supplier-voucher', [
                    'supplier_voucher' => $supplier_voucher,
                ]);                

                return $pdf->download("$filename.pdf");
          
        } else {
            return Redirect::route('home')->with('error', 'Supplier voucher does not exist');
        }

    }
}
