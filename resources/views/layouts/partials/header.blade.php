<div class="child absolute top-0 w-full bg-white py-4 px-8 shadow-md">
    <div class="flex justify-between items-center">
        <div class="space-x-6 text-gray-600 text-sm">
            <a href="/" class="hover:text-indigo-700 hover:bg-indigo-200 py-1 px-2 rounded-md">Katalog</a>
            <a href="/purchase-history" class="hover:text-indigo-700 hover:bg-indigo-200 py-1 px-2 rounded-md">Riwayat
                Belanja</a>
        </div>
        <div class="flex flex-row items-center space-x-2 text-indigo-400 text-lg">
            <div class="dropdown">
                <button
                    class="appearance-none relative dropdown-toggle hover:text-indigo-700 hover:bg-indigo-200 py-1 px-2 rounded-md"type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                        class="fa fa-user"></i>
                </button>
                <div class="absolute right-0 dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button
                        class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500 dropdown-item"
                        id="logout-button">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#logout-button').on('click', async function() {
            try {
                const res = await axios.post('/auth/logout');
                localStorage.removeItem('token');
                window.location.href = '/login';
            } catch (err) {}
        });
    });
</script>
