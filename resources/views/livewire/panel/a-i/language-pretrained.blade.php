<div>
    <div class="card card-docs flex-row-fluid mb-2" id="kt_docs_content_card">
        <!--begin::Card Body-->
        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">

            <h1 class="text-center fw-bold mb-8" style="font-size: 3em">
                Аналитическая обработка текста
            </h1>

            <div class="fw-semibold fs-4 text-gray-500 mb-10 text-center">
                Предварительно обученные сервис и API языков выявляют информацию в неструктурированном тексте с использованием обработки естественного языка (NLP). Используйте стандартный текст или введите другой текст для просмотра результатов анализа.
            </div>

            <div class="card">

                <div class="card-body">
                    <div class="g-10">
                        <div class="">
                            <p class="mb-2">Исходный язык</p>
                            <select class="form-select mb-6" data-control="select2" data-placeholder="Select an option">
                                <option value="1" selected>Auto</option>
                            </select>
                            <textarea wire:model.live="text" class="form-control form-control form-control-solid" data-kt-autosize="false" rows="10" placeholder="Введите текст"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex">
                    <div>
                        <button wire:click="sendT" wire:loading.remove wire:target="sendT" class="btn btn-secondary me-3" style="height: 52px">Анализ</button>
                        <button disabled wire:loading wire:target="sendT" class="btn btn-secondary me-3" style="height: 52px">
                            <div class="col" style="display: flex; justify-content: center; align-items: center;">
                                <div class="sk-chase sk-secondary">
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                    <div class="sk-chase-dot"></div>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div>
                        <button wire:click="resetT" href="#" class="btn btn-secondary" style="height: 52px">Сбросить</button>
                    </div>
                </div>

            </div>

        </div>
        <!--end::Card Body-->
    </div>

    <div>
        @if($results)
            <div class="card card-bordered mt-8">
                <div class="card-header">
                    <h3 class="card-title">Результаты</h3>
                    {{--<div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-light">
                            JSON
                        </button>
                    </div>--}}
                </div>
                <div class="card-body">

                    <div class="py-3">
                        <h3 class="mb-2">Распознавание языка</h3>
                        <div class="mt-3">
                            {{--                            @dd($BatchDetectLanguageKeyPhrasesResult['documents']['0']['keyPhrases'])--}}
                            @if(!$BatchDetectDominantLanguageResult['errors'])
                                @foreach($BatchDetectDominantLanguageResult['documents']['0']['languages'] as $list)
                                    <span class="badge badge-light m-1 fs-6">{{$list['name']}}</span>
                                @endforeach
                            @else
                                <span class="badge badge-danger m-1 fs-6">Язык не поддерживается</span>
                            @endif
                        </div>
                    </div>

                    <div  class="py-3 mt-6">
                        <h3 class="mb-2">Классификация текста</h3>
                        <div class="mt-3">
                            {{--                            @dd($BatchDetectLanguageKeyPhrasesResult['documents']['0']['keyPhrases'])--}}
                            @if(!$BatchDetectLanguageTextClassificationResult['errors'])
                                @if($BatchDetectLanguageTextClassificationResult['documents']['0']['textClassification'])
                                    @foreach($BatchDetectLanguageTextClassificationResult['documents']['0']['textClassification'] as $list)
                                        <span class="badge badge-light m-1 fs-6">{{$list['label']}}</span>
                                    @endforeach
                                @else
                                    <span class="badge badge-warning m-1 fs-6">Не найдено</span>
                                @endif
                            @else
                                <span class="badge badge-danger m-1 fs-6">Язык не поддерживается</span>
                            @endif
                        </div>
                    </div>

                    <div class="py-3 mt-6">
                        <h3 class="mb-2">Распознавание названного объекта</h3>
                        <div class="mt-3">
                            {{--                            @dd($BatchDetectLanguageKeyPhrasesResult['documents']['0']['keyPhrases'])--}}
                            @if(!$BatchDetectLanguageEntitiesResult['errors'])
                                @if($BatchDetectLanguageEntitiesResult['documents']['0']['entities'])
                                    @foreach($BatchDetectLanguageEntitiesResult['documents']['0']['entities'] as $list)
                                        <span class="badge badge-light m-1 fs-6">{{$list['text']}}
                                            <span class="badge badge-white ms-2">
                                                @if($list['type'] == 'PRODUCT')
                                                    ПРОДУКТ
                                                @elseif($list['type'] == 'ORGANIZATION')
                                                    ОРГАНИЗАЦИЯ
                                                @elseif($list['type'] == 'DATETIME')
                                                    ВРЕМЯ
                                                @elseif($list['type'] == 'LOCATION')
                                                    РАСПОЛОЖЕНИЕ
                                                @elseif($list['type'] == 'CITY')
                                                    ГОРОД
                                                @elseif($list['type'] == 'EVENT')
                                                    СОБЫТИЕ
                                                @elseif($list['type'] == 'QUANTITY')
                                                    КОЛИЧЕСТВО
                                                @endif
                                            </span>
                                        </span>
                                    @endforeach
                                @else
                                    <span class="badge badge-warning m-1 fs-6">Не найдено</span>
                                @endif
                            @else
                                <span class="badge badge-danger m-1 fs-6">Язык не поддерживается</span>
                            @endif
                        </div>
                    </div>

                    <div class="py-3 mt-6">
                        <h3 class="mb-2">Извлечение ключевой фразы</h3>
                        <div class="mt-3">
{{--                            @dd($BatchDetectLanguageKeyPhrasesResult['documents']['0']['keyPhrases'])--}}
                            @if(!$BatchDetectLanguageKeyPhrasesResult['errors'])
                                @if($BatchDetectLanguageKeyPhrasesResult['documents']['0']['keyPhrases'])
                                    @foreach($BatchDetectLanguageKeyPhrasesResult['documents']['0']['keyPhrases'] as $list)
                                        <span class="badge badge-light m-1 fs-6">{{$list['text']}}</span>
                                    @endforeach
                                @else
                                    <span class="badge badge-warning m-1 fs-6">Не найдено</span>
                                @endif
                            @else
                                <span class="badge badge-danger m-1 fs-6">Язык не поддерживается</span>
                            @endif
                        </div>
                    </div>

                    <div class="py-3 mt-6">
                        <h3 class="mb-2">Настроение</h3>
                        <span class="badge badge-warning m-1 fs-6">Не найдено</span>
                    </div>

                    <div class="py-3 mt-6">
                        <h3 class="mb-2">Личная информация</h3>
                        <span class="badge badge-warning m-1 fs-6">Не найдено</span>
                    </div>

                </div>
            </div>
        @endif
    </div>


</div>
