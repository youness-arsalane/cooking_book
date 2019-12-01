@extends ('template')

@section ('content')
    <div class="row">
        <p class="breadcrumbs"><a href="{{ URL::to('/') }}">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;Nieuwsberichten</p>
    </div>
    <div class="row">
        @if(!$newsItems->isEmpty())
            <div class="col-12">
                <h1 class="text-center">Nieuwsberichten</h1>
                <div class="row">
                    @foreach($newsItems as $newsItem)
                        <div class="col-lg-4 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">

                                    <h4 class="my-3">
                                        {{ $newsItem->title }}
                                    </h4>
                                    <hr>
                                    <div style="height: 12em;background-image: url('{{ $newsItem->imageURL() }}'); background-repeat: no-repeat; background-size: contain; background-position: center"></div>
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
        @else
            <div class="col-12">
                <h4 class="text-center">Geen nieuwsberichten</h4>
            </div>
        @endif
    </div>
@endsection
