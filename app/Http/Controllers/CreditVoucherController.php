<?php

namespace App\Http\Controllers;

use App\Models\CreditVoucher;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Rmunate\Utilities\SpellNumber;
use Illuminate\Support\Facades\Redirect;

class CreditVoucherController extends Controller
{
    public function show(Request $request, $serial, $credit_voucher_serial)
    {
        //find client model
        $credit_voucher = CreditVoucher::where("serial", $credit_voucher_serial)
            ->where(function ($query) use ($serial) {
                $query->WhereHas('transporter', function ($q) use ($serial) {
                    $q->where("serial", $serial);
                })
                    ->orWhereHas('supplier', function ($q) use ($serial) {
                        $q->where("serial", $serial);
                    });
            })->first();

        //check if client model exists
        if (is_object($credit_voucher)) {

                $total_in_words = SpellNumber::value($credit_voucher->amount)
                    ->locale('en')
                    ->currency('Kwacha')
                    ->fraction('Tambala')
                    ->toMoney();

                 $total_in_words = str_replace(" of ", " ", $total_in_words);

                return view('pages.credit-voucher', [
                    'credit_voucher' => $credit_voucher,
                    'total_in_words' => $total_in_words,
                ]);
          
        } else {
            return Redirect::route('home')->with('error', 'Credit voucher does not exist');
        }
    }

    public function download(Request $request,  $serial, $credit_voucher_serial)
    {
          $credit_voucher = CreditVoucher::where("serial", $credit_voucher_serial)
            ->where(function ($query) use ($serial) {
                $query->WhereHas('transporter', function ($q) use ($serial) {
                    $q->where("serial", $serial);
                })
                    ->orWhereHas('supplier', function ($q) use ($serial) {
                        $q->where("serial", $serial);
                    });
            })->first();

              if (is_object($credit_voucher)) {

                $filename = "CREDIT VOUCHER #" . (new AppController())->getZeroedNumber($credit_voucher->code) . " - " . $credit_voucher->getName() . "-" . date('Ymd', $credit_voucher->date);

                $pdf = PDF::loadView('downloads.credit-voucher', [
                    'credit_voucher' => $credit_voucher,
                ]);                

                return $pdf->download("$filename.pdf");
          
        } else {
            return Redirect::route('home')->with('error', 'Credit voucher does not exist');
        }

    }
}
