@extends ('template')

@section ('content')
    <div class="row">
        <p class="breadcrumbs"><a href="{{ URL::to('/') }}">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;Recepten</p>
    </div>
    <div class="row">
        @if(!$recipes->isEmpty())
            <div class="col-12">
                <h1 class="text-center">Recepten</h1>
                <div class="row">
                    @foreach($recipes as $recipe)
                        <div class="col-lg-4 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="my-3">{{ $recipe->title }}</h4>
                                    <hr>
                                    <div style="height: 12em;background-image: url('{{ $recipe->imageURL() }}'); background-repeat: no-repeat; background-size: contain; background-position: center"></div>
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

        @else
            <div class="col-12">
                <h4 class="text-center">Geen recepten</h4>
            </div>
        @endif
    </div>
@endsection
