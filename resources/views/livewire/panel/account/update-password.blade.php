<div>
    <form class="form" wire:submit="updatePassword">
        <div class="row mb-6">
            <div class="col-lg-4">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Текущий пароль</label>
                    <input type="password" wire:model.live="currentPassword" class="form-control form-control-lg form-control-solid @error('currentPassword') is-invalid @enderror" placeholder="Введите текущий пароль" >
                    @error('currentPassword') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">Новый пароль</label>
                    <input type="password" wire:model.live="newPassword" class="form-control form-control-lg form-control-solid @error('newPassword') is-invalid @enderror" placeholder="Введите новый пароль">
                    @error('newPassword') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                    <label for="confirmPassword" class="form-label fs-6 fw-bold mb-3">Подтвердите новый пароль</label>
                    <input type="password" wire:model.live="confirmPassword" class="form-control form-control-lg form-control-solid @error('confirmPassword') is-invalid @enderror" placeholder="Подтвердите новый пароль">
                    @error('confirmPassword') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="d-flex" style="height: 53px">
            <button type="submit" class="btn btn-primary me-2 px-6 text-uppercase" wire:target="updatePassword" wire:loading.remove>Сменить</button>

            <button type="button" class="btn btn-secondary disabled me-2 px-6" disabled wire:target="updatePassword" wire:loading>
                <div class="sk-wave">
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                </div>
            </button>

            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6 text-uppercase">Отмена</button>
        </div>
    </form>
</div>
