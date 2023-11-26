<?php

namespace App\Livewire\Panel\AI;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LanguageTranslation extends Component
{

    use LivewireAlert;

    public $text;
    public $sourceLanguageCode;
    public $targetLanguageCode;

    public $translatedText = 'Перевод';

    public function translateText()
    {

        if ($this->text != null && $this->text != '')
        {
            $get = \App\Http\Controllers\OCI\AI\LanguageTranslation::textTranslation($this->text, 'en', 'ru');
            $this->translatedText = $get['documents'][0]['translatedText'];

        }

    }

    public function resetText()
    {
        $this->reset('text');
        $this->translatedText = 'Перевод';
    }

    public function render()
    {
        return view('livewire.panel.a-i.language-translation');
    }
}
