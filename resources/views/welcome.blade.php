<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Welcome to Nourish') }}
        </h2>
    </x-slot>

    <!-- Hero Section -->
    <section class="flex min-h-screen items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('images/hero-background.jpg') }}');">
        <div class="flex h-full w-full items-center justify-center bg-black bg-opacity-50">
            <div class="container mx-auto px-4 py-20 text-center text-white">
                <h1 class="mb-4 text-5xl font-bold">Nourish</h1>
                <p class="mb-8 text-xl">Your go-to platform for connecting donors, recipients, and volunteers to fight
                    hunger.</p>
                <a href="{{ route('login') }}"
                    class="rounded-lg bg-yellow-500 px-4 py-2 font-bold text-white hover:bg-yellow-600">Get Started</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="bg-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="mb-4 text-3xl font-semibold">About Nourish</h2>
                <p class="mb-6 text-lg text-gray-700">At Nourish, we believe in the power of communities coming together
                    to end hunger. Our platform connects donors, volunteers, and recipients to ensure that no one goes
                    hungry. Join us today and make a difference!</p>
            </div>
            <div class="mt-8 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Donors Section -->
                <div class="text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="rounded-full bg-blue-500 p-4">
                            <i class="fas fa-hand-holding-heart text-4xl text-white"></i>
                        </div>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold">Donors</h3>
                    <p class="text-gray-600">Donate surplus food and resources to people in need. Every donation helps
                        improve lives and reduce waste.</p>
                </div>

                <!-- Volunteers Section -->
                <div class="text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="rounded-full bg-green-500 p-4">
                            <i class="fas fa-hands-helping text-4xl text-white"></i>
                        </div>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold">Volunteers</h3>
                    <p class="text-gray-600">Join our community of volunteers who deliver donations and ensure they
                        reach those who need them the most.</p>
                </div>

                <!-- Recipients Section -->
                <div class="text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="rounded-full bg-yellow-500 p-4">
                            <i class="fas fa-utensils text-4xl text-white"></i>
                        </div>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold">Recipients</h3>
                    <p class="text-gray-600">Sign up to receive essential resources and food donations. Together, we can
                        build a more nourished community.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-semibold">Get in Touch</h2>
                <p class="text-lg text-gray-700">Have any questions? Feel free to reach out to us!</p>
            </div>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Phone -->
                <div class="text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="rounded-full bg-blue-500 p-4">
                            <i class="fas fa-phone-alt text-4xl text-white"></i>
                        </div>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold">Phone</h3>
                    <p class="text-gray-600">Call us at (123) 456-7890</p>
                </div>

                <!-- Email -->
                <div class="text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="rounded-full bg-green-500 p-4">
                            <i class="fas fa-envelope text-4xl text-white"></i>
                        </div>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold">Email</h3>
                    <p class="text-gray-600">Email us at support@nourish.com</p>
                </div>

                <!-- Location -->
                <div class="text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="rounded-full bg-yellow-500 p-4">
                            <i class="fas fa-map-marker-alt text-4xl text-white"></i>
                        </div>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold">Location</h3>
                    <p class="text-gray-600">1234 Nourish St., City, Country</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
