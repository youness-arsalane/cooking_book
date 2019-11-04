@extends('base')

@section('content')
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
                    <td><a href="{{ URL::to('/ingredients/' . $ingredient->id) }}">{{ $ingredient->title }}</a></td>
                    <td class="text-center">{{ $ingredient->recipes()->count() }}</td>
                    <td class="text-right">{{ date('F d, Y', strtotime($ingredient->updated_at)) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h4 class="text-center">Geen ingrediënten</h4>
    @endif
@endsection
