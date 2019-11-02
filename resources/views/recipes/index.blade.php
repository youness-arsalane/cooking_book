@extends ('base')

@section ('content')
    @if(!$recipes->isEmpty())
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titel</th>
                <th scope="col">Ingrediënten</th>
                <th scope="col">Aangemaakt op</th>
                <th scope="col">Laatst gewijzigd</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td><a href="{{ URL::to('/recipes/details/' . $recipe->id) }}">{{ $recipe->title }}</a></td>
                    <td>{{ count($recipe->ingredients()) }}</td>
                    <td>{{ date('F d, Y', strtotime($recipe->created_at)) }}</td>
                    <td>{{ date('F d, Y', strtotime($recipe->updated_at)) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h4 class="text-center">Geen ingrediënten</h4>
    @endif
@endsection
