<div>
    <div class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework">
        <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-5">

                <svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.5765 1.64102H30.9236L18.17 20.4906H0.822876L13.5765 1.64102Z" fill="white"/>
                    <path d="M14.3361 22.2375L9.39636 29.5385H27.5664L40.32 10.6889H26.9094L19.0955 22.2375H14.3361Z" fill="white"/>
                </svg>

            </h1>
            <div class="text-gray-500 fw-semibold fs-3">
                Подтвердите Ваш электронный адрес
            </div>
        </div>

        <div class="d-grid">
            <button type="button" class="btn btn-primary text-uppercase mb-3" style="height: 52.13px"
                    wire:click="resend" wire:target="resend" wire:loading.remove
                    id="resendButton">
                отправить еще раз
            </button>

            <button type="button" class="btn btn-secondary justify-content-center text-center mb-3" disabled wire:target="resend" wire:loading>
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
        {{--            <button href="#" class="btn btn-secondary w-100 text-uppercase" style="height: 52.13px">отправить еще раз</button>--}}
        <br>
        <br>
        <div class="text-gray-500 text-center fw-semibold fs-6">
            <button type="button" class="btn btn-active-secondary w-100 text-primary" wire:click="logout">Выйти из аккаунта</button>
        </div>

    </div>
</div>
