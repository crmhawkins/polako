<?php

namespace App\Http\Livewire;

use App\Models\Maquinas\Maquina;
use Livewire\Component;
use Livewire\WithPagination;

class MaquinasTable extends Component
{
    use WithPagination;

    public $buscar;
    public $perPage = 10;
    public $sortColumn = 'created_at'; // Columna por defecto
    public $sortDirection = 'desc'; // Dirección por defecto
    protected $salones;

    public function mount(){
    }

    public function render()
    {
        $this->actualizarClientes();
        return view('livewire.maquinas-table', [
            'maquinas' => $this->salones
        ]);
    }

    protected function actualizarClientes()
    {
        $query = Maquina::when($this->buscar, function ($query) {
                $query->where('nombre', 'like', '%' . $this->buscar . '%')
                    ->where('n_serie', 'like', '%' . $this->buscar . '%');
            });

            $query->orderBy($this->sortColumn, $this->sortDirection);

            // Verifica si se seleccionó 'all' para mostrar todos los registros
            $this->salones = $this->perPage === 'all' ? $query->get() : $query->paginate(is_numeric($this->perPage) ? $this->perPage : 10);
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
            $this->resetPage();
        }
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }
}
