<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Rmunate\Utilities\SpellNumber;

class InvoiceController extends Controller
{
    public function show(Request $request, $client_serial, $quotation_serial)
    {
        //find client model
        $client = Client::where("serial", $client_serial)->first();

        //check if client model exists
        if (is_object($client)) {

            $invoice = $client->invoices()->where("serial", $quotation_serial)->first();

            if (is_object($invoice)) {

//                $now_d = Carbon::now('Africa/Lusaka')->format('F j, Y');
//                $now_t = Carbon::now('Africa/Lusaka')->format('H:i');

                $total_in_words = SpellNumber::value($invoice->sale->total)
                    ->locale('en')
                    ->currency('Kwacha')
                    ->fraction('Tambala')
                    ->toMoney();

                 $total_in_words = str_replace(" of ", " ", $total_in_words);

                return view('pages.invoice', [
//                    'code' => (new AppController())->getZeroedNumber($invoice->code),
//                    'date' => $now_d,
//                    'time' => $now_t,
                    'invoice' => $invoice,
                    'total_in_words' => $total_in_words,
                ]);
            } else {
                return Redirect::route('home')->with('error', 'Invoice was not found');
            }

        } else {
            return Redirect::route('home')->with('error', 'Client profile does not exist');
        }
    }

    public function download(Request $request, $client_serial, $invoice_serial)
    {
        //find client model
        $client = Client::where("serial", $client_serial)->first();

        //check if client model exists
        if (is_object($client)) {

            $invoice = $client->invoices()->where("serial", $invoice_serial)->first();

            if (is_object($invoice)) {

                $filename="INVOICE#".$invoice->formattedCode()." - ".$invoice->client->name."-".date('Ymd');

                $pdf = PDF::loadView('downloads.invoice', [
                    'invoice' => $invoice,
                ]);

                return $pdf->download("$filename.pdf");


            } else {
                return Redirect::route('home')->with('error', 'Invoice was not found');
            }

        } else {
            return Redirect::route('home')->with('error', 'Client profile does not exist');
        }
    }

}
