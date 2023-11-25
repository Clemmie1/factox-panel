<div>
    <div>
        <form class="form w-100" wire:submit="loginSec">
            <div class="text-center mb-11">
                <h1 class="text-dark fw-bolder mb-5">

                    <svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5765 1.64102H30.9236L18.17 20.4906H0.822876L13.5765 1.64102Z" fill="white"/>
                        <path d="M14.3361 22.2375L9.39636 29.5385H27.5664L40.32 10.6889H26.9094L19.0955 22.2375H14.3361Z" fill="white"/>
                    </svg>

                </h1>
                <div class="text-gray-500 fw-semibold fs-3">
                    Двухфакторная аутентификация
                </div>
            </div>

            <div>
                <div class="fv-row mb-10">
                    <input type="text" wire:model.live="code"  placeholder="код" value="" autocomplete="off" class="form-control form-control-solid text-center mb-2 text-uppercase @error('code') required border-danger @enderror">
                    <span class="text-gray-500 fw-semibold fs-6">Мы отправили код подтверждения на вашу почту. Введите код в поле ниже.</span>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary text-uppercase mb-3" style="height: 52.13px" wire:target="loginSec" wire:loading.remove>
                    подтвердить
                </button>


                <button type="button" class="btn btn-secondary justify-content-center text-center mb-3" disabled wire:target="loginSec" wire:loading>
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
                <a wire:navigate href="{{route('auth.login')}}" class="btn btn-active-secondary w-100 text-primary">Назад</a>
            </div>

        </form>
    </div>
</div>
