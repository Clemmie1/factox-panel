<?php

namespace App\Livewire\Panel\StorageObject\Bucket;

use App\Models\ObjectStorage;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class LoadInfo extends Component
{

    public $bucketID;

    public $data = null;

    public $bucketName = '';

    public function loadData()
    {
        $this->dispatch('KTComponents');
        sleep(0.1);
        $get = ObjectStorage::where('bucket_id', $this->bucketID)->get();
        $this->bucketName = $get[0]['bucket_name'];
        $this->data = $get;
    }

    #[On('update-info')]
    public function updateInfo()
    {
        $get = ObjectStorage::where('bucket_id', $this->bucketID)->get();
        $this->data = $get;
    }


    public function render()
    {
        return view('livewire.panel.storage-object.bucket.load-info', [
            'data' => ObjectStorage::where('bucket_id', $this->bucketID)->get()
        ]);
    }
}
