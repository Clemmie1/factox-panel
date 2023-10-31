<div>

    <div class="mt-6">
        <div class="row p-0 mb-5 px-0">

            <div class="col">
                <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                    <span class="fs-4 fw-semibold text-success d-block">Открыто</span>
                    <span class="fs-2hx fw-bold text-gray-900 counted">{{ $dataStats['countStatus0'] }}</span>
                </div>
            </div>

            <div class="col">
                <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                    <span class="fs-4 fw-semibold text-warning d-block">Ожидание</span>
                    <span class="fs-2hx fw-bold text-gray-900 counted">{{ $dataStats['countStatus1'] }}</span>
                </div>
            </div>

            <div class="col">
                <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                    <span class="fs-4 fw-semibold text-danger d-block">Закрыто</span>
                    <span class="fs-2hx fw-bold text-gray-900 counted">{{ $dataStats['countStatus3'] }}</span>
                </div>
            </div>

        </div>
    </div>

    <div class="card mb-5 mb-xl-10 mt-5" data-select2-id="select2-data-201-l8c7">
        <div class="card-header">
            <div class="card-title">
                <h3>Обращений</h3>
            </div>
            <div class="card-toolbar" data-select2-id="select2-data-200-he6e">
{{--
                <div class="my-1 me-4" data-select2-id="select2-data-199-43az">
                    <select class="form-select form-select-sm form-select-solid w-125px select2-hidden-accessible" data-control="select2" data-placeholder="Select Hours" data-hide-search="true" data-select2-id="select2-data-9-3l83" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1" selected="" data-select2-id="select2-data-11-w2by">1 Hours</option>
                        <option value="2" data-select2-id="select2-data-205-mpja">6 Hours</option>
                        <option value="3" data-select2-id="select2-data-206-ywez">12 Hours</option>
                        <option value="4" data-select2-id="select2-data-207-1796">24 Hours</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5 select2-container--below" dir="ltr" data-select2-id="select2-data-10-3weo" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm form-select-solid w-125px" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-3ya3-container" aria-controls="select2-3ya3-container"><span class="select2-selection__rendered" id="select2-3ya3-container" role="textbox" aria-readonly="true" title="1 Hours">1 Hours</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
--}}

                <button class="btn btn-sm btn-secondary my-1" data-kt-drawer-show="true" data-kt-drawer-target="#multipart_upload">
                    Создать
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            @if(!$data->isEmpty())
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr>
                            <th class="min-w-150px">Тема</th>
                            <th class="min-w-150px">Категория</th>
                            <th class="min-w-150px">Статус</th>
                            <th class="min-w-150px">Обновлён</th>
                            <th class="text-end">Создан</th>
                        </tr>
                        </thead>

                        <tbody class="fw-6 fw-semibold text-gray-600">
                            @foreach($data as $list)
                                <tr>
                                    <td>
                                        <a href="{{route('support.tickets.viewticket', $list->ticket_id)}}" class="tetext-primary">{{$list->ticket_theme}}</a>
                                    </td>

                                    <td>
                                        {{$list->ticket_category}}
                                    </td>

                                    <td class="text-uppercase">
                                        @if($list->ticket_status == 0)
                                            <span class="badge badge-light-success fs-7 fw-bold">Открыто</span>
                                        @elseif($list->ticket_status == 1)
                                            <span class="badge badge-light-warning fs-7 fw-bold">Ожидании ответа</span>
                                        @elseif($list->ticket_status == 2)
                                            <span class="badge badge-light-success fs-7 fw-bold">Решено</span>
                                        @elseif($list->ticket_status == 3)
                                            <span class="badge badge-light-danger fs-7 fw-bold">Закрыто</span>
                                        @endif

                                    </td>

                                    <td>{{\Carbon\Carbon::parse($list->updated_at)->diffForHumans()}}</td>

                                    <td class="text-end">{{\Carbon\Carbon::parse($list->created_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="justify-content-center text-center py-7">
                    <div class="d-flex justify-content-center">
                        <div href="#" class="">
                            <div>
                                <i class="fa-duotone fa-ticket" style="font-size: 6em"></i>
                                <p class="mt-5 text-muted">Обращений не найдены.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
