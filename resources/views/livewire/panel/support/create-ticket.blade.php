<div class="card w-100 rounded-0">
    <div class="card-header pe-5">
        <div class="card-title">
            <div class="d-flex justify-content-center flex-column me-3">
                <a class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 lh-1">Создать обращение</a>
            </div>
        </div>
        <div class="card-toolbar">
            <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_example_basic_close">
                <i class="fa-duotone fa-xmark fs-2"></i>
            </div>
        </div>
    </div>

    <div class="card-body hover-scroll-overlay-y">
        <div class="mb-7">
            <label for="exampleFormControlInput1" class="required form-label">Тема обращения</label>
            <input type="text" class="form-control form-control-solid @error('ticketTheme') is-invalid @enderror" placeholder="Введите тему обращения" wire:model.live="ticketTheme"/>
            @error('ticketTheme') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <div class="mb-7" wire:ignore>
                <label for="exampleFormControlInput1" class=" form-label">Категория обращения</label>
                <select class="form-select form-select-solid select" name="ticketCategory" wire:model.live="ticketCategory" id="ticketCategory" data-control="select2" data-hide-search="true">
                    <option value="Отдел продаж" selected>Отдел продаж</option>
                    <option value="Техническая поддержка">Техническая поддержка</option>
                    <option value="Безопасность">Безопасность</option>
                </select>
            </div>
        </div>

        <div>
            <div class="mb-7" wire:ignore>
                <label for="exampleFormControlInput1" class=" form-label">Приоритет обращения</label>
                <select class="form-select form-select-solid" name="ticketPriority" wire:model.live="ticketPriority" id="ticketPriority" data-control="select2" data-hide-search="true">
                    <option value="Срочный">Срочный</option>
                    <option value="Высокий">Высокий</option>
                    <option value="Средний">Средний</option>
                    <option value="Низкий" selected>Низкий</option>
                </select>
            </div>
        </div>

        <div class="mb-7">
            <label for="exampleFormControlInput1" class="required form-label">Комментарий обращения</label>
            <div class="form-select-solid">
                <textarea class="@error('ticketMsg') is-invalid @enderror form-control form-control form-control-solid" wire:model.live="ticketMsg" placeholder="Введите текст сюда" style="height: 100px"></textarea>
                @error('ticketMsg') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex flex-stack">
            <div class="d-flex" style="height: 53px">
                <button class="btn btn-primary" wire:keydown.enter="createTicket" wire:target="createTicket" wire:loading.remove wire:click="createTicket">Создать</button>
                <button class="btn btn-secondary" disabled wire:target="createTicket" wire:loading>
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
        </div>
    </div>
</div>

@push('footer-scripts')
    <script>

        $("#ticketCategory").select2();
        $('select[name="ticketCategory"]').on('change', function (){
            @this.ticketCategory = $(this).val();
        })

        $("#ticketPriority").select2();
        $('select[name="ticketPriority"]').on('change', function (){
            @this.ticketPriority = $(this).val();
        })

    </script>
@endpush

