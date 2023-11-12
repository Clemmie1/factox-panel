<div>
    <div class="modal-header">
        <h3 class="modal-title">Сменить имя</h3>

        <!--begin::Close-->
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
        </div>
        <!--end::Close-->
    </div>

    <div class="modal-body">
        <label for="exampleFormControlInput1" class="required form-label">Новое имя</label>
        <input type="text" wire:keydown.enter="changeVpnName" wire:model.live="newVpnName" class="form-control form-control-solid @error('newVpnName') is-invalid @enderror" placeholder="Введите новое имя" value="1"/>
        @error('newVpnName')
            <p class="mt-0 text-danger">
                {{$message}}
            </p>
        @enderror()
    </div>

    <div class="modal-footer">
        <button wire:click="closeModel" type="button" class="btn btn-light" data-bs-dismiss="modal" style="height: 53px">Отмена</button>
        <button type="button" wire:click="changeVpnName" class="btn btn-primary" wire:target="changeVpnName" wire:loading.remove style="height: 53px">Сохранять</button>
        <button type="button" wire:click="changeVpnName" class="btn btn-secondary" disabled wire:target="changeVpnName" wire:loading style="height: 53px">
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
                    $('#changeVpnName').modal('hide');
                });
            });
        </script>
    @endpush
</div>
