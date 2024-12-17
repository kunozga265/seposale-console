<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        *{
            font-family: 'Inter',sans-serif;
            font-size: 13px;
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

        table{
            /*margin: 12px 0;*/
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            /*text-align: right;*/
            vertical-align: top;
        }
        td,th{
            border: 1px solid;
            /*padding: 14px 6px;*/
            text-align: left;
            vertical-align: top;
        }

        .heading{
            font-family: 'Rubik', sans-serif;
            font-size: 14px;
            padding-bottom: 0px;
            margin-bottom: 0px;
            font-weight: bold;

        }


        .b-0{
            border: none;

        }

        tr td:first-child{
            text-align: left;
            /*width: 250px;*/
            /*background-color: chocolate;*/
        }

        .text-center{
            text-align: center;
        }

        table.details{
            /*background-color: #fafafa;*/
            margin-bottom: 24px;
        }

        #products{
            width: 100%;
            margin-bottom: 48px;
        }

        #products td{
            width: 50%;
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
        <div style="font-size: 25px; font-weight: normal; margin-top:0px">Receipt: <span style="color:red; font-size: 25px; font-weight: normal; ">#{{$code}}</span></div>
        <div>Sales Order:
            #LL{{(new \App\Http\Controllers\AppController())->getZeroedNumber($receipt->sale->code_alt)}}</div>


    </div>

    {{--<div style="text-align: center; font-size: 16px; font-weight: normal">Code: {{$receipt->code}}</div>--}}

<table >
    <tr>
        <td class="b-0">
            <table class="details">
                <tr >
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
                <tr >
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
    <table>



    </table>

    @if(isset($receipt->information))
    <table id="products">
{{--        <tr>--}}
{{--            <th>Product</th>--}}
{{--            <th>Amount</th>--}}
{{--        </tr>--}}
        <tr >
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
        <div style="background-color: black; padding: 12px; margin: 4px 0; color: white; font-size: 22px; font-weight: bold">
            MK{{number_format($receipt->amount,2)}}
        </div>
        <div class="font-bold" style="text-transform: capitalize">
            {{$total_in_words}} Only
        </div>
    </div>

    <div style="margin-top: 24px">
        <div>Accounts Department</div>
{{--        <div>Yours sincerely,</div>--}}
{{--        <div class="font-bold">{{$receipt->sale->user->fullName()}}</div>--}}
    </div>

    <div style="page-break-after: always"></div>
    <img style="width: 100%" src="{{storage_path()."/images/our-products.jpg"}}" alt="">

</div>


</body>
</html>
