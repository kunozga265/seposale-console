<x-app-layout>

    <x-slot name="title">
        Receipt #{{$receipt->formattedCode()}} | {{$receipt->client->name}}
    </x-slot>
    <div class="banner mt-24">

        <img class="md-show" style="width: 100%" src="{{asset("/images/banner.png")}}" alt="">

        <div class="md-hide" style="margin: 48px 0">
            <div class=" d-flex justify-content-between align-items-center">
                <img class="" style="height: 60px;" src="{{asset("/images/logo.png")}}" alt="">

                <div class="download">
                    <a href="{{route('receipts.download', ['client_serial'=>$receipt->client->serial, 'receipt_serial' => $receipt->serial])}}">
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
                <h4>Receipt: <span>#{{$receipt->formattedCode()}}</span></h4>
                <div>Sales Order:
                    #LL{{$receipt->sale->formattedCode()}}</div>
            </div>
            <div class="date">{{date('F j, Y',$receipt->date)}}</div>
        </div>


        <div class="row">
            <div class="col-12 col-md-6">
                <p class="heading">Customer Details</p>
                <div class="details">
                    <div class="row">
                        <div class="col-6 col-md-6 md-sho">Name:</div>
                        <div class="col-6 col-md-6">{{$receipt->client->name}}</div>
                    </div>
                    @if(isset($receipt->client->phone_number))
                        <div class="row">
                            <div class="col-6 col-md-6 md-sho">Phone Number:</div>
                            <div class="col-6 col-md-6">{{$receipt->client->phone_number}}</div>

                        </div>
                    @endif
                    @if(isset($receipt->client->email))
                        <div class="row">
                            <div class="col-6 col-md-6 md-sho">Email:</div>
                            <div class="col-6 col-md-6" style="text-transform: lowercase">{{$receipt->client->email}}</div>
                        </div>
                    @endif
                    @if(isset($receipt->client->address))
                        <div class="row">
                            <div class="col-6 col-md-6 md-sho">Address:</div>
                            <div class="col-6 col-md-6">{{$receipt->client->address}}</div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6">
                <p class="heading">Payment Details</p>
                <div class="details">
                    <div class="row">
                        <div class="col-6 col-md-6 md-sho">Method of Payment:</div>
                        <div class="col-6 col-md-6">{{$receipt->paymentMethod->name}}</div>
                    </div>
                    @if($receipt->reference != "")
                        <div class="row">
                            <div class="col-6 col-md-6 md-sho">Reference:</div>
                            <div class="col-6 col-md-6">{{$receipt->reference}}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if(isset($receipt->information))
            <div id="products">
                <p class="heading">Products and Services</p>

                @foreach(json_decode($receipt->information) as $info)
                    <div class="info row">
                        <div class="col-6 col-sm-6">{{$info->name}}</div>
                        <div class="col-6 col-sm-6">MK {{number_format($info->amount,2)}}</div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-48 signature text-center">
            <div>Amount Received:</div>
            <div
                style="background-color: black; padding: 12px; margin: 4px 0; color: white; font-size: 22px; font-weight: bold">
                MK{{number_format($receipt->amount,2)}}
            </div>
            <div class="font-bold" style="text-transform: capitalize">
                {{$receipt->totalInWords()}} Only
            </div>
        </div>


        <div class="signature mt-36 mb-36">
            <div>Accounts Department</div>

        </div>



        <div class="md-show">
            <div class="mt-36 mb-36 download">
                <a href="{{route('receipts.download', ['client_serial'=>$receipt->client->serial, 'receipt_serial' => $receipt->serial])}}">
                    <span>Download</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="white" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="footer"></div>


    </div>


</x-app-layout>
