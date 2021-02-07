<header class="container-fluid">
    <div class="row header d-flex align-items-end p-3 p-md-5 shadow">
        <div class="col-8 col-md-9 col-lg-9">
            <h1 class="text-light font-weight-bold mb-0">FANCY A BEER?</h1>
            <h2 class="text-light font-weight-light mt-0 mb-3">MEET ME HERE!</h2>
        </div>
        <figure class="col-4 col-md-3 col-lg-3 header-img text-center pr-0 pr-md-2">
            <img class="pr-0 pr-md-3" height="300px" src="/media/beergiff.gif" alt="birra">
        </figure>
    </div>
</header>

<section class="search-bar container-fluid">
    <div id="g-search" class="row">
        <form action="{{route('search')}}" method="get" class="col-11 col-md-7 mx-auto">
            <input class="shadow px-5 h3 text-center" name="q" type="text">
            <button><i class="fas fa-search fa-2x"></i></button>
        </form>
    </div>
</section>