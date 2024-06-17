<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    //Atributos propios del componente (el valor que se les da desde las vistas, .blade.php, donde se emplea el componente se les asigna en el _construct())
    public $color; 

    /**
     * Create a new component instance.
     */
    public function __construct($color = 'orange') //$color vendría a ser el parámetro al cuál se le da valor desde las vistas (.blade.php) donde se manda a llamar al componente. Se inicializa ya con un determinado valor, por si en las vistas cuando se emplea el componente no se le asigna valor al parámetro no marque error, y tenga el ya definido acá
    {
        $this->color = $color; //Se le asigna el valor que fue mandado desde las vistas (.blade.php) donde se manda a llamar al componente al atributo del componente. Y ya este atributo, con su respectivo valor, podrá ser empleado dentro de la vista del componente
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }

    //Función para ver lo de métodos en componentes de clase
    public function prueba(){
        if($this->color=="red"){
            return "Esta es una alerta de peligro";
        }
    }
}
