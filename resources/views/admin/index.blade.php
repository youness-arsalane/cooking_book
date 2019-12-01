@extends ('admin.template')
@section ('title', 'Dashboard')

@section ('content')
<h1>Dashboard</h1>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body bg-light">
                <h4 class="mb-5">Aantal recepten</h4>
                <h1 class="text-right m-0">{{ $recipeCount }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body bg-light">
                <h4 class="mb-5">Aantal ingrediënten</h4>
                <h1 class="text-right m-0">{{ $ingredientCount }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body bg-light">
                <h4 class="mb-5">Aantal nieuwsberichten</h4>
                <h1 class="text-right m-0">{{ $newsItemCount }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection
