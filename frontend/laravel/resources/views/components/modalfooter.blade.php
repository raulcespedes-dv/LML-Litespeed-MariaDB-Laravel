</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
        @if ($Id == 0) wire:click='store' @else wire:click='update("{{ $Id }}")' @endif>Guardar
        cambios</button>
</div>
</div>
</div>
</div>
