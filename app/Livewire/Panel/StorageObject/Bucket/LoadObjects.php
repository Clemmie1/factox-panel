<?php

namespace App\Livewire\Panel\StorageObject\Bucket;

use App\Http\Controllers\OCI\ObjectStorage\ListObjects;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class LoadObjects extends Component
{

    public $data = null;
    public $bucketID;

    public function mount()
    {
        $this->data = ListObjects::getList($this->bucketID);
    }

    /*public function loadObjects()
    {
        $this->data = ListObjects::getList("bucket-6k4fy16uxq");
    }*/

    public function reload()
    {
        $this->data = ListObjects::getList($this->bucketID);

    }

    #[Lazy]
    public function placeholder()
    {
        return view('Components.Lazy.ObjectStorage.loadBucketObjects');
    }

    public function render()
    {
        return view('livewire.panel.storage-object.bucket.load-objects');
    }
}
