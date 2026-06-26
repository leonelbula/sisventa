<script>
    let index = document.querySelectorAll('#productsBody tr').length || 0;

    /* =========================
       SELECT SUPPLIER
    ========================= */
    document.addEventListener('click', function(e) {

        if (e.target.classList.contains('select-supplier')) {

            document.getElementById('supplier_id').value =
                e.target.dataset.id;

            document.getElementById('supplier_name').value =
                e.target.dataset.name;

            bootstrap.Modal.getInstance(
                document.getElementById('supplierModal')
            ).hide();
        }

        /* =========================
           ADD PRODUCT
        ========================= */

        if (e.target.classList.contains('add-product')) {

            let id = e.target.dataset.id;

            // evitar duplicados
            let exists = document.querySelector(
                '#productsBody input[value="' + id + '"]'
            );

            if (exists) return;

            let name = e.target.dataset.name;
            let cost = parseInt(e.target.dataset.cost) || 0;
            let code = e.target.dataset.code || '';

            let row = `
            <tr data-index="${index}">

                <td>
                    ${code}
                    <input type="hidden"
                        name="details[${index}][product_id]"
                        value="${id}">
                </td>

                <td>
                    ${name}
                </td>

                <td>
                    <input type="number"
                        min="1"
                        value="1"
                        class="form-control quantity text-center"
                        name="details[${index}][quantity]">
                </td>

                <td>
                    <input type="number"
                        value="${cost}"
                        class="form-control cost text-end"
                        name="details[${index}][cost_price]">
                </td>

                <td>
                    <input type="text"
                        readonly
                        value="${cost}"
                        class="form-control subtotal text-end"
                        name="details[${index}][subtotal]">
                </td>

                <td class="text-center">
                    <button type="button"
                        class="btn btn-danger btn-sm remove-product">
                        🗑
                    </button>
                </td>

            </tr>
        `;

            document
                .getElementById('productsBody')
                .insertAdjacentHTML('beforeend', row);

            index++;

            calculateTotals();

            bootstrap.Modal.getInstance(
                document.getElementById('productModal')
            ).hide();
        }

        /* =========================
           REMOVE PRODUCT
        ========================= */

        if (e.target.closest('.remove-product')) {

            e.target.closest('tr').remove();

            calculateTotals();
        }

    });

    /* =========================
       CALCULATE ROWS
    ========================= */
    document.addEventListener('input', function(e) {

        if (
            e.target.classList.contains('quantity') ||
            e.target.classList.contains('cost')
        ) {

            let row = e.target.closest('tr');

            let quantity = parseInt(
                row.querySelector('.quantity').value
            ) || 0;

            let cost = parseInt(
                row.querySelector('.cost').value
            ) || 0;

            let subtotal = quantity * cost;

            row.querySelector('.subtotal').value = subtotal;

            calculateTotals();
        }
    });

    /* =========================
       CALCULATE TOTALS
    ========================= */
    function calculateTotals() {

        let subtotal = 0;

        document.querySelectorAll('.subtotal').forEach(el => {
            subtotal += parseInt(el.value) || 0;
        });

        let tax = Math.round(subtotal * 0.19);
        let total = subtotal + tax;

        // inputs hidden
        document.getElementById('subtotal').value = subtotal;
        document.getElementById('tax').value = tax;
        document.getElementById('total').value = total;

        // (opcional UI)
        let subtotalText = document.getElementById('subtotalText');
        let taxText = document.getElementById('taxText');
        let totalText = document.getElementById('totalText');

        if (subtotalText) {
            subtotalText.innerText = formatMoney(subtotal);
            taxText.innerText = formatMoney(tax);
            totalText.innerText = formatMoney(total);
        }
    }

    /* =========================
       FORMAT MONEY
    ========================= */
    function formatMoney(value) {
        return new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 0
        }).format(value);
    }

    /* =========================
       PREVENT MODAL RESET BUG
    ========================= */
    document.getElementById('productModal')
        ?.addEventListener('hidden.bs.modal', function() {

            // SOLO recalcula, NO borra datos
            calculateTotals();
        });

    /* =========================
       INITIAL CALCULATION
    ========================= */
    calculateTotals();
</script>
