<form x-data action="{{ route('auth-login') }}" method="post"
    class="bg-white shadow-md rounded-xl p-12 mb-4 lg:w-1/3 md:w-5/6 mx-auto" id="login-form">
    @csrf
    <div class="mb-6">
        <p class="text-center font-extrabold text-2xl">Login</p>
    </div>
    <x-form-item name="username" label="Username" type="text" />
    <x-form-item name="password" label="Password" type="password" />
    <div class="text-red-600 text-sm hidden mb-2" id="invalid-credentials">Invalid username/password</div>
    <div class="flex items-center justify-between">
        <button
            class="align-right bg-indigo-400 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline"
            type="submit">
            Login
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/register">
            Belum punya akun? register!
        </a>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#login-form').submit(async function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            try {
                const response = await axios.post('/auth/login', formData);
                const data = response.data;
                localStorage.setItem('token', data.authorisation.token);
                window.location.href = '/';
            } catch (error) {
                const errorDiv = document.getElementById('invalid-credentials');
                errorDiv.classList.remove('hidden');
            }
        });
    });
</script>
