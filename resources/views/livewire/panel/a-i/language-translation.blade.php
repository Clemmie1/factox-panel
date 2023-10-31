<div>
    <div class="card">

        <div class="card-body">
            <div class="row g-10">
                <div class="col-lg-6">
                    <p class="mb-2">Исходный язык</p>
                    <select class="form-select mb-6" data-control="select2" data-placeholder="Select an option">
                        <option value="1">EN</option>
                    </select>
                    <textarea wire:model.live="text" class="form-control form-control form-control-solid" data-kt-autosize="false" rows="10" placeholder="Введите текст"></textarea>
                </div>
                <div class="col-lg-6">
                    <p class="mb-2">Целевой язык</p>
                    <select class="form-select mb-6" data-control="select2" data-placeholder="Select an option">
                        <option value="1">RU</option>
                    </select>
                    <textarea disabled class="form-control form-control form-control-solid" data-kt-autosize="false" rows="10">{{ $translatedText }}</textarea>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex">
            <div>
                <button wire:click="translateText" wire:loading.remove wire:target="translateText" class="btn btn-secondary me-3" style="height: 52px">Перевести</button>
                <button disabled wire:loading wire:target="translateText" class="btn btn-secondary me-3" style="height: 52px">
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
                <button wire:click="resetText" href="#" class="btn btn-secondary" style="height: 52px">Сбросить</button>
            </div>
        </div>

    </div>
</div>
