
    <div class="card-cs shadow mx-auto">
        <a href="{{route('show', ['id'=>$id, 'name'=>$name])}}">
            <img class="shadow" src="{{$img}}" alt="{{$name}}">
            @if ($condition == false)
                <form action="{{$route}}" method="POST">
                    @csrf
                    <button class="btn"><i class="fas fa-check-circle fa-2x text-light"></i></button>
                </form>
            @endif
            <div class="card-text">
                <p class="px-2 mt-3 mb-2 text-light font-italic">{{$address}}</p>
                <h3 class="px-2 text-light">{{$name}}</h3>
                <p class="px-2 text-light description">{{$description}}</p>
            </div>
        </a>
    </div>