<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            font-family: 'Inter', sans-serif;
            text-transform: none;
            font-size: 12px;
        }

        @font-face {
            font-family: 'Exo Font';
            font-weight: bold;
            src: url({{storage_path()."/fonts/Exo2-Bold.ttf"}}) format("ttf");
        }

        @font-face {
            font-family: 'Rubik';
            font-weight: bold;
            src: url({{storage_path("/fonts/Rubik-Bold.ttf")}}) format("ttf");
        }

        @font-face {
            font-family: 'Inter';
            font-weight: normal;
            src: url({{storage_path("/fonts/Inter-Regular.ttf")}}) format("ttf");
        }

        @font-face {
            font-family: 'Inter';
            font-weight: bold;
            src: url({{storage_path("/fonts/Inter-Bold.ttf")}}) format("ttf");
        }

        td, th {
            border: 1px solid;
            padding: 14px 6px;
            text-align: left;
        }

        table {
            margin: 12px 0;
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table.details {
            margin-left: -6px;
        }
        table.details td {
            padding: 2px 8px;
            border: none;
        }

        table.details tr td:first-child {
            width: 150px;
            margin-left: -6px;
        }

        table.details tr:nth-child(odd) {
            /*background-color: #f2f2f2;*/
        }

        table.summary td, table.summary th {
            border: 1px solid;
            padding: 8px;
            text-align: left;
        }

        table.summary th {
            background-color: rgb(217, 217, 217);
            text-transform: none;
        }

        table.summary .total td{
            font-weight: bold;
            text-align: right;
        }
        table.summary .total-in-words{
            font-weight: bold;
            text-align: center;
            text-transform: capitalize;
        }

        .heading {
            font-family: 'Rubik', sans-serif;
            font-size: 14px;
            /*padding-bottom: 8px;*/
            font-weight: bold;
            margin: 24px 0 8px;
        }

        .b-0 {
            border: none;
        }

        .font-bold {
            font-weight: bold;
        }

    </style>
</head>
<body>
{{--<p style="text-align: right; font-size: 12px">Generated on {{$date}} at {{$time}}</p>--}}
<img style="width: 100%" src="{{storage_path()."/images/banner.png"}}" alt="">
<div style="padding: 0 20px">
    <div style="margin: 30px 0">
        <div style="float: right">
            <div
                style=" margin-left: 12px; padding:0; text-transform: capitalize">
                {{$date}}
            </div>
        </div>
        <div style="font-size: 25px; font-weight: normal; margin-top:0px">Invoice: <span
                style="color:red; font-size: 25px; font-weight: normal; ">#{{$code}}</span></div>
        <div>Sales Order:
            #LL{{(new \App\Http\Controllers\AppController())->getZeroedNumber($invoice->sale->code_alt)}}</div>


    </div>

    {{--<div style="text-align: center; font-size: 16px; font-weight: normal">Code: {{$invoice->code}}</div>--}}

    <p class="heading">Customer Details</p>
    <table class="details">

        <tr>
            <td class="">Name:</td>
            <td class="" colspan="3">{{$invoice->client->name}}</td>
        </tr>
        @if(isset($invoice->client->phone_number))
            <tr>
                <td class="">Phone Number:</td>
                <td class="">{{$invoice->client->phone_number}}</td>

            </tr>
        @endif
        @if(isset($invoice->client->email))
            <tr>
                <td class="">Email:</td>
                <td class="" style="text-transform: lowercase">{{$invoice->client->email}}</td>
            </tr>
        @endif
        @if(isset($invoice->client->address))
            <tr>
                <td class="">Address:</td>
                <td class="">{{$invoice->client->address}}</td>
            </tr>
        @endif
        <tr>
            <td class="">Site Location:</td>
            <td class="">{{$invoice->sale->location}}</td>
        </tr>

    </table>

    <p class="heading">Products and Services</p>
    <table class="summary">
        <thead>
        <tr>
            <th class="shade">Details</th>
            <th class="shade" style="text-align: center">Units</th>
            <th class="shade" style="text-align: center">Quantity</th>
            <th class="shade" style="text-align: right">Unit Cost</th>
            <th class="shade" style="text-align: right">Total Cost</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoice->sale->products as $productCompound)
            <tr>
                <td style="text-transform: none">{{$productCompound->description}}</td>
                <td style="text-align: center">{{$productCompound->units}}</td>
                <td style="text-align: center">{{number_format($productCompound->quantity,2)}}</td>
                <td style="text-align: right">{{number_format($productCompound->amount/$productCompound->quantity,2)}}</td>
                <td style="text-align: right">{{number_format($productCompound->amount,2)}}</td>
            </tr>
        @endforeach
        <tr class="total">
            <td colspan="4">Total</td>
            <td>{{number_format($invoice->sale->total,2)}}</td>
        </tr>
        <tr>
            <td colspan="5" class="total-in-words">
                {{$total_in_words}} Only
            </td>
        </tr>
        </tbody>
    </table>

    <div style="margin-top: 24px">
        <div>Prepared By</div>
        <div class="font-bold">{{$invoice->sale->user->fullName()}}</div>
    </div>

    <table>
        <tr class="">
            <td class="b-0" style="width: 45px">
                <img style="width: 40px" src="{{storage_path()."/images/nb.png"}}" alt="">
            </td>
            <td class="b-0">
                <div style="font-size: 10px">National Bank Account Number</div>
                <div style="font-size: 20px; font-weight: normal">1008405545</div>
                <div style="font-size: 12px">Gateway Mall Branch</div>
            </td>
            <td class="b-0" style="width: 45px">
                <img style="width: 40px" src="{{storage_path()."/images/std.png"}}" alt="">
            </td>
            <td class="b-0">
                <div style="font-size: 10px">Standard Bank Account Number</div>
                <div style="font-size: 20px; font-weight: normal">9100006110794</div>
                <div style="font-size: 12px">Gateway Mall Branch</div>
            </td>
        </tr>
    </table>


</div>

<div style="page-break-after: always"></div>
<img style="width: 100%" src="{{storage_path()."/images/our-products.jpg"}}" alt="">


</body>
</html>
