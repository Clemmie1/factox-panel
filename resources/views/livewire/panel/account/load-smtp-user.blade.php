<div>
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Учетные данные SMTP</h3>
        </div>
        <div class="card-toolbar">
            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#generateSmtpName">
                Создать
            </button>
        </div>
    </div>

    <div class="card-body p-0">
        @if($listData->isEmpty())
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
                        <th class="min-w-150px">Описание</th>
                        <th class="min-w-150px">Имя пользователя</th>
                        <th class="min-w-150px">Создано</th>
                        <th class="text-end"></th>
                    </tr>
                    </thead>

                    <tbody class="fw-6 fw-semibold text-gray-600">
                        @foreach($listData as $list)
                            <tr>
                                <th>{{ $list->smtp_name }}</th>
                                <th>
                                    <div class="smtpUserName" id="smtpUserName">{{ $list->smtp_user_name }}</div>
                                    <a onclick="copyText(this)" class="text-primary" style="cursor: pointer">
                                        Копировать
                                    </a>
                                </th>
                                <th>{{ $list->created_at }}</th>
                                <th class="text-end">
                                    <div>
                                        <button wire:loading.remove wire:target="deleteSmtpUserName" wire:click="deleteSmtpUserName('{{ $list->smtp_user_id }}')" class="btn btn-sm btn-icon btn-danger"><i class="las la-trash fs-1"></i></button>
                                    </div>
                                    <div wire:loading wire:target="deleteSmtpUserName">
                                        <button class="btn btn-sm btn-icon btn-danger" disabled>
                                            <div class="spinner-border spinner-border-sm text-white" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </button>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        @endif
    </div>
</div>

