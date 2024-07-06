<div class="ms-5 ms-lg-0 pt-lg-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-dark text-decoration-none"><i class="ti ti-home fs-5"></i></a></li>
            <li class="breadcrumb-item" aria-current="page">{{ $slot }}</li>
        </ol>
    </nav>
</div>