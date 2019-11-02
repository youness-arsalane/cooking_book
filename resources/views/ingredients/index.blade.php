@extends('base')

@section('content')
    @if(!$ingredients->isEmpty())
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titel</th>
                <th scope="col">Recepten</th>
                <th scope="col">Aangemaakt op</th>
                <th scope="col">Laatst gewijzigd</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->id }}</td>
                    <td><a href="{{ URL::to('/recipes/details/' . $ingredient->id) }}">{{ $ingredient->title }}</a></td>
                    <td>{{ count($ingredient->recipes()) }}</td>
                    <td>{{ date('F d, Y', strtotime($ingredient->created_at)) }}</td>
                    <td>{{ date('F d, Y', strtotime($ingredient->updated_at)) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h4 class="text-center">Geen ingrediënten</h4>
    @endif
@endsection
