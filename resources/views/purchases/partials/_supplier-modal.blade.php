<div class="modal fade" id="supplierModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5>
                    Buscar proveedor
                </h5>

                <button class="btn-close" data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <table class="table table-hover">

                    <thead>

                        <tr>
                            <th>Documento</th>
                            <th>Proveedor</th>
                            <th></th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($suppliers as $supplier)
                            <tr>

                                <td>
                                    {{ $supplier->document }}
                                </td>

                                <td>
                                    {{ $supplier->name }}
                                </td>

                                <td>

                                    <button type="button" class="btn btn-primary btn-sm select-supplier"
                                        data-id="{{ $supplier->id }}" data-name="{{ $supplier->name }}">

                                        Seleccionar

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
