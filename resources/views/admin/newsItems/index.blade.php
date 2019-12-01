@extends('admin.template')
@section ('title', 'Nieuwsberichten')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="float-left">Nieuwsberichten</h1>
            <a href="{{ URL::to('admin/news-items/create') }}" class="btn btn-outline-dark float-right ml-2 mb-3">
                <i class="fas fa-plus"></i>&nbsp;Nieuwsbericht toevoegen
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(!$newsItems->isEmpty())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Titel</th>
                        <th class="text-center" scope="col">Aanbevolen recepten</th>
                        <th class="text-right" scope="col">Laatst gewijzigd</th>
                        <th class="text-right" scope="col">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsItems as $newsItem)
                        <tr>
                            <td><a href="{{ URL::to('admin/news-items/' . $newsItem->id . '/edit') }}">{{ $newsItem->title }}</a></td>
                            <td class="text-center">{{ $newsItem->recipes()->count() }}</td>
                            <td class="text-right">
                                {{ $newsItem->updated_at->format('M d, Y') }} <small class="font-weight-bold">{{ date('H:i', strtotime($newsItem->updated_at)) }}</small>
                            </td>
                            <td class="text-right">
                                <a href="{{ URL::to('admin/news-items/' . $newsItem->id . '/edit') }}">
                                    <i class="fa fa-edit text-secondary" style="font-size: 1rem"></i>
                                </a>
                                <a href="{{ URL::to('admin/news-items/' . $newsItem->id . '/destroy') }}">
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
                        <h5 class="text-center pt-2">Er zijn nog geen nieuwsberichten aangemaakt.</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
