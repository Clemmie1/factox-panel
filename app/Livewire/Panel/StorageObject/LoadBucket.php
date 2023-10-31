<?php

namespace App\Livewire\Panel\StorageObject;

use App\Models\ObjectStorage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoadBucket extends Component
{

    public $data = null;

    public function loadData()
    {
        sleep(1);
        $get = ObjectStorage::where('owner_id', Auth::user()->id)->get();
        $this->data = $get;
    }

    public function loadDatas()
    {
        $get = ObjectStorage::where('owner_id', Auth::user()->id)->get();
        $this->data = $get;
    }

    public function render()
    {
        return view('livewire.panel.storage-object.load-bucket');
    }

}
