@extends ('admin.template')

@section ('content')
    <h1 class="text-center">Welkom {{ Auth::getUser()->name }},</h1>
@endsection
