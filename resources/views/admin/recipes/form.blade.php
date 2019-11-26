@extends ('admin.template')
@section ('title', (!empty($recipe->id)) ? $recipe->title : 'Nieuw recept toevoegen')

@section ('content')
    <input type="hidden" name="id" id="id" value="{{ $recipe->id }}">
    <div class="row mb-1">
        <div class="col-12">
            @if(!is_null($recipe->id))
                <h2 class="font-weight-normal float-left">Het recept <b>{{ $recipe->title }}</b>:</h2>
                <a href="{{ URL::to('admin/recipes/' . $recipe->id . '/destroy/') }}" class="btn btn-danger text-white float-right ml-2">
                    <i class="fa fa-trash-alt"></i>&nbsp;Verwijderen
                </a>
            @else
                <h2 class="font-weight-normal float-left">@yield('title')</h2>
            @endif
                <a href="{{ URL::to('admin/recipes') }}" class="btn btn-outline-dark float-right"><i class="fa fa-arrow-left"></i>&nbsp;Terug</a>
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
                <form method="post" action="{{ !is_null($recipe->id) ? URL::to('admin/recipes/' . $recipe->id . '/update') : URL::to('admin/recipes/store')}}">
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
            <div class="card mt-3 {{ empty($recipe->id) ? 'd-none' : '' }}">
                <form method="post" action="{{ URL::to('admin/recipeSteps/' . $recipe->id . '/saveAll') }}">
                    @csrf
                    <div class="card-header">
                        <h6 class="m-0">
                            Stappen
                            <button type="submit" class="btn btn-save {{ ($recipe->steps()->count() === 0) ? 'd-none' : '' }}"><i class="fa fa-save text-success"></i></button>
                        </h6>
                    </div>
                    <div class="card-body">
                        @if ($recipe->steps()->count() > 0)
                            @php
                                $i = 1
                            @endphp
                            @foreach($recipe->steps()->get() as $recipeStep)
                                <div class="form-group row" data-recipe-step-id="{{ $recipeStep->id }}">
                                    <label for="steps[{{ $recipeStep->id }}][description]" class="col-lg-2 col-form-label">Stap {{ $i }}:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="steps[{{ $recipeStep->id }}][description]" id="steps[{{ $recipeStep->id }}][description]" value="{{ $recipeStep->description }}">
                                    </div>
                                    <div class="col-lg-1">
                                        <i class="fa fa-trash-alt text-danger cursor-pointer mt-2" onclick="deleteStep({{ $recipeStep->id }})" style="font-size: 1.4rem"></i>
                                    </div>
                                </div>
                                @php
                                    $i++
                                @endphp
                            @endforeach
                        @else
                            <h6 class="text-center">Er zijn nog geen stappen toegevoegd aan dit recept.</h6>
                        @endif
                        <span class="float-right d-block">
                            <i class="fas fa-plus cursor-pointer" onclick="addSteps()"></i>&nbsp;Voeg <input type="number" class="form-control d-inline-block mx-1" id="step-amounts" value="1" style="width: 4rem"> stap toe
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card {{ empty($recipe->id) ? 'd-none' : '' }}">
                <form method="post" action="{{ URL::to('admin/recipes/' . $recipe->id . '/saveImage') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h6 class="m-0">
                            Afbeelding
                            @if (!empty($recipe->image_name))
                                <a href="{{ URL::to('admin/recipes/' . $recipe->id . '/deleteImage') }}" class="btn btn-save ml-1"><i class="fa fa-trash-alt text-danger"></i></a>
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
            <div class="card mt-3 {{ empty($recipe->id) ? 'd-none' : '' }}">
                <form method="post" action="{{ URL::to('admin/recipes/' . $recipe->id . '/addIngredient') }}">
                    @csrf
                    <div class="card-header">
                        <h6 class="m-0">Ingrediënten</h6>
                    </div>
                    <div class="card-body @if ($recipe->ingredients()->count() > 0) p-02 @endif">
                        @if ($recipe->ingredients()->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($recipe->ingredients()->get() as $ingredient)
                                    <li class="list-group-item">
                                        <a href="{{ URL::to('admin/ingredients/' . $ingredient->id . '/edit') }}">{{ $ingredient->title }}</a>
                                        <a href="{{ URL::to('admin/recipes/deleteIngredient ') . '/' . $recipe->id . '/' . $ingredient->id }}" class="fa fa-trash-alt text-danger float-right"></a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <h6 class="text-center">Er zijn nog geen ingrediënten toegevoegd aan dit recept.</h6>
                        @endif

                        @if (!empty($recipe->id) && !empty($ingredients->all()))
                            <select class="form-control" name="ingredient_id" id="ingredient_id" title="Kies een ingrediënt">
                                <option value="" selected disabled>Kies een ingrediënt</option>
                                @foreach ($ingredients->all() as $ingredient)
                                    <option value="{{ $ingredient->id }}">{{ $ingredient->title }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success mt-3 float-right">Toevoegen</button>
                            <div class="clearfix"></div>
                        @endif
                        <p class="text-muted text-right mt-3 mb-0"><i class="fa fa-plus"></i>&nbsp;Maak <a href="{{ URL::to('admin/ingredients') }}">hier</a> nieuwe ingrediënten aan.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        loadSteps();
    });

    function loadSteps() {
        $.ajax({
            type: 'POST',
            url: '{{ URL::to('admin/recipeSteps/getJSON') . '/' . $recipe->id }}',
            data: {
                '_token': '{{ @csrf_token() }}'
            }
        }).done(function(xhr) {
            console.log(xhr);
        });
    }

    function addSteps() {
        let stepAmounts = (typeof $('#step-amounts').val() !== 'undefined') ? $('#step-amounts').val() : 1;
        $.ajax({
            type: 'POST',
            url: '{{ URL::to('admin/recipeSteps/add') . '/' . $recipe->id . '/' }}' + stepAmounts,
            data: {
                '_token': '{{ @csrf_token() }}'
            }
        }).done(function(xhr) {
            window.location.reload();
        });
    }

    function deleteStep(recipeStepId) {
        $.ajax({
            type: 'GET',
            url: '{{ URL::to('admin/recipeSteps/destroy') . '/' }}' + recipeStepId,
            data: {
                '_token': '{{ @csrf_token() }}'
            }
        }).done(function(xhr) {
            window.location.reload();
        });
    }
</script>
