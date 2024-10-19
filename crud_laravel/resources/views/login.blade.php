<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold text-gray-700 text-center mb-6">Login</h1>

            <!-- @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif -->

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- <form action="{{ url('/api/auth/login') }}" method="POST">
                @csrf -->
            <form action="{{ url('/api/auth/login') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('email') }}" required>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <a href="" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
                </div>

                <!-- Submit Button -->
                <div>
                    <button id="login_button" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none">Login</button>
                </div>
            <!-- </form> -->

            <p class="text-center text-sm text-gray-600 mt-4">Don't have an account? 
                <a href="{{ route('registration') }}" class="text-blue-600 hover:underline">Register</a>
            </p>
        </div>
    </div>

    <script>
        
        (()=>{
            const token = sessionStorage.getItem('dsbcIndia');
            if(token){
                window.location.href= 'http://'+window.location.hostname+':8000/welcome';
            }
        })()

        document.querySelector("#login_button").addEventListener("click", () => {
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const data = { "email": email, "password": password };
            fetch("http://localhost:8000/api/auth/login",{
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then((data) => {
                console.log(data)
                if(data.status==200){
                    sessionStorage.setItem('dsbcIndia', data.accessToken);
                    window.location.href= 'http://'+window.location.hostname+':8000/welcome';
                }
                else{
                    window.location.href= 'http://'+window.location.hostname+':8000/';
                }
            })
            .catch(err=>console.log(err))
        });
    </script>

</body>
</html>
