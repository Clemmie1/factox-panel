<div>
    @if($formLogin)
        <div>
            <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" wire:submit="login">
                @csrf
                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">
                        <svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5765 1.64102H30.9236L18.17 20.4906H0.822876L13.5765 1.64102Z" fill="white"/>
                            <path d="M14.3361 22.2375L9.39636 29.5385H27.5664L40.32 10.6889H26.9094L19.0955 22.2375H14.3361Z" fill="white"/>
                        </svg>
                    </h1>
                    <div class="text-gray-500 fw-semibold fs-3">
                        Вход в аккаунт
                    </div>
                </div>

                {{--<div class="row g-3 mb-9">
                    <div class="col-md-6">
                        <button disabled class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                            <i class="fa-brands fa-google h-15px me-3"></i>
                            Войти через Google
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button disabled class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                            <i class="fa-brands fa-vk h-15px me-3"></i>
                            Войти через VK ID
                        </button>
                    </div>
                </div>

                <div class="separator separator-content my-14">
                    <span class="w-125px text-gray-500 fw-semibold fs-7 text-uppercase">Или</span>
                </div>--}}

                <div class="fv-row mb-8 fv-plugins-icon-container">
                    <input type="email" wire:model.live="email" placeholder="Почта" name="email" autocomplete="off" class="form-control form-control-solid @error('email') is-invalid @enderror">
                    @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="fv-row mb-3 fv-plugins-icon-container">
                    <input type="password" wire:model.live="password" placeholder="Пароль" name="password" autocomplete="off" class="form-control form-control-solid @error('password') is-invalid @enderror">
                    @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <div></div>
                    <a href="{{route('auth.reset-password')}}" wire:navigate class="link-primary">
                        Забыли пароль?
                    </a>
                </div>

                <div>
                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary text-uppercase" style="height: 52px;" wire:target="login" wire:loading.remove>
                            ВОЙТИ
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
                </div>

                <div class="text-gray-500 text-center fw-semibold fs-6">
                    Еще нет аккаунта?

                    <a href="{{route('auth.register')}}" wire:navigate class="link-primary">
                        Зарегистрироваться
                    </a>
                </div>

            </form>
        </div>
    @else
        @if($accountBlocked)
            <div>
                <div class=" w-100">
                    <div class="text-center mb-11">
                        <h1 class="text-gray-900 fw-bolder mb-3">
                            <svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5765 1.64102H30.9236L18.17 20.4906H0.822876L13.5765 1.64102Z" fill="white"/>
                                <path d="M14.3361 22.2375L9.39636 29.5385H27.5664L40.32 10.6889H26.9094L19.0955 22.2375H14.3361Z" fill="white"/>
                            </svg>
                        </h1>
                    </div>

                    <div class="alert alert-danger d-flex align-items-center p-5 border-0">
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-danger text-center">Аккаунт заблокирован</h4>
                            <br>
                            <span>Пожалуйста, <a href="mailto:support@factox.net">свяжитесь</a> с нашей службой поддержки для получения дополнительной информации вашего аккаунта.</span>
                        </div>
                    </div>
                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        <button  wire:click="back" type="button" class="btn btn-active-secondary w-100 text-primary">Назад</button>
                    </div>

                </div>
            </div>
        @endif
    @endif

</div>
