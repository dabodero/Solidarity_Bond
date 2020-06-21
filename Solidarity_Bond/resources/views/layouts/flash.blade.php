<div class="modal fade" id="flashModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{session()->get($variable)['titre']}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-success">
                {{session()->get($variable)['message']}}
            </div>
        </div>
    </div>
</div>

@push('flashScripts')
    <script>$('#flashModal').modal('show')</script>
@endpush
