<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalDelete extends Component
{
    public $nim;
    public $nama;

    public function __construct($nim, $nama)
    {
        $this->nim = $nim;
        $this->nama = $nama;
    }
    public function render()
    {
        return view('components.modal-delete');
    }
}
