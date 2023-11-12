<!DOCTYPE html>

<html lang="ru" class="light-style layout-wide " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $invoice_id }}</title>
    <link rel="stylesheet" href="https://demos.pixinvent.com/materialize-html-admin-template/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="https://demos.pixinvent.com/materialize-html-admin-template/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="https://demos.pixinvent.com/materialize-html-admin-template/assets/css/demo.css" />
    <link rel="stylesheet" href="https://demos.pixinvent.com/materialize-html-admin-template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://demos.pixinvent.com/materialize-html-admin-template/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="https://demos.pixinvent.com/materialize-html-admin-template/assets/vendor/css/pages/app-invoice-print.css" />

</head>

<body>

<div class="invoice-print p-4">

    <div class="d-flex justify-content-between flex-row">
        <div class="mb-4">
            <div class="d-flex svg-illustration align-items-center gap-2 mb-4">
                <span class="h4 mb-0 app-brand-text fw-bold">FactoX Cloud</span>
            </div>
        </div>
        <div>
            <h4>СЧЕТ #{{ $invoice_id }}</h4>
            <div class="mb-2">
                <span>Дата выпуска:</span>
                <span>{{ $invoiceData->created_at }}</span>
            </div>
        </div>
    </div>

    <hr />

    <div class="d-flex justify-content-between mb-4">
        <div class="my-2">
            <h6>Счет для:</h6>
            <p class="mb-1">{{ $invoiceData->invoice_to_name }},</p>
            <p class="mb-0">{{ $invoiceData->invoice_to_email }}</p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table m-0">
            <thead class="table-light border-top">
            <tr>
                <th>Услуга</th>
                <th>Описание</th>
                <th>Сумма</th>
                <th>ID Услуги</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $invoiceData->item }}</td>
                <td>{{ $invoiceData->item_description }}</td>
                <td>{{ $invoiceData->item_price }} ₽</td>
                @if($invoiceData->item_id != null)
                    <td>{{ $invoiceData->item_id }}</td>
                @else
                    <td>-</td>
                @endif
                <td>-</td>
            </tr>
            <tr>
                <td colspan="3" class="align-top px-4 py-3">

                </td>
                <td class="text-end px-4 py-3">
                    <p class="mb-2">Скидка:</p>
                    <p class="mb-0">Итог:</p>
                </td>
                <td class="px-4 py-3">
                    <p class="fw-medium mb-2">0.00 ₽</p>
                    <p class="fw-medium mb-0">{{ $invoiceData->item_price }} ₽</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12">

        </div>
    </div>
</div>

<script>
    window.print();
</script>

</body>

</html>
