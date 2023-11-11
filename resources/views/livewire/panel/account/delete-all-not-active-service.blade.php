<div>
    <div class="card-body border-top p-9">

        <div wire:target="close" wire:loading.remove>
            <div class="notice d-flex bg-light-danger rounded  border border-dashed mb-9 p-6" >

                <i class="fa-duotone fa-user-slash fs-2tx text-danger me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>        <!--end::Icon-->

                <div class="d-flex flex-stack flex-grow-1 ">

                    <div class=" fw-semibold">
                        <h4 class="fw-bold text-danger">Закрыть аккаунт</h4>

                        <div class="fs-6 text-danger">Если вы решили завершить использование нашей платформы, вы можете сделать это.
                            <br>
                            <br>
                            <b>Внимание</b>: после завершения процесса, данные будут удалены без возможности восстановления.
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class="card-footer d-flex justify-content-end py-6 px-9 border-danger">
        <button wire:target="close" wire:loading.remove wire:click="close" type="button" class="btn btn-danger fw-semibold text-uppercase" style="height: 53px">Удалить</button>
        <button wire:target="close" wire:loading wire:click="close" type="button" disabled  class="disabled btn btn-danger fw-semibold text-uppercase" style="height: 53px">
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
