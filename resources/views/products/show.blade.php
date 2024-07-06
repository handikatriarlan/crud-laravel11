<x-layout>

    <x-slot:breadcrumb>{{ $breadcrumb }}</x-slot:breadcrumb>

    <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
        <!-- judul form -->
        <div class="alert alert-primary rounded-4 mb-5" role="alert">
            <i class="ti ti-list fs-5 align-text-top me-2"></i> Detail Product
        </div>
        <!-- detail data -->
        <div class="row flex-lg-row align-items-center g-5">
            <div class="col-lg-3">
                <img src="{{ asset('/storage/products/'.$product->image) }}" class="d-block mx-lg-auto img-fluid rounded-4 shadow-sm" alt="Images" loading="lazy">
            </div>
            <div class="col-lg-9">
                <h4>{{ $product->title }}</h4>
                <p class="text-muted"><i class="ti ti-tag me-1"></i> {{ $product->category }}</p>
                <p>{!! $product->description !!}</p>
                <p class="text-success fw-medium">{{ 'Rp ' . number_format($product->price, 0, '', '.') }}</p>
            </div>
        </div>
        <div class="pt-4 pb-2 mt-5 border-top">
            <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
                <!-- button kembali ke halaman index -->
                <a href="{{ route('products.index') }}" class="btn btn-secondary rounded-pill py-2 px-4">Close</a>
            </div>
        </div>
    </div>
    
</x-layout>
