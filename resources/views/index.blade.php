@include('header')

    <!-- Hero Section -->
    <section id="home" class="relative h-screen overflow-hidden">
        <!-- Full Background Image -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
                 alt="Fashion Background" class="w-full h-full object-cover">
            <!-- Dark overlay for text readability -->
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        
        <!-- Text Content Overlay -->
        <div class="relative z-10 h-full flex items-center justify-center">
            <div class="container mx-auto px-4 text-center">
                <!-- Announcement Badge -->
                <div class="inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-md rounded-full text-white mb-8 fade-in border border-white/30">
                    <span class="w-2 h-2 bg-pink-400 rounded-full mr-3 animate-pulse"></span>
                    New Collection Launch - Up to 50% Off
                </div>
                
                <!-- Main Heading -->
                <h1 class="text-6xl md:text-8xl lg:text-9xl font-bold mb-8 fade-in">
                    <span class="block text-white mb-4">Fashion</span>
                    <span class="block bg-gradient-to-r from-pink-400 via-purple-400 to-pink-600 bg-clip-text text-transparent">
                        Revolution
                    </span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-xl md:text-2xl lg:text-3xl text-white/90 mb-12 max-w-4xl mx-auto fade-in leading-relaxed font-light">
                    Where timeless elegance meets contemporary innovation.<br class="hidden md:block">
                    Discover pieces that tell your unique story.
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16 fade-in">
                    <button class="group relative px-10 py-5 bg-gradient-to-r from-pink-600 to-purple-600 text-white rounded-full hover:shadow-2xl hover:shadow-pink-500/30 transition-all duration-300 transform hover:scale-105 text-lg font-semibold">
                        <span class="relative z-10">Explore Collection</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-pink-700 to-purple-700 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </button>
                    <button class="px-10 py-5 border-2 border-white/40 backdrop-blur-sm text-white rounded-full hover:bg-white/20 transition-all duration-300 text-lg font-semibold">
                        Watch Lookbook
                        <i class="fas fa-play ml-3"></i>
                    </button>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-8 max-w-lg mx-auto fade-in">
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-2">500+</div>
                        <div class="text-white/80 uppercase tracking-wider text-sm">Unique Pieces</div>
                    </div>
                    <div class="text-center border-x border-white/30">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-2">10K+</div>
                        <div class="text-white/80 uppercase tracking-wider text-sm">Happy Customers</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-2">50+</div>
                        <div class="text-white/80 uppercase tracking-wider text-sm">Premium Brands</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
            <div class="flex flex-col items-center">
                <span class="text-sm mb-3 uppercase tracking-wider">Discover More</span>
                <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
                </div>
            </div>
        </div>
        
        <!-- Floating Decorative Elements -->
        <div class="absolute top-1/4 left-10 w-4 h-4 bg-pink-400/60 rounded-full animate-pulse"></div>
        <div class="absolute top-1/3 right-20 w-6 h-6 bg-purple-400/40 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-1/3 left-1/4 w-3 h-3 bg-yellow-400/50 rounded-full animate-ping" style="animation-delay: 2s;"></div>
        
        <!-- Side Social Links -->
        <div class="absolute right-8 top-1/2 transform -translate-y-1/2 hidden lg:flex flex-col space-y-6">
            <a href="#" class="w-3 h-3 bg-white/60 rounded-full hover:bg-white transition-colors"></a>
            <a href="#" class="w-3 h-3 bg-white/40 rounded-full hover:bg-white transition-colors"></a>
            <a href="#" class="w-3 h-3 bg-white/40 rounded-full hover:bg-white transition-colors"></a>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Shop by Category</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="relative group cursor-pointer overflow-hidden rounded-lg">
                    <img src="https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Dresses" class="w-full h-64 object-cover group-hover:scale-105 transition-transform">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h3 class="text-2xl font-bold">Dresses</h3>
                            <p class="mt-2">Elegant & Casual</p>
                        </div>
                    </div>
                </div>
                <div class="relative group cursor-pointer overflow-hidden rounded-lg">
                    <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Accessories" class="w-full h-64 object-cover group-hover:scale-105 transition-transform">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h3 class="text-2xl font-bold">Accessories</h3>
                            <p class="mt-2">Bags & Jewelry</p>
                        </div>
                    </div>
                </div>
                <div class="relative group cursor-pointer overflow-hidden rounded-lg">
                    <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Shoes" class="w-full h-64 object-cover group-hover:scale-105 transition-transform">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h3 class="text-2xl font-bold">Footwear</h3>
                            <p class="mt-2">Heels & Flats</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Collections -->
    <section id="collections" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Featured Collection</h2>
                <p class="text-gray-600">Handpicked items from our latest arrivals</p>
            </div>
            
            <!-- Filter Tabs -->
            <div class="flex justify-center mb-8">
                <div class="flex space-x-4 bg-gray-100 rounded-full p-1">
                    <button class="px-6 py-2 rounded-full bg-pink-600 text-white filter-btn" data-filter="all">All</button>
                    <button class="px-6 py-2 rounded-full hover:bg-pink-600 hover:text-white transition-colors filter-btn" data-filter="dresses">Dresses</button>
                    <button class="px-6 py-2 rounded-full hover:bg-pink-600 hover:text-white transition-colors filter-btn" data-filter="accessories">Accessories</button>
                    <button class="px-6 py-2 rounded-full hover:bg-pink-600 hover:text-white transition-colors filter-btn" data-filter="shoes">Shoes</button>
                </div>
            </div>
            
            <!-- Product Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8" id="product-grid">
                <!-- Product 1 -->
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="dresses">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Elegant Dress" class="w-full h-64 object-cover">
                        <div class="absolute top-4 right-4">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4 bg-pink-600 text-white px-2 py-1 text-xs rounded">
                            New
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Elegant Evening Dress</h3>
                        <p class="text-gray-600 text-sm mb-2">Perfect for special occasions</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-pink-600">$129.99</span>
                            <button class="add-to-cart bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700" 
                                    data-name="Elegant Evening Dress" data-price="129.99">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="accessories">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Designer Handbag" class="w-full h-64 object-cover">
                        <div class="absolute top-4 right-4">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Designer Handbag</h3>
                        <p class="text-gray-600 text-sm mb-2">Luxury leather collection</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-pink-600">$89.99</span>
                            <button class="add-to-cart bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700"
                                    data-name="Designer Handbag" data-price="89.99">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="shoes">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Stylish Heels" class="w-full h-64 object-cover">
                        <div class="absolute top-4 right-4">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4 bg-red-600 text-white px-2 py-1 text-xs rounded">
                            Sale
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Stylish High Heels</h3>
                        <p class="text-gray-600 text-sm mb-2">Comfortable and elegant</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-xl font-bold text-pink-600">$79.99</span>
                                <span class="text-sm text-gray-500 line-through ml-2">$99.99</span>
                            </div>
                            <button class="add-to-cart bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700"
                                    data-name="Stylish High Heels" data-price="79.99">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="dresses">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Casual Dress" class="w-full h-64 object-cover">
                        <div class="absolute top-4 right-4">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Casual Summer Dress</h3>
                        <p class="text-gray-600 text-sm mb-2">Perfect for everyday wear</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-pink-600">$49.99</span>
                            <button class="add-to-cart bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700"
                                    data-name="Casual Summer Dress" data-price="49.99">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">About Our Boutique</h2>
                    <p class="text-gray-600 mb-4">
                        With over a decade of experience in fashion, our boutique has been a destination for style-conscious individuals seeking unique and high-quality pieces. We believe fashion is a form of self-expression and strive to offer curated collections that inspire confidence.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Our team of fashion experts carefully selects each piece, ensuring that every item in our collection meets our high standards of quality, style, and craftsmanship.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div>
                            <h3 class="text-2xl font-bold text-pink-600">10+</h3>
                            <p class="text-gray-600">Years Experience</p>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-pink-600">1000+</h3>
                            <p class="text-gray-600">Happy Customers</p>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-pink-600">500+</h3>
                            <p class="text-gray-600">Products</p>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-pink-600">50+</h3>
                            <p class="text-gray-600">Brands</p>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Boutique Interior" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Why Choose Us</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shipping-fast text-2xl text-pink-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Free Shipping</h3>
                    <p class="text-gray-600">Free shipping on orders over $75. Fast and reliable delivery to your doorstep.</p>
                </div>
                <div class="text-center">
                    <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-undo text-2xl text-pink-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Easy Returns</h3>
                    <p class="text-gray-600">30-day return policy. If you're not satisfied, return it hassle-free.</p>
                </div>
                <div class="text-center">
                    <div class="bg-pink-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-2xl text-pink-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Our customer support team is always here to help with any questions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-gradient-to-r from-pink-600 to-purple-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Stay Updated with Latest Trends</h2>
            <p class="mb-8">Subscribe to our newsletter and get 10% off your first order!</p>
            <div class="max-w-md mx-auto flex">
                <input type="email" placeholder="Enter your email" 
                       class="flex-1 px-4 py-3 rounded-l-full text-gray-800 focus:outline-none">
                <button class="bg-white text-pink-600 px-8 py-3 rounded-r-full hover:bg-gray-100 transition-colors">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Get In Touch</h2>
                <p class="text-gray-600">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-4">
                            <input type="text" placeholder="Your Name" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-600">
                            <input type="email" placeholder="Your Email" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-600">
                        </div>
                        <input type="text" placeholder="Subject" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-600">
                        <textarea placeholder="Your Message" rows="6" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-pink-600"></textarea>
                        <button type="submit" 
                                class="bg-pink-600 text-white px-8 py-3 rounded-lg hover:bg-pink-700 transition-colors">
                            Send Message
                        </button>
                    </form>
                </div>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="bg-pink-100 p-3 rounded-full">
                            <i class="fas fa-map-marker-alt text-pink-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1">Visit Our Store</h3>
                            <p class="text-gray-600">123 Fashion Street, Style City, SC 12345</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="bg-pink-100 p-3 rounded-full">
                            <i class="fas fa-phone text-pink-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1">Call Us</h3>
                            <p class="text-gray-600">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="bg-pink-100 p-3 rounded-full">
                            <i class="fas fa-envelope text-pink-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1">Email Us</h3>
                            <p class="text-gray-600">info@boutiquename.com</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="bg-pink-100 p-3 rounded-full">
                            <i class="fas fa-clock text-pink-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1">Store Hours</h3>
                            <p class="text-gray-600">
                                Mon - Fri: 9:00 AM - 8:00 PM<br>
                                Sat - Sun: 10:00 AM - 6:00 PM
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer')