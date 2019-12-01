@extends ('template')

@section ('content')
    <div class="row">
        <p class="breadcrumbs"><a href="{{ URL::to('/') }}">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;<a href="{{ URL::to('news-items') }}">Nieuwsberichten</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;{{ $newsItem->title }}</p>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <img src="{{ $newsItem->imageURL() }}" alt="" class="w-100">
        </div>
        <div class="col-lg-7">
            <h1>{{ $newsItem->title }}</h1>
            <p class="mb-5 text-justify">{!! nl2br($newsItem->description) !!}</p>
        </div>
        @if ($newsItem->recipes()->count() > 0)
            <div class="col-12 my-5">
                <h2 class="text-center">Aanbevolen recepten</h2>
                <div class="row">
                    @foreach($newsItem->recipes()->get() as $recipe)
                        <div class="col-lg-3 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="my-3">{{ $recipe->title }}</h4>
                                    <hr>
                                    <div style="height: 8em;background-image: url('{{ $recipe->imageURL() }}'); background-repeat: no-repeat; background-size: contain; background-position: center"></div>
                                    <p class="float-left mt-1 mb-0">
                                        Aangemaakt op: {{ $recipe->created_at->format('F d \'y') }} <small class="font-weight-bold">{{ $recipe->created_at->format('H:i') }}</small>
                                    </p>
                                    <a href="{{ URL::to('recipes/' . $recipe->id) }}" class="btn btn-outline-dark text-underline float-right mt-3">
                                        Lees meer <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
