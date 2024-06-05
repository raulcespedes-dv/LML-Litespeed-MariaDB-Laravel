<div>
    <div class="container">
        <div class="input-group mb-3">
            <input type="text" wire:model.live="buscar" class="form-control" placeholder="Buscar...">
            <button type="button" class="btn btn-primary m-2 rounded btn-lg" data-bs-toggle="modal"
                data-bs-target="#FormaModal">Nuevo</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Edad</th>
                    <th scope="col" class="text-end">Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <th scope="row">{{ $estudiante->id }}</th>
                        <td>{{ $estudiante->nombres }}</td>
                        <td>{{ $estudiante->direccion }}</td>
                        <td>{{ $estudiante->edad }}</td>
                        <td class="text-end">
                            <div class="btn-group text-end" role="group">
                                <button type="button" class="btn btn-primary m-2 rounded" data-bs-toggle="modal"
                                    data-bs-target="#FormaModal"
                                    wire:click='edit("{{ $estudiante->id }}")'>Editar</button>
                                <button type="button" class="btn btn-danger m-2 rounded"
                                    wire:click='remove("{{ $estudiante->id }}")'>Borrar</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $estudiantes->links() }}
    </div>

    @include('components.modalheader')

    <div class="mb-3">
        <label for="nombres" class="form-label">Nombres:</label>
        <input type="email" class="form-control" id="nombres" wire:model.lazy='nombres' placeholder="Nombres...">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección:</label>
        <input type="text" class="form-control" id="direccion" wire:model.lazy='direccion'
            placeholder="Direccion..."></input>
    </div>
    <div class="mb-3">
        <label for="edad" class="form-label">Edad:</label>
        <input type="number" class="form-control" id="edad" wire:model.lazy='edad' placeholder="Edad...">
    </div>

    @include('components.modalfooter')
</div>
