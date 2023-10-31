<div>
    <div class="card-header">
        <div class="card-title">
            <h3>Счета</h3>
        </div>
        <div class="card-toolbar">
            <span class="text-gray-600 fs-2">
                {{ $InvoiceTotal }}
            </span>
        </div>
    </div>
    <div class="card-body p-0">
        @if(!$listInvoice)
            <div class="justify-content-center text-center py-7">
                <div class="d-flex justify-content-center">
                    <div href="#" class="">
                        <div>
                            <i class="las la-file-invoice fs-2hx" style="font-size: 6em"></i>
                            <p class="mt-5 text-muted">Нет данных...</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr>
                        <th class="min-w-150px">#</th>
                        <th class="min-w-150px">Услуга</th>
                        <th class="min-w-150px">Описание</th>
                        <th class="min-w-150px">Сумма</th>
                        <th class="text-end"></th>
                    </tr>
                    </thead>

                    <tbody class="fw-6 fw-semibold text-gray-600">


                    @foreach($listInvoice as $list)
                        <tr>
                            <th><a href="">{{ $list->invoice_id }}</a></th>
                            <th>{{ $list->item }}</th>
                            <th>{{ $list->item_description }}</th>
                            <th>{{ $list->item_price }} ₽</th>
                            <th class="text-end">
                                <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="las la-print fs-2"></i></a>
                            </th>
                        </tr>
                    @endforeach


                    </tbody>



                </table>


                <div class="text-center">
                    <div wire:click="loadMore" wire:loading.remove="loadMore" class="text-center mb-3 text-muted" style="cursor: pointer">
                        <i class="las la-angle-double-down"></i>
                        <span>Загрузить еще</span>
                    </div>
                    <div wire:loading="loadMore" class="text-center mb-3 text-muted" style="cursor: pointer">
                        <div class="spinner-border spinner-border-sm text-secondary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>

            </div>
        @endif
    </div>
</div>
