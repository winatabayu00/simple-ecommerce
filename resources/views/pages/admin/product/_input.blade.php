<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
    <div class="card card-flush py-4">
        <div class="card-header">
            <div class="card-title">
                <h2>{{ __('Photo') }}</h2>
            </div>
        </div>
        <div class="card-body text-center pt-0">
            <style>
                .image-input-thumbnail {
                    background-image: url({{ $product->image ?? asset('/media/svg/files/blank-image.svg') }});
                }

                [data-theme="dark"] .image-input-thumbnail {
                    background-image: url({{ $product->image ?? asset('/media/svg/files/blank-image-dark.svg') }});
                }
            </style>
            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                 data-kt-image-input="true">
                <div class="image-input-wrapper image-input-thumbnail w-150px h-150px"></div>
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                       data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change thumbnail">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <input type="file" name="product_photo" accept=".png, .jpg, .jpeg"/>
                    <input type="hidden" name="product_photo_remove"/>
                </label>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel thumbnail">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove thumbnail">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
            </div>
            <div class="text-muted fs-7">image. Only *.png, *.jpg and *.jpeg
                image files are accepted
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
    <div class="tab-content">
        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ $pageTitle }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">{{ __('name') }}</label>
                            <input type="text" name="name" class="form-control mb-2"
                                   placeholder="{{ __('name') }}"
                                   value="{{ old('name', (isset($product) && $product->name ? $product->name : '')) }}"/>
                            <div class="text-muted fs-7"></div>
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">{{ __('price') }}</label>
                            <input type="number" name="price" class="form-control mb-2"
                                   placeholder="{{ __('price') }}"
                                   value="{{ old('price', (isset($product) && $product->price ? $product->price : '')) }}"/>
                            <div class="text-muted fs-7"></div>
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">{{ __('stock') }}</label>
                            <input type="number" name="stock" class="form-control mb-2"
                                   placeholder="{{ __('stock') }}"
                                   value="{{ old('stock', (isset($product) && $product->stock ? $product->stock : '')) }}"/>
                            <div class="text-muted fs-7"></div>
                        </div>

                        <div>
                            <label class="form-label">{{ __('content') }}</label>

                            <!-- Toolbar -->
                            <div id="toolbar">
                                            <span class="ql-formats">
                                                <button class="ql-bold"></button>
                                                <button class="ql-italic"></button>
                                                <button class="ql-underline"></button>
                                            </span>
                                <span class="ql-formats">
                                                <button class="ql-list" value="ordered"></button>
                                                <button class="ql-list" value="bullet"></button>
                                            </span>
                                <span class="ql-formats">
                                                <button class="ql-link"></button>
                                                <button class="ql-clean"></button>
                                            </span>
                            </div>
                            <!-- Editor -->
                            <div id="editor-content" class="min-h-300px mb-2"></div>

                            <!-- Hidden input untuk form -->
                            <input type="hidden" id="content" name="description"
                                   value="{{ old('description', $product->description ?? '') }}">

                            <!-- Preview -->
                            <h4>Live Preview:</h4>
                            <div id="content-preview" class="p-4 border rounded bg-light"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.products.index') }}"
           id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
            <span class="indicator-label">Save Changes</span>
            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</div>

@push('js')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        const quill = new Quill('#editor-content', {
            modules: {
                toolbar: '#toolbar'
            },
            theme: 'snow'
        });

        // Load content kalau mode edit
        const hiddenInput = document.getElementById('content');
        if (hiddenInput.value) {
            quill.root.innerHTML = hiddenInput.value;
            document.getElementById('content-preview').innerHTML = hiddenInput.value;
        }

        // Batas karakter (misal 1000 karakter)
        const maxChars = 10000;

        quill.on('text-change', function () {
            const content = quill.root.innerHTML;
            const textLength = quill.getText().trim().length;

            if (textLength > maxChars) {
                alert("Maksimal " + maxChars + " karakter!");
                quill.deleteText(maxChars, textLength); // Potong
            }

            hiddenInput.value = content;
            document.getElementById('content-preview').innerHTML = content;
        });

        // Saat submit form
        document.querySelector('form').addEventListener('submit', function () {
            hiddenInput.value = quill.root.innerHTML;
        });

    </script>
@endpush
