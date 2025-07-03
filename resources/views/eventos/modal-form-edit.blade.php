{{-- Botón de editar evento --}}
<a type="button" class="text-warning" data-bs-toggle="modal"
   data-bs-target="#modalformularioEditarEvento{{ $event->id }}">
   <i class="bi bi-pencil fs-4"></i>
</a>

<!-- Modal formulario editar evento -->
<div class="modal fade text-start" id="modalformularioEditarEvento{{ $event->id }}" data-bs-backdrop="static"
   data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
       <div class="modal-content">
           <div class="modal-header bg-primary text-white">
               <h5 class="modal-title" id="staticBackdropLabel">Actualizar datos del evento</h5>
               <button type="button" class="btn-danger" data-bs-dismiss="modal" aria-label="Cerrar"></button>
           </div>
           <div class="modal-body">
               <form action="{{ route('eventos.update', $event->id) }}" method="POST"
                   id="formularioEditarEvento" class="row g-3 needs-validation" enctype="multipart/form-data"
                   novalidate>
                   @csrf
                   @method('PUT')

                   <!--Elemento archivo PDF actual-->
                   <div class="row text-center">
                       @if ($event->open_file)
                           <a href="{{ asset('storage/' . $event->open_file) }}" target="_blank" class="btn btn-info">Ver archivo de apertura</a>
                       @else
                           <div class="col-md-6 mb-2" role="alert">
                               NO POSEE ARCHIVO DE APERTURA
                           </div>
                       @endif
                       @if ($event->close_file)
                           <a href="{{ asset('storage/' . $event->close_file) }}" target="_blank" class="btn btn-info mt-2">Ver archivo de cierre</a>
                       @else
                           <div class="col-md-6 mb-2" role="alert">
                               NO POSEE ARCHIVO DE CIERRE
                           </div>
                       @endif
                   </div>
                   <!-- Subir nuevo archivo de apertura -->
                    <div class="col-12">
                        <label for="open_file" class="form-label">Archivo de apertura (PDF)</label>
                        <input type="file" name="open_file" class="form-control" accept="application/pdf">
                        @if ($event->open_file)
                            <div class="form-check mt-1">
                                <input type="checkbox" name="remove_open_file" value="1" class="form-check-input" id="quitarApertura">
                                <label class="form-check-label" for="quitarApertura">Eliminar archivo de apertura actual</label>
                            </div>
                        @endif
                    </div>

                    <!--  Subir nuevo archivo de cierre -->
                    <div class="col-12 mt-3">
                        <label for="close_file" class="form-label">Archivo de cierre (PDF)</label>
                        <input type="file" name="close_file" class="form-control" accept="application/pdf">
                        @if ($event->close_file)
                            <div class="form-check mt-1">
                                <input type="checkbox" name="remove_close_file" value="1" class="form-check-input" id="quitarCierre">
                                <label class="form-check-label" for="quitarCierre">Eliminar archivo de cierre actual</label>
                            </div>
                        @endif
                    </div>
                   <!-- CIERRE Elemento archivo PDF actual -->

                   <!-- Nombre del evento -->
                   <div class="col-xs-12 col-sm-6">
                       <label for="nombreEvento" class="form-label">Nombre del Evento</label>
                       <div class="input-group has-validation">
                           <span class="input-group-text text-white bg-primary">
                               <i class="bi bi-calendar-event"></i>
                           </span>
                           <input type="text" name="name" class="form-control" id="nombreEvento"
                               placeholder="Ingrese el nombre del evento"
                               value="{{ old('name') ?? $event->name }}" required>
                           <div class="invalid-feedback">Por favor, ingrese el nombre del evento.</div>
                           @error('name')
                               <div class="text-danger">{{ $message }}</div>
                           @enderror
                       </div>
                   </div><!-- CIERRE Input Nombre -->

                   <!-- Código del evento -->
                   <div class="col-xs-12 col-sm-6">
                       <label for="codigoEvento" class="form-label">Código del Evento</label>
                       <input type="text" name="code" class="form-control" id="codigoEvento"
                           placeholder="Ingrese el código del evento"
                           value="{{ old('code') ?? $event->code }}" required>
                       @error('code')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div><!-- CIERRE Input Código -->

                   <!-- Dirección -->
                   <div class="col-xs-12 col-sm-6">
                       <label for="direccionEvento" class="form-label">Dirección</label>
                       <input type="text" name="address" class="form-control" id="direccionEvento"
                           placeholder="Ingrese la dirección"
                           value="{{ old('address') ?? $event->address }}">
                       @error('address')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div><!-- CIERRE Input Dirección -->

                   <!-- País y Ciudad -->
                   <div class="col-xs-12 col-sm-6">
                       <label for="paisEvento" class="form-label">País</label>
                       <input type="text" name="country" class="form-control" id="paisEvento"
                           placeholder="Ingrese el país"
                           value="{{ old('country') ?? $event->country }}">
                       @error('country')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div><!-- CIERRE Input País -->

                   <div class="col-xs-12 col-sm-6">
                       <label for="ciudadEvento" class="form-label">Ciudad</label>
                       <input type="text" name="city" class="form-control" id="ciudadEvento"
                           placeholder="Ingrese la ciudad"
                           value="{{ old('city') ?? $event->city }}">
                       @error('city')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div><!-- CIERRE Input Ciudad -->

                   <!-- Fecha y hora de inicio -->
                   <div class="col-xs-12 col-sm-6">
                       <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                       <input type="date" name="start_date" class="form-control" id="fechaInicio"
                           value="{{ old('start_date') ?? $event->start_date }}" required>
                       @error('start_date')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div><!-- CIERRE Fecha Inicio -->

                   <div class="col-xs-12 col-sm-6">
                       <label for="horaInicio" class="form-label">Hora de Inicio</label>
                       <input type="time" name="start_time" class="form-control" id="horaInicio"
                           value="{{ old('start_time') ?? $event->start_time }}" required>
                       @error('start_time')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div><!-- CIERRE Hora Inicio -->

                   <!-- Estado del evento -->

                   {{-- <div class="form-check form-switch col-xs-12 col-sm-6">
                       <input class="form-check-input" type="checkbox" id="eventoActivo"
                           value="1" name="status" {{ $event->status ? 'checked' : '' }}>
                       <label class="form-check-label" for="eventoActivo">
                           {{ $event->status ? 'ACTIVO' : 'INACTIVO' }}
                       </label>
                   </div> --}}
                   
                   <!-- CIERRE Estado -->

                   <!-- Botón de actualización -->
                   <div class="col-12 text-center">
                       <button class="btn btn-success" type="submit">Actualizar Evento</button>
                   </div>

               </form>
           </div>
       </div>
   </div>
</div>
