@extends('admin.template')
@section ('title', 'Ingrediënten')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="float-left">Ingrediënten</h1>
            <a href="{{ URL::to('admin/ingredients/create') }}" class="btn btn-outline-dark float-right ml-2 mb-3">
                <i class="fas fa-plus"></i>&nbsp;Ingrediënt toevoegen
            </a>
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
                            <td><a href="{{ URL::to('admin/ingredients/' . $ingredient->id . '/edit') }}">{{ $ingredient->title }}</a></td>
                            <td class="text-center">{{ $ingredient->recipes()->count() }}</td>
                            <td class="text-right">
                                {{ date('M d, Y', strtotime($ingredient->updated_at)) }} <small class="font-weight-bold">{{ date('H:i', strtotime($ingredient->updated_at)) }}</small>
                            </td>
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
