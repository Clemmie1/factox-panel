<div>
    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
        <div class="mb-3 mb-md-0 fw-semibold">
            <h4 class="text-gray-900 fw-bold">Защитить Ваш аккаунт</h4>

            <div class="fs-6 text-gray-700 pe-7">Двухфакторная аутентификация добавляет дополнительный уровень безопасности вашей учетной записи. Для входа дополнительно потребуется ввести 6-значный код.</div>
        </div>

        @if($isEnabled)
            <button wire:target="updateTwoFactor" wire:loading.remove wire:click="updateTwoFactor" class="btn btn-danger px-6 align-self-center text-nowrap text-uppercase" style="height: 53px">
                Выключить
            </button>
        @else
            <button wire:target="updateTwoFactor" wire:loading.remove wire:click="updateTwoFactor" class="btn btn-success px-6 align-self-center text-nowrap text-uppercase" style="height: 53px">
                Включить
            </button>
        @endif

        <button class="btn btn-secondary px-6 align-self-center disabled text-nowrap" disabled wire:target="updateTwoFactor" wire:loading>
            <div class="sk-wave">
                <div class="sk-wave-rect"></div>
                <div class="sk-wave-rect"></div>
                <div class="sk-wave-rect"></div>
                <div class="sk-wave-rect"></div>
                <div class="sk-wave-rect"></div>
            </div>
        </button>

    </div>
</div>
