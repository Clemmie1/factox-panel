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
        $get = ObjectStorage::query()->where([
            'owner_id' => Auth::user()->id
        ])->whereIn('status', [2,3,1])->orderByRaw("FIELD(status, 2, 3, 1)")->get();
        $this->data = $get;
    }

    public function loadDatas()
    {
        $get = ObjectStorage::query()->where([
            'owner_id' => Auth::user()->id
        ])->whereIn('status', [2,3,1])->orderByRaw("FIELD(status, 2, 3, 1)")->get();
        $this->data = $get;
    }

    public function render()
    {
        return view('livewire.panel.storage-object.load-bucket');
    }

}
