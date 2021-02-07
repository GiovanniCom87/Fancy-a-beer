
    <div class="card-cs shadow mx-auto">
        <a href="{{route('show', [$id, \Str::slug($name)])}}">
            <img class="shadow" src="{{$img}}" alt="{{$name}}">
            <div class="overlay"></div>
            @if ($condition == false)
                <form action="{{$route}}" method="POST">
                    @csrf
                    <button class="btn"><i class="fas fa-check-circle fa-2x text-light"></i></button>
                </form>
            @endif
            <div class="card-text px-2">
                <p class="mt-3 mb-2 text-light font-italic">{{Str::limit($address, 46)}}</p>
                <h3 class="text-light truncate card-border d-inline-block">{{$name}}</h3>
                <p class="text-light description">{{$description}}</p>
            </div>
        </a>
    </div>