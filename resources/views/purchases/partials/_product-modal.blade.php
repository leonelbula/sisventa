<div class="modal fade" id="productModal" tabindex="-1">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header">

                <h5>
                    Buscar producto
                </h5>

                <button class="btn-close" data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <table class="table table-hover">

                    <thead>

                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Costo</th>
                            <th></th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($products as $product)
                            <tr>

                                <td>
                                    {{ $product->barcode }}
                                </td>

                                <td>
                                    {{ $product->name }}
                                </td>

                                <td>
                                    $
                                    {{ number_format($product->cost_price, 0, ',', '.') }}
                                </td>

                                <td>

                                    <button type="button" class="btn btn-primary btn-sm add-product"
                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                        data-cost="{{ $product->cost_price }}">

                                        Agregar

                                    </button>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
