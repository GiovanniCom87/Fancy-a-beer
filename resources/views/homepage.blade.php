<x-app>
    <x-slot name="title">Home - </x-slot>
    {{-- Recenti --}}
    <section>
        <div class="container-fluid mt-4">
            <div class="row mb-3 py-4 px-5">
                <div class="col-12">
                    <h4 class="text-uppercase font-weight-bold subtitle">Recenti</h4>
                </div>
            </div>
            <div class="row px-3 px-md-5">
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
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="row mt-4">
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
                <div class="col-12 col-md-5 px-3 my-4">
                    <div id="map" class="shadow"></div>
                </div>
                {{-- Form segnalazione --}}
                <div class="col-12 col-md-7 form-card px-3 py-5 ">
                    <div>
                        <h2 class="text-light text-center mb-5">Suggerisci la tua birreria preferita</h2>
                    </div>
                    <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-12">
                            <input name="name" type="text" value="{{old('name')}}" class="form-custom px-4  @error('name') is-invalid @enderror" id="inputName" placeholder="Nome Birreria">
                            @error('name')
                                <div class="alert alert-danger py-1">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-row mt-3 px-1">
                            <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="img" value="{{old('img')}}" class="custom-file-input @error('img') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                  <label class="file-custom text-light" for="inputGroupFile01">Carica una foto</label>
                                </div>
                            </div>
                        </div>
                        @error('img')
                            <div class="alert alert-danger py-1 px-2">{{$message}}</div>
                        @enderror
                        <div class="form-row mt-4">
                          <div class="form-group col-12">
                            <textarea name="description" class="form-custom px-4 py-3 @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5" placeholder="Descrivi la tua birreria preferita">{{old('description')}}</textarea>
                            @error('description')
                                <div class="alert alert-danger py-1">{{$message}}</div>
                            @enderror
                          </div>
                          
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <input name="address" type="text" value="{{old('address')}}" class="form-custom px-4  @error('name') is-invalid @enderror" id="inputName" placeholder="Indirizzo Birreria">
                                @error('address')
                                    <div class="alert alert-danger py-1">{{$message}}</div>
                                @enderror
                              </div>
                            <div class="form-group col-6">
                                <input name="lat" type="text" value="{{old('lat')}}" class="form-custom px-4  @error('name') is-invalid @enderror" id="lat" placeholder="Latitudine">
                                @error('lat')
                                    <div class="alert alert-danger py-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <input name="lon" type="text" value="{{old('lon')}}" class="form-custom px-4  @error('name') is-invalid @enderror" id="lon" placeholder="Longitudine">
                                @error('lon')
                                    <div class="alert alert-danger py-1">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-4">
                            <button type="submit" class="mx-auto btn btn-lg bg-first rounded-pill px-4 text-light">Aggiungi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    {{-- <section class="form-section mt-5">
        <div class="container-fluid form-img-row p-3">
            <div class="row pt-2 px-2 px-md-0">
                
                <div class="col-12 col-md-6 mx-auto d-flex align-items-center p-0">
                    <img class="curved-border img-fluid w-100" src="./media/form.jpg" alt="">
                </div>
            </div>
        </div>
    </section> --}}
</x-app>    