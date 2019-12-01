@extends ('admin.template')
@section ('title', 'Mijn profiel')

@section ('content')
    <div class="row">
        <p class="breadcrumbs"><a href="{{ URL::to('/') }}">Home</a>&nbsp;&nbsp;&#187;&nbsp;&nbsp;Mijn profiel</p>
    </div>
    <h1 class="text-center mb-3">Mijn profiel</h1>
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
        <div class="col-lg-6">
            <div class="card">
                <form action="{{ URL::to('admin/my-profile/update') }}" method="post">
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
                                <label for="first_name">Voornaam: *</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user->first_name }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="last_name">Achternaam: *</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mailadres: *</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <form action="{{ URL::to('admin/my-profile/updatePassword') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h6 class="m-0">
                            Wachtwoord wijzigen
                            <button type="submit" class="btn btn-save"><i class="fa fa-save text-success"></i></button>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="current-password">Huidig wachtwoord: *</label>
                            <input type="password" class="form-control" name="current-password" id="current-password">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label for="new-password">Nieuw wachtwoord: *</label>
                                <input type="password" class="form-control" name="new-password" id="new-password">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="new-password-repeat">herhaal nieuw wachtwoord: *</label>
                                <input type="password" class="form-control" name="new-password-repeat" id="new-password-repeat">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

