@include('layouts.navbar')
     <section class="bg-cover bg-center h-screen" style="background-image: url('https://media.istockphoto.com/id/1163985429/photo/group-of-schoolboys-and-schoolgirls-at-school-campus.jpg?s=612x612&w=0&k=20&c=gF0_Qpp1uZ6VAyOi90xprZISgaiLxnpssWky0zJ6gRY=');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-30">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold mb-4">Welcome to Our School</h1>
                <p class="text-lg mb-8">Empowering students to succeed in a changing world</p>
                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg">Learn More</a>
            </div>
        </div>
    </section>
    <section class="py-12 m-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Why Choose Us</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Experienced Faculty</h3>
                    <p class="text-gray-600">Our teachers are highly qualified and dedicated to providing the best education possible.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">State-of-the-Art Facilities</h3>
                    <p class="text-gray-600">We offer modern classrooms, labs, and sports facilities to enhance learning experiences.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Holistic Development</h3>
                    <p class="text-gray-600">We focus on academic excellence as well as extracurricular activities for well-rounded growth.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-12 m-6">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">What Our Students Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600 mb-4">"The school has helped me grow not only academically but also in confidence and skills. The teachers are fantastic!"</p>
                    <h4 class="text-lg font-bold">- Student Name</h4>
                </div>


                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600 mb-4">"I love how the school focuses on both studies and extracurricular activities. It has been a great experience for me!"</p>
                    <h4 class="text-lg font-bold">- Another Student</h4>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-blue-600 text-white py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Join Us?</h2>
            <p class="text-lg mb-6">Enroll your child today and be part of our vibrant learning community.</p>
            <a href="#" class="bg-white text-blue-600 py-3 px-6 rounded-lg font-semibold hover:bg-gray-100">Apply Now</a>
        </div>
    </section>

    <!-- Footer -->
    <script src="https://cdn.tailwindcss.com"></script>
    @include('layouts.footer')

