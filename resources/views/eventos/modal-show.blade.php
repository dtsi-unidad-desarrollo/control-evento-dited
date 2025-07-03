<!-- Modal Dialog Scrollable -->
<a type="button" class="" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable{{$event->id}}">
    <i class="bi bi-eye fs-4"></i>
</a>

<div class="modal fade" id="modalDialogScrollable{{$event->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Información del Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <section class="section profile">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                    <h2>{{ $event->name }}</h2>
                                    <h3>Código: {{ $event->code }}</h3>
                                    <h4>Ubicación: {{ $event->city }}, {{ $event->country }}</h4>
                                    
                                    <div class="container-fluid">
                                        <div class="row">
                                            <hr>
                                            <div class="col-md-12">
                                                <h3>Detalles del Evento</h3>
                                            </div>

                                            <div class="col-md-12 label"> 
                                                <span class="text-primary">Dirección:</span> {{ $event->address ?? 'No especificada' }} 
                                            </div>

                                            <div class="col-md-12 label"> 
                                                <span class="text-primary">Ciudad:</span> {{ $event->city ?? 'No especificada' }} 
                                            </div>

                                            <div class="col-md-12 label"> 
                                                <span class="text-primary">Pais:</span> {{ $event->country ?? 'No especificada' }} 
                                            </div>

                                            {{-- descomentar si se decea saber el status del evento --}}
                                            {{-- <div class="col-md-12 label {{ $event->status == 0 ? 'bg-danger' : 'bg-success' }}"> 
                                                <span class="text-primary">Estado:</span> {{ $event->status == 0 ? 'INACTIVO' : 'ACTIVO' }} 
                                            </div> --}}

                                            <div class="col-md-12 label"> 
                                                <span class="text-primary">Tipo de Evento:</span> {{ $event->type_id ?? 'No definido' }} 
                                            </div>

                                            <div class="col-md-12 label"> 
                                                <span class="text-primary">Código de Resolución:</span> {{ $event->resolution_code ?? 'No asignado' }} 
                                            </div>

                                            <div class="col-md-12 label"> 
                                                <span class="text-primary">Fecha de Inicio:</span> {{ $event->start_date }} a las {{ $event->start_time }} 
                                            </div>

                                            <div class="col-md-12 label"> 
                                                <span class="text-primary">Fecha de Finalización:</span> {{ $event->end_date ?? 'Sin definir' }} 
                                            </div>

                                            <div class="col-md-12 label"> 
                                                <span class="text-primary">Descripción:</span> {{ $event->description ?? 'No hay detalles adicionales.' }} 
                                            </div>

                                            <div class="col-md-12 label d-flex justify-content-center align-items-center "> 
                                                <span class="text-primary">Archivos adjuntos:</span> 
                                                @if ($event->open_file)
                                                    <a href="{{ asset('storage/' . $event->open_file) }}" target="_blank" class="btn btn-info btn-sm me-2 ">Ver archivo de apertura</a>
                                                @else
                                                    <span>No hay archivo de apertura</span>
                                                @endif
                                                @if ($event->close_file)
                                                    <a href="{{ asset('storage/' . $event->close_file) }}" target="_blank" class="btn btn-info btn-sm">Ver archivo de cierre</a>
                                                @else
                                                    <span>No hay archivo de cierre</span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>          
            </div>         
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
