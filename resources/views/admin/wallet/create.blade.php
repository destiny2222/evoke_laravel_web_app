    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add Wallet Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.wallet.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('title') }}</label>
                            <input type="text" name="title"
                                class="form-control @error('title') is-invalid @enderror" id="basic-default-fullname"
                                placeholder="Title" />
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div> --}}
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">{{ __(' Wallet Address ') }}</label>
                            <textarea id="basic-default-message" id="summary-body" name="address" class="form-control"
                                placeholder="Wallet Address"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary ">{{ __(' Save ') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>