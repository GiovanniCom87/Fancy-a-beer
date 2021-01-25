<x-app>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="subtitle text-uppercase">{{$brewery->name}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5">
                <img class="img-fluid mx-auto curved-border" src="{{Storage::url($brewery->img)}}" alt="{{$brewery->img}}">
            </div>
            <div class="col-12 col-md-7">
                <p class="lead">{{$brewery->description}}</p>
                <p class="font-italic mt-4">{{$brewery->address}}</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12 px-3 ">
                <div id="map" class="cicle shadow"
                lat="{{$brewery->lat}}"
                lon="{{$brewery->lon}}"
                name="{{$brewery->name}}"
                description="{{Str::limit($brewery->description, 60)}}"
                address="{{$brewery->address}}"
                img="{{Storage::url($brewery->img)}}"
                >
                </div>
            </div>
        </div>
    </div>

</x-app>