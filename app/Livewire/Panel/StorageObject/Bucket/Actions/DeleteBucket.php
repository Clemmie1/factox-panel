<?php

namespace App\Livewire\Panel\StorageObject\Bucket\Actions;

use App\Models\ObjectStorage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DeleteBucket extends Component
{

    public $bucketID;
    public $bucketConfirm;

    use LivewireAlert;

    public function deleteBucket()
    {

        if ($this->bucketConfirm == null)
        {
            $this->addError('bucketName', 'Введите название');
            return;
        }

        if ($this->bucketConfirm != $this->bucketID)
        {
            $this->addError('bucketName', 'Не верное название');
            return;
        }

        $get = \App\Http\Controllers\OCI\ObjectStorage\DeleteBucket::delete($this->bucketID);

        if (!$get){
            $this->addError('bucketName', 'Ведро не пустое. Сначала удалите все версии объекта.');
            $this->alert('error', "<a class='text-muted' style='font-weight: bold;'>Ведро не пустое.<br>Сначала удалите все версии объекта.</a>", [
                'position' => 'bottom-end',
                'timer' => 3000,
                'width' => '250',
                'toast' => true,
            ]);
            return;
        }
        sleep(2);
        ObjectStorage::where('bucket_id', $this->bucketID)->update([
            'status' => 4
        ]);
        $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Удалено</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '200',
            'toast' => true,
        ]);

        return $this->redirect(route('cloud.StorageObject.home'), true);

    }


    public function closeModel()
    {
        $this->reset('bucketConfirm');
    }

    public function render()
    {
        return view('livewire.panel.storage-object.bucket.actions.delete-bucket');
    }
}
