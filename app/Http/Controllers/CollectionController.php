<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CollectionController extends Controller
{
    public function show(Request $request, $client_serial, $collection_serial)
    {

        //check if collection model exists
        $collection = Collection::where("serial", $collection_serial)->first();

        //check if collection model exists
        if (is_object($collection)) {

            if ($collection->client->serial != $client_serial) {
                return Redirect::route('home')->with('error', 'Client profile does not exist');
            }

            return view('pages.collection', [
                'collection' => $collection,
            ]);


        } else {
            return Redirect::route('home')->with('error', 'Collection was not found');
        }


    }

    public function download(Request $request, $client_serial, $collection_serial)
    {
        //check if collection model exists
        $collection = Collection::where("serial", $collection_serial)->first();

        //check if collection model exists
        if (is_object($collection)) {

            if ($collection->client->serial != $client_serial) {
                return Redirect::route('home')->with('error', 'Client profile does not exist');
            }

            $filename = "COLLECTIONRECEIPT#" . $collection->formattedCode(). " - " . $collection->client->name . "-"."FILE."
                . $this->getExtension($collection->photo);

            $tempImage = tempnam(sys_get_temp_dir(), $filename);



//            dd($filename, $tempImage,env("APP_URL").$filename);

            copy(env("APP_URL").$collection->photo, $tempImage);

            return response()->download($tempImage, $filename);


        } else {
            return Redirect::route('home')->with('error', 'Collection was not found');
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
