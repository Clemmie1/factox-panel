<div class="card w-100 rounded-0">
    <div class="card-header pe-5">
        <div class="card-title">
            <div class="d-flex justify-content-center flex-column me-3">
                <a class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 lh-1">Создать VPN</a>
            </div>
        </div>
        <div class="card-toolbar">
            <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_example_basic_close">
                <i class="fa-duotone fa-xmark fs-2"></i>
            </div>
        </div>
    </div>

    <div class="card-body hover-scroll-overlay-y">
        <div>
            <div class="mb-5">
                <label for="exampleFormControlInput1" class="required form-label">Имя VPN</label>
                <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" placeholder="Введите имя VPN" wire:model.live="name"/>
                @error('name')
                    <p class="mt-1 text-danger">
                        {{$message}}
                    </p>
                @enderror()
            </div>
        </div>
        <div>
            <div class="mb-5 mt-10">
                <label for="exampleFormControlInput1" class="required form-label">Расположение VPN</label>
                <div class="row">
                    @foreach($dataPrice['location'] as $list)
                        <div class="col-sm">
                            <div class="mt-3">
                                <input wire:model.live="location" value="{{ $list['id'] }}" type="radio" class="btn-check"   id="{{ $list['id'] }}"/>
                                <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center" for="{{ $list['id'] }}">
                                    <div class="symbol symbol-50px">
                                        <img class="fs-4x me-4" src="{{ $list['location_img'] }}">
                                    </div>
                                    <span class="d-block fw-semibold text-start">
                                    <span class="text-dark fw-bold d-block fs-3">{{ $list['label'] }}</span>
                                    <span class="text-muted d-block fs-6">{{ $list['id'] }}</span>
                                </span>
                                </label>
                            </div>
                        </div>
                    @endforeach

                </div>
                @error('location')
                    <p class="mt-1 text-danger">
                        {{$message}}
                    </p>
                @enderror()
            </div>
            <div class="mt-10">
                <label for="exampleFormControlInput1" class="required form-label">Трафик</label>
                <div class="mb-3">
                    <div class="fs-7 fw-semibold text-muted">Максимально допустимая скорость обработки трафика</div>
                </div>
                <div>

                    <div class="rounded border p-6">
                        <div class="row">
                            @foreach($dataPrice['traffic'] as $index => $list)
                                <div class="py-3">
                                    <div class="form-check">
                                        <input class="form-check-input" wire:model.live="traffic" type="radio" value="{{ $list['traffic_mb'] }}" wire:click="getSelectTraffic({{ $index }})">
                                        <label class="form-check-label" for="1">
                                            {{ $list['label'] }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @error('traffic')
                    <p class="mt-1 text-danger">
                        {{$message}}
                    </p>
                    @enderror()
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex flex-stack">
            <div class="d-flex" style="height: 53px">
                <button class="btn btn-primary" wire:target="create" wire:loading.remove wire:click="create">Создать</button>
                <button class="btn btn-secondary" disabled wire:target="create" wire:loading>
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
{{--            <span wire:ignore style="cursor: help" class="d-flex justify-content-end text-gray-600 fs-3" data-bs-toggle="popover" data-bs-dismiss="true" title="Расчет стоимости" data-bs-html="true" data-bs-content="Хранилище: 20 ₽/мес">20 ₽/мес--}}
{{--            </span>--}}
        </div>
    </div>
</div>
@push('footer-scripts')
    <script>
        $("#traffic").select2();
        $('select[name="traffic"]').on('change', function (){
            @this.traffic = $(this).val();
        })
    </script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('hideDrawer', (event) => {
                KTDrawer.createInstances();
                KTDrawer.hideAll();
            });
        });
    </script>
@endpush
