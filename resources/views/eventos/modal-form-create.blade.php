<!-- Botón para agregar evento -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#modalformularioCrearEvento">
    <i class="bi bi-calendar-event"></i>
    Registrar Evento
</button>

<!-- Modal formulario crear evento -->
<div class="modal fade text-start" id="modalformularioCrearEvento" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Registrar Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('eventos.store') }}" method="POST"
                    id="formularioCrearEvento" class="row g-3 needs-validation" enctype="multipart/form-data"
                    novalidate>

                    @csrf
                    @method('POST')

                    <!-- Código del evento -->
                    <div class="col-xs-12 col-sm-6">
                        <label for="codigoEvento" class="form-label">Código del Evento</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text text-white bg-primary">
                                <i class="bi bi-hash"></i>
                            </span>
                            <input type="text" name="code" class="form-control" id="codigoEvento"
                                placeholder="Ingrese el código del evento"
                                value="{{ old('code') }}" required>
                            <div class="invalid-feedback">Por favor, ingrese el código del evento.</div>
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Nombre del evento -->
                    <div class="col-xs-12 col-sm-6">
                        <label for="nombreEvento" class="form-label">Nombre del Evento</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text text-white bg-primary">
                                <i class="bi bi-calendar-event"></i>
                            </span>
                            <input type="text" name="name" class="form-control" id="nombreEvento"
                                placeholder="Ingrese el nombre del evento"
                                value="{{ old('name') }}" required>
                            <div class="invalid-feedback">Por favor, ingrese el nombre del evento.</div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="col-xs-12 col-sm-6">
                        <label for="direccionEvento" class="form-label">Dirección</label>
                        <input type="text" name="address" class="form-control" id="direccionEvento"
                            placeholder="Ingrese la dirección"
                            value="{{ old('address') }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- País y Ciudad -->
                    <div class="col-xs-12 col-sm-6">
                        <label for="paisEvento" class="form-label">País</label>
                        <input type="text" name="country" class="form-control" id="paisEvento"
                            placeholder="Ingrese el país"
                            value="{{ old('country') }}">
                        @error('country')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <label for="ciudadEvento" class="form-label">Ciudad</label>
                        <input type="text" name="city" class="form-control" id="ciudadEvento"
                            placeholder="Ingrese la ciudad"
                            value="{{ old('city') }}">
                        @error('city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tipo de evento -->
                    <div class="col-xs-12 col-sm-6">
                        <label for="tipoEvento" class="form-label">Tipo de Evento</label>
                        <input type="text" name="type_id" class="form-control" id="tipoEvento"
                            placeholder="Ingrese el tipo de evento"
                            value="{{ old('type_id') }}">
                        @error('type_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Código de resolución -->
                    <div class="col-xs-12 col-sm-6">
                        <label for="codigoResolucion" class="form-label">Código de Resolución</label>
                        <input type="text" name="resolution_code" class="form-control" id="codigoResolucion"
                            placeholder="Ingrese el código de resolución"
                            value="{{ old('resolution_code') }}">
                        @error('resolution_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Fecha y hora de inicio -->
                    <div class="col-xs-12 col-sm-6">
                        <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" name="start_date" class="form-control" id="fechaInicio"
                            value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <label for="horaInicio" class="form-label">Hora de Inicio</label>
                        <input type="time" name="start_time" class="form-control" id="horaInicio"
                            value="{{ old('start_time') }}" required>
                        @error('start_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Fecha de finalización -->
                    <div class="col-xs-12 col-sm-6">
                        <label for="fechaFin" class="form-label">Fecha de Finalización</label>
                        <input type="date" name="end_date" class="form-control" id="fechaFin"
                            value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Archivos PDF -->
                    <div class="col-xs-12 col-sm-6">
                        <label for="pdfApertura" class="form-label">Archivo PDF de Apertura</label>
                        <input type="file" name="open_file" class="form-control" id="pdfApertura"
                            accept=".pdf">
                        @error('open_file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <label for="pdfCierre" class="form-label">Archivo PDF de Cierre</label>
                        <input type="file" name="close_file" class="form-control" id="pdfCierre"
                            accept=".pdf">
                        @error('close_file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botón de envío -->
                    <div class="col-12 text-center">
                        <button class="btn btn-success" type="submit">Registrar Evento</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
