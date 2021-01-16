<x-app>
    <x-slot name="title">Home - </x-slot>

    <header class="container-fluid">
        <div class="row header d-flex align-items-end p-3 p-md-5 shadow">
            <div class="col-6 col-md-7 col-lg-9">
                <h1 class="display-3 text-light font-weight-bold mb-0">FANCY A BEER?</h1>
                <H2 class="d-none d-md-block display-3 text-light font-weight-bold mt-0">MEET ME HERE!</H2>
            </div>
            <figure class="col-6 col-md-5 col-lg-3 header-img text-center pr-0 pr-md-2">
                <img class="img-fluid pr-0 pr-md-3" src="./media/full-bottle.png" alt="">
            </figure>
        </div>
    </header>

    <section class="search-bar container-fluid">
        <div class="row">
            <div class="col-12 col-md-7 mx-auto">
                <input class="shadow" type="text">
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid mt-5 py-5">
            <div class="row mb-5 py-4 px-5">
                <div class="col-12">
                    <h4 class="text-uppercase">Recenti</h4>
                </div>
            </div>
            <div class="row px-3 px-md-5">
                <div class="col-12 col-md-3 px-3 mb-3">
                    <div class="card-cs shadow">
                        <img class="shadow" src="./media/birreria.jpg" alt="">
                        <h3 class="px-2 text-light">Nome Birreria</h3>
                        <p class="px-2 text-light lead">Luogo</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 px-3 mb-3">
                    <div class="card-cs shadow">
                        <img class="shadow" src="./media/birreria.jpg" alt="">
                        <h3 class="px-2 text-light">Nome Birreria</h3>
                        <p class="px-2 text-light lead">Luogo</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 px-3 mb-3">
                    <div class="card-cs shadow">
                        <img class="shadow" src="./media/birreria.jpg" alt="">
                        <h3 class="px-2 text-light">Nome Birreria</h3>
                        <p class="px-2 text-light lead">Luogo</p>
                    </div>
                </div>
                <div class="col-12 col-md-3 px-3 mb-3">
                    <div class="card-cs shadow">
                        <img class="shadow" src="./media/birreria.jpg" alt="">
                        <h3 class="px-2 text-light">Nome Birreria</h3>
                        <p class="px-2 text-light lead">Luogo</p>
                    </div>
                </div>                
            </div>
            <div class="row mt-4">
                <div class="col-12 px-3 px-md-5">
                    <div id="map" class="shadow"></div>
                </div>
            </div>
        </div>

    </section>

    <section class="form-section mt-5 py-4">
        <div class="container-fluid">
            <div class="row px-5 py-3 mb-5">
                <div class="col-12">
                    <h2 class="text-light text-center">Suggerisci la tua birreria preferita</h2>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-12 col-md-6 mx-auto">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-12">
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Nome Birreria">
                            @error('name')
                                <div class="alert alert-danger py-1">{{$message}}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-row mt-2 px-2">
                            <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="img" class="custom-file-input @error('img') is-invalid @enderror" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                  <label class="custom-file-label" for="inputGroupFile01">Inserisci un'immagine</label>
                                </div>
                            </div>
                        </div>
                        @error('img')
                            <div class="alert alert-danger py-1 px-2">{{$message}}</div>
                        @enderror
                        <div class="form-row mt-4">
                          <div class="form-group col-12">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5" placeholder="Descrivi la tua birreria preferita"></textarea>
                            @error('description')
                                <div class="alert alert-danger py-1">{{$message}}</div>
                            @enderror
                          </div>
                          
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <input name="lat" type="text" class="form-control @error('name') is-invalid @enderror" id="lat" placeholder="Latitudine">
                                @error('lat')
                                    <div class="alert alert-danger py-1">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <input name="lon" type="text" class="form-control @error('name') is-invalid @enderror" id="lon" placeholder="Longitudine">
                                @error('lon')
                                    <div class="alert alert-danger py-1">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mt-4 mb-3">
                            <button type="submit" class="mx-auto btn btn-lg bg-first rounded-pill px-4 text-light">Aggiungi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</x-app>    