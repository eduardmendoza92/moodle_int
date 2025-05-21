@extends('layouts.app') <!-- Hereda de app.blade.php -->

@section('title', 'Página de Inicio') <!-- Título dinámico -->

@section('content') <!-- Contenido principal -->
<div class="row mb-5 justify-content-center">
    <div class="col-lg-12 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        <form>
            <div class="table-responsive table-striped">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dirección Email</th>
                            <th>Último Acceso</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->lastaccess == 0 ? 'Nunca' : \Carbon\Carbon::createFromTimestamp($user->lastaccess)->locale('es')->diffForHumans(null, false, false, 2) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('profile.edit', $user->id) }}">Editar Perfil</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('users.toggleSuspend', $user->id) }}">
                                                {{ $user->suspended ? 'Reactivar' : 'Suspender' }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
@endsection