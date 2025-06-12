<?php

namespace App\Http\Livewire;

use App\Models\Users\UserDepartament;
use App\Models\Users\UserPosition;
use Livewire\Component;
use Livewire\WithPagination;

class CargosTable extends Component
{
    use WithPagination;

    public $buscar;
    public $perPage = 10;
    public $sortColumn = 'created_at'; // Columna por defecto
    public $sortDirection = 'desc'; // Dirección por defecto
    protected $cargos; // Propiedad protegida para los usuarios

    public function mount(){
    }


    public function render()
    {
        $this->actualizarNominas(); // Ahora se llama directamente en render para refrescar los clientes.
        return view('livewire.cargos-table', [
            'cargos' => $this->cargos
        ]);
    }

    protected function actualizarNominas()
    {
        // Comprueba si se ha seleccionado "Todos" para la paginación
        $query = UserPosition::when($this->buscar, function ($query) {
            $query->where('name', 'like', '%' . $this->buscar . '%');
        });

        $query->orderBy($this->sortColumn, $this->sortDirection);

        // Verifica si se seleccionó 'all' para mostrar todos los registros
        $this->cargos = $this->perPage === 'all' ? $query->get() : $query->paginate(is_numeric($this->perPage) ? $this->perPage : 10);
    }
    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }
    public function updating($propertyName)
    {
        if ($propertyName === 'buscar') {
            $this->resetPage(); // Resetear la paginación solo cuando estos filtros cambien.
        }
    }

}
