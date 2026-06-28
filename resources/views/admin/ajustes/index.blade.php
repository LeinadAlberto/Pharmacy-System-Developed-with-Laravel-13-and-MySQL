@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ajustes del sistema</h3>
                <p class="text-subtitle text-muted">Actualiza la configuración general de la aplicación.</p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Configuración general</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ajustes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                                        <input type="text" class="form-control" value="{{ old('nombre', $configuracion->nombre ?? '') }}" name="nombre" placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('nombre')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" class="form-control" name="email" value="{{ old('email', $configuracion->email ?? '') }}" placeholder="correo@dominio.com" required>
                                    </div>
                                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="text" class="form-control" name="telefono" value="{{ old('telefono', $configuracion->telefono ?? '') }}" placeholder="Ej: 341-1234567">
                                    </div>
                                    @error('telefono')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Divisa</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                        <input type="text" class="form-control" name="divisa" value="{{ old('divisa', $configuracion->divisa ?? '') }}" placeholder="Ej: USD, EUR">
                                    </div>
                                    @error('divisa')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Dirección</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        <input type="text" class="form-control" name="direccion" value="{{ old('direccion', $configuracion->direccion ?? '') }}" placeholder="Escriba aquí...">
                                    </div>
                                    @error('direccion')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Descripción</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                        <textarea class="form-control" name="descripcion" placeholder="Descripción...">{{ old('descripcion', $configuracion->descripcion ?? '') }}</textarea>
                                    </div>
                                    @error('descripcion')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Sitio web</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-globe"></i></span>
                                        <input type="url" class="form-control" name="web" value="{{ old('web', $configuracion->web ?? '') }}" placeholder="https://tu-sitio.com">
                                    </div>
                                    @error('web')<small class="text-danger">{{ $message }}</small>@enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-group mt-4 text-end">
                                        <button type="submit" class="btn btn-primary">Guardar ajustes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="card-title">Logo</h5>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Cargar logo</label>
                                        <input type="file" accept="image/*" id="logoInput" name="logo" class="form-control">
                                        @error('logo')<small class="text-danger">{{ $message }}</small>@enderror
                                    </div>

                                    <div class="border rounded p-3" style="background: #f8f9ff; min-height: 260px;">
                                        <div class="mb-3" style="min-height: 180px; display: flex; align-items: center; justify-content: center;">
                                            <img id="logoPreview" src="{{ !empty($configuracion->logo) ? asset('storage/' . $configuracion->logo) : '' }}" alt="Previsualización del logo" class="img-fluid" style="max-height: 180px; object-fit: contain; display: block; margin: 0 auto; background: #fff; {{ empty($configuracion->logo) ? 'display: none;' : '' }}">
                                        </div>
                                        <div class="text-center">
                                            <p class="mb-0 text-muted">Aquí se mostrará la previsualización del logo.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const input = document.getElementById('logoInput');
		const preview = document.getElementById('logoPreview');
		
		if (!input || !preview) return;
		
		input.addEventListener('change', function (e) {
			const file = e.target.files[0];
			if (!file) return;
			
			const reader = new FileReader();
			reader.onload = function (evt) {
				preview.src = evt.target.result;
				preview.style.display = 'block';
			};
			reader.readAsDataURL(file);
		});
	});
</script>

@endsection
