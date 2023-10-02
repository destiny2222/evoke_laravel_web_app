
<div class="modal fade" id="modalTop{{ $events->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ __('Edit Blog') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.wallet.update', $events->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        {{-- <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">{{ __('title') }}</label>
                            <input type="text" value="{{ $events->title }}" name="title" class="form-control @error('title') is-invalid @enderror" id="basic-default-fullname" placeholder="Title" />
                            @error('title')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div> --}}
                        <div class="col-12 mb-3">
                            <label class="form-label" for="basic-default-message">{{ __(' Wallet  Address ') }}</label>
                            <textarea id="basic-default-message" id="body" name="address" class="form-control">{{ $events->address }}</textarea>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0 text-center">
                            <input type="submit" class="btn btn-primary btn-sm" value="Save Change">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @include('layouts.script') --}}