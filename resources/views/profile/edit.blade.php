@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Perfil</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Campos básicos del usuario -->
        <div class="mb-3">
            <label for="firstname" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}" required>
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <!-- Campo para Curriculum -->
        <div class="mb-3">
            <label for="curriculum" class="form-label">Curriculum (PDF, DOC, DOCX)</label>
            <input type="file" class="form-control" id="curriculum" name="curriculum">
            @if($curriculum)
                <p class="mt-2">Archivo actual: <a href="{{ asset('storage/' . $curriculum->filename) }}" target="_blank">{{ $curriculum->filename }}</a></p>
            @endif
        </div>

        <!-- Campo para Documentación -->
        <div class="mb-3">
            <label for="documentation" class="form-label">Documentación (hasta 4 archivos, PDF, DOC, DOCX, JPG, PNG)</label>
            <input type="file" class="form-control" id="documentation" name="documentation[]" multiple>
            @if($documentation->count())
                <p class="mt-2">Archivos actuales:</p>
                <ul>
                    @foreach($documentation as $doc)
                        <li><a href="{{ asset('storage/' . $doc->filename) }}" target="_blank">{{ $doc->filename }}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
    </form>
</div>
@endsection