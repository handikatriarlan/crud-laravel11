<x-layout>

    <x-slot:breadcrumb>{{ $breadcrumb }}</x-slot:breadcrumb>

    <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
        <!-- judul form -->
        <div class="alert alert-primary rounded-4 mb-5" role="alert">
            <i class="ti ti-edit fs-5 align-text-top me-2"></i> Add Product
        </div>
        <!-- form add data -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <div class="col-xl-8">
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" autocomplete="off">
                        
                        <!-- pesan error untuk title -->
                        @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="14" autocomplete="off">{{ old('description') }}</textarea>
                    
                        <!-- pesan error untuk description -->
                        @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="mb-3">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category" class="form-select @error('category') is-invalid @enderror" autocomplete="off">
                            <option selected disabled value="">- Select category -</option>
                            <option {{ old('category') == 'PHP' ? 'selected' : '' }} value="PHP">PHP</option>
                            <option {{ old('category') == 'Laravel' ? 'selected' : '' }} value="Laravel">Laravel</option>
                            <option {{ old('category') == 'Codeigniter' ? 'selected' : '' }} value="Codeigniter">Codeigniter</option>
                        </select>
                        
                        <!-- pesan error untuk category -->
                        @error('category')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" autocomplete="off">
                    
                        <!-- pesan error untuk price -->
                        @error('price')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" accept=".jpg, .jpeg, .png" name="image" id="image" class="form-control @error('image') is-invalid @enderror" autocomplete="off">
            
                        <!-- pesan error untuk image -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <!-- preview image -->
                        <div class="mt-3">
                            <img id="imagePreview" src="{{ asset('images/no-image.png') }}" class="border img-fluid rounded-4 shadow-sm" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="pt-4 pb-2 mt-5 border-top">
                <div class="d-flex p-1">
                    <!-- button simpan data -->
                    <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 me-3">Save</button>
                    <!-- button kembali ke halaman index -->
                    <a href="{{ route('products.index') }}" class="btn btn-secondary rounded-pill py-2 px-4">Cancel</a>
                </div>
            </div>
        </form>
    </div>

</x-layout>