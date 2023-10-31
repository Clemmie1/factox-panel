<?php

namespace App\Livewire\Panel\StorageObject\Bucket\Actions;

use App\Models\ObjectStorage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ChangeBucketName extends Component
{

    use LivewireAlert;

    public $bucketID;

    #[Rule('required', message: 'Введите имя сегмента', onUpdate: true)]
    public $newBucketName;

    public function changeBucketName()
    {
        sleep(0.2);

        $this->validate();
        ObjectStorage::where('bucket_id', $this->bucketID)->update([
            'bucket_name' => $this->newBucketName
        ]);

        $this->dispatch('update-info');
        $this->reset('newBucketName');
        $this->dispatch('hideModal');

        $this->alert('success', "<a class='text-muted' style='font-weight: bold;'>Сохранено</a>", [
            'position' => 'bottom-end',
            'timer' => 3000,
            'width' => '200',
            'toast' => true,
        ]);

    }

    public function closeModel()
    {
        $this->reset('newBucketName');
    }

    public function render()
    {
        return view('livewire.panel.storage-object.bucket.actions.change-bucket-name');
    }
}
