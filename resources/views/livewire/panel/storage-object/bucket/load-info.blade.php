<div wire:init="loadData">
    <div class="d-flex flex-column-fluid align-items-start  container-xxl ">
        <div class="content flex-row-fluid " >
            @if(is_null($data))
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            @else
                @if(!$data->isEmpty())
                    <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%;)">
                        <div class="card-header pt-10">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-circle me-5">
                                    <div class="symbol-label bg-transparent text-success border border-secondary border-dashed">
                                        <i class="las la-archive fs-2x text-success"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h2 class="mb-1">{{$data[0]['bucket_name']}}
                                        <i class="las la-edit fs-2x" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#changeBucketName"></i>
                                        <i class="las la-redo-alt fs-2x text-success" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#renewBucket"></i>
                                        <i class="las la-trash-alt fs-2x text-danger" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteBucket"></i>
                                    </h2>
                                    <div class="text-muted fw-bold">
                                        {{$bucketID}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="d-flex overflow-auto h-55px">
                                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold flex-nowrap">
                                    <li class="nav-item">
                                        <a style="cursor: pointer" onclick="location.href='{{route('cloud.StorageObject.bucket', $bucketID)}}'" class="nav-link text-active-primary me-6 active">
                                            Информация
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="cursor: pointer" onclick="location.href='{{route('cloud.StorageObject.bucket.objects', $bucketID)}}'" class="nav-link text-active-primary me-6 a">
                                            Обьекты
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Общие сведения</h3>
                            </div>
                        </div>
                        <div id="kt_account_settings_connected_accounts" class="collapse show">
                            <div class="card-body border-top p-9">
                                <div class="d-flex flex-column gap-5">
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Создан</div>
                                        <div class="">{{ \Illuminate\Support\Carbon::parse($data[0]['created_at'])->isoFormat('D MMMM Y г.') }}</div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Истекает</div>
                                        <div class="">
                                            {{ \Illuminate\Support\Carbon::parse($data[0]['expires'])->isoFormat('D MMMM Y г.') }} <div class="text-muted">({{ \Illuminate\Support\Carbon::parse($data[0]['expires'])->diffForHumans() }})</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Использование</h3>
                            </div>
                        </div>
                        <div id="kt_account_settings_connected_accounts" class="collapse show">
                            <div class="card-body border-top p-9">
                                <div class="d-flex flex-column gap-5">
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Хранилище данных</div>
                                        <div class="">20 ГБ</div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Примерное число объектов <i class="las la-info fs-1"></i></div>
                                        <div class="">0 объектов</div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Приблизительный размер <i class="las la-info fs-1"></i></div>
                                        <div class="">0 байт</div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Примерное число незафиксированных многокомпонентных загрузок <i class="las la-info fs-1"></i></div>
                                        <div class="">0 загрузок</div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Примерное размер незафиксированных многокомпонентных загрузок <i class="las la-info fs-1"></i></div>
                                        <div class="">0 байт</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-5 mb-xl-10">
                        <div class="card-header border-0">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Функции</h3>
                            </div>
                        </div>
                        <div id="kt_account_settings_connected_accounts" class="collapse show">
                            <div class="card-body border-top p-9">
                                <div class="d-flex flex-column gap-5">
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Уровень хранилища по умолчанию</div>
                                        <div class="">Стандартный</div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Просмотр <i class="las la-info fs-1"></i></div>
                                        <div class="">Частный | <a href="" class="text-decoration-underlines">ИЗМЕНИТЬ</a></div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Автоматическое определение уровня <i class="las la-info fs-1"></i></div>
                                        <div class="">
                                            @if(!$data[0]['automatic_level_detection'])
                                                <i class="las la-square text-danger"></i> Отключено | <a href="" class="text-decoration-underlines">ИЗМЕНИТЬ</a>
                                            @else
                                                <i class="las la-square text-success"></i> Включено | <a href="" class="text-decoration-underlines">ИЗМЕНИТЬ</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Выдача событий объектов <i class="las la-info fs-1"></i></div>
                                        <div class="">
                                            @if(!$data[0]['issuing_object_events'])
                                                <i class="las la-square text-danger"></i> Отключено | <a href="" class="text-decoration-underlines">ИЗМЕНИТЬ</a>
                                            @else
                                                <i class="las la-square text-success"></i> Включено | <a href="" class="text-decoration-underlines">ИЗМЕНИТЬ</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Контроль версий объектов <i class="las la-info fs-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"></i></div>
                                        <div class="">
                                            @if(!$data[0]['object_version_control'])
                                                <i class="las la-square text-danger"></i> Отключено | <a href="" class="text-decoration-underlines">ИЗМЕНИТЬ</a>
                                            @else
                                                <i class="las la-square text-success"></i> Включено | <a href="" class="text-decoration-underlines">ИЗМЕНИТЬ</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

        </div>
    </div>
    @push('footer-scripts')
        <script>
            document.addEventListener('livewire:initialized', () => {
                @this.on('KTComponents', (event) => {
                    KTComponents.init();
                });
            });
        </script>
    @endpush
</div>

