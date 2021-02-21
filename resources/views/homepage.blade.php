<x-app>
    <x-slot name="title">Home - </x-slot>
    {{-- Recenti --}}
    <section>
        <div class="container-fluid mt-4 px-4 px-md-5">
            <div class="row mb-4">
                <div class="col-12 section py-3 d-flex flex-wrap align-items-center justify-content-center">
                    <div class="section-badge mr-3 mb-2 mb-md-0 text-center"><span class="text-first h3">1</span></div>
                    <h2 class="mb-0 text-center">Cerca tra le birrerie consigliate dai nostri utenti o vai all'<a class="text-first text-decoration-none" href="{{route('breweries')}}">elenco completo</a></h2>
                </div>
            </div>
            <div class="row section mb-4">
                <div class="col-12 py-3 d-flex flex-wrap align-items-center justify-content-center">
                    <div class="section-badge mr-3 mb-2 mb-md-0 text-center"><span class="text-first h3">2</span></div>
                    <h2 class="mb-0 text-center">Guarda tra le novità</h2>
                </div>
                @foreach ($breweries->take(4) as $brewery)
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 px-3 mb-4">
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
            <div class="row mb-4 section">
                <div class="col-12 py-3 d-flex flex-wrap align-items-center justify-content-center">
                    <div class="section-badge mr-3 mb-2 mb-md-0 text-center"><span class="text-first h3">3</span></div>
                    <h2 class="mb-0 text-center">Naviga sulla mappa per trovare il locale più vicino a te</h2>
                </div>
                {{-- Mappa --}}
                @foreach ($breweries as $brewery)
                <div class="cicle d-none"
                    img="{{Storage::url($brewery->img)}}"
                    address="{{$brewery->address}}"
                    name="{{$brewery->name}}"
                    description="{{Str::limit($brewery->description, 60)}}"
                    lat="{{$brewery->lat}}"
                    lon="{{$brewery->lon}}"
                    link="{{route('show', ['id'=>$brewery->id, 'name'=>$brewery->name])}}"
                ></div> 
                @endforeach
                <div class="col-12 px-3 mb-4">
                    <div id="map" class="shadow"></div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid mt-5">
            <div class="row form-card bg-footer mt-4">
                <div class="col-12 py-3 d-flex flex-wrap align-items-center justify-content-center">
                    <div class="section-badge mr-3 mb-2 mb-md-0 text-center"><span class="text-first h3">4</span></div>
                    <h2 class="mb-0 text-center text-light">E non dimenticare di consigliare la tua birreria preferita</h2>
                </div>
                @if (session('message'))
                    <div class="col-12 col-md-7 mx-auto">
                        <h5 class="py-1 success-alert text-center px-2 mt-1">{{session('message')}}</h5>
                    </div>
                @endif
                {{-- Form segnalazione --}}
                <div class="col-12 col-md-7 mx-auto px-3 pt-4 pb-5 ">
                    <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-8 mb-0">
                            <input name="name" type="text" value="{{old('name')}}" class="form-custom px-4  @error('name') is-invalid @enderror" id="inputName" placeholder="Nome Birreria">
                          </div>
                          <div class="input-group col-4 mb-0">
                              <div class="custom-file">
                                <input type="file" name="img" value="{{old('img')}}" class="custom-file-input @error('img') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="file-custom text-light mb-0" for="inputGroupFile01">Carica una foto</label>
                              </div>
                          </div>
                          <div class="col-8 mt-1">
                            @error('name')
                                <div class="py-1 form-alert text-center px-0">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="col-4 mt-1">
                            @error('img')
                                <div class="py-1 form-alert text-center px-0">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-row mt-2">
                            <div id="search" class="form-group col-12 position-relative">   
                                <input id="address" name="address" type="text" value="{{old('address')}}" class="form-custom px-4  @error('name') is-invalid @enderror" id="inputName" placeholder="Indirizzo Birreria">
                                <button class="address-btn text-light" type="button" onclick="addr_search();">Cerca</button>
                                @error('address')
                                    <div class="py-1 form-alert text-center px-0 mt-1">{{$message}}</div>
                                @enderror
                                <div class="px-4 pb-4" id="results"></div>
                            </div>  
                            <div class="form-group col-6 d-none">
                                <input name="lat" type="text" value="{{old('lat')}}" class="form-custom px-4  @error('name') is-invalid @enderror" id="lat" placeholder="Latitudine">
                                @error('lat')
                                    <div class="py-1 form-alert text-center px-0">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6 d-none">
                                <input name="lon" type="text" value="{{old('lon')}}" class="form-custom px-4  @error('name') is-invalid @enderror" id="lon" placeholder="Longitudine">
                                @error('lon')
                                    <div class="py-1 form-alert text-center px-0">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="form-group col-12">
                                <textarea name="description" class="form-custom px-4 py-3 @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5" placeholder="Descrivi la tua birreria preferita">{{old('description')}}</textarea>
                                @error('description')
                                    <div class="py-1 form-alert text-center px-0">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-5">
                            <button type="submit" class="mx-auto btn btn-lg bg-first rounded-pill px-4 text-light">Aggiungi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script>
        let resultDiv = document.querySelector("#results")

        function chooseAddr(lat1, lng1, addr)
        {
            resultDiv.style.opacity = '0'
            resultDiv.style.zIndex = '-1'
            lat = lat1.toFixed(8);
            lon = lng1.toFixed(8);
            address = addr
            document.getElementById('address').value = address
            document.getElementById('lat').value = lat;
            document.getElementById('lon').value = lon;
        }
        
        function myFunction(arr)
        {
            var out = "<br />";
            var i;
            resultDiv.style.opacity = "1"
            resultDiv.style.zIndex = "1"
            
            if(arr.length > 0)
            {
                for(i = 0; i < arr.length; i++)
                {
                    out += `<div class='pointer' title='Show Location and Coordinates' onclick='chooseAddr(${[arr[i].lat, arr[i].lon]}, "${arr[i].display_name}")'> ${arr[i].display_name} </div>`;
                }
                resultDiv.innerHTML = out;
            }
            else
            {
                resultDiv.innerHTML = "Sorry, no results...";
            }
        }
        
        function addr_search()
        {
            var inp = document.getElementById("address");
            var xmlhttp = new XMLHttpRequest();
            var url = "https://nominatim.openstreetmap.org/search?format=json&limit=5&q=" + inp.value;
            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    var myArr = JSON.parse(this.responseText);
                    console.log(myArr)
                    myFunction(myArr);
                }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        
    </script>

</x-app>    