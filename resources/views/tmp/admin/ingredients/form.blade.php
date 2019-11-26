@extends ('tmp.base')
@section ('title', $ingredient->title)

@section ('content')
    <form method="POST" action="{{ !is_null($ingredient->id) ? URL::to('admin/ingredients/' . $ingredient->id . '/update') : URL::to('admin/ingredients/store')}}">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $ingredient->id }}">
        <div class="row mb-1">
            <div class="col-12">
                @if(!is_null($ingredient->id))
                    <h2 class="font-weight-normal float-left">Het ingrediënt <b>{{ $ingredient->title }}</b>:</h2>
                    <a href="{{ URL::to('admin/ingredients/' . $ingredient->id . '/destroy/') }}" class="btn btn-danger text-white float-right ml-2">Verwijderen</a>
                    @else
                    <h2 class="font-weight-normal float-left">Nieuw ingrediënt toevoegen</h2>
                @endif

                <button type="submit" class="btn btn-success text-white float-right">Opslaan</button>
                <a href="{{ URL::to('admin/ingredients') }}" class="btn btn-outline-dark float-right mr-2">Annuleren</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0">Informatie</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label for="title">Titel:</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $ingredient->title }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0">Recepten</h6>
                    </div>
                    <div class="card-body px-1 py-0">
                        @if ($ingredient->recipes()->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($ingredient->recipes()->get() as $recipe)
                                    <li class="list-group-item">
                                        <a href="{{ URL::to('recipes/' . $recipe->id) }}">{{ $recipe->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h6 class="text-center pt-3 pb-2">Er zijn nog geen recepten met dit ingrediënt.</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
