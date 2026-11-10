@extends('layouts.app')

@section('title', 'Editar cliente')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">
                <h1 class="h3 fw-bold mb-2">Editar cliente</h1>
                <p class="text-secondary mb-4">Modifique la información y guarde los cambios.</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Revise los siguientes datos:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" id="correo" name="correo" class="form-control" value="{{ old('correo', $cliente->correo) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <input type="text" id="ciudad" name="ciudad" class="form-control" value="{{ old('ciudad', $cliente->ciudad) }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" class="form-control" rows="4">{{ old('mensaje', $cliente->mensaje) }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection