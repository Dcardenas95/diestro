<?php

namespace App\Http\Livewire;

use App\Models\Comision;
use App\Models\Inform;
use Livewire\Component;

class FilterComponent extends Component
{
    public $buscar;

    public function render()
    {
        $comision = Comision::where('active',true)->first();
        $informs = Inform::where('id_adviser','like','%'.$this->buscar.'%')
            ->orwhere('account','like','%'.$this->buscar.'%')
            ->orwhere('ot','like','%'.$this->buscar.'%')
            ->orwhere('name_adviser','like','%'.$this->buscar.'%')
            ->orwhere('package','like','%'.$this->buscar.'%')
            ->orwhere('cant_service','like','%'.$this->buscar.'%')
            ->orwhere('type_network','like','%'.$this->buscar.'%')
            ->orwhere('divide','like','%'.$this->buscar.'%')
            ->orwhere('area','like','%'.$this->buscar.'%')
            ->orwhere('zone','like','%'.$this->buscar.'%')
            ->orwhere('population','like','%'.$this->buscar.'%')
            ->orwhere('distrite','like','%'.$this->buscar.'%')
            ->orwhere('tercero','like','%'.$this->buscar.'%')
            ->orwhere('point','like','%'.$this->buscar.'%')
            ->orwhere('rent','like','%'.$this->buscar.'%')
            ->orwhere('group','like','%'.$this->buscar.'%')
            ->orwhere('category','like','%'.$this->buscar.'%')
            ->orwhere('date','like','%'.$this->buscar.'%')
            ->orwhere('venta','like','%'.$this->buscar.'%')
            ->orwhere('type_register','like','%'.$this->buscar.'%')
            ->orwhere('channel','like','%'.$this->buscar.'%')
            ->orwhere('number_contract','like','%'.$this->buscar.'%')
            ->orwhere('social_class','like','%'.$this->buscar.'%')
            ->orwhere('package_pg','like','%'.$this->buscar.'%')
            ->orwhere('package_pvd','like','%'.$this->buscar.'%')
            ->orwhere('cod_campaign','like','%'.$this->buscar.'%')
            ->orwhere('multiplay','like','%'.$this->buscar.'%')
            ->orwhere('type_product','like','%'.$this->buscar.'%')
            ->orwhere('area_gv','like','%'.$this->buscar.'%')
            ->orwhere('cod_rate','like','%'.$this->buscar.'%')
            ->paginate(15);

          
        return view('livewire.filter-component', compact('informs','comision'));
    }
}
