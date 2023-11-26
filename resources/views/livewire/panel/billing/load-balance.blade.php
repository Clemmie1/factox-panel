<div>
    <div class="toolbar d-flex flex-stack py-3 py-lg-5" id="kt_toolbar">
        <div id="kt_toolbar_container" class=" container-xxl  d-flex flex-stack flex-wrap">

            <div class="page-title d-flex flex-column me-3">
                <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                    Текущий платежный баланс
                </h1>
                <div class="text-gray-600 fs-4">
                    Текущий баланс: {{ $TotalBalance }} <i class="fa-solid fa-ruble-sign fs-5"></i>
                    <br>
                    Затраты за {{ \Carbon\Carbon::parse()->getTranslatedMonthName() }}: {{ $TotalAmountOfMonth }} <i class="fa-solid fa-ruble-sign fs-5"></i>
                    <br>
                    Бонусный баланс: 0.00 <i class="fa-solid fa-b fs-5"></i>
                </div>
            </div>
            <div class="d-flex align-items-center py-2">
                <a href="#" class="btn btn-sm btn-secondary rounded-1" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
                    Пополнить баланс
                </a>
            </div>
        </div>
    </div>
</div>
