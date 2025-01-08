<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Delivery;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    public function show(Request $request, $client_serial, $delivery_serial)
    {

        //check if delivery model exists
        $delivery = Delivery::where("serial", $delivery_serial)->first();

        //check if delivery model exists
        if (is_object($delivery)) {

            if ($delivery->summary->sale->client->serial != $client_serial) {
                return Redirect::route('home')->with('error', 'Client profile does not exist');
            }

            return view('pages.delivery', [
                'delivery' => $delivery,
            ]);


        } else {
            return Redirect::route('home')->with('error', 'Delivery was not found');
        }


    }

    public function download(Request $request, $client_serial, $delivery_serial)
    {
        //check if delivery model exists
        $delivery = Delivery::where("serial", $delivery_serial)->first();

        //check if delivery model exists
        if (is_object($delivery)) {

            if ($delivery->summary->sale->client->serial != $client_serial) {
                return Redirect::route('home')->with('error', 'Client profile does not exist');
            }

            $request->validate([
                "file_path" => 'required'
            ]);

            $filename = "DELIVERYNOTE#" . $delivery->formattedCode(). " - " . $delivery->summary->sale->client->name . "-"."FILE."
                . $this->getExtension($request->file_path);

            $tempImage = tempnam(sys_get_temp_dir(), $filename);



//            dd($filename, $tempImage,env("APP_URL").$filename);

            copy(env("APP_URL").$request->file_path, $tempImage);

            return response()->download($tempImage, $filename);


        } else {
            return Redirect::route('home')->with('error', 'Delivery was not found');
        }
    }

    private function getExtension($image)
    {
        $imageExtension = explode('.', $image);
        $lowercaseExt = strtolower($imageExtension[1]);
        if ($lowercaseExt == 'jpeg')
            return 'jpg';
        else
            return $lowercaseExt;
    }
}
