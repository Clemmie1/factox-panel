<?php

namespace App\Livewire\Components\Panel;

use Livewire\Component;

class AsideBar extends Component
{

    public function getPageSO()
    {
        $this->redirect(route('cloud.StorageObject.home'), true);
    }

    public function render()
    {
        return view('livewire.components.panel.aside-bar');
    }
}
