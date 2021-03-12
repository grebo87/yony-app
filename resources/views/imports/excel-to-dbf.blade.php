@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Exportar datos des excel a .dbf</h1>
                <!-- <p class="lead">Complete with pre-defined file paths and responsive navigation!</p> -->
                <form class="row g-3" method="POST" action="{{route('import-data-to-dbf')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-auto">
                        <!-- <label for="formFile" class="form-label">Default file input example</label> -->
                        <input class="form-control" type="file" id="file" name="file" required>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3" onclick="return confirm('¿Está seguro que desea enviar el archivo?')">Eviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
