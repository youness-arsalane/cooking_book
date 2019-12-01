@extends ('admin.template')
@section ('title', (!empty($ingredient->id)) ? $ingredient->title : 'Nieuw ingrediënt toevoegen')

@section ('content')
    <input type="hidden" name="id" id="id" value="{{ $ingredient->id }}">
    <div class="row mb-1">
        <div class="col-12">
            @if(!is_null($ingredient->id))
                <h2 class="font-weight-normal float-left">Het ingrediënt: <b>{{ $ingredient->title }}</b></h2>
                <a href="{{ URL::to('admin/ingredients/' . $ingredient->id . '/destroy') }}" class="btn btn-danger text-white float-right ml-2">
                    <i class="fa fa-trash-alt"></i>&nbsp;Verwijderen
                </a>
            @else
                <h2 class="font-weight-normal float-left">@yield('title')</h2>
            @endif
                <a href="{{ URL::to('admin/ingredients') }}" class="btn btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>&nbsp;Terug</a>
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
                <form method="post" action="{{ !is_null($ingredient->id) ? URL::to('admin/ingredients/' . $ingredient->id . '/update') : URL::to('admin/ingredients/store')}}">
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
                                <input type="text" class="form-control" name="title" id="title" value="{{ $ingredient->title }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card {{ empty($ingredient->id) ? 'd-none' : '' }}">
                <form method="post" action="{{ URL::to('admin/ingredients/' . $ingredient->id . '/saveImage') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h6 class="m-0">
                            Afbeelding
                            @if (!empty($ingredient->image_name))
                                <a href="{{ URL::to('admin/ingredients/' . $ingredient->id . '/deleteImage') }}" class="btn btn-save ml-1"><i class="fa fa-trash-alt text-danger"></i></a>
                            @endif
                            <button type="submit" class="btn btn-save"><i class="fa fa-save text-success"></i></button>
                        </h6>
                    </div>
                    <div class="card-body">
                        <input type="file" name="image">
                        @if (!empty($ingredient->image_name))
                            <img class="w-100 mt-3" src="{{ $ingredient->imageURL() }}" alt="">
                        @endif
                    </div>
                </form>
            </div>
            <div class="card mt-4 {{ empty($ingredient->id) ? 'd-none' : '' }}">
                <form method="post" action="{{ URL::to('admin/ingredients/' . $ingredient->id . '/addRecipe') }}">
                    @csrf
                    <div class="card-header">Recepten</div>
                    <div class="card-body">
                        @if ($ingredient->recipes()->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($ingredient->recipes()->get() as $recipe)
                                    <li class="list-group-item">
                                        <a href="{{ URL::to('admin/recipes/' . $recipe->id . '/edit') }}">{{ $recipe->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h6 class="text-center">Er zijn nog geen recepten toegevoegd met dit ingrediënt.</h6>
                        @endif

                        <p class="text-muted text-right mt-3 mb-0"><i class="fa fa-plus"></i>&nbsp;Maak <a href="{{ URL::to('admin/recipes') }}">hier</a> nieuwe recepten aan.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
