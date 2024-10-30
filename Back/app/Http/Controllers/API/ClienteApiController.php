<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteApiController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = Cliente::all();

        if ($request->primer_nombre) {
            $users->where('primer_nombre', 'like', '%' . $request->name . '%');
        }
        if ($request->segundo_nombre) {
            $users->where('segundo_nombre', 'like', '%' . $request->name . '%');
        }
        if ($request->primer_apellido) {
            $users->where('primer_apellido', 'like', '%' . $request->name . '%');
        }
        if ($request->segundo_apellido) {
            $users->where('segundo_apellido', 'like', '%' . $request->name . '%');
        }
        if ($request->email) {
            $users->where('email', 'like', '%' . $request->email . '%');
        }

        return $this->sendResponse($users, 'Listado de clientes obtenido exitosamente!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //hola mundo
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $cliente = Cliente::create($input);

        return $this->sendResponse($cliente, 'Cliente guardado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente no encontrado', 404);
        }

        return $this->sendResponse($cliente, 'Cliente obtenido exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente no encontrado', 404);
        }

        $cliente->update($request->all());

        return $this->sendResponse($cliente, 'Cliente actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente no encontrado', 404);
        }

        $cliente->delete();

        return $this->sendSuccess('Cliente eliminado exitosamente!');
    }
}
