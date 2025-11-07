<x-app-layout>

    <x-slot name="title">
        Supplier Voucher #{{$supplier_voucher->formattedCode()}} | {{$supplier_voucher->contact->name}}
    </x-slot>
    <div class="banner mt-24">

        <img class="md-show" style="width: 100%" src="{{asset("/images/banner.png")}}" alt="">

        <div class="md-hide" style="margin: 48px 0">
            <div class=" d-flex justify-content-between align-items-center">
                <img class="" style="height: 60px;" src="{{asset("/images/logo.png")}}" alt="">

                <div class="download">
                    <a href="{{route('supplier-vouchers.download', ['serial'=>$supplier_voucher->contact->serial, 'supplier_voucher_serial' => $supplier_voucher->serial])}}">
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
                <h4>Supplier Voucher: <span>#{{$supplier_voucher->formattedCode()}}</span></h4>
               
            </div>
            <div class="date">{{date('F j, Y',$supplier_voucher->date)}}</div>
        </div>


        <p class="heading">General Details</p>
        <div class="details">
            <div class="row">
                <div class="col-12 col-md-3 md-show">Name:</div>
                <div class="col-12 col-md-9">{{$supplier_voucher->contact->name}}</div>
            </div>
            @if($supplier_voucher->contact->phone_number != null)
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Phone Number:</div>
                    <div class="col-12 col-md-9">{{$supplier_voucher->contact->phone_number}}</div>

                </div>
            @endif
            @if($supplier_voucher->contact->email != null)
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Email:</div>
                    <div class="col-12 col-md-9" style="text-transform: lowercase">{{$supplier_voucher->contact->email}}</div>
                </div>
            @endif
            @if($supplier_voucher->contact->address != null)
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Address:</div>
                    <div class="col-12 col-md-9">{{$supplier_voucher->contact->address}}</div>
                </div>
            @endif
            @if($supplier_voucher->contact->location != null)
                <div class="row">
                    <div class="col-12 col-md-3 md-show">Rank Location:</div>
                    <div class="col-12 col-md-9">{{$supplier_voucher->contact->location}}</div>
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-md-3 md-show">Site:</div>
                <div class="col-12 col-md-9">{{$supplier_voucher->site?->name}}</div>
            </div>
            {{--            @if(isset($supplier_voucher->recipient_name))--}}
            {{--                <div class="row">--}}

            {{--                    <div class="col-12 col-md-3 md-show">Contact Name:</div>--}}
            {{--                    <div class="col-12 col-md-9">{{$supplier_voucher->recipient_name}}</div>--}}
            {{--                </div>--}}
            {{--            @endif--}}
            {{--            @if(isset($supplier_voucher->recipient_phone_number))--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-12 col-md-3 md-show">Contact Number:</div>--}}
            {{--                    <div class="col-12 col-md-9">{{$supplier_voucher->recipient_phone_number}}</div>--}}
            {{--                </div>--}}
            {{--            @endif--}}


        </div>

        <p class="heading">Summary</p>
        <div class="overflow-scroll">
            <table class="summary">

                <thead>
                <tr>
                    <th class="shade">Details</th>
                    <th class="shade" style="text-align: right">Amount</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-transform: none">{{$supplier_voucher->details}}</td>
                        <td style="text-align: right">{{number_format($supplier_voucher->amount,2)}}</td>
                    </tr>
                <tr>
                    <td colspan="2" class="total-in-words">
                        {{$supplier_voucher->totalInWords()}} Only
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="md-show">
            <div class="mt-36 mb-36 download">
                <a href="{{route('supplier-vouchers.download', ['serial'=>$supplier_voucher->contact->serial, 'supplier_voucher_serial' => $supplier_voucher->serial])}}">
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
