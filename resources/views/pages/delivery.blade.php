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
    <div style="margin: 30px 0">
        <div style="float: right">
            <div
                style=" margin-left: 12px; padding:0; text-transform: capitalize">
                {{\Illuminate\Support\Carbon::createFromTimestamp($delivery->summary->sale->date,'Africa/Lusaka')->format('F j, Y')}}
            </div>
        </div>
        <div style="font-size: 25px; margin-top:12px">Delivery Note: <span
                style="color:red; font-size: 25px; font-weight: normal; ">#{{(new \App\Http\Controllers\AppController())->getZeroedNumber($delivery->code)}}</span>
        </div>
        <div>Sales Order:
            #LL{{(new \App\Http\Controllers\AppController())->getZeroedNumber($delivery->summary->sale->code_alt)}}</div>


    </div>

    {{--<div style="text-align: center; font-size: 16px; font-weight: normal">Code: {{$delivery->code}}</div>--}}

    <div class="heading">Customer Details</div>
    <table class="details">

        <tr>
            <td class="b-0">Name:</td>
            <td class="b-0">{{$delivery->summary->sale->client->name}}</td>
        </tr>
        @if(isset($delivery->summary->sale->client->phone_number))
            <tr>
                <td class="b-0">Phone Number:</td>
                <td class="b-0">{{$delivery->summary->sale->client->phone_number}}</td>
            </tr>
        @endif

        @if(isset($delivery->summary->sale->client->email))
            <tr>
                <td class="b-0">Email:</td>
                <td class="b-0" style="text-transform: lowercase">{{$delivery->summary->sale->client->email}}</td>
            </tr>
        @endif
        @if(isset($delivery->summary->sale->client->address))
            <tr>
                <td class="b-0">Address:</td>
                <td class="b-0">{{$delivery->summary->sale->client->address}}</td>
            </tr>
        @endif
        {{--        @if(isset($delivery->summary->sale->location))--}}
        {{--            <tr>--}}
        {{--                <td class="b-0">Site Location</td>--}}
        {{--                <td class="b-0">--}}
        {{--                    {{$delivery->summary->sale->location}}--}}
        {{--                </td>--}}
        {{--            </tr>--}}
        {{--        @endif--}}
        @if(isset($delivery->summary->sale->recipient_name))
            <tr>
                <td class="b-0">Contact Name:</td>
                <td>
                    {{$delivery->summary->sale->recipient_name}}
                </td>
            </tr>
        @endif
        @if(isset($delivery->summary->sale->recipient_profession))
            <tr>
                <td class="b-0">Contact Position:</td>
                <td>
                    {{$delivery->summary->sale->recipient_profession}}
                </td>
            </tr>
        @endif
        @if(isset($delivery->summary->sale->recipient_phone_number))
            <tr>
                <td class="b-0">Contact Phone Number:</td>
                <td>
                    {{$delivery->summary->sale->recipient_phone_number}}
                </td>
            </tr>
        @endif
    </table>

    <div class="heading"></div>

    <div style="float: right">
        <div style="font-weight: normal; font-size: 18px; text-align: right">
            {{$delivery->quantity_delivered}}/{{$delivery->summary->quantity}}
        </div>
        <div style="text-align: right">Quantity Delivered</div>
    </div>
    <div style="font-weight: normal; font-size: 18px">{{$delivery->summary->fullname()}}</div>
    @if(isset($delivery->summary->sale->location))
        <div> {{$delivery->summary->sale->location}}</div>
    @endif


    <table class="details">

        {{--        <tr>--}}
        {{--            <td class="b-0">Date</td>--}}
        {{--            <td class="b-0"--}}
        {{--                colspan="3">{{\Illuminate\Support\Carbon::createFromTimestamp($delivery->summary->sale->date,'Africa/Lusaka')->format('F j, Y')}}</td>--}}
        {{--        </tr>--}}
        {{--        <tr>--}}
        {{--            <td class="b-0">Tracking Number</td>--}}
        {{--            <td class="b-0"--}}
        {{--                colspan="3">{{$delivery->tracking_number}}</td>--}}
        {{--        </tr>--}}
        {{--        <tr>--}}
        {{--            <td class="b-0">Product</td>--}}
        {{--            <td class="b-0" colspan="3">{{$delivery->summary->fullname()}}</td>--}}
        {{--        </tr>--}}
        {{--        <tr>--}}
        {{--            <td class="b-0">Ordered</td>--}}
        {{--            <td class="b-0" colspan="3">{{$delivery->summary->quantity}}</td>--}}
        {{--        </tr>--}}
        {{--        <tr>--}}
        {{--            <td class="b-0">Delivered</td>--}}
        {{--            <td class="b-0" colspan="3">{{$delivery->quantity_delivered}}</td>--}}
        {{--        </tr>--}}

    </table>

    @if($delivery->notes !=  null)

        {{--        <p class="heading">Summary</p>--}}
        <table class="summary">
            <thead>
            <tr>
                <th class="shade">Date</th>
                <th class="shade" style="text-align: center">Quantity</th>
                <th class="shade" style="text-align: left">Received By</th>
                <th class="shade" style="text-align: left">Phone Number</th>
            </tr>
            </thead>
            <tbody>
            @foreach(json_decode($delivery->notes) as $note)
                <tr>
                    <td style="text-align: left">{{\Illuminate\Support\Carbon::createFromTimestamp($note->date,'Africa/Lusaka')->format('F j, Y')}}</td>
                    <td style="text-align: center">{{number_format($note->quantity,2)}}</td>
                    <td style="text-align: left">{{$note->recipientName}}</td>
                    <td style="text-align: left">{{$note->recipientPhoneNumber}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

</div>

@if($delivery->notes !=  null)
    @foreach(json_decode($delivery->notes) as $note)
        <div style="page-break-after: always"></div>
        <img style="width: 100%" src="{{public_path()."/".$note->photo}}" alt="">
    @endforeach
@endif


</body>
</html>
