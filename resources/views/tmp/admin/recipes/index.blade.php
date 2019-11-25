@extends ('tmp.base')
@section ('title', 'Recepten')

@section ('content')
    @if(!$recipes->isEmpty())
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titel</th>
                <th class="text-center" scope="col">Ingrediënten</th>
                <th class="text-right" scope="col">Laatst gewijzigd</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <th scope="row">{{ $recipe->id }}</th>
                    <td><a href="{{ URL::to('/recipes/' . $recipe->id) }}">{{ $recipe->title }}</a></td>
                    <td class="text-center">{{ $recipe->ingredients()->count() }}</td>
                    <td class="text-right">{{ date('F d, Y', strtotime($recipe->updated_at)) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h4 class="text-center">Geen recepten</h4>
    @endif
@endsection
