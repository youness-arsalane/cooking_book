@extends ('admin.template')
@section ('title', (!empty($newsItem->id)) ? $newsItem->title : 'Nieuw nieuwsbericht toevoegen')

@section ('content')
    <input type="hidden" name="id" id="id" value="{{ $newsItem->id }}">
    <div class="row mb-1">
        <div class="col-12">
            @if(!is_null($newsItem->id))
                <h2 class="font-weight-normal float-left">Het nieuwsbericht: <b>{{ $newsItem->title }}</b></h2>
                <a href="{{ URL::to('admin/news-items/' . $newsItem->id . '/destroy') }}" class="btn btn-danger text-white float-right ml-2">
                    <i class="fa fa-trash-alt"></i>&nbsp;Verwijderen
                </a>
            @else
                <h2 class="font-weight-normal float-left">@yield('title')</h2>
            @endif
                <a href="{{ URL::to('admin/news-items') }}" class="btn btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>&nbsp;Terug</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-lg-8">
            <div class="card">
                <form method="post" action="{{ !is_null($newsItem->id) ? URL::to('admin/news-items/' . $newsItem->id . '/update') : URL::to('admin/news-items/store')}}">
                    @csrf
                    <div class="card-header">
                        <h6 class="m-0">
                            Informatie
                            <button type="submit" class="btn btn-save"><i class="fa fa-save text-success"></i></button>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label for="title">Titel: *</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $newsItem->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Beschrijving:</label>
                            <textarea class="form-control" name="description" id="description" rows="12">{{ $newsItem->description }}</textarea>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card {{ empty($newsItem->id) ? 'd-none' : '' }}">
                <form method="post" action="{{ URL::to('admin/news-items/' . $newsItem->id . '/saveImage') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h6 class="m-0">
                            Afbeelding
                            @if (!empty($newsItem->image_name))
                                <a href="{{ URL::to('admin/news-items/' . $newsItem->id . '/deleteImage') }}" class="btn btn-save ml-1"><i class="fa fa-trash-alt text-danger"></i></a>
                            @endif
                            <button type="submit" class="btn btn-save"><i class="fa fa-save text-success"></i></button>
                        </h6>
                    </div>
                    <div class="card-body">
                        <input type="file" name="image">
                        @if (!empty($newsItem->image_name))
                            <img class="w-100 mt-3" src="{{ $newsItem->imageURL() }}" alt="">
                        @endif
                    </div>
                </form>
            </div>
            <div class="card mt-4 {{ empty($newsItem->id) ? 'd-none' : '' }}">
                <form method="post" action="{{ URL::to('admin/news-items/' . $newsItem->id . '/addRecipe') }}">
                    @csrf
                    <div class="card-header">Aanbevolen recepten</div>
                    <div class="card-body">
                        @if ($newsItem->recipes()->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($newsItem->recipes()->get() as $recipe)
                                    <li class="list-group-item">
                                        <a href="{{ URL::to('admin/recipes/' . $recipe->id . '/edit') }}">{{ $recipe->title }}</a>
                                        <a href="{{ URL::to('admin/news-items/deleteRecipe') . '/' . $newsItem->id . '/' . $recipe->id }}" class="fa fa-trash-alt text-danger float-right"></a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h6 class="text-center">Er zijn nog geen recepten toegevoegd aan dit nieuwsbericht.</h6>
                        @endif

                        @if (!empty($newsItem->id) && !empty($recipes->all()))
                            <select class="form-control" name="recipe_id" id="recipe_id" title="Kies een recept">
                                <option value="" selected disabled>Kies een recept</option>
                                @foreach ($recipes->all() as $recipe)
                                    <option value="{{ $recipe->id }}">{{ $recipe->title }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success mt-3 float-right">Toevoegen</button>
                            <div class="clearfix"></div>
                        @endif
                        <p class="text-muted text-right mt-3 mb-0"><i class="fa fa-plus"></i>&nbsp;Maak <a href="{{ URL::to('admin/recipes') }}">hier</a> nieuwe recepten aan.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
