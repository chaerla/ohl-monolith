<script>
    $(document).ready(function() {
        $('#buy-item-form').submit(async function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            try {
                const response = await axios.post('/buy-item', formData);
                const data = response.data;
                alert('Berhasil membeli barang!');
                window.location.href = '/';
            } catch (error) {
                alert(error.response.data.message);
            }
        });
    });
</script>
