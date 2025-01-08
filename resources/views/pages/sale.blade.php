<x-app-layout>

    <x-slot name="title">
        Sales Order #{{$sale->formattedCode()}} | {{$sale->client->name}}
    </x-slot>

    <div class="banner mt-24">

        <img class="md-show" style="width: 100%" src="{{asset("/images/banner.png")}}" alt="">

        <div class="md-hide" style="margin: 48px 0">
            <div class=" d-flex justify-content-between align-items-center">
                <img class="" style="height: 60px;" src="{{asset("/images/logo.png")}}" alt="">

                <div class="download">
                    <a href="{{route('sales.download', ['client_serial'=>$sale->client->serial, 'sale_serial' => $sale->serial])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="white" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>
                        </svg>
                    </a>
                </div>
                {{--                <a href="#">--}}
                {{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">--}}
                {{--                        <path d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>--}}
                {{--                    </svg>--}}
                {{--                </a>--}}
            </div>
        </div>
    </div>

    <div class="main-area">
        <div class="main-area-header">
            <div>
                <h4>Sales Order: <span>#{{$sale->formattedCode()}}</span></h4>
            </div>
            <div class="date">{{date('F j, Y',$sale->date)}}</div>
        </div>

        <p class="heading">Customer Details</p>
        <div class="details">
            <div class="row">
                <div class="col-12 col-md-3 md-show">Name:</div>
                <div class="col-12 col-md-9">{{$sale->client->name}}</div>
            </div>
            @if(isset($sale->client->phone_number))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Phone Number:</div>
                    <div class="col-12 col-md-9">{{$sale->client->phone_number}}</div>

                </div>
            @endif
            @if(isset($sale->client->email))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Email:</div>
                    <div class="col-12 col-md-9" style="text-transform: lowercase">{{$sale->client->email}}</div>
                </div>
            @endif
            @if(isset($sale->client->address))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Address:</div>
                    <div class="col-12 col-md-9">{{$sale->client->address}}</div>
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-md-3 md-show">Site Location:</div>
                <div class="col-12 col-md-9">{{$sale->location}}</div>
            </div>
                        @if(isset($sale->recipient_name))
                            <div class="row">

                                <div class="col-12 col-md-3 md-show">Contact Name:</div>
                                <div class="col-12 col-md-9">{{$sale->recipient_name}}</div>
                            </div>
                        @endif
                        @if(isset($sale->recipient_phone_number))
                            <div class="row">
                                <div class="col-12 col-md-3 md-show">Contact Number:</div>
                                <div class="col-12 col-md-9">{{$sale->recipient_phone_number}}</div>
                            </div>
                        @endif


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

        <div class="signature mt-36 mb-36">
            <div>Prepared By</div>
            <div class="font-bold">{{$sale->user->fullName()}}</div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 account-details">
                <div class="account-details-image">
                    <img src="{{asset("/images/nb.png")}}" alt="">
                </div>
                <div class="b-0">
                    <div class="bank-info">National Bank Account Number</div>
                    <div class="number">1008405545</div>
                    <div class="branch">Gateway Mall Branch</div>
                </div>
            </div>
            <div class="col-12 col-md-6 account-details">
                <div class="account-details-image">
                    <img src="{{asset("/images/std.png")}}" alt="">
                </div>
                <div class="b-0">
                    <div class="bank-info">Standard Bank Account Number</div>
                    <div class="number">9100006110794</div>
                    <div class="branch">Gateway Mall Branch</div>
                </div>
            </div>
        </div>


        <div class="md-show">
            <div class="mt-36 mb-36 download">
                <a href="{{route('sales.download', ['client_serial'=>$sale->client->serial, 'sale_serial' => $sale->serial])}}">
                    <span>Download</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="white" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="footer"></div>



</div>

</div>

</x-app-layout>
