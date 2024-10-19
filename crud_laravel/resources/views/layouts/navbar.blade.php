<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="text-white text-xl font-bold">Student Portal</a>
            <div class="space-x-6 flex items-center">
                <a href="{{ url('/welcome') }}" class="text-white hover:text-gray-200">Home</a>
                <a href="{{ route('registration') }}" class="text-white hover:text-gray-200">Register</a>
                <a href="{{ route('update')}}" class=""><button class="bg-green-600 hover:bg-blue-800 p-2 text-white rounded-lg ">
                    Profile Update
                </button>
            </a>
            <!-- <a href="{{ url('/api/auth/logout')}}" class=""> -->
                <button id="logout" class="bg-red-600 hover:bg-red-800 p-2 text-white rounded-lg">
                    logout
                </button>
            <!-- </a> -->
            </div>
        </div>
    </nav>
    <script>
        document.querySelector("#logout").addEventListener("click",()=>{
            console.log("logout");
            fetch("http://localhost:8000/api/auth/logout", {
                headers: {
                    'Authorization': `Bearer ${sessionStorage.getItem('dsbcIndia')}`,
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.json())
            .then((data) => {
                console.log('Logout success:', data);
                sessionStorage.removeItem('dsbcIndia');
                window.location.href= 'http://'+window.location.hostname+':8000/';
            })
            .catch(error => console.error('Error:', error));
        })
    </script>
</body>
</html>
