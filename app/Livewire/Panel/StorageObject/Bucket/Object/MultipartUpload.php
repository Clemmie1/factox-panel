<?php

namespace App\Livewire\Panel\StorageObject\Bucket\Object;

use Livewire\Component;
use Livewire\WithFileUploads;

class MultipartUpload extends Component
{

    use WithFileUploads;

    public $file;
    public $uploadedFileData = [];

    public function updated()
    {
        $this->uploadedFileData[] = [
            'fileName' => $this->file->getClientOriginalName(),
            'fileSize' => $this->formatSizeUnits($this->file->getSize()),
        ];
    }

    public function deleteFile($index)
    {
        if (isset($this->uploadedFileData[$index])) {
            unset($this->uploadedFileData[$index]);
            $this->uploadedFileData = array_values($this->uploadedFileData);
        }
    }

    public function getFiles()
    {
        dd($this->uploadedFileData);
    }

    public function closeModel()
    {

    }

    private function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return '1 byte';
        } else {
            return '0 bytes';
        }
    }

    public function render()
    {
        return view('livewire.panel.storage-object.bucket.object.multipart-upload');
    }
}
