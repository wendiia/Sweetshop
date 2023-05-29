@if(session()->has('success'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="row justify-content-end me-2 toast-fixed">
        <div class="col-2 shadow-lg bg-white my-rounded  mb-4 py-3 d-flex align-center">
            <p class="fs-5 mx-auto color-font-pink my-auto">
                {{session('success')}}
            </p>
        </div>
    </div>
@endif
