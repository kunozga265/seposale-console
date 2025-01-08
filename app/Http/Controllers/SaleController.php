<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SaleController extends Controller
{
    public function show(Request $request, $client_serial, $sale_serial)
    {
        //find client model
        $client = Client::where("serial", $client_serial)->first();

        //check if client model exists
        if (is_object($client)) {

            $sale = $client->sales()->where("serial", $sale_serial)->first();

            if (is_object($sale)) {

                return view('pages.sale', [
                    'sale' => $sale,
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

            $sale = $client->sales()->where("serial", $receipt_serial)->first();

            if (is_object($sale)) {

                $filename="SALE#".$sale->formattedCode()." - ".$sale->client->name."-".date('Ymd');

                $pdf = PDF::loadView('downloads.sale', [
                    'sale' => $sale,
                ]);

                return $pdf->download("$filename.pdf");


            } else {
                return Redirect::route('home')->with('error', 'Sale was not found');
            }

        } else {
            return Redirect::route('home')->with('error', 'Client profile does not exist');
        }
    }
}
