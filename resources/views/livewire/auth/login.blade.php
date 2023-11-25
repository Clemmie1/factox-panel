<div>
    @if($formLogin)
        <div>
            <form class="form w-100" wire:submit="login">
                @csrf
                <div class="text-center mb-11">
                    <h1 class="text-dark fw-bolder mb-5">

                        <svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5765 1.64102H30.9236L18.17 20.4906H0.822876L13.5765 1.64102Z" fill="white"/>
                            <path d="M14.3361 22.2375L9.39636 29.5385H27.5664L40.32 10.6889H26.9094L19.0955 22.2375H14.3361Z" fill="white"/>
                        </svg>

                    </h1>
                    <div class="text-gray-500 fw-semibold fs-3">
                        Вход в аккаунт
                    </div>
                </div>
                <div class="fv-row mb-8 fv-plugins-icon-container">
                    <div>
                        <input type="email" wire:model.live="email" placeholder="Почта" name="email" autocomplete="on" class="form-control form-control-solid @error('email') is-invalid @enderror">
                        @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                </div>

                <div class="fv-row mb-3 fv-plugins-icon-container">
                    <div>
                        <input type="password" wire:model.live="password" placeholder="Пароль" name="password" autocomplete="off" class="form-control form-control-solid @error('password') is-invalid @enderror">
                        @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                </div>

                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <div></div>
                    <a href="{{route('auth.reset-password')}}" wire:navigate class="link-primary">
                        Забыли пароль?
                    </a>
                </div>

                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary text-uppercase" style="height: 52.13px" wire:target="login" wire:loading.remove>
                        Войти
                    </button>

                    <button type="button" class="btn btn-secondary justify-content-center text-center" disabled wire:target="login" wire:loading>
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

                <div class="text-gray-500 text-center fw-semibold fs-6">
                    <a href="{{route('auth.register')}}" wire:navigate class="link-primary">
                        Зарегистрироваться
                    </a>
                </div>

            </form>
            <br>
            <br>

            <div class="alert alert-warning d-flex align-items-center p-5 border-0">
                <i class="las la-user-shield fs-4hx text-warning me-4"></i>
                <div class="d-flex flex-column">
                    <h4 class="mb-1 text-warning">Повысьте уровень своей безопасности</h4>
                    <span>Мы улучшаем вашу безопасность с помощью новой многофакторной аутентификации.</span>
                </div>
            </div>
        </div>
    @else
        @if(!$accountBlocked)
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
                            <input type="text" wire:model.live="code"  placeholder="код" value="1" autocomplete="off" class="form-control form-control-solid text-center mb-2 text-uppercase @error('code') required border-danger @enderror">
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
                        <button  wire:click="back" type="button" class="btn btn-active-secondary w-100 text-primary">Назад</button>
                    </div>

                </form>
            </div>
        @else
            <div>
                <div class="form w-100">
                    <div class="text-center mb-11">
                        <h1 class="text-dark fw-bolder mb-5">

                            <svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5765 1.64102H30.9236L18.17 20.4906H0.822876L13.5765 1.64102Z" fill="white"/>
                                <path d="M14.3361 22.2375L9.39636 29.5385H27.5664L40.32 10.6889H26.9094L19.0955 22.2375H14.3361Z" fill="white"/>
                            </svg>

                        </h1>
                    </div>

                    <div class="alert alert-danger d-flex align-items-center p-5 border-0">
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-danger">Аккаунт заблокирован</h4>
                            <br>
                            <span>Ваш аккаунт был временно заблокирован из-за нарушения правил пользования нашей платформой. Пожалуйста, свяжитесь с нашей службой поддержки для получения дополнительной информации вашего аккаунта.</span>
                        </div>
                    </div>
                    <br>
                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        <button  wire:click="back" type="button" class="btn btn-active-secondary w-100 text-primary">Назад</button>
                    </div>

                </div>
            </div>
        @endif

    @endif

</div>
