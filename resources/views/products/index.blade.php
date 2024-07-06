<x-layout>

    <x-slot:breadcrumb>{{ $breadcrumb }}</x-slot:breadcrumb>

    <div class="d-flex bg-white rounded-4 shadow-sm p-4 mb-4">
        <!-- button form add data -->
        <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill py-2 px-4 me-md-2">
            <i class="ti ti-plus me-2"></i> Add Product
        </a>
        <!-- form pencarian -->
        <form action="{{ route('products.index') }}" method="GET" class="ms-auto">
            <div class="input-group">
                <input type="text" name="search" class="form-control rounded-start-pill py-2 px-4" value="{{ request('search') }}" placeholder="Search product ..." autocomplete="off">
                <button class="btn btn-primary rounded-end-pill py-2 px-3" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="mb-4">
        @forelse ($products as $product)
            <!-- jika data ada, tampilkan data -->
            <div class="d-flex bg-white rounded-4 shadow-sm p-2 mb-3">
                <div class="flex-shrink-0 p-3">
                    <img src="{{ asset('/storage/products/'.$product->image) }}" class="border img-fluid rounded-4 shadow-sm" alt="Images" width="200">
                </div>
                <div class="p-4 flex-grow-1">
                    <h5>{{ $product->title }}</h5>
                    <p class="text-muted"><i class="ti ti-tag me-1"></i> {{ $product->category }}</p>
                    <p class="text-success fw-medium">{{ 'Rp ' . number_format($product->price, 0, '', '.') }}</p>
                </div>
                <div class="p-4">
                    <div class="d-flex flex-column flex-lg-row">
                        <!-- button form detail data -->
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm rounded-pill px-3 me-2 mb-2 mb-lg-0"> Detail </a>
                        <!-- button form edit data -->
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm rounded-pill px-3 me-2 mb-2 mb-lg-0"> Edit </a>
                        <!-- button modal hapus data -->
                        <button type="button" class="btn btn-danger btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $product->id }}"> Delete </button>
                    </div>
                </div>
            </div>

            <!-- Modal hapus data -->
            <div class="modal fade" id="modalDelete{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                <i class="ti ti-trash me-2"></i> Delete Product
                            </h1>
                        </div>
                        <div class="modal-body">
                            <!-- informasi data yang akan dihapus -->
                            <p class="mb-2">
                                Are you sure to delete <span class="fw-medium mb-2">{{ $product->title }}</span>?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                            <!-- button hapus data -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-pill px-3"> Yes, delete it! </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- jika data tidak ada, tampilkan pesan data tidak tersedia -->
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <i class="ti ti-info-circle me-2"></i>
                <div>No data available.</div>
            </div>
        @endforelse
    </div>

    <!-- pagination -->
    <div class="pagination-links mb-5">{{ $products->links() }}</div>

</x-layout>