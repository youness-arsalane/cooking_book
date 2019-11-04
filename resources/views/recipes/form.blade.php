@extends ('base')

@section ('content')
    <h1 class="font-weight-normal">Het recept voor <b>{{ $recipe->title }}</b>:</h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Ingrediënten</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($recipe->ingredients()->get() as $ingredient)
                            <li class="list-group-item">{{ $ingredient->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
