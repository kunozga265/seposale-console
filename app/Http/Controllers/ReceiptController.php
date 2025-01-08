<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Rmunate\Utilities\SpellNumber;

class ReceiptController extends Controller
{

    public function show(Request $request, $client_serial, $receipt_serial)
    {
        //find client model
        $client = Client::where("serial", $client_serial)->first();

        //check if client model exists
        if (is_object($client)) {

            $receipt = $client->receipts()->where("serial", $receipt_serial)->first();

            if (is_object($receipt)) {

                return view('pages.receipt', [
                    'receipt' => $receipt,
                ]);

            } else {
                return Redirect::route('home')->with('error', 'Receipt was not found');
            }

        } else {
            return Redirect::route('home')->with('error', 'Client profile does not exist');
        }
    }

    public function download(Request $request, $client_serial, $receipt_serial)
    {
        //find client model
        $client = Client::where("serial", $client_serial)->first();

        //check if client model exists
        if (is_object($client)) {

            $receipt = $client->receipts()->where("serial", $receipt_serial)->first();

            if (is_object($receipt)) {

                $filename="RECEIPT#".$receipt->formattedCode()." - ".$receipt->client->name."-".date('Ymd');

                $pdf = PDF::loadView('downloads.receipt', [
                    'receipt' => $receipt,
                ]);

                return $pdf->download("$filename.pdf");


            } else {
                return Redirect::route('home')->with('error', 'Receipt was not found');
            }

        } else {
            return Redirect::route('home')->with('error', 'Client profile does not exist');
        }
    }
}
