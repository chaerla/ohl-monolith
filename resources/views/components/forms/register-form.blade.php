<form method="post" class="bg-white shadow-md rounded-xl p-12 mb-4 lg:w-1/3 md:w-5/6 mx-auto" id="register-form">
    @csrf
    <div class="mb-6">
        <p class="text-center font-extrabold text-3xl">Register</p>
    </div>
    <x-form-item name="first_name" label="Nama Depan" type="text" />
    <x-form-item name="last_name" label="Nama Belakang" type="text" />
    <x-form-item name="username" label="Username" type="text" />
    <x-form-item name="email" label="Email" type="email" />
    <x-form-item name="password" label="Password" type="password" />
    <div class="flex items-center justify-between">
        <button
            class="align-right bg-indigo-400 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline"
            type="submit">
            Register
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/login">
            Sudah punya akun? Login!
        </a>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#register-form').submit(async function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            try {
                const response = await axios.post('/auth/register', formData);
                const data = response.data;
                localStorage.setItem('token', data.authorisation.token);
                window.location.href = '/';
            } catch (error) {
                const validationErrors = error.response.data.errors;
                $.each(validationErrors, function(field, errorMessages) {
                    const errorMessage = errorMessages[0];
                    $(`#error-message-${field}`).html(errorMessage).removeClass('hidden');
                });
            }
        });
    });
</script>
