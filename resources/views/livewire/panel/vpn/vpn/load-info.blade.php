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
                                        <i class="las la-network-wired fs-2x text-success"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h2 class="mb-1">{{$data[0]['vpn_name']}}
                                        <i class="las la-edit fs-2x" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#changeVpnName"></i>
                                        <i class="las la-redo-alt fs-2x text-success" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#renewVpn"></i>
                                        <i class="las la-trash-alt fs-2x text-danger" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#deleteVpn"></i>
                                    </h2>
                                    <div class="text-muted fw-bold">
                                        {{$vpnID}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="d-flex overflow-auto h-55px">
                                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold flex-nowrap">
                                    <li class="nav-item">
                                        <a style="cursor: pointer" onclick="location.href='{{route('cloud.vpn.home', $vpnID)}}'" class="nav-link text-active-primary me-6 active">
                                            Информация
                                        </a>
                                    </li>
                                    {{--<li class="nav-item">
                                        <a style="cursor: pointer" onclick="location.href='{{route('cloud.StorageObject.bucket.objects', $bucketID)}}'" class="nav-link text-active-primary me-6 a">
                                            Обьекты
                                        </a>
                                    </li>--}}
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
                                        <div class="fs-6 fw-bold text-gray-600">Траффик</div>
                                        <div class="">0 МБ</div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="fs-6 fw-bold text-gray-600">Локация</div>
                                        <div class="">{{ $data[0]['vpn_location'] }}</div>
                                    </div>
                                    <div class="separator my-1"></div>
                                    <div class="">
                                        <div class="fs-6 fw-bold text-gray-600">
                                            <button class="btn btn-secondary w-100 text-uppercase">
                                                Подключение
                                            </button>
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

