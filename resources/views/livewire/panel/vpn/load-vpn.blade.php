<div wire:init="loadData" wire:poll="loadData">
    @if(is_null($data))
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-muted" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <span class="d-flex justify-content-center text-muted mt-5">
            загрузка ресурсов
        </span>
    @else
        @if(!$data->isEmpty())
            <div class="row g-6 g-xl-9">
                @foreach($data as $list)
                    @if($list->status == 1)
                        <div class="col-md-6 col-xl-4" style="cursor: progress">
                            <a class="card">
                                <div class="card-header border-0 pt-9">
                                    <div class="card-title m-0">
                                        <div class="symbol bg-light-warning">
                                            <i class="las la-network-wired text-warning p-3 fs-4x fa-fade"></i>
                                        </div>
                                    </div>

                                    <div class="card-toolbar">
                                        <span class="badge badge-light-warning fw-bold me-auto px-4 py-3 text-uppercase">создание</span>
                                    </div>

                                </div>

                                <div class="card-body p-9">
                                    <div class="fs-3 fw-bold text-dark">
                                        {{$list->vpn_name}}
                                    </div>

                                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">
                                        {{$list->vpn_id}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @elseif($list->status == 2)
                        <div class="col-md-6 col-xl-4" style="cursor: pointer">
                            <a onclick="location.href='{{route('cloud.vpn.view', $list->vpn_id)}}'" class="card border-hover-primary">
                                <div class="card-header border-0 pt-9">
                                    <div class="card-title m-0">
                                        <div class="symbol bg-light-success">
                                            <i class="las la-network-wired text-success p-3 fs-4x"></i>
                                        </div>
                                    </div>

                                    <div class="card-toolbar">
                                        <span class="badge badge-light-success fw-bold me-auto px-4 py-3 text-uppercase">активный</span>
                                    </div>

                                </div>

                                <div class="card-body p-9">
                                    <div class="fs-3 fw-bold text-dark">
                                        {{$list->vpn_name}}
                                    </div>

                                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">
                                        {{$list->vpn_id}}
                                    </p>
                                </div>
                            </a>
                        </div>

                    @elseif($list->status == 4)
                        <div class="col-md-6 col-xl-4">
                            <a class="card">
                                <div class="card-header border-0 pt-9">
                                    <div class="card-title m-0">
                                        <div class="symbol bg-light-danger">
                                            <i class="las la-network-wired text-danger p-3 fs-4x"></i>
                                        </div>
                                    </div>

                                    <div class="card-toolbar">
                                        <span class="badge badge-light-danger fw-bold me-auto px-4 py-3 text-uppercase">удалён</span>
                                    </div>

                                </div>

                                <div class="card-body p-9">
                                    <div class="fs-3 fw-bold text-dark">
                                        {{$list->vpn_name}}
                                    </div>

                                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">
                                        {{$list->vpn_id}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @elseif($list->status == 3)
                        <div class="col-md-6 col-xl-4">
                            <a class="card">
                                <div class="card-header border-0 pt-9">
                                    <div class="card-title m-0">
                                        <div class="symbol bg-light-danger">
                                            <i class="las la-network-wired text-danger p-3 fs-4x"></i>
                                        </div>
                                    </div>

                                    <div class="card-toolbar">
                                        <span class="badge badge-light-danger fw-bold me-auto px-4 py-3 text-uppercase">приостановлен</span>
                                    </div>

                                </div>

                                <div class="card-body p-9">
                                    <div class="fs-3 fw-bold text-dark">
                                        {{$list->vpn_name}}
                                    </div>

                                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">
                                        {{$list->vpn_id}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="justify-content-center text-center ">
                <div class="d-flex justify-content-center">
                    <div href="#" class="">
                        <div>
                            <i class="fa-duotone fa-cloud-exclamation" style="font-size: 6em"></i>
                            <p class="mt-5 text-muted">ресурсы не найдены</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif


</div>
