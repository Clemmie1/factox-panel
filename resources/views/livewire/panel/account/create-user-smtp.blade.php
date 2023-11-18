<div>
    <div class="modal-header">
        <h3 class="modal-title">Создать учетные данные</h3>
        <div wire:click="closeModal" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="ki-duotone ki-cross fs-1"></i>
        </div>
    </div>
    @if($formCreate)
        <div class="modal-body">
            <label for="exampleFormControlInput1" class="required form-label">Название SMTP</label>
            <input type="text" wire:keydown.enter="createSmtpUser" wire:model.live="smtpName" class="form-control form-control-solid @error('smtpName') is-invalid @enderror" placeholder="Введите новое имя" value="1"/>
            @error('smtpName')
            <p class="mt-0 text-danger">
                {{$message}}
            </p>
            @enderror()
        </div>
        <div class="modal-footer">
            <button wire:click="closeModal" type="button" class="btn btn-light" data-bs-dismiss="modal" style="height: 53px">Отмена</button>
            <button type="button" wire:click="createSmtpUser" class="btn btn-primary" wire:target="createSmtpUser" wire:loading.remove style="height: 53px">Создать</button>
            <button type="button" wire:click="createSmtpUser" class="btn btn-secondary" disabled wire:target="createSmtpUser" wire:loading style="height: 53px">
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
    @else
        @if($dataSmtp != null)
            <div class="modal-body">
                <h1>Сгенерированные учетные данные</h1>
                <p class="text-warning fs-6">Скопируйте для себя это имя пользователя и пароль. Они не будут показаны повторно.</p>

                <div class="mt-6">
                    <div class="input-group mb-3">
                        <input id="clipboard_1" type="text" class="form-control" value="{{ $dataSmtp['smtp_user'] }}" disabled />
                        <button class="btn btn-secondary" onclick="CopySmtpUser('clipboard_1')">
                            <i class="las la-copy fs-2"></i>
                        </button>
                    </div>
                    <div class="input-group">
                        <input id="clipboard_2" type="text" class="form-control" value="{{ $dataSmtp['smtp_user_password'] }}" disabled />
                        <button class="btn btn-secondary" onclick="CopySmtpUser('clipboard_2')">
                            <i class="las la-copy fs-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="modal-body text-inverse-danger bg-danger">
                Вы не можете создать SmtpCredential, поскольку достигнут максимальный предел квоты, равный 2.
            </div>
        @endif
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" wire:click="closeModal" style="height: 53px" data-bs-dismiss="modal" aria-label="Close">Готово</button>
        </div>
    @endif
</div>

