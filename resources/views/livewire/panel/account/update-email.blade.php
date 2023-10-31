<div>
    <form class="form" wire:submit="updateEmail">
        <div class="row mb-6">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Введите новый адрес электронной почты</label>
                    <input type="email" wire:model.live="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" placeholder="Введите новую почту">
                    @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                    <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Подтвердите пароль</label>
                    <input type="password" wire:model.live="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" placeholder="Введите текущий пароль">
                    @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
        <div class="d-flex" style="height: 53px">
            <button type="submit" class="btn btn-primary me-2 px-6 text-uppercase" wire:target="updateEmail" wire:loading.remove>Сменить</button>

            <button type="button" class="btn btn-secondary disabled me-2 px-6" disabled wire:target="updateEmail" wire:loading>
                <div class="sk-wave">
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                    <div class="sk-wave-rect"></div>
                </div>
            </button>

            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6 text-uppercase">Отмена</button>
        </div>
    </form>
</div>
