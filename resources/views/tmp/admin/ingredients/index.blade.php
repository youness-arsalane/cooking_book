@extends('tmp.base')
@section ('title', 'Ingrediënten')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ URL::to('/admin/ingredients/create') }}" class="btn btn-dark float-right ml-2 mb-3">Ingrediënt toevoegen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(!$ingredients->isEmpty())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titel</th>
                        <th class="text-center" scope="col">Recepten</th>
                        <th class="text-right" scope="col">Laatst gewijzigd</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ingredients as $ingredient)
                        <tr>
                            <th scope="row">{{ $ingredient->id }}</th>
                            <td><a href="{{ URL::to('/admin/ingredients/' . $ingredient->id . '/edit') }}">{{ $ingredient->title }}</a></td>
                            <td class="text-center">{{ $ingredient->recipes()->count() }}</td>
                            <td class="text-right">{{ date('F d, Y', strtotime($ingredient->updated_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center pt-2">Er zijn nog geen ingrediënten aangemaakt.</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
