@extends ('template')

@section ('content')
    <div class="row">
        <p class="breadcrumbs"><a href="{{ URL::to('/') }}">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;<a href="{{ URL::to('recipes') }}">Recepten</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;{{ $recipe->title }}</p>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ $recipe->imageURL() }}" alt="" class="mb-5 w-100">
            <div class="row">
                <div class="col-lg-6">
                    @if ($recipe->steps()->count() > 0)
                        <h6 class="font-weight-bold text-uppercase">Stappen</h6>
                        <ol>
                            @foreach($recipe->steps()->get() as $recipeStep)
                                <li>{{ $recipeStep->description }}</li>
                            @endforeach
                        </ol>
                    @endif
                </div>
                <div class="col-lg-6">
                    @if ($recipe->ingredients()->count() > 0)
                        <h6 class="font-weight-bold text-uppercase">Ingrediënten</h6>
                        <ul>
                            @foreach($recipe->ingredients()->get() as $ingredient)
                                <li>{{ $ingredient->title }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h1>{{ $recipe->title }}</h1>
            <p class="mb-5 text-justify">{!! nl2br($recipe->description) !!}</p>
        </div>
        @if ($recipe->newsItems()->count() > 0)
            <div class="col-12 my-5">
                <h2 class="text-center">Aanbevolen nieuwsberichten</h2>
                <div class="row">
                    @foreach($recipe->newsItems()->get() as $newsItem)
                        <div class="col-lg-3 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="my-3">{{ $newsItem->title }}</h4>
                                    <hr>
                                    <div style="height: 8em;background-image: url('{{ $newsItem->imageURL() }}'); background-repeat: no-repeat; background-size: contain; background-position: center"></div>
                                    <p class="float-left mt-1 mb-0">
                                        Aangemaakt op: {{ $newsItem->created_at->format('F d \'y') }} <small class="font-weight-bold">{{ $newsItem->created_at->format('H:i') }}</small>
                                    </p>
                                    <a href="{{ URL::to('news-items/' . $newsItem->id) }}" class="btn btn-outline-dark text-underline float-right mt-3">
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
