@extends('layouts.app') <!-- Hereda de app.blade.php -->

@section('title', 'Página de Inicio') <!-- Título dinámico -->

@section('content') <!-- Contenido principal -->
<div class="untree_co-hero inner-page" >
    <div class="container">
        <div class="row align-items-center justify-content-center" style="z-index: 1;">
            <div class="col-12">
                <div class="row justify-content-center ">
                    <div class="col-lg-6 text-center ">
                        <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Subir Documentos</h1>

                    </div>
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->

</div> <!-- /.untree_co-hero -->
<div class="untree_co-section" style="z-index: 2;">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-lg-5 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                <form action="#" class="form-box">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <input type="file" class="form-control" name="uploaded_file" placeholder="Subir Archivo">
                        </div>

                        <div class="col-12">
                            <input type="submit" value="Registrarse" class="btn btn-primary" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div> <!-- /.untree_co-section -->
@endsection