<x-app>
    <x-slot name="title">Home - </x-slot>
    {{-- Recenti --}}
    <section>
        <div class="container-fluid mt-4">
            <div class="row mb-5 py-4 px-5">
                <div class="col-12">
                    <h4 class="text-uppercase">Recenti</h4>
                </div>
            </div>
            <div class="row px-3 px-md-5">
                @foreach ($breweries as $brewery)
                <div class="col-12 col-md-3 px-3 mb-4">
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

            {{-- Mappa --}}
            <div class="row my-4">
                <div class="col-12 px-3 px-md-5">
                    <div id="map" class="shadow"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Form segnalazione --}}
    <section class="form-section mt-5">
        <div class="container-fluid form-img-row">
            <div class="row pt-2 px-2 px-md-0">
                <div class="col-12 col-md-6 mx-auto form-card py-5">
                    <div>
                        <h2 class="text-light text-center mb-5">Suggerisci la tua birreria preferita</h2>
                    </div>
                    <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-12">
                            <input name="name" type="text" class="form-custom px-4  @error('name') is-invalid @enderror" id="inputName" placeholder="Nome Birreria">
                            @error('name')
                                <div class="alert alert-danger py-1">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-row mt-3 px-1">
                            <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="img" class="custom-file-input @error('img') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                  <label class="file-custom" for="inputGroupFile01">Carica una foto</label>
                                </div>
                            </div>
                        </div>
                        @error('img')
                            <div class="alert alert-danger py-1 px-2">{{$message}}</div>
                        @enderror
                        <div class="form-row mt-4">
                          <div class="form-group col-12">
                            <textarea name="description" class="form-custom px-4 py-3 @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5" placeholder="Descrivi la tua birreria preferita"></textarea>
                            @error('description')
                                <div class="alert alert-danger py-1">{{$message}}</div>
                            @enderror
                          </div>
                          
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <input name="address" type="text" class="form-custom px-4  @error('name') is-invalid @enderror" id="inputName" placeholder="Indirizzo Birreria">
                                @error('address')
                                    <div class="alert alert-danger py-1">{{$message}}</div>
                                @enderror
                              </div>
                            <div class="form-group col-6">
                                <input name="lat" type="text" class="form-custom px-4  @error('name') is-invalid @enderror" id="lat" placeholder="Latitudine">
                                @error('lat')
                                    <div class="alert alert-danger py-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <input name="lon" type="text" class="form-custom px-4  @error('name') is-invalid @enderror" id="lon" placeholder="Longitudine">
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
                <img class="form-img img-fluid" src="./media/form.jpg" alt="">
            </div>
        </div>
    </section>
</x-app>    