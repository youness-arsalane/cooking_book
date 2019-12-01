@extends('admin.template')
@section ('title', 'Recepten')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="float-left">Recepten</h1>
            <a href="{{ URL::to('admin/recipes/create') }}" class="btn btn-outline-dark float-right ml-2 mb-3">
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
                        <th scope="col">Titel</th>
                        <th class="text-center" scope="col">Stappen</th>
                        <th class="text-center" scope="col">Ingrediënten</th>
                        <th class="text-right" scope="col">Laatst gewijzigd</th>
                        <th class="text-right" scope="col">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td><a href="{{ URL::to('admin/recipes/' . $recipe->id . '/edit') }}">{{ $recipe->title }}</a></td>
                            <td class="text-center">{{ $recipe->steps()->count() }}</td>
                            <td class="text-center">{{ $recipe->ingredients()->count() }}</td>
                            <td class="text-right">
                                {{ $recipe->updated_at->format('M d, Y') }} <small class="font-weight-bold">{{ date('H:i', strtotime($recipe->updated_at)) }}</small>
                            </td>
                            <td class="text-right">
                                <a href="{{ URL::to('admin/recipes/' . $recipe->id . '/edit') }}">
                                    <i class="fa fa-edit text-secondary" style="font-size: 1rem"></i>
                                </a>
                                <a href="{{ URL::to('admin/recipes/' . $recipe->id . '/destroy') }}">
                                    <i class="fa fa-trash-alt text-danger" style="font-size: 1rem"></i>
                                </a>
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
