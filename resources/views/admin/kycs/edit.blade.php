<div class="modal fade" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered text-center modal-sm" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title ">Approve User</h6>
                <button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                <form action="{{  route('admin.kyc.update', $events->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="container">
                        <input type="hidden" name="user_id" value="{{ $events->user->id }}">
                        <div class="row text-center">
                            <div class="col-lg-12 ">
                                <label class="form-label text-black fw-bold" for="basic-default-fullname">{{ __('Approve or Declined') }}</label>
                                <div class="form-check form-switch mb-2">
                                    <div class="text-cente">
                                        <input class="form-check-input "  name="approve_status" type="checkbox" id="flexSwitchCheckChecked"   {{ old('approve_status', $events->approve_status) ? 'checked' : '' }}/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>