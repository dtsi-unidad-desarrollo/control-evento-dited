<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Models\{
    User,
    DataDev,
    Helpers,
    Permiso,
    Role
};

class EventController extends Controller
{
    //  Listar eventos
    public function index(Request $request)
{
    try {
        $respuesta = DataDev::$respuesta;
        $usuarios = Helpers::getUsuarios();

        $query = Event::query();

        // Aplica filtro solo si hay texto en el input
        if ($request->filled('filtro')) {
            $query->where('name', 'LIKE', '%' . $request->input('filtro') . '%')
                  ->orWhere('code', 'LIKE', '%' . $request->input('filtro') . '%');
        }

        $events = $query->orderBy('start_date', 'DESC')
                        ->paginate(2)
                        ->appends(['filtro' => $request->input('filtro')]);

        return view('eventos.index', compact('events', 'respuesta'));

    } catch (\Throwable $th) {
        $errorInfo = Helpers::getMensajeError($th, "Error al Consultar eventos en el metodo index,");
        return response()->view('errors.404', compact("errorInfo"), 404);
    }
}


    //  Mostrar formulario para crear un evento
    public function create()
    {
        $roles = Role::all(); // ajustar
        $respuesta = DataDev::$respuesta; // Si aplica
        return view('eventos.crear', compact('roles', 'respuesta')); // Ajustado a la estructura de vistas
    }

    //  Guardar un nuevo evento
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:155',
                'code' => 'required|unique:events,code|max:100',
                'address' => 'nullable|max:255',
                'country' => 'nullable|max:100',
                'city' => 'nullable|max:100',
                'type_id' => 'nullable|max:11',
                'resolution_code' => 'nullable|max:100',
                'start_date' => 'required|date',
                'start_time' => 'required|date_format:H:i',
                'end_date' => 'nullable|date|after:start_date',
                'open_file' => 'nullable|mimes:pdf|max:2048',
                'close_file' => 'nullable|mimes:pdf|max:2048',
            ]);

            $event = new Event($request->all());

            // Manejo de archivos PDF
            if ($request->hasFile('open_file')) {
                $path = $request->file('open_file')->store('pdfs/open', 'public');
                $event->open_file = $path;
}
            if ($request->hasFile('close_file')) {
                $path = $request->file('close_file')->store('pdfs/close', 'public');
                $event->open_file = $path;
            }

            $event->save();
            $respuesta = DataDev::$respuesta;
             return redirect()->route('eventos.index')->with('respuesta', 'Evento creado con éxito');
        } catch (\Throwable $th){
           $errorInfo = Helpers::getMensajeError($th, "Error de al guardar evento,");
            return response()->view('errors.404', compact("errorInfo"), 404);
        }
    }

    //  Mostrar detalles de un evento
    public function show(Event $event)
    {
        return view('eventos.modal-show', compact('event')); // Vista adaptada a la estructura
    }   

    //  Mostrar formulario para editar un evento
    public function edit(Event $event)
    {
        return view('eventos.modal-form-edit', compact('event')); // Vista adaptada
    }

    //  Actualizar un evento
    public function update(Request $request, Event $event)
    {
        try {
            // $request->validate([
            //     'name' => 'required|max:155',
            //     'code' => 'required|unique:events,code,' . $event->id . '|max:100',
            //     'address' => 'nullable|max:255',
            //     'country' => 'nullable|max:100',
            //     'city' => 'nullable|max:100',
            //     'type_id' => 'nullable|max:11',
            //     'resolution_code' => 'nullable|max:100',
            //     'start_date' => 'required|date',
            //     'start_time' => 'required|date_format:H:i',
            //     'end_date' => 'nullable|date|after:start_date',
            //     'open_file' => 'nullable|mimes:pdf|max:2048',
            //     'close_file' => 'nullable|mimes:pdf|max:2048',
            // ]);

            // 📂 Manejo de archivos PDF
       //  Base: todos los campos del formulario
        $validatedData = $request->all();

        //  Eliminar archivo de apertura si el usuario lo solicita
        if ($request->filled('remove_open_file') && $event->open_file) {
            $this->deletePdf($event->open_file);
            $validatedData['open_file'] = null;
        }

        //  Subir nuevo archivo de apertura
        if ($request->hasFile('open_file')) {
            if ($event->open_file) {
                $this->deletePdf($event->open_file);
            }
            $validatedData['open_file'] = $this->storePdf($request->file('open_file'), 'open');
        }

        // Eliminar archivo de cierre si el usuario lo solicita
        if ($request->filled('remove_close_file') && $event->close_file) {
            $this->deletePdf($event->close_file);
            $validatedData['close_file'] = null;
        }

        //  Subir nuevo archivo de cierre
        if ($request->hasFile('close_file')) {
            if ($event->close_file) {
                $this->deletePdf($event->close_file);
            }
            $validatedData['close_file'] = $this->storePdf($request->file('close_file'), 'close');
        }

        //  Actualizar con todos los datos (incluidos archivos)
        $event->update($validatedData);

        return redirect()
            ->route('eventos.index')
            ->with('respuesta', ' Evento actualizado correctamente');

    } catch (\Throwable $th) {
        $errorInfo = Helpers::getMensajeError($th, " Error al actualizar el evento:");
        return response()->view('errors.404', compact("errorInfo"), 404);
    }
}

    private function deletePdf($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }
        return false;
    }
private function storePdf($file, $type)
{
    $path = $file->store("eventos/pdf/{$type}", 'public');

    if (!$path) {
        throw new \Exception("Error al subir el archivo PDF");
    }

    return $path;
}

    //  Eliminar un evento
    public function destroy(Event $event)
    {
        try {
            if ($event->open_file) {
                Storage::disk('public')->delete($event->open_file);
            }
            if ($event->close_file) {
                Storage::disk('public')->delete($event->close_file);
            }

            $event->delete();
            return redirect()->route('eventos.index')->with('respuesta', 'Evento eliminado con éxito');
    } catch (\Throwable $th) {
        $errorInfo = Helpers::getMensajeError($th, "Error de consula,");
        return response()->view('errors.404', compact("errorInfo"), 404);
    }
}
}
