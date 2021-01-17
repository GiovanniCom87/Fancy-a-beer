<x-app>
<div class="container-fluid">
    {{-- Mappa --}}
    <div class="row my-5">
        <div class="col-12 col-md-5 px-3 pl-md-5 mb-5">
            <div id="map" class="shadow"></div>
        </div>
        <div class="col-12 col-md-7">
            {{-- Birrerie --}}
            <div class="row px-3 pr-md-5">
                @foreach ($breweries as $brewery)
                <div class="col-12 col-md-6 px-3 mb-4">
                    <div class="card-cs shadow">
                        <img class="shadow" src="{{Storage::url($brewery->img)}}" alt="{{$brewery->name}}">
                        @if ($brewery->is_accepted == false)
                            <form action="{{route('approve', $brewery->id)}}" method="POST">
                                @csrf
                                <button class="btn"><i class="fas fa-check-circle fa-2x text-light"></i></button>
                            </form>
                        @endif
                        <h3 class="px-2 text-light">{{$brewery->name}}</h3>
                        <p class="px-2 text-light lead">{{$brewery->address}}</p>
                    </div>
                </div>
                @endforeach          
            </div>
        </div>
    </div>

</div>


</x-app>