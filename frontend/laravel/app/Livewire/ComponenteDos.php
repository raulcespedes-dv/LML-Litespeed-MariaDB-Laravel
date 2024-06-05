<?php

namespace App\Livewire;

use App\Models\Estudiante;
use Livewire\Component;
use Livewire\WithPagination;

class ComponenteDos extends Component

{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $buscar;

    public $Id, $nombres, $direccion, $edad;

    public function render()
    {
        if ($this->buscar == "") {
            $estudiantes = Estudiante::paginate(4);
        } else {
            $estudiantes = Estudiante::where('nombres', 'like', "%$this->buscar%")->paginate(4);
        }

        //dd($estudiantes);
        return view('livewire.componente-dos', compact('estudiantes'));
    }

    public function store()
    {
        $estudiante = new Estudiante();
        $estudiante->nombres = $this->nombres;
        $estudiante->direccion = $this->direccion;
        $estudiante->edad = $this->edad;

        $estudiante->save();
        $this->clear();
    }

    public function clear()
    {
        $this->nombres = "";
        $this->direccion = "";
        $this->edad = "";
    }

    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        $this->clear();
        $this->nombres = $estudiante->nombres;
        $this->direccion = $estudiante->direccion;
        $this->edad = $estudiante->edad;
        $this->Id = $estudiante->id;
    }

    public function update($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->nombres = $this->nombres;
        $estudiante->direccion = $this->direccion;
        $estudiante->edad = $this->edad;
        $estudiante->save();
        $this->clear();
    }

    public function remove($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
        $this->clear();
    }
}
