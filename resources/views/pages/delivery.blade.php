<x-app-layout>

    <x-slot name="title">
        Delivery Note #{{$delivery->formattedCode()}} | {{$delivery->summary->sale->client->name}}
    </x-slot>



    <div class="banner mt-24">

        <img class="md-show" style="width: 100%" src="{{asset("/images/banner.png")}}" alt="">

        <div class="md-hide" style="margin: 48px 0">
            <div class=" d-flex justify-content-between align-items-center">
                <img class="" style="height: 60px;" src="{{asset("/images/logo.png")}}" alt="">

{{--                <div class="download">--}}
{{--                    <a href="{{route('deliveries.download', ['client_serial'=>$delivery->summary->sale->client->serial, 'delivery_serial' => $delivery->serial])}}">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">--}}
{{--                            <path fill="white" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                </div>--}}
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
                <h4>Delivery Note: <span>#{{$delivery->formattedCode()}}</span></h4>
                <div>Sales Order:
                    #LL{{$delivery->summary->sale->formattedCode()}}</div>
            </div>
            <div
                class="date">{{\Illuminate\Support\Carbon::createFromTimestamp($delivery->summary->sale->date,'Africa/Lusaka')->format('F j, Y')}}</div>
        </div>


        <p class="heading">Customer Details</p>
        <div class="details">
            <div class="row">
                <div class="col-12 col-md-3 md-show">Name:</div>
                <div class="col-12 col-md-9">{{$delivery->summary->sale->client->name}}</div>
            </div>
            @if(isset($delivery->summary->sale->client->phone_number))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Phone Number:</div>
                    <div class="col-12 col-md-9">{{$delivery->summary->sale->client->phone_number}}</div>

                </div>
            @endif
            @if(isset($delivery->summary->sale->client->email))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Email:</div>
                    <div class="col-12 col-md-9"
                         style="text-transform: lowercase">{{$delivery->summary->sale->client->email}}</div>
                </div>
            @endif
            @if(isset($delivery->summary->sale->client->address))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Address:</div>
                    <div class="col-12 col-md-9">{{$delivery->summary->sale->client->address}}</div>
                </div>
            @endif

            @if(isset($delivery->summary->sale->recipient_name))
                <div class="row">

                    <div class="col-12 col-md-3 md-show">Contact Name:</div>
                    <div class="col-12 col-md-9">{{$delivery->summary->sale->recipient_name}}</div>
                </div>
            @endif
            @if(isset($delivery->summary->sale->recipient_profession))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Contact Position:</div>
                    <div class="col-12 col-md-9">{{$delivery->summary->sale->recipient_profession}}</div>
                </div>
            @endif
            @if(isset($delivery->summary->sale->recipient_phone_number))
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Contact Phone Number:</div>
                    <div class="col-12 col-md-9">{{$delivery->summary->sale->recipient_phone_number}}</div>
                </div>
            @endif

            <div class="row">
                <div class="col-12 col-md-3 md-show">Site Location:</div>
                <div class="col-12 col-md-9">{{$delivery->summary->sale->location}}</div>
            </div>


        </div>

        <div class="row product-description">
            <div class="col-12 col-sm-6">
                <div class="title">{{$delivery->summary->fullname()}}</div>
                @if(isset($delivery->summary->sale->location))
                    <div class="subtitle"> {{$delivery->quantity_delivered}}/{{$delivery->summary->quantity}}</div>
                @endif
            </div>

        </div>

        @if($delivery->notes !=  null)
            <div class="overflow-scroll">
                <table class="summary">

                    <thead>
                    <tr>
                        <th class="shade">Date</th>
                        <th class="shade" style="text-align: center">Quantity</th>
                        <th class="shade" style="text-align: left">Received By</th>
                        <th class="shade" style="text-align: left">Phone Number</th>
                        <th class="shade" style="text-align: left">Physical File</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(json_decode($delivery->notes) as $note)
                        <tr>
                            <td style="text-align: left">{{\Illuminate\Support\Carbon::createFromTimestamp($note->date,'Africa/Lusaka')->format('F j, Y')}}</td>
                            <td style="text-align: center">{{number_format($note->quantity,2)}}</td>
                            <td style="text-align: left">{{$note->recipientName}}</td>
                            <td style="text-align: left">{{$note->recipientPhoneNumber}}</td>
                            <td style="text-align: left">

                                <form action="{{route('deliveries.download',['client_serial'=>$delivery->summary->sale->client->serial, 'delivery_serial' => $delivery->serial])}}" method="post">
                                    @csrf
                                    <input type="hidden" name="file_path" value="{{$note->photo}}">
                                    <button type="submit" class="btn btn-success">
                                        Download
                                    </button>
{{--                                    <button type="submit" class="btn btn-success md-hide">--}}
{{--                                        <svg viewBox="0 0 24 24">--}}
{{--                                            <path fill="white" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
                                </form>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif


{{--        <div class="md-show">--}}
{{--            <div class="mt-36 mb-36 download">--}}
{{--                <a href="{{route('deliveries.download', ['client_serial'=>$delivery->summary->sale->client->serial, 'delivery_serial' => $delivery->serial])}}">--}}
{{--                    <span>Download</span>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">--}}
{{--                        <path fill="white" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>--}}
{{--                    </svg>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="footer"></div>


    </div>







</x-app-layout>
