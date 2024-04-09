<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalDelete extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $nim;
    public $nama;

    public function __construct($nim, $nama)
    {
        $this->nim = $nim;
        $this->nama = $nama;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-delete');
    }
}
