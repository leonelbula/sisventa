<div class="card shadow-sm border-0">

    <div class="card-body p-4">

        {{-- Nombre --}}
        <div class="mb-4">

            <label class="form-label fw-semibold">
                Nombre
                <span class="text-danger">*</span>
            </label>

            <div class="input-group">

                <span class="input-group-text bg-white">
                    <i class="bi bi-tags"></i>
                </span>

                <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
                    class="form-control @error('name') is-invalid @enderror" placeholder="Ejemplo: Bebidas">

            </div>

            @error('name')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror

        </div>

        {{-- Descripción --}}
        <div class="mb-4">

            <label class="form-label fw-semibold">
                Descripción
            </label>

            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror"
                placeholder="Descripción de la categoría...">{{ old('description', $category->description ?? '') }}</textarea>

            @error('description')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror

        </div>

        {{-- Estado --}}
        <div class="mb-4">

            <label class="form-label fw-semibold d-block">
                Estado
            </label>

            <input type="hidden" name="status" value="0">

            <div class="form-check form-switch">

                <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                    @checked(old('status', $category->status ?? 1))>

                <label class="form-check-label" for="status">

                    Categoría activa

                </label>

            </div>

        </div>

    </div>

</div>
