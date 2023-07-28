<script>
    function formatCurrency(number) {
        return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function formatDate(datetime) {
        const date = datetime.split('T');
        return date[0];
    }

    function renderInvoices(invoices) {
        const invoicesContainer = $('#invoices-container');

        $.each(invoices, function(index, invoice) {
            const invoiceContainer = $('<div>').addClass('my-6 lg:text-lg md:text-md sm:text-sm');
            const invoiceId = formatDate(invoice.created_at);
            const totalAmount = invoice.amount_paid;

            const invoiceTitle = $('<h3>').addClass('text-gray-300').text(`Invoice #${invoiceId}`);
            invoiceContainer.append(invoiceTitle);

            const invoiceDetail = $('<div>').addClass('flex flex-row justify-between text-gray-400');
            const itemName = $('<p>').text(invoice.item_name);
            const quantity = $('<p>').text(invoice.quantity);
            const pricePerItem = $('<p>').text(formatCurrency(invoice.price_per_item));
            invoiceDetail.append(itemName, quantity, pricePerItem);
            invoiceContainer.append(invoiceDetail);
            const totalPriceContainer = $('<div>').addClass('w-full flex justify-end');
            const totalPriceElement = $('<p>').addClass('bg-indigo-300 text-indigo-700 my-4 p-2 rounded-md')
                .text(formatCurrency(totalAmount));
            totalPriceContainer.append(totalPriceElement);
            invoiceContainer.append(totalPriceContainer);
            invoiceContainer.append($('<hr>'));
            invoicesContainer.append(invoiceContainer);
        });
    }
    $(document).ready(function() {
        axios.get('/invoices')
            .then(function(response) {
                const data = response.data.data;
                renderInvoices(data);
            })
            .catch(function(error) {});
    });
</script>
