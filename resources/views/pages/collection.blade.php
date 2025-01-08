<x-app-layout>

    <x-slot name="title">
        Collection Receipt #{{$collection->formattedCode()}} | {{$collection->client->name}}
    </x-slot>


    <div class="banner mt-24">

        <img class="md-show" style="width: 100%" src="{{asset("/images/banner.png")}}" alt="">

        <div class="md-hide" style="margin: 48px 0">
            <div class=" d-flex justify-content-between align-items-center">
                <img class="" style="height: 60px;" src="{{asset("/images/logo.png")}}" alt="">

                @if($collection->photo != null)
                <div class="download">
                    <form
                        action="{{route('collections.download',['client_serial'=>$collection->client->serial, 'collection_serial' => $collection->serial])}}"
                        method="post">
                        @csrf

                        <button type="submit" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="white" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>
                            </svg>
                        </button>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>


    <div class="main-area">
        <div class="main-area-header">
            <div>
                <h4>Collection Receipt: <span>#{{$collection->formattedCode()}}</span></h4>
                <div>Sales Order:
                    #LL{{$collection->siteSaleSummary->sale->formattedCode()}}</div>
            </div>
            <div
                class="date">{{\Illuminate\Support\Carbon::createFromTimestamp($collection->date,'Africa/Lusaka')->format('F j, Y')}}</div>
        </div>


        <p class="heading">Customer Details</p>
        <div class="details">
            <div class="row">
                <div class="col-6 col-md-3">Name</div>
                <div class="col-6 col-md-9">: {{$collection->client->name}}</div>
            </div>
            @if(isset($collection->client->phone_number))
                <div class="row">
                    <div class="col-6 col-md-3">Phone Number</div>
                    <div class="col-6 col-md-9">: {{$collection->client->phone_number}}</div>

                </div>
            @endif
            @if(isset($collection->client->email))
                <div class="row">
                    <div class="col-6 col-md-3">Email</div>
                    <div class="col-6 col-md-9"
                         : style="text-transform: lowercase">{{$collection->client->email}}</div>
                </div>
            @endif
            @if(isset($collection->client->address))
                <div class="row">
                    <div class="col-6 col-md-3">Address</div>
                    <div class="col-6 col-md-9">: {{$collection->client->address}}</div>
                </div>
            @endif

            @if(isset($collection->summary->sale->recipient_name))
                <div class="row">

                    <div class="col-6 col-md-3">Contact Name</div>
                    <div class="col-6 col-md-9">: {{$collection->summary->sale->recipient_name}}</div>
                </div>
            @endif

        </div>

        <p class="heading">Collection Details</p>
        <div class="details">
            <div class="row">
                <div class="col-6 col-md-3">Product</div>
                <div class="col-6 col-md-9">: {{$collection->inventory->name}}</div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3">Collected By</div>
                <div class="col-6 col-md-9">: {{$collection->collectedBy()}}</div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3">Quantity Collected</div>
                <div class="col-6 col-md-9">: {{$collection->quantity}}</div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3">Quantity Remaining</div>
                <div class="col-6 col-md-9">: {{$collection->balance}}</div>
            </div>

        </div>


        @if($collection->photo != null)
            <div class="md-show">
                <div class="mt-36 mb-36 download">
                    <form
                        action="{{route('collections.download',['client_serial'=>$collection->client->serial, 'collection_serial' => $collection->serial])}}"
                        method="post">
                        @csrf

                        <button type="submit" class="btn">
                            <span>Download</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="white" d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @endif

        <div class="footer"></div>

    </div>


</x-app-layout>
