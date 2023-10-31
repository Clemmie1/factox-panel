<?php

namespace App\Livewire\Panel\AI;

use Livewire\Component;

class LanguagePretrained extends Component
{
    public $text;
    public $results = false;

    public $BatchDetectDominantLanguageResult = null;
    public $BatchDetectLanguageTextClassificationResult = null;
    public $BatchDetectLanguageEntitiesResult = null;
    public $BatchDetectLanguageKeyPhrasesResult = null;

    public function sendT(){

        $this->BatchDetectDominantLanguageResult = \App\Http\Controllers\OCI\AI\LanguagePretrained::BatchDetectDominantLanguage($this->text);
        $this->BatchDetectLanguageTextClassificationResult = \App\Http\Controllers\OCI\AI\LanguagePretrained::BatchDetectLanguageTextClassification($this->text);
        $this->BatchDetectLanguageEntitiesResult = \App\Http\Controllers\OCI\AI\LanguagePretrained::BatchDetectLanguageEntities($this->text);
        $this->BatchDetectLanguageKeyPhrasesResult = \App\Http\Controllers\OCI\AI\LanguagePretrained::BatchDetectLanguageKeyPhrases($this->text);

        $this->results = true;
    }

    public function resetT()
    {
        $this->reset('text');
        $this->results = false;
    }

    public function render()
    {
        return view('livewire.panel.a-i.language-pretrained');
    }
}
