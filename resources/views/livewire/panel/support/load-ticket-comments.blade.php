<div>
    <div class="mb-0">
        <div class="d-flex align-items-center mb-12">
            <div class="d-flex flex-column">
                <h1 class="text-gray-800 fw-semibold">{{$ticketData->ticket_theme}}</h1>
                <div class="">
                    <span class="fw-semibold text-muted me-6">Приоритет: <a href="#" class="text-muted text-hover-primary">{{$ticketData->ticket_priority}}</a></span>
                    <span class="fw-semibold text-muted me-6">Обновлён: <a href="#" class="text-muted text-hover-primary">{{ \Carbon\Carbon::parse($ticketData->updated_at)->diffForHumans() }}</a></span>
                    <span class="fw-semibold text-muted">Создан: <span class="fw-bold text-gray-600 me-1">{{ \Carbon\Carbon::parse($ticketData->created_at)->diffForHumans() }}</span>({{ \Carbon\Carbon::parse($ticketData->created_at)->format('d.m.Y в H:i') }})</span>
                </div>
            </div>
        </div>
        <div class="mb-15">

            @foreach($loadData as $list)
                @if(!$list->is_user)
                    <div class="ms-9 mb-9">
                        <div class="card card-bordered w-100">
                            <div class="card-body">
                                <div class="w-100 d-flex flex-stack mb-8">
                                    <div class="d-flex align-items-center f">
                                        <div class="symbol symbol-50px me-5">
                                            <div class="symbol-label fs-1 fw-bold bg-light-success text-success">
                                                В
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column fw-semibold fs-5 text-gray-600 text-dark">
                                            <div class="d-flex align-items-center">
                                                <a class="text-gray-800 fw-bold text-hover-primary fs-5 me-3">Вы</a>
                                                <span class="m-0"></span>
                                            </div>
                                            <span class="text-muted fw-semibold fs-6">{{ \Carbon\Carbon::parse($list->created_at)->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="fw-normal fs-5 text-gray-700 m-0">
                                    {{$list->msg}}
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="overflow-hidden position-relative card-rounded mb-9">

                        <div class="card card-bordered w-100">
                            <div class="card-body">
                                <div class="w-100 d-flex flex-stack mb-8">
                                    <div class="d-flex align-items-center f">
                                        <div class="symbol symbol-50px me-5">
                                            <div class="symbol-label fs-1 fw-bold bg-light-primary text-primary">
                                                СП
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column fw-semibold fs-5 text-gray-600 text-dark">
                                            <div class="d-flex align-items-center">
                                                <a class="text-gray-800 fw-bold text-hover-primary fs-5 me-3">Сотрудник поддержки</a>
                                                <span class="m-0"></span>
                                            </div>
                                            <span class="text-muted fw-semibold fs-6">{{ \Carbon\Carbon::parse($list->created_at)->diffForHumans() }}</span>
                                        </div>
                                    </div>

                                </div>
                                <p class="fw-normal fs-5 text-gray-700 m-0">
                                    {{$list->msg}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach


        </div>
    </div>


    @if($ticketData->ticket_status == 0 || $ticketData->ticket_status == 1)

        <div>
            <button style="height: 52px" wire:click="closeTicket" wire:loading.remove="closeTicket" wire:target="closeTicket" class="btn btn-secondary mt-3 w-100 text-uppercase">
                Закрыть заявку
            </button>

            <button wire:loading="closeTicket" wire:target="closeTicket" style="height: 52px" class="btn btn-secondary mt-3 w-100 text-uppercase disabledNweb" disabled>
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

        <div>
            <div class="mb-0" wire:loading.remove="closeTicket" wire:target="closeTicket">
                <textarea class="mt-3 form-control form-control-solid placeholder-gray-600 fw-bold fs-4 ps-9 pt-7" wire:model.live="msg" rows="6" placeholder="Введите сообщение"></textarea>
                <button wire:click="sendComment" class="btn btn-primary mt-n20 mb-20 position-relative float-end me-7">Отправить</button>
                <!--end::Submit-->
            </div>
            <div class="d-flex flex-column mt-6">
                <li class="d-flex align-items-center py-2">
                    <span class="bullet text-warning bullet-line h-20px w-6px rounded-1 bg-warning me-3"></span>
                    <span class="text-muted">Помните, что Сотрудник поддержки никогда не попросит данные вашего аккаунта.</span>
                </li>
            </div>
        </div>
    @elseif($ticketData->ticket_status == 2)
        <div class="rounded alert-success d-flex align-items-center p-5">
            <i class="las la-check-circle fs-2hx text-success me-4"></i>
            <div class="d-flex flex-column">
                <h4 class="mb-1 text-success">Обращение решено</h4>
                <span>
                    Мы успешно решили ваш запрос. Спасибо за обращение!
                </span>
            </div>
        </div>
        <div class="text-center mt-10">
            <button class="btn btn-secondary text-uppercase" wire:click="continue_communication">
                Продолжить общение с Сп
            </button>
        </div>
    @elseif($ticketData->ticket_status == 3)
        <div class="rounded alert-danger d-flex align-items-center p-5">
            <i class="las la-times-circle fs-2hx text-danger me-4"></i>
            <div class="d-flex flex-column">
                <h4 class="mb-1 text-danger">Обращение закрыто</h4>
                <span>Ваш запрос был закрыт и больше не требует дополнительных действий.</span>
            </div>
        </div>
    @endif

</div>
