<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{"RECEIPT#".$receipt->formattedCode()." - ".$receipt->client->name}}</title>

    <style>
        * {
            font-family: 'Inter', sans-serif;
            text-transform: none;
            font-size: 13px;
        }

        td, th {
            border: 1px solid;
            /*padding: 14px 6px;*/
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
            font-size: 13px;
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
            /*margin: 36px 0 0px;*/
            padding-bottom: 0px;
            margin-bottom: 0px;
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
            font-size: 25px;
            font-weight: normal;
            margin:0;
            padding:0;
        }
        .main-area-header .date{
            font-size: 13px;
            padding:0;
            text-transform: capitalize
        }
        .main-area-header h4 span{
            color:red;
            font-size: 25px;
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


        .text-center {
            text-align: center;
        }

        #products {
            width: 100%;
            margin-bottom: 48px;

        }

        #products td {
            width: 50%;
            font-size: 13px;
        }



    </style>
</head>
<body>

<div class="main-area">
    <div class="banner mt-24">

        <img class="" style="width: 100%" src="{{storage_path()."/images/banner.png"}}" alt="">
    </div>

    <div class="main-area-header">
        <div style="float: right"  class="date">{{date('F j, Y',$receipt->date)}}</div>
        <div>
            <h4>Receipt: <span>#{{$receipt->formattedCode()}}</span></h4>
            <div style="font-size: 13px">Sales Order:
                #LL{{$receipt->sale->formattedCode()}}</div>
        </div>

    </div>


    <table class="mb-24">
        <tr>
            <td class="b-0">
                <table class="details">
                    <tr>
                        <td class="b-0" colspan="2">
                            <div class="heading">Customer Details</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="b-0">Name:</td>
                        <td class="b-0">{{$receipt->client->name}}</td>
                    </tr>
                    <tr>
                        <td class="b-0">Phone Number:</td>
                        <td class="b-0">{{$receipt->client->phone_number}}</td>
                    </tr>
                    @if(isset($receipt->client->email))
                        <tr>
                            <td class="b-0">Email:</td>
                            <td class="b-0">{{$receipt->client->email}}</td>
                        </tr>
                    @endif
                    @if(isset($receipt->client->address))
                        <tr>
                            <td class="b-0">Address:</td>
                            <td class="b-0">{{$receipt->client->address}}</td>
                        </tr>
                        <tr>
                            <td class="b-0"></td>
                        </tr>
                    @endif
                </table>
            </td>
            <td class="b-0">
                <table class="details">
                    <tr>
                        <td class="b-0" colspan="2">
                            <div class="heading">Payment Details</div>
                        </td>
                    </tr>
                    {{--                <tr>--}}
                    {{--                    <td class="b-0">Sales Order:</td>--}}
                    {{--                    <td class="b-0">LL{{(new \App\Http\Controllers\AppController())->getZeroedNumber($receipt->sale->code_alt)}}--}}
                    {{--                        --}}{{--                ({{$receipt->sale->code}})--}}
                    {{--                    </td>--}}
                    {{--                </tr>--}}
                    <tr>
                        <td class="b-0">Method of Payment:</td>
                        <td class="b-0">{{$receipt->paymentMethod->name}}</td>
                    </tr>
                    @if($receipt->reference != "")
                        <tr>
                            <td class="b-0">Reference:</td>
                            <td class="b-0">{{$receipt->reference}}</td>
                        </tr>
                    @endif
                </table>
            </td>
        </tr>
    </table>


    @if(isset($receipt->information))
        <table id="products">
            {{--        <tr>--}}
            {{--            <th>Product</th>--}}
            {{--            <th>Amount</th>--}}
            {{--        </tr>--}}
            <tr>
                <td class="b-0" colspan="2">
                    <p class="heading">Products and Services</p>
                </td>
            </tr>

            @foreach(json_decode($receipt->information) as $info)
                <tr style="border-bottom: 1px solid black">
                    <td class="b-0">{{$info->name}}</td>
                    <td class="b-0">MK {{number_format($info->amount,2)}}</td>
                </tr>
            @endforeach
        </table>
    @endif

    <div class="text-center">
        <div>Amount Received:</div>
        <div
            style="background-color: black; padding: 12px; margin: 4px 0; color: white; font-size: 22px; font-weight: bold">
            MK{{number_format($receipt->amount,2)}}
        </div>
        <div class="font-bold" style="text-transform: capitalize">
            {{$receipt->totalInWords()}} Only
        </div>
    </div>

    <div style="margin-top: 24px;">
        <div>Accounts Department</div>
    </div>

</div>



</body>
</html>
