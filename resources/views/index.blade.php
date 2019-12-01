@extends ('template')

@section ('content')
    <div class="row">
        <p class="breadcrumbs">Home</p>
    </div>
    <h2 class="mb-3 text-center">Welkom bij CookingBook B.V.!</h2>
    <div class="row">
        <div class="col-lg-6">
            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium assumenda,
                deleniti doloribus eaque
                omnis quos rem vel! Aut, autem cum ea iusto laboriosam pariatur porro quaerat sequi, sint, temporibus
                voluptatem! Aperiam asperiores aspernatur consequuntur debitis dicta distinctio dolor doloremque
                eligendi eos error facere illo maxime modi molestiae nesciunt nihil, perspiciatis possimus praesentium
                quam quas, qui quibusdam quo quod repellendus, ullam!</p>
            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium assumenda,
                deleniti doloribus eaque
                omnis quos rem vel! Aut, autem cum ea iusto laboriosam pariatur porro quaerat sequi, sint, temporibus
                voluptatem!</p>
        </div>
        <div class="col-lg-6">
            <img src="{{ URL::to('images/dish1.jpeg') }}" alt="" class="w-100">
        </div>
    </div>
@endsection
