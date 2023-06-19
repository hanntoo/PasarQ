<footer class="bg-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-black">
            <div>
                <a class="text-2xl text-black font-bold" href="{{ route('home') }}">PasarQ</a>
                <p class="text-gray-600 text-lg mt-4">PasarQ merupakan sebuah aplikasi yang dibuat dengan tujuan mengubah pasar tradisional menjadi pasar digital.</p>
            </div>

            <div>
                <h5 class="text-xl font-bold mb-6">Links</h5>
                <ul class="list-none">
                    <li class="my-3">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-black transition-colors duration-300">
                            <i class="fas fa-chevron-right mr-2"></i> Home
                        </a>
                    </li>
                    <li class="my-3">
                        <a href="{{ route('about') }}" class="text-gray-600 hover:text-black transition-colors duration-300">
                            <i class="fas fa-chevron-right mr-2"></i> About Us
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h5 class="text-xl font-bold mb-6">Contact Us</h5>
                <div class="flex items-start my-2 text-gray-600">
                    <span class="mr-3">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    <span class="font-light">
                        Gama Tower LT. 23-26, Jl. H. R. Rasuna Said Kav. C22, Karet Kuningan, Setiabudi, Jakarta 12940
                    </span>
                </div>
                <div class="flex items-start my-2 text-gray-600">
                    <span class="mr-3">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="font-light">
                        pasarq.support@gmail.com
                    </span>
                </div>
                <div class="flex items-start my-2 text-gray-600">
                    <span class="mr-3">
                        <i class="fas fa-phone-alt"></i>
                    </span>
                    <span class="font-light">
                        +62 21 80864211
                    </span>
                </div>
            </div>

            <div>
                <h5 class="text-xl font-bold mb-6">Follow Us</h5>
                <div>
                    <ul class="list-none flex">
                        <li>
                            <a href="https://www.facebook.com" class="text-gray-600 hover:text-black transition-colors duration-300 text-2xl mr-4">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com" class="text-gray-600 hover:text-black transition-colors duration-300 text-2xl mr-4">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" class="text-gray-600 hover:text-black transition-colors duration-300 text-2xl mr-4">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-8">
        <p class="text-center text-gray-600 text-lg"> Copyright &copy;{{ date('Y') }} PasarQ  | All Rights Reserved. </p>
    </div>
</footer>
