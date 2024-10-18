@include('layouts.navbar')
<body class="bg-gradient-to-r from-blue-50 to-blue-100">

    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-1/2 mt-4">
            <h1 class="text-3xl font-semibold text-blue-600 text-center mb-6">Update Profile</h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('api.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('name', 'John Doe') }}" placeholder="Enter your full name" required>
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" name="phone" id="phone" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('phone', '123-456-7890') }}" placeholder="Enter your phone number" required>
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}" placeholder="Enter your email">
                </div>
                
                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender" id="gender" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="" disabled>Select your gender</option>
                        <option value="male" {{ old('gender', 'male') == 'm' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', 'female') == 'f' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', 'other') == 'o' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" name="dob" id="dob" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old('dob', '2000-01-01') }}" required>
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea name="address" id="address" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" rows="3" placeholder="Enter your address" required>{{ old('address', '123 Main St, Anytown, USA') }}</textarea>
                </div>

                <!-- Update Button -->
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg shadow hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">Update</button>
                </div>
            </form>

            <!-- Link to go back to profile -->
            <a href="{{route('home')}}" class="text-blue-600 hover:underline">
            <div class="mt-4 text-center">
                Back to Profile
            </div>
        </a>
        </div>
    </div>

</body>
@include('layouts.footer')