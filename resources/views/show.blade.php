<x-app>
    <x-slot name="title">{{$brewery->name}} - </x-slot>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 mb-4">
            </div>
            <div class="col-12 col-md-5 mb-4">
                <h2 class="subtitle text-uppercase mb-3">{{$brewery->name}}</h2>
                <img class="img-fluid mx-auto curved-border" src="{{Storage::url($brewery->img)}}" alt="{{$brewery->img}}">
            </div>
            <div class="col-12 col-md-7 mb-4">
                <div class="row">
                    <div class="col-5">
                        <h5 class="text-first">Telefono</h5>
                        <a href="tel:3335678999" class="lead text-decoration-none text-reset">333 567 8999</a>
                    </div>
                    <div class="col-3 col-sm-4">
                        <h5 class="text-first">Orario</h5>
                        <p class="lead">9:00 - 22:00</p>
                    </div>
                    <div class="col-4 col-sm-3 d-flex align-items-center justify-content-end">
                        <a class="btn bg-first rounded-pill text-white font-weight-bold px-3" href="mailto:prenotazioni@birra.it">Prenota</a>
                    </div>
                    <div class="col-12">
                        <h5 class="text-first">Le nostre birre</h5>
                        @if (count($brewery->beers) > 0)
                        <div class="d-flex flex-wrap">
                            @foreach ($brewery->beers as $beer)
                                <span class="bg-first pb-1 px-3 rounded-pill text-white m-1 font-weight-bold align-text-baseline">{{$beer->name}}</span>
                                @endforeach
                            </div>
                        @else
                            <h6 class="font-italic text-secondary">Scusa! Al momento non sono state inserite birre.</h6>
                        @endif
                    </div>
                </div>
                <hr class="bg-warning my-4">
                <p class="lead">{{$brewery->description}}</p>
                <hr class="bg-warning my-4">
                <h5 class="lead text-first">Indirizzo</h5>
                <p class="font-italic">{{$brewery->address}}</p>
            </div>
        </div>
        <div class="row">
            
        </div>
        <div class="row my-5">
            <div class="col-12 col-md-6 px-3 mb-4 mb-md-0 ">
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
            <div id="commentBox" class="col-12 col-md-6">
                <h3 class="subtitle mb-3">Commenti: {{count($comments)}}</h3>
                @auth
                    <form class="position-relative" action="{{route('storeComment', $brewery->id)}}" method="POST">
                        @csrf
                        <textarea class="form-custom p-3 lead border" name="comment" id="comment" rows="3" placeholder="Inserisci il tuo commento"></textarea>
                        @error('comment')
                                    <div class="alert alert-danger py-1">{{$message}}</div>
                                @enderror
                        <button id="sendComment" type="submit" class="btn rounded-circle p-1 bg-first"><i class="fas fa-chevron-circle-right fa-3x text-light"></i></button>
                    </form>
                @endauth
                @if (count($comments) > 0)
                    @foreach ($comments->take(10) as $comment)   
                        <div id="cloud-wrap">
                            <div id="cloud" class="text-light bg-footer shadow my-3 px-3 py-2">
                                <p class="mb-3 border-bottom ">{{$comment->user->name}} - <span class="small">{{$comment->created_at->format('d/m/Y - h:i')}}</span></p>
                                <p class="lead mb-5 font-italic">"{{$comment->comment}}"</p>
                                {{-- <p class="small text-right mb-5"></p> --}}
                            </div>
                        </div>
                    @endforeach
                @else    
                <p class="lead my-3 text-center font-italic text-secondary">Non ci sono commenti da visualizzare!</p>
                @endif
            </div>
            <div class="col-12 col-md-6 offset-md-6 text-center text-first">
                <p id="showMore" class="pointer">Mostra di più</p>
                <p id="showLess" class="pointer d-none">Mostra di meno</p>
            </div>
        </div>
    </div>

    @auth
    @if ($user->role == 'admin')
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="subtitle">Cerca e associa le birre</h3>
                </div>
                <div class="col-12 col-md-5 mt-3 mb-2 px-2">
                    <input class="form-custom border px-3" onkeyup="add()" type="text" id="beersearch">
                </div>
                <div class="col-12 col-sm-8 px-2 tableSearchBeer">
                    <table class="table mb-5">
                        <thead class="bg-first">
                          <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Produttore</th>
                            <th>Stile</th>
                            <th>Grado Alcolico</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($beers as $beer)
                            <tr class="beer_row" index = "{{strtolower($beer->name)}}_{{strtolower($beer->brewer)}}_{{strtolower($beer->style)}}" style="display: none">
                              <th scope="row">#{{$beer->id}}</th>
                              <td>{{$beer->name}}</td>
                              <td>{{$beer->brewer}}</td>
                              <td>{{$beer->style}}</td>
                              <td>{{$beer->alcohol}}</td>
                              <td><button class="btn add_beer p-0" beer-id = "{{$beer->id}}" beer-name = "{{$beer->name}}"><i class="fas fa-plus-circle text-success fa-2x"></i></button></td>
                            </tr>
                           @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-12 col-sm-4 beerSyncTable py-3">
                    <form action="{{route('beers.sync',['id'=>$brewery->id])}}" method="POST">
                        @csrf
                        <table id="beers">
                            <tbody>
                            @foreach ($brewery->beers as $beer)
                                <tr>
                                    <th scope="row"><span>{{$beer->id}} - {{$beer->name}}</span></th>
                                    <td><input type="hidden" name="beer_ids[]" value="{{$beer->id}}"></td>
                                    <td class="remove_beer "><button type="button" onclick="attachRemoveBeer()" class="btn p-0"><i class="fas fa-minus-circle text-danger"></i></button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                      <button type="submit" class="btn bg-first text-light">Associa</button>
                    </form>
                </div>
            </div>
        </div>
        
    @endif
    @endauth

    <script>
        // CommentBox

        let commentBox = document.querySelector('#commentBox')
        let showMore = document.querySelector('#showMore')
        let showLess = document.querySelector('#showLess')

        showMore.addEventListener('click', ()=>{
            commentBox.style.maxHeight = '100%'
            showMore.classList.toggle('d-none')
            showLess.classList.toggle('d-none')
        })

        showLess.addEventListener('click', ()=>{
            commentBox.style.maxHeight = '600px'
            showMore.classList.toggle('d-none')
            showLess.classList.toggle('d-none')
        })
    </script>

    <script>
        let beersearch = document.querySelector('#beersearch')
        let beerrow = document.querySelectorAll('.beer_row')
  
        function add(){
        
          let value = beersearch.value;
          value = value.toLowerCase();
          let index = document.querySelectorAll('[index*="' + value + '"]')
  
          if(value.length <= 3){
            for(i = 0; i < beerrow.length; i++){
            beerrow[i].style.display = 'none';
            }
            return
          }
          
          for(i = 0; i < index.length; i++){
            index[i].style.display = 'table-row';
            }
  
        }
  
      function attachRemoveBeer(){
  
        let remove = document.querySelectorAll('.remove_beer')
  
        for (let i = 0; i < remove.length; i++) {
  
          let self = remove[i]
  
          self.addEventListener('click', function() {
  
            self.parentElement.remove()
  
          })
  
        }
      }
              
      let attach = document.querySelectorAll('.add_beer')
      for (let i = 0; i < attach.length; i++) {
        
        let self = attach[i]
  
        self.addEventListener('click',function(){
        let beer_id = self.getAttribute('beer-id')
        let beer_name = self.getAttribute('beer-name')
        let beers = document.querySelector('#beers')
        let tr = document.createElement('tr') 
        tr.innerHTML =
        ` <th scope="row"><span>${beer_id} - ${beer_name}</span></th>
          <td><input type="hidden" name="beer_ids[]" value="${beer_id}"></td>
          <td class="remove_beer"><button type="button" class="btn p-0"><i class="fas fa-minus-circle text-danger"></i></button></td>
        `;
        beers.appendChild(tr)
  
      attachRemoveBeer()  
  
      })
        
      }
  
      attachRemoveBeer()
  
  
  
    //   //Birrozzi
    //   let prova = document.querySelectorAll('.prova')
    //   prova.forEach(el => {
    //     let rate = el.getAttribute('rate')
    //     let identify = el.getAttribute('identify')
    //     el.addEventListener('load', rating())
    //     function rating(){
    //     for (let i = 0; i < rate; i++) {
    //       let s = document.querySelector(`#s${i+identify}`)
    //       s.classList.add('bg-gold', 'text_dark')
    //       s.classList.remove('bg-dark', 'text-secondary')
    //     }
    //   }
  
    //   })
     
    </script>

</x-app>