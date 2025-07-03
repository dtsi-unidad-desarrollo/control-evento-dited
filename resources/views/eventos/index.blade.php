@extends('layouts.app')

@section('title', 'Eventos')

@section('content')

    @if (session('mensaje'))
        @include('partials.alert')
    @endif

    <div id="alert"></div>

    {{-- respuesta de validadciones --}}
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger text-start">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <section class="section">
        <div class="row">

            <div class="col-12">
                <h2> Eventos </h2>
            </div>
            <div class="col-sm-6 col-xs-12">
                {{-- @include('admin.comensales.partials.modalFormulario') --}}

                
                {{-- @include('admin.comensales.partials.modalSincronizardata') --}}
            </div>
                <div class="col-sm-6 col-xs-12">
        <form action="{{ route('eventos.index') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="filtro" 
                    placeholder="Filtrar (Por código o por nombre)" 
                    value="{{ request('filtro') }}"
                    aria-label="Filtrar"
                    aria-describedby="button-addon2" required>
                <button class="btn btn-primary" type="submit" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>


            <div class="col-lg-12 table-responsive">
                <!-- Table with stripped rows -->

                <table class="table table-hover  bg-white mt-2">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th scope="col">#</th>
                            <th scope="col">Nombre del evento</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Fecha de inicio</th>
                            <th scope="col">Fecha de cierre</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($events as $event)
                        <tr>
                            <td scope="row">{{ $event->id }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->code }}</td>
                            <td>{{ $event->address }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>
                                
                        {{-- Botón para ver detalles del evento --}}
                         @include('eventos.modal-show') 

                        {{-- Botón para editar --}}
                         @include('eventos.modal-form-edit') 

                        {{-- Botón para eliminar --}}
                        @include('eventos.modal-delete')

                        

                        
                            </td>
                         </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>

                            <td colspan="7" class="text-center table-secondary">
                                Total de eventos: {{ $events->total() }} | 
                                <a href="{{ route('eventos.index') }}"
                                   class="text-primary" >
                                    Ver todo
                                </a>
                                <br>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                

                <!-- End Table with stripped rows -->
                <div class="d-flex justify-content-center">
                    {{ $events->appends(['filtro' => request('filtro')])->links() }}

                </div> 

            </div>


          
            
        </div>

        <!-- Botón para agregar evento -->
        @include('eventos.modal-form-create')


    </section>
    <script src="{{ asset('assets/js/comensales/editar.js') }}" defer></script>
@endsection
