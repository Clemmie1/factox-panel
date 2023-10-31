<div>

    @if($formRegister)
        <form class="form w-100" wire:submit="reg">
            <div class="text-center mb-11">
                <h1 class="text-dark fw-bolder mb-5">

                    <svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5765 1.64102H30.9236L18.17 20.4906H0.822876L13.5765 1.64102Z" fill="white"/>
                        <path d="M14.3361 22.2375L9.39636 29.5385H27.5664L40.32 10.6889H26.9094L19.0955 22.2375H14.3361Z" fill="white"/>
                    </svg>

                </h1>
                <div class="text-gray-500 fw-semibold fs-3">
                    Регистрация аккаунта
                </div>
            </div>

            <div>
                <div class="fv-row mb-8">
                    <input type="text" placeholder="Имя" autocomplete="off" wire:model.live="name" class="form-control form-control-solid @error('name') is-invalid @enderror">
                    @error('name') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>
            </div>


            <div>
                <div class="fv-row mb-8">
                    <input type="email" placeholder="Почта" autocomplete="on" wire:model.live="email" class="form-control form-control-solid @error('email') is-invalid @enderror">
                    @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div>
                <div class="fv-row mb-8">
                    <input type="password" placeholder="Пароль" autocomplete="on" wire:model.live="password" class="form-control form-control-solid @error('password') is-invalid @enderror">
                    @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>
            </div>



            <div class="d-grid mb-10">
                <button type="submit" class="btn btn-primary text-uppercase" style="height: 52.13px" wire:target="reg" wire:loading.remove>
                    зарегистрироваться
                </button>

                <button type="button" class="btn btn-secondary justify-content-center text-center" disabled wire:target="reg" wire:loading>
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
                <a href="{{route('auth.login')}}"  wire:navigate type="button" class="btn btn-active-secondary w-100 text-primary">Войти в аккаунт</a>
            </div>
        </form>

    @else

        <div class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework">
            <div class="text-center mb-11">
                <h1 class="text-dark fw-bolder mb-5">

                    <svg width="42" height="32" viewBox="0 0 42 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5765 1.64102H30.9236L18.17 20.4906H0.822876L13.5765 1.64102Z" fill="white"/>
                        <path d="M14.3361 22.2375L9.39636 29.5385H27.5664L40.32 10.6889H26.9094L19.0955 22.2375H14.3361Z" fill="white"/>
                    </svg>

                </h1>
                <div class="text-gray-500 fw-semibold fs-3">
                    Регистрация аккаунта
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="card-p">

                        <div class="text-gray-600">
                            <p>На адрес <span class="text-gray-800">{{$email}}</span> отправлено письмо с подтверждением.</p>
                            <p>Для завершения регистрация перейдите по ссылке в нем.</p>
                        </div>

                        <div class="text-center px-4">
                            <div class="mb-0">
                                <img src="{{asset('assets/media/auth/please-verify-your-email.png')}}" class="mw-100 mh-300px theme-light-show" alt="">
                                <img src="{{asset('assets/media/auth/please-verify-your-email-dark.png')}}" class="mw-100 mh-300px theme-dark-show" alt="">
                            </div>
                        </div>

                        <a href="{{route('auth.login')}}" wire:navigate class="btn btn-secondary w-100 text-uppercase">Продолжить</a>
                    </div>
                </div>
            </div>


        </div>

    @endif

</div>
