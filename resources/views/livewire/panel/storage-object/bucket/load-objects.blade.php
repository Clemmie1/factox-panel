<div>

    <div class="card-header">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Обьекты <i data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Обновить" style="cursor: pointer" wire:click="reload" class="las la-sync fs-2"></i></h3>
        </div>
        <div wire:target="reload" wire:loading.remove="reload" wire:loading="reload">
            <div class="clearfix mt-6">
                <div class="spinner-border spinner-border-sm1 float-end" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

            </div>
        </div>
        <a class="btn btn-sm btn-secondary align-self-center" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_example_basic">Загрузить</a>
    </div>

    <div class="card-body p-9">



        @if($data['objects'] != null)
        <div>
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                    <thead>
                        <tr class="border-bottom border-gray-200 text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-150px">Имя</th>
                            <th class="min-w-125px">Создано</th>
                            <th class="min-w-125px">Изменен</th>
                            <th class="min-w-125px">Размер</th>
                            <th class="min-w-125px">Уровень хранилища</th>
                            <th class="text-end min-w-70px">Дейстиве</th>
                        </tr>
                    </thead>

                    <tbody class="fw-semibold1 text-gray-800">
                        @foreach($data['objects'] as $list)
                            <tr>
                                <td>
                                    <label class="w-150px">{{$list['name']}}</label>
                                </td>
                                <td>{{ \Illuminate\Support\Carbon::parse($list['timeCreated'])->format('d.m.Y в H:i:s') }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($list['timeModified'])->format('d.m.Y в H:i:s') }}</td>
                                <td>{{ $list['size'] }}</td>
                                <td>{{ $list['storageTier'] }}</td>
                                <div wire:ignore>
                                    <td class="text-end ">
                                        <button id="kt_drawer_example_permanent_toggle" class="btn btn-primary">Toggle basic drawer</button>
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div>
            <div class="justify-content-center text-center ">
                <div class="d-flex justify-content-center">
                    <div href="#" class="">
                        <div>
                            <i class="las la-box-open" style="font-size: 6em"></i>
                            <p class="mt-5 text-muted">элементы не найдены</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>

