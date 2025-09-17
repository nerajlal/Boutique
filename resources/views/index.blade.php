<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique Name - Fashion & Style</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.6s ease-out; }
        
        /* Smooth scrolling */
        html { scroll-behavior: smooth; }
        
        /* Custom hover effects */
        .product-card:hover { transform: translateY(-5px); }
        .product-card { transition: all 0.3s ease; }
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <!-- Top bar -->
            <div class="hidden md:flex justify-between items-center py-2 text-sm text-gray-600 border-b">
                <div class="flex space-x-4">
                    <span><i class="fas fa-phone mr-1"></i> +1 (555) 123-4567</span>
                    <span><i class="fas fa-envelope mr-1"></i> info@boutiquename.com</span>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-pink-600"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-pink-600"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-pink-600"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <!-- Main navigation -->
            <nav class="flex justify-between items-center py-4">
                <div class="text-2xl font-bold text-pink-600">
                    <i class="fas fa-gem mr-2"></i>BOUTIQUE NAME
                </div>
                
                <!-- Desktop Menu -->
                <ul class="hidden md:flex space-x-8">
                    <li><a href="#home" class="hover:text-pink-600 transition-colors">Home</a></li>
                    <li><a href="#collections" class="hover:text-pink-600 transition-colors">Collections</a></li>
                    <li><a href="#about" class="hover:text-pink-600 transition-colors">About</a></li>
                    <li><a href="#contact" class="hover:text-pink-600 transition-colors">Contact</a></li>
                </ul>
                
                <!-- Cart and Mobile Menu -->
                <div class="flex items-center space-x-4">
                    <button class="relative hover:text-pink-600">
                        <i class="fas fa-shopping-bag text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-pink-600 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center" id="cart-count">0</span>
                    </button>
                    <button class="md:hidden" id="mobile-menu-btn">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </nav>
            
            <!-- Mobile Menu -->
            <div class="md:hidden hidden" id="mobile-menu">
                <ul class="py-4 space-y-2 border-t">
                    <li><a href="#home" class="block py-2 hover:text-pink-600">Home</a></li>
                    <li><a href="#collections" class="block py-2 hover:text-pink-600">Collections</a></li>
                    <li><a href="#about" class="block py-2 hover:text-pink-600">About</a></li>
                    <li><a href="#contact" class="block py-2 hover:text-pink-600">Contact</a></li>
                </ul>
            </div>
        </div>
    </header>

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

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="text-2xl font-bold mb-4">
                        <i class="fas fa-gem mr-2"></i>BOUTIQUE NAME
                    </div>
                    <p class="text-gray-400 mb-4">
                        Your destination for fashion and style. Discover unique pieces that express your personality.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#home" class="hover:text-white">Home</a></li>
                        <li><a href="#collections" class="hover:text-white">Collections</a></li>
                        <li><a href="#about" class="hover:text-white">About Us</a></li>
                        <li><a href="#contact" class="hover:text-white">Contact</a></li>
                        <li><a href="#" class="hover:text-white">Size Guide</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Customer Service</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                        <li><a href="#" class="hover:text-white">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-white">Returns</a></li>
                        <li><a href="#" class="hover:text-white">Order Status</a></li>
                        <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-3 text-gray-400">
                        <p><i class="fas fa-map-marker-alt mr-2"></i> 123 Fashion Street, Style City</p>
                        <p><i class="fas fa-phone mr-2"></i> +1 (555) 123-4567</p>
                        <p><i class="fas fa-envelope mr-2"></i> info@boutiquename.com</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Boutique Name. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Shopping Cart Modal -->
    <div id="cart-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="fixed right-0 top-0 h-full w-full max-w-md bg-white shadow-xl transform translate-x-full transition-transform duration-300" id="cart-sidebar">
            <div class="p-6 border-b">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold">Shopping Cart</h2>
                    <button id="close-cart" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <div class="flex-1 overflow-y-auto p-6">
                <div id="cart-items" class="space-y-4">
                    <!-- Cart items will be added here dynamically -->
                </div>
                <div id="empty-cart" class="text-center py-8">
                    <i class="fas fa-shopping-bag text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">Your cart is empty</p>
                    <button class="mt-4 bg-pink-600 text-white px-6 py-2 rounded-full hover:bg-pink-700" onclick="closeCart()">
                        Continue Shopping
                    </button>
                </div>
            </div>
            <div class="border-t p-6">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold">Total:</span>
                    <span class="text-xl font-bold text-pink-600" id="cart-total">$0.00</span>
                </div>
                <button class="w-full bg-pink-600 text-white py-3 rounded-full hover:bg-pink-700 transition-colors" id="checkout-btn">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>

    <!-- Quick View Modal -->
    <div id="quick-view-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg max-w-4xl w-full mx-4 max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Quick View</h2>
                    <button id="close-quick-view" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <img id="quick-view-image" src="" alt="" class="w-full rounded-lg">
                    </div>
                    <div>
                        <h3 id="quick-view-title" class="text-2xl font-bold mb-4"></h3>
                        <p id="quick-view-price" class="text-3xl font-bold text-pink-600 mb-4"></p>
                        <p id="quick-view-description" class="text-gray-600 mb-6"></p>
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2">Size:</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                <option>XS</option>
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2">Color:</label>
                            <div class="flex space-x-2">
                                <button class="w-8 h-8 bg-black rounded-full border-2 border-gray-300"></button>
                                <button class="w-8 h-8 bg-white rounded-full border-2 border-gray-300"></button>
                                <button class="w-8 h-8 bg-pink-500 rounded-full border-2 border-gray-300"></button>
                            </div>
                        </div>
                        <button class="w-full bg-pink-600 text-white py-3 rounded-lg hover:bg-pink-700 transition-colors">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Shopping Cart Functionality
        let cart = [];
        let cartTotal = 0;

        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Shopping Cart Functions
        function updateCartDisplay() {
            const cartCount = document.getElementById('cart-count');
            const cartItems = document.getElementById('cart-items');
            const cartTotalElement = document.getElementById('cart-total');
            const emptyCart = document.getElementById('empty-cart');

            cartCount.textContent = cart.length;
            cartTotalElement.textContent = `${cartTotal.toFixed(2)}`;

            if (cart.length === 0) {
                emptyCart.classList.remove('hidden');
                cartItems.innerHTML = '';
            } else {
                emptyCart.classList.add('hidden');
                cartItems.innerHTML = cart.map((item, index) => `
                    <div class="flex items-center space-x-4 p-4 border rounded-lg">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="${item.name}" class="w-16 h-16 object-cover rounded">
                        <div class="flex-1">
                            <h4 class="font-semibold">${item.name}</h4>
                            <p class="text-pink-600 font-bold">${item.price}</p>
                        </div>
                        <button onclick="removeFromCart(${index})" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `).join('');
            }
        }

        function addToCart(name, price) {
            cart.push({ name, price: parseFloat(price) });
            cartTotal += parseFloat(price);
            updateCartDisplay();
            showNotification('Item added to cart!');
        }

        function removeFromCart(index) {
            cartTotal -= cart[index].price;
            cart.splice(index, 1);
            updateCartDisplay();
        }

        function openCart() {
            document.getElementById('cart-modal').classList.remove('hidden');
            setTimeout(() => {
                document.getElementById('cart-sidebar').classList.remove('translate-x-full');
            }, 10);
        }

        function closeCart() {
            document.getElementById('cart-sidebar').classList.add('translate-x-full');
            setTimeout(() => {
                document.getElementById('cart-modal').classList.add('hidden');
            }, 300);
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 10);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Product Filter Functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.dataset.filter;
                
                // Update active button
                document.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('bg-pink-600', 'text-white');
                    b.classList.add('hover:bg-pink-600', 'hover:text-white');
                });
                this.classList.add('bg-pink-600', 'text-white');
                this.classList.remove('hover:bg-pink-600', 'hover:text-white');
                
                // Filter products
                document.querySelectorAll('.product-card').forEach(card => {
                    if (filter === 'all' || card.dataset.category === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Add to Cart Event Listeners
        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', function() {
                const name = this.dataset.name;
                const price = this.dataset.price;
                addToCart(name, price);
            });
        });

        // Cart Modal Event Listeners
        document.querySelector('.fa-shopping-bag').parentElement.addEventListener('click', openCart);
        document.getElementById('close-cart').addEventListener('click', closeCart);
        document.getElementById('cart-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCart();
            }
        });

        // Smooth Scrolling for Navigation Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Form Submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            showNotification('Message sent successfully!');
            this.reset();
        });

        // Newsletter Subscription
        document.querySelector('.max-w-md.mx-auto.flex button').addEventListener('click', function(e) {
            e.preventDefault();
            const email = this.previousElementSibling.value;
            if (email) {
                showNotification('Successfully subscribed to newsletter!');
                this.previousElementSibling.value = '';
            }
        });

        // Checkout functionality
        document.getElementById('checkout-btn').addEventListener('click', function() {
            if (cart.length > 0) {
                showNotification('Redirecting to checkout...');
                // Here you would typically redirect to a checkout page
            }
        });

        // Initialize cart display
        updateCartDisplay();

        // Add fade-in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // Observe all product cards and sections
        document.querySelectorAll('.product-card, section').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>