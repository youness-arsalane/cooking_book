@extends ('admin.template')
@section ('title', $recipe->title)

@section ('content')
    <input type="hidden" name="id" id="id" value="{{ $recipe->id }}">
    <div class="row mb-1">
        <div class="col-12">
            @if(!is_null($recipe->id))
                <h2 class="font-weight-normal float-left">Het recept <b>{{ $recipe->title }}</b>:</h2>
                <a href="{{ URL::to('/admin/recipes/' . $recipe->id . '/destroy/') }}" class="btn btn-danger text-white float-right ml-2">
                    <i class="fa fa-trash-alt"></i>&nbsp;Verwijderen
                </a>
            @else
                <h2 class="font-weight-normal float-left">Nieuw recept toevoegen</h2>
            @endif
                <a href="{{ URL::to('/admin/recipes') }}" class="btn btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>&nbsp;Terug</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <form method="post" action="{{ !is_null($recipe->id) ? URL::to('/admin/recipes/' . $recipe->id . '/update') : URL::to('/admin/recipes/store')}}">
                    @csrf
                    <div class="card-header">
                        <h6 class="m-0">
                            Informatie
                            <button type="submit" class="btn btn-save"><i class="fa fa-save text-success"></i></button>
                        </h6>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label for="title">Titel: *</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $recipe->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Beschrijving:</label>
                            <textarea class="form-control" name="description" id="description" rows="6">{{ $recipe->description }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="m-0">Stappen</h6>
                </div>
                <div class="card-body @if ($recipe->steps()->count() > 0) p-0 @endif">
                    @if ($recipe->steps()->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($recipe->steps()->get() as $recipeStep)
                                <li class="list-group-item">{{ $recipeStep->description }}</li>
                            @endforeach
                        </ul>
                    @else
                        <h6 class="text-center">Er zijn nog geen stappen toegevoegd aan dit recept.</h6>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <form method="post" action="{{ URL::to('/admin/recipes/' . $recipe->id . '/saveImage') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h6 class="m-0">
                            Afbeelding
                            @if (!empty($recipe->image_name))
                                <a href="{{ URL::to('/admin/recipes/' . $recipe->id . '/deleteImage') }}" class="btn btn-save ml-1"><i class="fa fa-trash-alt text-danger"></i></a>
                            @endif
                            <button type="submit" class="btn btn-save"><i class="fa fa-save text-success"></i></button>
                        </h6>
                    </div>
                    <div class="card-body">
                        <input type="file" name="image">
                        @if (!empty($recipe->image_name))
                            <img class="w-100 mt-3" src="{{ $recipe->imageURL() }}" alt="">
                        @endif
                    </div>
                </form>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="m-0">Recepten</h6>
                </div>
                <div class="card-body @if ($recipe->ingredients()->count() > 0) p-0 @endif">
                    @if ($recipe->ingredients()->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($recipe->ingredients()->get() as $ingredient)
                                <li class="list-group-item">
                                    <a href="{{ URL::to('/admin/ingredients/' . $ingredient->id . '/edit') }}">{{ $ingredient->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h6 class="text-center">Er zijn nog geen ingrediënten toegevoegd aan dit recept.</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
