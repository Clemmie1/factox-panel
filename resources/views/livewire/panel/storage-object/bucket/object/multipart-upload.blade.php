<div class="card w-100 rounded-0">
    <div class="card-header pe-5">
        <div class="card-title">
            <div class="d-flex justify-content-center flex-column me-3">
                <a class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 lh-1">Загрузка объектов</a>
            </div>
        </div>
        <div class="card-toolbar">
            <div class="btn btn-sm btn-icon btn-active-light-primary" id="multipart_upload_close">
                <i class="fa-duotone fa-xmark fs-2" wire:click="closeModel"></i>
            </div>
        </div>
    </div>

    <div class="card-body hover-scroll-overlay-y">
        <div class="py-5 mb-5">
            <label for="exampleFormControlInput1" class=" form-label">Уровень хранилища</label>
            <div wire:ignore>
                <select class="form-select form-select-solid" data-control="select2" data-placeholder="Уровень хранилища" data-hide-search="true">
                    <option></option>
                    <option value="1" selected>Стандартный</option>
                    <option value="2">Редкий доступ</option>
                    <option value="3">Архив</option>
                </select>
            </div>
        </div>

        <div>


            <div x-data="{ isUploading: false, progress: 0 }"
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false"
                 x-on:livewire-upload-error="isUploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress">

                <label class="text-muted">Вы можете загружать несколько файлов</label>
                <input wire:model.live="file" type="file" class="form-control">

                <div class="mt-2 w-100"  x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>

                <div>
                    @if($file)
                        @foreach($uploadedFileData as $index => $list)
                            <div class="bg-secondary mt-3 rounded">
                                <div class="py-4 m-6 fs-6 d-flex justify-content-between">
                                    <div class="fw-semibold">
                                        {{ $list['fileName'] }}
                                        <span class="text-gray-500">{{ $list['fileSize'] }}</span>
                                    </div>
                                    <div class="d-flex">
                                        <i wire:click="deleteFile({{ $index }})" class="las la-trash-alt fs-2 text-danger" style="cursor: pointer"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endif
                </div>


            </div>

        </div>

    </div>
    <div>
        <div class="card-footer">
            <div class="d-flex flex-stack">
                <div class="d-flex" style="height: 53px">
                    <button class="btn btn-primary" wire:click="getFiles">Загрузить</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{--
@push('footer-scripts')



    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('hideDrawer', (event) => {
                KTDrawer.createInstances();
                var drawerElement = document.querySelector("#kt_drawer_example_basic");
                var drawer = KTDrawer.getInstance(drawerElement);
                drawer.hide();
            });
        });
    </script>
@endpush--}}
