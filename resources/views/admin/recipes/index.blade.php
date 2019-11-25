@extends('admin.template')
@section ('title', 'Recepten')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ URL::to('/admin/recipes/create') }}" class="btn btn-outline-dark float-right ml-2 mb-3">
                <i class="fas fa-plus"></i>&nbsp;Recept toevoegen
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(!$recipes->isEmpty())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titel</th>
                        <th class="text-center" scope="col">Stappen</th>
                        <th class="text-center" scope="col">Ingrediënten</th>
                        <th class="text-right" scope="col">Laatst gewijzigd</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <th scope="row">{{ $recipe->id }}</th>
                            <td><a href="{{ URL::to('/admin/recipes/' . $recipe->id . '/edit') }}">{{ $recipe->title }}</a></td>
                            <td class="text-center">{{ $recipe->steps()->count() }}</td>
                            <td class="text-center">{{ $recipe->ingredients()->count() }}</td>
                            <td class="text-right">
                                {{ date('M d, Y', strtotime($recipe->updated_at)) }} <small class="font-weight-bold">{{ date('H:i', strtotime($recipe->updated_at)) }}</small>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center pt-2">Er zijn nog geen recepten aangemaakt.</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
