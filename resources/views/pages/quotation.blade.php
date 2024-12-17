<x-app-layout>

    <x-slot name="title">
        Quotation
    </x-slot>


    <img class="md-show" style="width: 100%" src="{{asset("/images/banner.png")}}" alt="">
    <img class="md-hide" style="height: 80px; margin: 48px 0" src="{{asset("/images/logo.png")}}" alt="">
    <div class="main-area">
        <div class="main-area-header">
            <h4>Quotation: <span>#{{$code}}</span></h4>
            <div class="date">{{$date}}</div>
        </div>


        <p class="heading">Customer Details</p>
        <div class="details">
            <div class="row">
                <div class="col-12 col-md-3 md-show">Name:</div>
                <div class="col-12 col-md-9">{{$quotation->client->name}}</div>
            </div>
            @if(isset($quotation->client->phone_number))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Phone Number:</div>
                    <div class="col-12 col-md-9">{{$quotation->client->phone_number}}</div>

                </div>
            @endif
            @if(isset($quotation->client->email))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Email:</div>
                    <div class="col-12 col-md-9" style="text-transform: lowercase">{{$quotation->client->email}}</div>
                </div>
            @endif
            @if(isset($quotation->client->address))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Address:</div>
                    <div class="col-12 col-md-9">{{$quotation->client->address}}</div>
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-md-3 md-show">Site Location:</div>
                <div class="col-12 col-md-9">{{$quotation->location}}</div>
            </div>
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


        </div>

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

        <div class="mt-36 mb-36">
            <div>Prepared By</div>
            <div class="font-bold">{{$quotation->user->fullName()}}</div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 account-details">
                <div class="" style="width: 75px">
                    <img style="width: 60px" src="{{asset("/images/nb.png")}}" alt="">
                </div>
                <div class="b-0">
                    <div style="font-size: 14px">National Bank Account Number</div>
                    <div style="font-size: 28px; font-weight: normal">1008405545</div>
                    <div style="font-size: 16px">Gateway Mall Branch</div>
                </div>
            </div>
            <div class="col-12 col-md-6 account-details">
                <div class="b-0" style="width: 75px">
                    <img style="width: 60px" src="{{asset("/images/std.png")}}" alt="">
                </div>
                <div class="b-0">
                    <div style="font-size: 14px">Standard Bank Account Number</div>
                    <div style="font-size: 28px; font-weight: normal">9100006110794</div>
                    <div style="font-size: 16px">Gateway Mall Branch</div>
                </div>
            </div>
        </div>


    </div>


</x-app-layout>
