<div class="row">

    {{-- Información General --}}
    <div class="col-lg-8">

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-semibold">
                    Información del Producto
                </h5>
            </div>

            <div class="card-body">

                <div class="row">

                    {{-- Nombre --}}
                    <div class="col-md-8 mb-3">

                        <label class="form-label fw-semibold">
                            Nombre
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $product->name ?? '') }}" placeholder="Ej: Arroz Diana 500g">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- SKU --}}
                    <div class="col-md-4 mb-3">

                        <label class="form-label fw-semibold">
                            SKU
                        </label>

                        <input type="text" name="sku" class="form-control"
                            value="{{ old('sku', $product->sku ?? '') }}" placeholder="PRD-0001">

                        @error('sku')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Código de barras --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Código de Barras
                        </label>

                        <input type="text" name="barcode" class="form-control"
                            value="{{ old('barcode', $product->barcode ?? '') }}" placeholder="Código de barras">

                    </div>

                    {{-- Categoría --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Categoría
                            <span class="text-danger">*</span>
                        </label>

                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">

                            <option value="">
                                Seleccione una categoría
                            </option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>

                                    {{ $category->name }}

                                </option>
                            @endforeach

                        </select>

                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Descripción --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">
                            Descripción
                        </label>

                        <textarea name="description" rows="4" class="form-control" placeholder="Descripción del producto...">{{ old('description', $product->description ?? '') }}</textarea>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Datos Comerciales --}}
    <div class="col-lg-4">

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-semibold">
                    Inventario
                </h5>
            </div>

            <div class="card-body">

                {{-- Precio costo --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Precio Costo
                    </label>

                    <input type="number" step="0" name="cost_price" id="cost_price" class="form-control"
                        value="{{ old('cost_price', $product->cost_price ?? 0) }}">

                </div>

                {{-- Precio venta --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Precio Venta
                    </label>

                    <input type="number" step="0" name="sale_price" id="sale_price" class="form-control"
                        value="{{ old('sale_price', $product->sale_price ?? 0) }}">

                    <small id="price-alert" class="text-danger d-none">

                        El precio de venta es menor al costo.

                    </small>

                </div>
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Utilidad %
                    </label>

                    <input type="number" step="0" name="utility" id="utility" class="form-control"
                        value="{{ old('utilily', $product->utility ?? 0) }}">



                </div>
                {{-- Stock --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Stock Inicial
                    </label>

                    <input type="number" name="stock" class="form-control"
                        value="{{ old('stock', $product->stock ?? 0) }}"
                         @disabled($product->exists)>
                        
                   
                    @if ($product->exists)
                     <input type="hidden" name="stock" value="{{$product->stock}}">
                        <small class="text-muted">
                            El stock se administra desde Compras,
                            Ventas y Ajustes de Inventario.
                        </small>
                    @endif

                </div>

                {{-- Stock mínimo --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Stock Mínimo
                    </label>

                    <input type="number" name="min_stock" class="form-control"
                        value="{{ old('min_stock', $product->min_stock ?? 5) }}">

                </div>

                {{-- Estado --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold d-block">
                        Estado
                    </label>

                    <input type="hidden" name="status" value="0">

                    <div class="form-check form-switch">

                        <input type="checkbox" name="status" value="1" class="form-check-input"
                            @checked(old('status', $product->status ?? true))>

                        <label class="form-check-label">
                            Producto Activo
                        </label>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@push('scripts')
    <script>
        document
            .getElementById('sale_price')
            .addEventListener('blur', function() {

                let cost = parseInt(
                    document.getElementById('cost_price').value
                ) || 0;

                let sale = parseFloat(this.value) || 0;

                let alert = document
                    .getElementById('price-alert');

                if (sale < cost) {
                    alert.classList.remove('d-none');
                } else {
                    alert.classList.add('d-none');
                }
            });

        const $cost = document.getElementById("cost_price");
        const $price = document.getElementById("sale_price");
        const $utility = document.getElementById("utility");

        $cost.addEventListener("change", (e) => {
            $price.value = $cost.value;

            let valor = Number(($cost.value * $utility.value) / 100);
            let precio = Number($cost.value) + valor;
            $price.value = parseInt(precio);
        });

        $price.addEventListener("change", (e) => {
            let valor = Number($price.value - $cost.value);
            let utility = Number(valor / $cost.value) * 100;
            $utility.value = parseInt(utility);
        });

        $utility.addEventListener("change", (e) => {
            let valor = Number(($cost.value * $utility.value) / 100);
            let precio = Number($cost.value) + valor;
            $price.value = parseInt(precio);
        });
    </script>
@endpush
