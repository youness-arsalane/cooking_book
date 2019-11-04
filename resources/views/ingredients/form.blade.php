@extends ('base')

@section ('content')
    <h1 class="font-weight-normal">Het ingrediënt <b>{{ $ingredient->title }}</b>:</h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Recepten</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($ingredient->recipes()->get() as $recipe)
                            <li class="list-group-item">{{ $recipe->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
