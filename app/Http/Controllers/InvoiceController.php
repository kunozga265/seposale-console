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
    public function show(Request $request,$client_serial,$quotation_serial)
    {
        //find out if the request is valid
        $client=Client::where("serial",$client_serial)->first();

        if(is_object($invoice)){

            /*
                        $pdf=App::make('dompdf.wrapper');
                        $pdf->loadHTML('request');
                        return $pdf->stream('Request Form');*/

            $filename="INVOICE#".(new AppController())->getZeroedNumber($invoice->code,$invoice->revision)." - ".$invoice->client->name."-".date('Ymd',$invoice->sale->date);

            $now_d=Carbon::createFromTimestamp($invoice->sale->date,'Africa/Lusaka')->format('F j, Y');
            $now_t=Carbon::createFromTimestamp($invoice->sale->date,'Africa/Lusaka')->format('H:i');

            $total_in_words = SpellNumber::value($invoice->sale->total)
                ->locale('en')
                ->currency('Kwacha')
                ->fraction('Tambala')
                ->toMoney();

            $total_in_words = str_replace(" of "," ",$total_in_words);

            $pdf = PDF::loadView('invoice', [
                'code'              => (new AppController())->getZeroedNumber($invoice->code,$invoice->revision),
                'date'              => $now_d,
                'time'              => $now_t,
                'invoice'           => $invoice,
                'total_in_words'    => $total_in_words
            ]);
            return $pdf->download("$filename.pdf");

        }else {
            if ((new AppController())->isApi($request)) {
                //API Response
                return response()->json(['message' => "Invoice not found"], 404);
            }else{


                //Web Response
                return Redirect::route('dashboard')->with('error','Invoice not found');
            }
        }
    }
    public function print(Request $request,$id)
    {
        //find out if the request is valid
        $invoice=Invoice::find($id);

        if(is_object($invoice)){

            /*
                        $pdf=App::make('dompdf.wrapper');
                        $pdf->loadHTML('request');
                        return $pdf->stream('Request Form');*/

            $filename="INVOICE#".(new AppController())->getZeroedNumber($invoice->code,$invoice->revision)." - ".$invoice->client->name."-".date('Ymd',$invoice->sale->date);

            $now_d=Carbon::createFromTimestamp($invoice->sale->date,'Africa/Lusaka')->format('F j, Y');
            $now_t=Carbon::createFromTimestamp($invoice->sale->date,'Africa/Lusaka')->format('H:i');

            $total_in_words = SpellNumber::value($invoice->sale->total)
                ->locale('en')
                ->currency('Kwacha')
                ->fraction('Tambala')
                ->toMoney();

            $total_in_words = str_replace(" of "," ",$total_in_words);

            $pdf = PDF::loadView('invoice', [
                'code'              => (new AppController())->getZeroedNumber($invoice->code,$invoice->revision),
                'date'              => $now_d,
                'time'              => $now_t,
                'invoice'           => $invoice,
                'total_in_words'    => $total_in_words
            ]);
            return $pdf->download("$filename.pdf");

        }else {
            if ((new AppController())->isApi($request)) {
                //API Response
                return response()->json(['message' => "Invoice not found"], 404);
            }else{


                //Web Response
                return Redirect::route('dashboard')->with('error','Invoice not found');
            }
        }
    }
}
