<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputComponent extends Component
{
    public $name;
    public $type;
    public $label;
    public $placeholder;
    public $id;
    public $value;

    public function __construct($name, $type, $label, $placeholder, $id, $value ='')
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->id = $id;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-component');
    }
}
