<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Quotation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Rmunate\Utilities\SpellNumber;

class QuotationController extends Controller
{
    public function show(Request $request, $client_serial, $quotation_serial)
    {
        //find client model
        $client = Client::where("serial", $client_serial)->first();

        //check if client model exists
        if (is_object($client)) {

            $quotation = $client->quotations()->where("serial", $quotation_serial)->first();

            if (is_object($quotation)) {

                return view('pages.quotation', [
                    'quotation' => $quotation,
                ]);
            } else {
                return Redirect::route('home')->with('error', 'Quotation was not found');
            }

        } else {
            return Redirect::route('home')->with('error', 'Client profile does not exist');
        }
    }

    public function download(Request $request, $client_serial, $quotation_serial)
    {
        //find client model
        $client = Client::where("serial", $client_serial)->first();

        //check if client model exists
        if (is_object($client)) {

            $quotation = $client->quotations()->where("serial", $quotation_serial)->first();

            if (is_object($quotation)) {

                $filename="QUOTATION#".$quotation->formattedCode()." - ".$quotation->client->name."-".date('Ymd');

                $pdf = PDF::loadView('downloads.quotation', [
                    'quotation' => $quotation,
                ]);

                return $pdf->download("$filename.pdf");


            } else {
                return Redirect::route('home')->with('error', 'Quotation was not found');
            }

        } else {
            return Redirect::route('home')->with('error', 'Client profile does not exist');
        }
    }
}
