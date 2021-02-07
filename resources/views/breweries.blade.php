<x-app>
    <x-slot name="title">Birrerie - </x-slot>
<div class="container-fluid">
    <div class="row my-4">
        @if(session('message'))
        <div class="col-12 col-md-7 mx-auto">
            <h2 class="text-center success-alert bg-result rounded-pill px-2 py-1">{{session('message')}}</h2>
        </div>
        @endif
    </div>
    {{-- Mappa --}}
    <div class="row mt-4 mb-5">
        <div class="col-12 col-lg-5 px-3 pl-lg-5 mb-5">
            <div id="map" class="shadow"
            ></div>
        </div>
        <div class="col-12 col-lg-7 mt-4">
            {{-- Birrerie --}}
            <div class="row px-3 pr-lg-5">
                @foreach ($breweries as $brewery)
                    <div class="cicle col-12 col-md-6 mb-4"
                    img="{{Storage::url($brewery->img)}}"
                    address="{{$brewery->address}}"
                    name="{{$brewery->name}}"
                    description="{{Str::limit($brewery->description, 60)}}"
                    lat="{{$brewery->lat}}"
                    lon="{{$brewery->lon}}"
                    link="{{route('show', ['id'=>$brewery->id, 'name'=>$brewery->name])}}"
                    >
                        <x-card
                        id="{{$brewery->id}}"
                        condition="{{$brewery->is_accepted}}"
                        img="{{Storage::url($brewery->img)}}"
                        route="{{route('approve', $brewery->id)}}"
                        address="{{$brewery->address}}"
                        name="{{$brewery->name}}"
                        description="{{Str::limit($brewery->description, 60)}}"
                        />
                    </div>
                @endforeach   
                <div class="col-12 mt-4 pl-5">
                    {{$breweries->render()}}       
                </div>
            </div>
        </div>
    </div>

</div>




</x-app>