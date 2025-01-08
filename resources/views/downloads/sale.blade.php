<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{"SALE#".$sale->formattedCode()." - ".$sale->client->name}}</title>

    <style>
        * {
            font-family: 'Inter', sans-serif;
            text-transform: none;
            /*font-size: 12px;*/
        }

        /*@font-face {*/
        /*    font-family: 'Exo Font';*/
        /*    font-weight: bold;*/
        /*    src: url(
        {{storage_path()."/fonts/Exo2-Bold.ttf"}} ) format("ttf");*/
        /*}*/

        /*@font-face {*/
        /*    font-family: 'Rubik';*/
        /*    font-weight: bold;*/
        /*    src: url(
        {{asset("/fonts/Rubik-Bold.ttf")}} ) format("ttf");*/
        /*}*/

        /*@font-face {*/
        /*    font-family: 'Inter';*/
        /*    font-weight: normal;*/
        /*    src: url(
        {{asset("/fonts/Inter-Regular.ttf")}} ) format("ttf");*/
        /*}*/

        /*@font-face {*/
        /*    font-family: 'Inter';*/
        /*    font-weight: bold;*/
        /*    src: url(
        {{asset("/fonts/Inter-Bold.ttf")}} ) format("ttf");*/
        /*}*/

        td, th {
            border: 1px solid;
            padding: 14px 6px;
            text-align: left;
        }

        table {
            /*margin: 12px 0;*/
            width: 100%;
            border-collapse: collapse;
            /*font-size: 14px;*/
        }

        table.details {
            margin-left: -6px;
            font-size: 12px;
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
            /*min-width: 120px;*/
            font-size: 12px;
        }

        table.summary tr td:first-child {
            min-width: 250px;
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
            /*font-family: 'Rubik', sans-serif;*/
            font-size: 14px;
            /*padding-bottom: 8px;*/
            font-weight: bold;
            margin: 24px 0 8px;
        }


        .b-0 {
            border: none;
        }

        .mt-24 {
            margin-top: 24px
        }

        .mt-36 {
            margin-top: 36px
        }

        .mt-48 {
            margin-top: 48px
        }

        .mb-24 {
            margin-bottom: 24px
        }

        .mb-36 {
            margin-bottom: 36px
        }

        .mb-48 {
            margin-bottom: 48px
        }

        .font-bold {
            font-weight: bold;
        }

        .container {
            max-width: 996px;
            padding: 20px 40px;
        }

        .card {
            background-color: white;
        }

        .banner svg {
            height: 32px;
            /*margin-right: 12px;*/
        }

        .main-area {
            padding: 0 20px;
        }

        .main-area-header {
            margin: 30px 0;
            display: block;
        }

        .main-area-header h4 {
            font-size: 25px;
            font-weight: normal;
            margin: 0;
            padding: 0;
        }

        .main-area-header .date {
            font-size: 12px;
            padding: 0;
            text-transform: capitalize
        }

        .main-area-header h4 span {
            color: red;
        }


        .account-details {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .account-details-image {
            width: 50px
        }

        .account-details-image img {
            width: 45px
        }

        .account-details .number {
            font-size: 20px;
            font-weight: normal
        }


        .account-details .bank-info {
            font-size: 11px;
        }

        .account-details .branch {
            font-size: 12px;
        }

        .signature {
            font-size: 12px;
        }

        .md-hide {
            display: block;
        }


        .md-show {
            display: none;
        }

        .footer {
            margin-bottom: 80px;
        }

        .download {
            /*margin: 36px auto;*/
            display: flex;
            justify-content: center;
        }

        .download a {
            text-decoration: none;
            padding: 12px 24px;
            background-color: #20ae50;
            color: white;

        }

        .download a svg {
            height: 24px;
            color: white;
        }

        @media (min-width: 768px) {
            .main-area-header {
                margin: 30px 0;
                display: block;
            }

            .main-area-header h4 {
                font-size: 32px;
            }

            .main-area-header .date {
                font-size: 16px;
            }

            .main-area-header h4 span {
                color: red;
            }

            .heading {
                font-size: 18px;
                margin: 36px 0 8px;
            }


            div.details {
                font-size: 16px;
            }

            table.summary td, table.summary th {
                font-size: 16px;
            }

            .account-details {
                display: flex;
                align-items: center;
                margin-bottom: 24px;
            }


            .md-hide {
                display: none;
            }

            .md-show {
                display: block;
            }

            .main-area-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
        }

        @media (min-width: 992px) {

        }

    </style>
</head>
<body>


<div class="main-area">
    <div class="banner mt-24">

        <img class="" style="width: 100%" src="{{storage_path()."/images/banner.png"}}" alt="">
    </div>

    <div class="main-area-header">
        <div style="float: right" class="date">{{date('F j, Y',$sale->date)}}</div>
        <h4>Sales Order: <span>#{{$sale->formattedCode()}}</span></h4>
    </div>


    <p class="heading" style="margin-bottom: 0">Customer Details</p>
    <table class="details">
        <tr>
            <td class="b-0">Name:</td>
            <td class="b-0">{{$sale->client->name}}</td>
        </tr>
        @if(isset($sale->client->phone_number))
            <tr>
                <td class="b-0">Phone Number:</td>
                <td class="b-0">{{$sale->client->phone_number}}</td>

            </tr>
        @endif
        @if(isset($sale->client->email))
            <tr>
                <td class="b-0">Email:</td>
                <td class="b-0" style="text-transform: lowercase">{{$sale->client->email}}</td>
            </tr>
        @endif
        @if(isset($sale->client->address))
            <tr>
                <td class="b-0">Address:</td>
                <td class="b-0">{{$sale->client->address}}</td>
            </tr>
        @endif
        <tr>
            <td class="b-0">Site Location:</td>
            <td class="b-0">{{$sale->location}}</td>
        </tr>
        @if(isset($sale->recipient_name))
            <tr>
                <td class="b-0">Contact Name:</td>
                <td class="b-0">{{$sale->recipient_name}}</td>
            </tr>
        @endif
        @if(isset($sale->recipient_phone_number))
            <tr>
                <td class="b-0">Contact Number:</td>
                <td class="b-0">{{$sale->recipient_phone_number}}</td>
            </tr>
        @endif


    </table>

    <p class="heading">Products and Services</p>
    <div class="overflow-scroll">
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
                    {{$sale->totalInWords()}} Only
                </td>
            </tr>
            </tbody>
        </table>
    </div>

{{--    <div class="signature mt-24">--}}
{{--        <div>Prepared By</div>--}}
{{--        <div class="font-bold">{{$sale->user->fullName()}}</div>--}}
{{--    </div>--}}

    <div class="account-details mt-24">
        <table>
            <tr>
                <td class="b-0 account-details-image">
                    <img src="{{storage_path()."/images/nb.png"}}" alt="">
                </td>
                <td class="b-0">
                    <div class="bank-info">National Bank Account Number</div>
                    <div class="number">1008405545</div>
                    <div class="branch">Gateway Mall Branch</div>
                </td>

                <td class="b-0 account-details-image">
                    <img src="{{storage_path()."/images/std.png"}}" alt="">
                </td>
                <td class="b-0">
                    <div class="bank-info">Standard Bank Account Number</div>
                    <div class="number">9100006110794</div>
                    <div class="branch">Gateway Mall Branch</div>
                </td>
            </tr>
        </table>

    </div>


</div>

</body>
</html>
