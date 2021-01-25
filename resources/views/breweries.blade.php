<x-app>
<div class="container-fluid">
    {{-- Mappa --}}
    <div class="row my-5">
        <div class="col-12 col-lg-5 px-3 pl-lg-5 mb-5">
            <div id="map" class="shadow"
            ></div>
        </div>
        <div class="col-12 col-lg-7">
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
            </div>
            <div class="row">
                {{$breweries->render()}}       
            </div>
        </div>
    </div>

</div>




</x-app>