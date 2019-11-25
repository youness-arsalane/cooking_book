@extends ('template')

@section ('content')
    <div class="row">
        @if(!$recipes->isEmpty())
            <div class="col-lg-8">
                <h2>Recepten</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Titel</th>
                        <th class="text-center">Stappen</th>
                        <th class="text-center">Ingrediënten</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td><a href="{{ URL::to('/recipes/' . $recipe->id) }}">{{ $recipe->title }}</a></td>
                            <td class="text-center">{{ $recipe->steps()->count() }}</td>
                            <td class="text-center">{{ $recipe->ingredients()->count() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-12">
                <h4 class="text-center">Geen recepten</h4>
            </div>
        @endif
    </div>
@endsection
