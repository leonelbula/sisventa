<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0" id="productsTable">

                <thead class="table-light">

                    <tr>

                        <th width="15%">
                            Código
                        </th>

                        <th width="35%">
                            Producto
                        </th>

                        <th width="10%" class="text-center">
                            Stock
                        </th>

                        <th width="12%" class="text-center">
                            Cantidad
                        </th>

                        <th width="13%" class="text-end">
                            Costo
                        </th>

                        <th width="13%" class="text-end">
                            Subtotal
                        </th>

                        <th width="2%"></th>

                    </tr>

                </thead>

                <tbody id="productsBody">

                    @if (isset($purchase))

                        @foreach ($purchase->details as $detail)
                            <tr>

                                <td>

                                    {{ $detail->product->code }}

                                    <input type="hidden" name="details[{{ $loop->index }}][product_id]"
                                        value="{{ $detail->product_id }}">

                                </td>

                                <td>

                                    <div class="fw-semibold">

                                        {{ $detail->product->name }}

                                    </div>

                                    <small class="text-muted">

                                        {{ $detail->product->category->name ?? '' }}

                                    </small>

                                </td>

                                <td class="text-center">

                                    <span class="badge bg-secondary">

                                        {{ number_format($detail->product->stock) }}

                                    </span>

                                </td>

                                <td>

                                    <input type="number" min="1" class="form-control text-center quantity"
                                        name="details[{{ $loop->index }}][quantity]" value="{{ $detail->quantity }}">

                                </td>

                                <td>

                                    <input type="number" min="0" class="form-control text-end cost"
                                        name="details[{{ $loop->index }}][cost_price]"
                                        value="{{ $detail->cost_price }}">

                                </td>

                                <td>

                                    <input type="text" readonly class="form-control text-end subtotal"
                                        name="details[{{ $loop->index }}][subtotal]" value="{{ $detail->subtotal }}">

                                </td>

                                <td>

                                    <button type="button" class="btn btn-sm btn-outline-danger remove-product">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </td>

                            </tr>
                        @endforeach

                    @endif

                </tbody>

                <tfoot>

                    <tr>

                        <th colspan="7" class="bg-light">

                            <div class="d-flex justify-content-between">

                                <span>

                                    Productos agregados:

                                </span>

                                <span id="productsCount" class="fw-bold">

                                    0

                                </span>

                            </div>

                        </th>

                    </tr>

                </tfoot>

            </table>

        </div>

    </div>

</div>
