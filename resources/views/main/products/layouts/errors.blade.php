@if ($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-warning fade show d-flex align-items-top justify-content-between bg-white" role="alert">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-triangle-exclamation pe-3" style="color: #ff8282;"></i>
                <p class="fs-5">{{$error}}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
        </div>
    @endforeach
@endif
