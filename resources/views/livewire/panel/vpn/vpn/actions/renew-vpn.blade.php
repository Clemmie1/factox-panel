<div>
    <div class="modal-header" >
        <h3 class="modal-title">Продлить VPN</h3>

        <!--begin::Close-->
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
        </div>
        <!--end::Close-->
    </div>

    <div class="modal-body">
        <div class="card-body">
            <div class="d-flex flex-column gap-5">
                <div class="d-flex flex-stack">
                    <div class="fs-6 fw-bold text-gray-600">Срок</div>
                    <div class="">1 месяц</div>
                </div>
                <div class="separator my-1"></div>
                <div class="d-flex flex-stack">
                    <div class="fs-6 fw-bold text-gray-600">Истекает</div>
                    <div class="">{{ now()->addDay(31)->format('d.m.Y') }} ({{ now()->addDay(31)->isoFormat('D MMMM Y г.') }})</div>
                </div>
                <div class="separator my-1"></div>
                <div class="d-flex flex-stack">
                    <div class="fs-6 fw-bold text-gray-600">Стоимость</div>
                    <div class="">{{ $renewPrice }} ₽</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="height: 53px">Отмена</button>
        <button type="button" wire:click="renewVpn" class="btn btn-primary" wire:target="renewVpn" wire:loading.remove style="height: 53px">Продлить</button>
        <button type="button" wire:click="renewVpn" class="btn btn-secondary" disabled wire:target="renewVpn" wire:loading style="height: 53px">
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
    </div>
    @push('footer-scripts')
        <script>
            document.addEventListener('livewire:initialized', () => {
                KTComponents.init();
                console.log('initialized');

                @this.on('hideModal', (event) => {
                    $('#renewVpn').modal('hide');
                });
            });
        </script>
    @endpush
</div>

