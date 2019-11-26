@extends ('tmp.base')
@section ('title', $recipe->title)

@section ('content')
    <h1 class="font-weight-normal">Het recept voor <b>{{ $recipe->title }}</b>:</h1>
    <div class="row">
        <div class="col-lg-8">
            test
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Ingrediënten</h4>
                </div>
                <div class="card-body px-1 py-0">
                    <ul class="list-group list-group-flush">
                        @foreach($recipe->ingredients()->get() as $ingredient)
                            <li class="list-group-item">
                                <a href="{{ URL::to('admin/ingredients/' . $ingredient->id . '/edit') }}">{{ $ingredient->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
