<div>
    <div class="modal-header">
        <h3 class="modal-title">Удалить VPN</h3>

        <!--begin::Close-->
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
        </div>
        <!--end::Close-->
    </div>

    <div class="modal-body">
        <label for="exampleFormControlInput1" class="required form-label">Введите <b>{{$vpnID}}</b>, чтобы подтвердить удаление.</label>
        <input type="text" wire:keydown.enter="deleteVpn" wire:model.live.blur="vpnConfirm" class="form-control form-control-solid @error('vpnName') is-invalid @enderror" placeholder="Введите название" value="1"/>
        @error('vpnName')
        <p class="mt-0 text-danger">
            {{$message}}
        </p>
        @enderror
        {{--<div class="d-flex flex-column mt-6">
            <li class="d-flex align-items-center py-2">
                <span class="bullet text-warning bullet-line h-20px w-6px rounded-1 bg-warning me-3"></span>
                <span class="text-muted">Удаленные до отмены ресурсы будет невозможно восстановить.</span>
            </li>
        </div>--}}
    </div>
    <div class="bg-danger">
        <div class="py-2 justify-content-center text-center d-flex">
            <i class="las la-exclamation fs-2 text-white"></i>
            <span class="text-white">Удаленные до отмены ресурсы будет невозможно восстановить.</span>
        </div>
    </div>
    <div class="modal-footer">
        <button wire:click="closeModel" type="button" class="btn btn-light" data-bs-dismiss="modal" style="height: 53px">Отмена</button>
        <button type="button" wire:click="deleteVpn" class="btn btn-danger" wire:target="deleteVpn" wire:loading.remove style="height: 53px">Удалить</button>
        <button type="button" wire:click="deleteVpn" class="btn btn-secondary" disabled wire:target="deleteVpn" wire:loading style="height: 53px">
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
                @this.on('hideModal', (event) => {
                    $('#deleteVpn').modal('hide');
                });
            });
        </script>
    @endpush
</div>
