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
            /*font-size: 12px;*/
        }

        /*@font-face {*/
        /*    font-family: 'Exo Font';*/
        /*    font-weight: bold;*/
        /*    src: url({{storage_path()."/fonts/Exo2-Bold.ttf"}}) format("ttf");*/
        /*}*/

        /*@font-face {*/
        /*    font-family: 'Rubik';*/
        /*    font-weight: bold;*/
        /*    src: url({{asset("/fonts/Rubik-Bold.ttf")}}) format("ttf");*/
        /*}*/

        /*@font-face {*/
        /*    font-family: 'Inter';*/
        /*    font-weight: normal;*/
        /*    src: url({{asset("/fonts/Inter-Regular.ttf")}}) format("ttf");*/
        /*}*/

        /*@font-face {*/
        /*    font-family: 'Inter';*/
        /*    font-weight: bold;*/
        /*    src: url({{asset("/fonts/Inter-Bold.ttf")}}) format("ttf");*/
        /*}*/

        td, th {
            border: 1px solid;
            padding: 14px 6px;
            text-align: left;
        }

        table {
            margin: 12px 0;
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
            margin: 36px 0 0px;
        }


        .b-0 {
            border: none;
        }

        .mt-24{
            margin-top: 24px
        }

        .mt-36{
            margin-top: 36px
        }

        .mt-48{
            margin-top: 48px
        }

        .mb-24{
            margin-bottom: 24px
        }

        .mb-36{
            margin-bottom: 36px
        }

        .mb-48{
            margin-bottom: 48px
        }

        .font-bold {
            font-weight: bold;
        }

        .shadow-xl {
            --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / .1), 0 8px 10px -6px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .container{
            max-width: 996px;
            padding: 20px 40px;
        }

        .card{
            background-color: white;
        }

        .banner svg{
            height: 32px;
            /*margin-right: 12px;*/
        }

        .main-area{
            padding: 0 20px;
        }
        .main-area-header{
            margin: 30px 0;
            display: block;
        }
        .main-area-header h4{
            font-size: 28px;
            font-weight: normal;
            margin:0;
            padding:0;
        }
        .main-area-header .date{
            font-size: 12px;
            padding:0;
            text-transform: capitalize
        }
        .main-area-header h4 span{
            color:red;
        }


        .account-details{
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .account-details-image{
            width: 50px
        }

        .account-details-image img{
            width: 45px
        }
        .account-details .number{
            font-size: 20px;
            font-weight: normal
        }



        .account-details .bank-info{
            font-size: 11px;
        }

        .account-details .branch{
            font-size: 12px;
        }

        .signature{
            font-size: 12px;
        }

        .md-hide{
            display: block;
        }


        .md-show{
            display: none;
        }

        .footer{
            margin-bottom: 80px;
        }

        .download{
            /*margin: 36px auto;*/
            display: flex;
            justify-content: center;
        }
        .download a{
            text-decoration: none;
            padding: 12px 24px;
            background-color: #20ae50;
            color: white;

        }

        .download a svg{
            height: 24px;
            color: white;
        }

        @media (min-width: 768px) {
            .main-area-header{
                margin: 30px 0;
                display: block;
            }
            .main-area-header h4{
                font-size: 32px;
            }
            .main-area-header .date{
                font-size: 16px;
            }
            .main-area-header h4 span{
                color:red;
            }

            .heading {
                font-size: 18px;
                margin: 36px 0 8px;
            }


            div.details{
                font-size: 16px;
            }

            table.summary td, table.summary th {
                font-size: 16px;
            }

            .account-details{
                display: flex;
                align-items: center;
                margin-bottom: 24px;
            }



            .md-hide{
                display: none;
            }
            .md-show{
                display: block;
            }
            .main-area-header{
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
        <div style="float: right" class="date">{{$date}}</div>
        <h4>Quotation: <span>#{{$code}}</span></h4>
    </div>


    <p class="heading">Customer Details</p>
    <table class="details">
        <tr>
            <td class="b-0">Name:</td>
            <td class="b-0">{{$quotation->client->name}}</td>
        </tr>
        @if(isset($quotation->client->phone_number))
            <tr>
                <td class="b-0">Phone Number:</td>
                <td class="b-0">{{$quotation->client->phone_number}}</td>

            </tr>
        @endif
        @if(isset($quotation->client->email))
            <tr>
                <td class="b-0">Email:</td>
                <td class="b-0" style="text-transform: lowercase">{{$quotation->client->email}}</td>
            </tr>
        @endif
        @if(isset($quotation->client->address))
            <tr>
                <td class="b-0">Address:</td>
                <td class="b-0">{{$quotation->client->address}}</td>
            </tr>
        @endif
        <tr>
            <td class="b-0">Site Location:</td>
            <td class="b-0">{{$quotation->location}}</td>
        </tr>
        {{--            @if(isset($quotation->recipient_name))--}}
        {{--                <div class="row">--}}

        {{--                    <div class="col-12 col-md-3 md-show">Contact Name:</div>--}}
        {{--                    <div class="col-12 col-md-9">{{$quotation->recipient_name}}</div>--}}
        {{--                </div>--}}
        {{--            @endif--}}
        {{--            @if(isset($quotation->recipient_phone_number))--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-12 col-md-3 md-show">Contact Number:</div>--}}
        {{--                    <div class="col-12 col-md-9">{{$quotation->recipient_phone_number}}</div>--}}
        {{--                </div>--}}
        {{--            @endif--}}


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
            @foreach(json_decode($quotation->information) as $info)
                <tr>
                    <td style="text-transform: none">{{$info->details}}</td>
                    <td style="text-align: center">{{$info->units ?? ""}}</td>
                    <td style="text-align: center">{{number_format($info->quantity,2)}}</td>
                    <td style="text-align: right">{{number_format($info->unitCost,2)}}</td>
                    <td style="text-align: right">{{number_format($info->totalCost,2)}}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td colspan="4">Total</td>
                <td>{{number_format($quotation->total,2)}}</td>
            </tr>
            <tr>
                <td colspan="5" class="total-in-words">
                    {{$total_in_words}} Only
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="signature mt-24">
        <div>Prepared By</div>
        <div class="font-bold">{{$quotation->user->fullName()}}</div>
    </div>

    <div class="account-details">
    <table >
        <tr >
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
