@extends ('template')

@section ('content')
    <h1>{{ $recipe->title }}</h1>
    <div class="row">
        <div class="col-lg-6">
            <p class="mb-5 text-justify">{{ $recipe->description }}</p>
            <div class="row">
                <div class="col-lg-6">
                    @if ($recipe->steps()->count() > 0)
                        <h6 class="font-weight-bold text-uppercase">Stappen</h6>
                        <ol>
                            @foreach($recipe->steps()->get() as $recipeStep)
                                <li>{{ $recipeStep->description }}</li>
                            @endforeach
                        </ol>
                    @endif
                </div>
                <div class="col-lg-6">
                    @if ($recipe->ingredients()->count() > 0)
                        <h6 class="font-weight-bold text-uppercase">Ingrediënten</h6>
                        <ul>
                            @foreach($recipe->ingredients()->get() as $ingredient)
                                <li>{{ $ingredient->title }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
            <img src="{{ $recipe->imageURL() }}" alt="" class="w-100">
        </div>
    </div>
@endsection
