<div class="modal fade" tabindex="-1" id="deleteBucket">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            @livewire('panel.storage-object.bucket.actions.delete-bucket', [
                'bucketID' => $bucketID
            ])
        </div>
    </div>
</div>
