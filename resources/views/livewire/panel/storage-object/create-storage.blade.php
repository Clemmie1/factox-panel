<div class="card w-100 rounded-0">
    <div class="card-header pe-5">
        <div class="card-title">
            <div class="d-flex justify-content-center flex-column me-3">
                <a class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 lh-1">Создать сегмент</a>
            </div>
        </div>
        <div class="card-toolbar">
            <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_example_basic_close">
                <i class="fa-duotone fa-xmark fs-2"></i>
            </div>
        </div>
    </div>

    <div class="card-body hover-scroll-overlay-y">
        <div class="mb-5">
            <label for="exampleFormControlInput1" class="required form-label">Имя сегмента</label>
            <input type="email" class="form-control form-control-solid @error('nameBucket') is-invalid @enderror" placeholder="Введите имя сегмента" wire:model.live="nameBucket" value="bucket-43242-8746"/>
            @error('nameBucket')
            <p class="mt-3 text-danger">
                {{$message}}
            </p>
            @enderror()
        </div>
        <div class="py-5 mb-5">
            <label for="exampleFormControlInput1" class="required form-label">Уровень хранилища по умолчанию</label>
            <div class="rounded border p-10">
                <div class="mb-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="s" id="flexCheckDefault1" wire:model.live="typeBucket" name="radio2" checked="">
                        <label class="form-check-label" for="flexCheckDefault1">
                            Стандартный
                        </label>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="a" id="flexCheckChecked1" wire:model.live="typeBucket" name="radio2">
                        <label class="form-check-label" for="flexCheckChecked1">
                            Архив
                        </label>
                    </div>
                </div>
            </div>
            @error('typeBucket')
            <p class="mt-3 text-danger">
                {{$message}}
            </p>
            @enderror()
            <div class="d-flex flex-column mt-6">
                <li class="d-flex align-items-center py-2">
                    <span class="bullet text-warning bullet-line h-40px w-6px rounded-1 bg-warning me-3"></span>
                    <span class="text-muted">Уровень хранилища по умолчанию для сегмента можно указать только во время создания. По завершении настройки невозможно изменить уровень хранилища, где будет находиться сегмент.</span>
                </li>
            </div>
        </div>
        <div class="py-5 mb-5">
            <label for="exampleFormControlInput1" class="required form-label">Хранилище данных</label>
            <div class="rounded border p-10">
                <div class="mb-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="" disabled checked="">
                        <label class="form-check-label" for="1">
                            20 ГБ
                        </label>
                    </div>
                </div>

                <div class="mb-10">
                    <div class="form-check">
                        <input class="form-check-input" disabled type="radio" value="">
                        <label class="form-check-label" for="2">
                            100 ГБ
                        </label>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="form-check">
                        <input class="form-check-input" disabled type="radio" value="">
                        <label class="form-check-label" for="3">
                            200 ГБ
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex flex-stack">
            <div class="d-flex" style="height: 53px">
                <button class="btn btn-primary" wire:target="createBucket" wire:loading.remove wire:click="createBucket">Создать</button>
                <button class="btn btn-secondary" disabled wire:target="createBucket" wire:loading>
                    <div class="col" style="display: flex; justify-content: center; align-items: center;">
                        <div class="sk-wave">
                            <div class="sk-wave-rect"></div>
                            <div class="sk-wave-rect"></div>
                            <div class="sk-wave-rect"></div>
                            <div class="sk-wave-rect"></div>
                            <div class="sk-wave-rect"></div>
                        </div>
                    </div>
                </button>
                <button class="btn bg-body" data-kt-drawer-dismiss="true">Отмена</button>
            </div>
            <span wire:ignore style="cursor: help" class="d-flex justify-content-end text-gray-600 fs-3" data-bs-toggle="popover" data-bs-dismiss="true" title="Расчет стоимости" data-bs-html="true" data-bs-content="Хранилище: 20 ₽/мес">20 ₽/мес
            </span>
        </div>
    </div>
</div>
@push('footer-scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('hideDrawer', (event) => {
                KTDrawer.createInstances();
                KTDrawer.hideAll();
            });
        });
    </script>
@endpush
