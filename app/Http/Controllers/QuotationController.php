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

                $now_d = Carbon::now('Africa/Lusaka')->format('F j, Y');
                $now_t = Carbon::now('Africa/Lusaka')->format('H:i');

                $total_in_words = SpellNumber::value($quotation->total)
                    ->locale('en')
                    ->currency('Kwacha')
                    ->fraction('Tambala')
                    ->toMoney();

                str_replace($total_in_words, " and ", " of ");

                return view('pages.quotation', [
                    'code' => (new AppController())->getZeroedNumber($quotation->code),
                    'date' => $now_d,
                    'time' => $now_t,
                    'quotation' => $quotation,
                    'total_in_words' => $total_in_words,
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

                $now_d = Carbon::now('Africa/Lusaka')->format('F j, Y');
                $now_t = Carbon::now('Africa/Lusaka')->format('H:i');

                $total_in_words = SpellNumber::value($quotation->total)
                    ->locale('en')
                    ->currency('Kwacha')
                    ->fraction('Tambala')
                    ->toMoney();

                str_replace($total_in_words, " and ", " of ");

                $filename="QUOTATION#".(new AppController())->getZeroedNumber($quotation->code)." - ".$quotation->client->name."-".date('Ymd');

                $pdf = PDF::loadView('downloads.quotation', [
                    'code' => (new AppController())->getZeroedNumber($quotation->code),
                    'date' => $now_d,
                    'time' => $now_t,
                    'quotation' => $quotation,
                    'total_in_words' => $total_in_words,
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
