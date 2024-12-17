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
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
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

        table.summary .total td {
            font-weight: bold;
            text-align: right;
        }

        table.summary .total-in-words {
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
    <div style="margin: 30px 0 0">
        <div style="float: right">
            <div
                style=" margin-left: 12px; padding:0; text-transform: capitalize">
                {{$date}}
            </div>
        </div>
        <div style="font-size: 25px; font-weight: normal; margin-top:0px">Sales Order:
            <span
                style="color:red; font-size: 25px; font-weight: normal; ">#{{$code}}</span>
        </div>

    </div>

    {{--<div style="text-align: center; font-size: 16px; font-weight: normal">Code: {{$sale->code}}</div>--}}

    {{--    <table >--}}

    {{--        <tr>--}}
    {{--            <td class="b-0" style="vertical-align: top;">--}}
    <p class="heading" style="margin-bottom: 0">Customer Details</p>
    <table class="details">

        <tr>
            <td class="b-0">Name:</td>
            <td class="b-0"> {{$sale->client->name}}</td>
        </tr>
        @if(isset($sale->client->phone_number))
            <tr>
                <td class="b-0">Phone Number:</td>
                <td class="b-0"> {{$sale->client->phone_number}}</td>
            </tr>
        @endif
        @if(isset($sale->client->email))
            <tr>
                <td class="b-0">Email:</td>
                <td class="b-0"> {{$sale->client->email}}</td>
            </tr>
        @endif
        @if(isset($sale->client->address))
            <tr>
                <td class="b-0">Address:</td>
                <td class="b-0"> {{$sale->client->address}}</td>
            </tr>
        @endif
    </table>
    {{--            </td>--}}
    {{--            <td class="b-0" style="vertical-align: top;">--}}

    @if(isset($sale->recipient_name) || isset($sale->recipient_phone_number) || isset($sale->location))
    <p class="heading"
       style="margin-bottom: 0; ">Delivery Details</p>
    <table class="details">
        @if(isset($sale->recipient_name))
            <tr>
                <td class="b-0">Contact Name:</td>
                <td style="text-align: left">
                    {{$sale->recipient_name}}
                </td>
            </tr>
        @endif
        {{--                    @if(isset($sale->recipient_profession))--}}
        {{--                        <tr>--}}
        {{--                              <td class="b-0">Address:</td>--}}
        {{--                            <td style="text-align: left">--}}
        {{--                                {{$sale->recipient_profession}}--}}
        {{--                            </td>--}}
        {{--                        </tr>--}}
        {{--                    @endif--}}
        @if(isset($sale->recipient_phone_number))
            <tr>
                <td class="b-0">Phone Number:</td>
                <td style="text-align: left">
                    {{$sale->recipient_phone_number}}
                </td>
            </tr>
        @endif
        @if(isset($sale->location))
            <tr>
                <td class="b-0">Location:</td>
                <td style="text-align: left">
                    {{$sale->location}}
                </td>
            </tr>
        @endif
    </table>
        @endif
    {{--            </td>--}}
    {{--        </tr>--}}
    {{--    </table>--}}

    <div class="heading">Products and Services</div>
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
        @foreach($sale->products as $productCompound)
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
            <td>{{number_format($sale->total,2)}}</td>
        </tr>
        <tr>
            <td colspan="5" class="total-in-words">
                {{$total_in_words}} Only
            </td>
        </tr>
        </tbody>
    </table>

    <table style="margin-top:30px">
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

{{--<div style="padding:0 20px; position: absolute; bottom: 0">--}}
{{--    <img style="width: 100%;" src="{{storage_path()."/images/cover.jpg"}}" alt="">--}}
{{--</div>--}}


</body>
</html>
