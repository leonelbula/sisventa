<div class="row g-3">

    <div class="col-md-3">

        <label class="form-label">
            Tipo Documento
        </label>

        <select
            name="document_type"
            class="form-select">

            <option value="NIT"
                @selected(old(
                    'document_type',
                    $supplier->document_type ?? ''
                ) == 'NIT')>

                NIT

            </option>

            <option value="CC"
                @selected(old(
                    'document_type',
                    $supplier->document_type ?? ''
                ) == 'CC')>

                Cédula

            </option>

        </select>

    </div>

    <div class="col-md-3">

        <label class="form-label">
            Documento
        </label>

        <input
            type="text"
            name="document_number"
            class="form-control"
            value="{{ old(
                'document_number',
                $supplier->document_number ?? ''
            ) }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">
            Nombre
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old(
                'name',
                $supplier->name ?? ''
            ) }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">
            Empresa
        </label>

        <input
            type="text"
            name="company_name"
            class="form-control"
            value="{{ old(
                'company_name',
                $supplier->company_name ?? ''
            ) }}">

    </div>

    <div class="col-md-3">

        <label class="form-label">
            Teléfono
        </label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ old(
                'phone',
                $supplier->phone ?? ''
            ) }}">

    </div>

    <div class="col-md-3">

        <label class="form-label">
            Correo
        </label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old(
                'email',
                $supplier->email ?? ''
            ) }}">

    </div>

    <div class="col-md-12">

        <label class="form-label">
            Dirección
        </label>

        <input
            type="text"
            name="address"
            class="form-control"
            value="{{ old(
                'address',
                $supplier->address ?? ''
            ) }}">

    </div>

    <div class="col-md-12">

        <label class="form-label">
            Observaciones
        </label>

        <textarea
            name="observation"
            rows="3"
            class="form-control">{{ old(
                'observation',
                $supplier->observation ?? ''
            ) }}</textarea>

    </div>

    <div class="col-md-12">

        <div class="form-check form-switch">

            <input
                type="checkbox"
                id="status"
                name="status"
                class="form-check-input"
                value="1"
                @checked(old(
                    'status',
                    $supplier->status ?? true
                ))>

            <label
                for="status"
                class="form-check-label">

                Proveedor activo

            </label>

        </div>

    </div>

</div>