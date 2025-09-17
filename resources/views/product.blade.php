<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Evening Dress - Boutique Name</title>
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
        
        /* Image gallery transitions */
        .gallery-image {
            transition: all 0.3s ease;
        }
        
        /* Thumbnail hover effects */
        .thumbnail {
            transition: all 0.3s ease;
        }
        .thumbnail:hover {
            transform: scale(1.05);
        }
        
        /* Zoom effect for main image */
        .zoom-container {
            overflow: hidden;
            cursor: zoom-in;
        }
        .zoom-image {
            transition: transform 0.3s ease;
        }
        .zoom-container:hover .zoom-image {
            transform: scale(1.2);
        }
        
        /* Tab content animation */
        .tab-content {
            animation: fadeIn 0.3s ease-out;
        }
        
        /* Quantity input styling */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
        
        /* Star rating */
        .star-rating {
            color: #fbbf24;
        }
        
        /* Progress bar for ratings */
        .rating-bar {
            background: linear-gradient(90deg, #fbbf24 var(--percentage), #e5e7eb var(--percentage));
        }
    </style>
</head>
<body class="bg-gray-50">
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
                    <li><a href="index.html" class="hover:text-pink-600 transition-colors">Home</a></li>
                    <li><a href="collections.html" class="hover:text-pink-600 transition-colors">Collections</a></li>
                    <li><a href="#" class="hover:text-pink-600 transition-colors">About</a></li>
                    <li><a href="#" class="hover:text-pink-600 transition-colors">Contact</a></li>
                </ul>
                
                <!-- Search and Cart -->
                <div class="flex items-center space-x-4">
                    <button class="hover:text-pink-600">
                        <i class="fas fa-search text-xl"></i>
                    </button>
                    <button class="relative hover:text-pink-600" id="cart-btn">
                        <i class="fas fa-shopping-bag text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-pink-600 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center" id="cart-count">0</span>
                    </button>
                    <button class="md:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </nav>
        </div>
    </header>

    <!-- Breadcrumb -->
    <section class="bg-white border-b">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="index.html" class="text-gray-700 hover:text-pink-600">
                            <i class="fas fa-home mr-2"></i>Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="collections.html" class="text-gray-700 hover:text-pink-600">Collections</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="#" class="text-gray-700 hover:text-pink-600">Dresses</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-pink-600 font-semibold">Elegant Evening Dress</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Product Section -->
    <main class="container mx-auto px-4 py-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="zoom-container rounded-lg overflow-hidden bg-white shadow-lg">
                    <img id="main-image" src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Elegant Evening Dress" class="zoom-image w-full h-96 lg:h-[600px] object-cover">
                </div>
                
                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-4">
                    <button class="thumbnail rounded-lg overflow-hidden bg-white shadow-md border-2 border-pink-600" onclick="changeImage(this)">
                        <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                             alt="Front view" class="w-full h-20 lg:h-24 object-cover">
                    </button>
                    <button class="thumbnail rounded-lg overflow-hidden bg-white shadow-md border-2 border-gray-200 hover:border-pink-600" onclick="changeImage(this)">
                        <img src="https://images.unsplash.com/photo-1566479179817-c0db77f3c26b?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                             alt="Side view" class="w-full h-20 lg:h-24 object-cover">
                    </button>
                    <button class="thumbnail rounded-lg overflow-hidden bg-white shadow-md border-2 border-gray-200 hover:border-pink-600" onclick="changeImage(this)">
                        <img src="https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                             alt="Back view" class="w-full h-20 lg:h-24 object-cover">
                    </button>
                    <button class="thumbnail rounded-lg overflow-hidden bg-white shadow-md border-2 border-gray-200 hover:border-pink-600" onclick="changeImage(this)">
                        <img src="https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                             alt="Detail view" class="w-full h-20 lg:h-24 object-cover">
                    </button>
                </div>
            </div>

            <!-- Product Info -->
            <div class="space-y-6">
                <!-- Product Title & Rating -->
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-2">Elegant Evening Dress</h1>
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="flex items-center">
                            <div class="flex star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="ml-2 text-gray-600">(4.8)</span>
                        </div>
                        <span class="text-gray-400">|</span>
                        <span class="text-gray-600">127 reviews</span>
                        <span class="text-gray-400">|</span>
                        <span class="text-green-600 font-semibold">In Stock</span>
                    </div>
                </div>

                <!-- Price -->
                <div class="flex items-center space-x-4">
                    <span class="text-4xl font-bold text-pink-600">$129.99</span>
                    <span class="text-xl text-gray-500 line-through">$159.99</span>
                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">19% OFF</span>
                </div>

                <!-- Product Description -->
                <div class="text-gray-600 leading-relaxed">
                    <p>Elevate your evening wardrobe with this stunning elegant dress. Crafted from premium materials with meticulous attention to detail, this dress features a flattering silhouette that complements any figure. Perfect for special occasions, formal events, or romantic dinners.</p>
                </div>

                <!-- Key Features -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-semibold mb-3">Key Features:</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center"><i class="fas fa-check text-green-600 mr-2"></i> Premium quality fabric</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-600 mr-2"></i> Elegant and timeless design</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-600 mr-2"></i> Perfect for special occasions</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-600 mr-2"></i> Available in multiple colors</li>
                    </ul>
                </div>

                <!-- Color Selection -->
                <div>
                    <h3 class="font-semibold mb-3">Color: <span id="selected-color">Black</span></h3>
                    <div class="flex space-x-3">
                        <button class="color-option w-10 h-10 bg-black rounded-full border-4 border-pink-600 shadow-lg" 
                                data-color="Black" onclick="selectColor(this)"></button>
                        <button class="color-option w-10 h-10 bg-red-600 rounded-full border-4 border-gray-200 hover:border-pink-600 shadow-lg" 
                                data-color="Red" onclick="selectColor(this)"></button>
                        <button class="color-option w-10 h-10 bg-blue-800 rounded-full border-4 border-gray-200 hover:border-pink-600 shadow-lg" 
                                data-color="Navy Blue" onclick="selectColor(this)"></button>
                        <button class="color-option w-10 h-10 bg-purple-600 rounded-full border-4 border-gray-200 hover:border-pink-600 shadow-lg" 
                                data-color="Purple" onclick="selectColor(this)"></button>
                    </div>
                </div>

                <!-- Size Selection -->
                <div>
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="font-semibold">Size: <span id="selected-size">Select Size</span></h3>
                        <button class="text-pink-600 hover:underline text-sm">Size Guide</button>
                    </div>
                    <div class="grid grid-cols-5 gap-3">
                        <button class="size-option border-2 border-gray-300 py-3 px-4 rounded-lg text-center hover:border-pink-600 hover:bg-pink-50 transition-colors" 
                                data-size="XS" onclick="selectSize(this)">XS</button>
                        <button class="size-option border-2 border-gray-300 py-3 px-4 rounded-lg text-center hover:border-pink-600 hover:bg-pink-50 transition-colors" 
                                data-size="S" onclick="selectSize(this)">S</button>
                        <button class="size-option border-2 border-gray-300 py-3 px-4 rounded-lg text-center hover:border-pink-600 hover:bg-pink-50 transition-colors" 
                                data-size="M" onclick="selectSize(this)">M</button>
                        <button class="size-option border-2 border-gray-300 py-3 px-4 rounded-lg text-center hover:border-pink-600 hover:bg-pink-50 transition-colors" 
                                data-size="L" onclick="selectSize(this)">L</button>
                        <button class="size-option border-2 border-gray-300 py-3 px-4 rounded-lg text-center hover:border-pink-600 hover:bg-pink-50 transition-colors" 
                                data-size="XL" onclick="selectSize(this)">XL</button>
                    </div>
                </div>

                <!-- Quantity -->
                <div>
                    <h3 class="font-semibold mb-3">Quantity</h3>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center border-2 border-gray-300 rounded-lg">
                            <button class="px-4 py-2 hover:bg-gray-100" onclick="decreaseQuantity()">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" id="quantity" value="1" min="1" max="10" 
                                   class="w-16 text-center py-2 border-none focus:outline-none">
                            <button class="px-4 py-2 hover:bg-gray-100" onclick="increaseQuantity()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <span class="text-gray-600">Only 8 left in stock</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <button class="w-full bg-pink-600 text-white py-4 px-6 rounded-lg text-lg font-semibold hover:bg-pink-700 transition-colors shadow-lg" 
                            onclick="addToCart()">
                        <i class="fas fa-shopping-cart mr-2"></i>Add to Cart
                    </button>
                    <div class="grid grid-cols-2 gap-4">
                        <button class="border-2 border-pink-600 text-pink-600 py-3 px-6 rounded-lg font-semibold hover:bg-pink-600 hover:text-white transition-colors" 
                                onclick="addToWishlist()">
                            <i class="fas fa-heart mr-2"></i>Wishlist
                        </button>
                        <button class="bg-gray-800 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                            <i class="fas fa-bolt mr-2"></i>Buy Now
                        </button>
                    </div>
                </div>

                <!-- Shipping & Returns -->
                <div class="border-t pt-6 space-y-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-shipping-fast text-green-600 text-xl"></i>
                        <div>
                            <p class="font-semibold">Free Shipping</p>
                            <p class="text-sm text-gray-600">On orders over $75</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-undo text-blue-600 text-xl"></i>
                        <div>
                            <p class="font-semibold">Easy Returns</p>
                            <p class="text-sm text-gray-600">30-day return policy</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-shield-alt text-purple-600 text-xl"></i>
                        <div>
                            <p class="font-semibold">Secure Payment</p>
                            <p class="text-sm text-gray-600">100% secure checkout</p>
                        </div>
                    </div>
                </div>

                <!-- Social Sharing -->
                <div class="border-t pt-6">
                    <p class="font-semibold mb-3">Share this product:</p>
                    <div class="flex space-x-4">
                        <button class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button class="bg-pink-500 text-white p-3 rounded-full hover:bg-pink-600 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </button>
                        <button class="bg-blue-400 text-white p-3 rounded-full hover:bg-blue-500 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="bg-red-600 text-white p-3 rounded-full hover:bg-red-700 transition-colors">
                            <i class="fab fa-pinterest"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details Tabs -->
        <section class="mt-16">
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8">
                    <button class="tab-btn py-4 px-1 border-b-2 border-pink-600 text-pink-600 font-semibold" 
                            onclick="showTab('description')">Description</button>
                    <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700" 
                            onclick="showTab('specifications')">Specifications</button>
                    <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700" 
                            onclick="showTab('reviews')">Reviews (127)</button>
                    <button class="tab-btn py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700" 
                            onclick="showTab('shipping')">Shipping & Returns</button>
                </nav>
            </div>

            <!-- Tab Content -->
            <div class="py-8">
                <!-- Description Tab -->
                <div id="description" class="tab-content">
                    <div class="prose max-w-none">
                        <h3 class="text-xl font-semibold mb-4">Product Description</h3>
                        <p class="text-gray-600 mb-4">
                            This elegant evening dress is the perfect addition to your formal wardrobe. Crafted from luxurious materials with exceptional attention to detail, this dress embodies sophistication and style. The classic silhouette flatters all body types, while the premium fabric ensures comfort throughout the evening.
                        </p>
                        <p class="text-gray-600 mb-4">
                            Whether you're attending a wedding, gala, or special dinner, this dress will make you feel confident and beautiful. The timeless design ensures it will remain a wardrobe staple for years to come.
                        </p>
                        <h4 class="font-semibold mb-2">Features:</h4>
                        <ul class="list-disc list-inside text-gray-600 space-y-1">
                            <li>Premium quality fabric blend</li>
                            <li>Elegant and flattering silhouette</li>
                            <li>Professional tailoring and finishing</li>
                            <li>Available in multiple colors and sizes</li>
                            <li>Machine washable (delicate cycle)</li>
                        </ul>
                    </div>
                </div>

                <!-- Specifications Tab -->
                <div id="specifications" class="tab-content hidden">
                    <h3 class="text-xl font-semibold mb-4">Specifications</h3>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="font-semibold mb-3">Material</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li><span class="font-medium">Fabric:</span> 95% Polyester, 5% Elastane</li>
                                <li><span class="font-medium">Lining:</span> 100% Polyester</li>
                                <li><span class="font-medium">Care:</span> Machine wash cold, hang dry</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-3">Measurements</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li><span class="font-medium">Length:</span> 45 inches (Size M)</li>
                                <li><span class="font-medium">Bust:</span> 34-36 inches (Size M)</li>
                                <li><span class="font-medium">Waist:</span> 28-30 inches (Size M)</li>
                                <li><span class="font-medium">Hip:</span> 38-40 inches (Size M)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div id="reviews" class="tab-content hidden">
                    <div class="grid lg:grid-cols-3 gap-8">
                        <!-- Rating Summary -->
                        <div class="lg:col-span-1">
                            <h3 class="text-xl font-semibold mb-4">Customer Reviews</h3>
                            <div class="text-center mb-6">
                                <div class="text-4xl font-bold text-gray-800 mb-2">4.8</div>
                                <div class="flex justify-center star-rating text-xl mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="text-gray-600">Based on 127 reviews</div>
                            </div>
                            
                            <!-- Rating Breakdown -->
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <span class="text-sm w-3">5</span>
                                    <i class="fas fa-star text-yellow-400 mx-1"></i>
                                    <div class="flex-1 h-2 bg-gray-200 rounded-full mx-2">
                                        <div class="h-2 bg-yellow-400 rounded-full" style="width: 85%"></div>
                                    </div>
                                    <span class="text-sm w-8">85%</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm w-3">4</span>
                                    <i class="fas fa-star text-yellow-400 mx-1"></i>
                                    <div class="flex-1 h-2 bg-gray-200 rounded-full mx-2">
                                        <div class="h-2 bg-yellow-400 rounded-full" style="width: 12%"></div>
                                    </div>
                                    <span class="text-sm w-8">12%</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm w-3">3</span>
                                    <i class="fas fa-star text-yellow-400 mx-1"></i>
                                    <div class="flex-1 h-2 bg-gray-200 rounded-full mx-2">
                                        <div class="h-2 bg-yellow-400 rounded-full" style="width: 2%"></div>
                                    </div>
                                    <span class="text-sm w-8">2%</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm w-3">2</span>
                                    <i class="fas fa-star text-yellow-400 mx-1"></i>
                                    <div class="flex-1 h-2 bg-gray-200 rounded-full mx-2">
                                        <div class="h-2 bg-yellow-400 rounded-full" style="width: 1%"></div>
                                    </div>
                                    <span class="text-sm w-8">1%</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm w-3">1</span>
                                    <i class="fas fa-star text-yellow-400 mx-1"></i>
                                    <div class="flex-1 h-2 bg-gray-200 rounded-full mx-2">
                                        <div class="h-2 bg-yellow-400 rounded-full" style="width: 0%"></div>
                                    </div>
                                    <span class="text-sm w-8">0%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Individual Reviews -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Review 1 -->
                            <div class="border-b pb-6">
                                <div class="flex items-center mb-3">
                                    <div class="w-10 h-10 bg-pink-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                        S
                                    </div>
                                    <div>
                                        <div class="font-semibold">Sarah M.</div>
                                        <div class="flex items-center">
                                            <div class="flex star-rating text-sm mr-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-gray-500 text-sm">2 days ago</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600">
                                    "Absolutely stunning dress! The quality is exceptional and it fits perfectly. I received so many compliments at the wedding I wore it to. Highly recommend!"
                                </p>
                                <div class="flex items-center mt-3 text-sm text-gray-500">
                                    <span class="mr-4">Size: M</span>
                                    <span class="mr-4">Color: Black</span>
                                    <button class="text-pink-600 hover:underline">Helpful (12)</button>
                                </div>
                            </div>

                            
                            <!-- Review 2 -->
                            <div class="border-b pb-6">
                                <div class="flex items-center mb-3">
                                    <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                        E
                                    </div>
                                    <div>
                                        <div class="font-semibold">Emily R.</div>
                                        <div class="flex items-center">
                                            <div class="flex star-rating text-sm mr-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-gray-500 text-sm">1 week ago</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600">
                                    "Beautiful dress with excellent craftsmanship. The fabric feels luxurious and the fit is flattering. Perfect for formal events!"
                                </p>
                                <div class="flex items-center mt-3 text-sm text-gray-500">
                                    <span class="mr-4">Size: L</span>
                                    <span class="mr-4">Color: Navy Blue</span>
                                    <button class="text-pink-600 hover:underline">Helpful (8)</button>
                                </div>
                            </div>

                            <!-- Review 3 -->
                            <div class="border-b pb-6">
                                <div class="flex items-center mb-3">
                                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold mr-3">
                                        M
                                    </div>
                                    <div>
                                        <div class="font-semibold">Maria L.</div>
                                        <div class="flex items-center">
                                            <div class="flex star-rating text-sm mr-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <span class="text-gray-500 text-sm">2 weeks ago</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600">
                                    "Great dress overall. The color is vibrant and matches the photos perfectly. Only minor issue is that it runs slightly small, so I'd recommend sizing up."
                                </p>
                                <div class="flex items-center mt-3 text-sm text-gray-500">
                                    <span class="mr-4">Size: S</span>
                                    <span class="mr-4">Color: Red</span>
                                    <button class="text-pink-600 hover:underline">Helpful (15)</button>
                                </div>
                            </div>

                            <button class="w-full border-2 border-pink-600 text-pink-600 py-3 px-6 rounded-lg font-semibold hover:bg-pink-600 hover:text-white transition-colors">
                                Load More Reviews
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Shipping Tab -->
                <div id="shipping" class="tab-content hidden">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Shipping Information</h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-truck text-green-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Standard Shipping</h4>
                                        <p class="text-gray-600">5-7 business days - Free on orders over $75</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-bolt text-blue-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Express Shipping</h4>
                                        <p class="text-gray-600">2-3 business days - $15.99</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-plane text-purple-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Overnight Shipping</h4>
                                        <p class="text-gray-600">Next business day - $29.99</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Returns & Exchanges</h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-undo text-green-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">30-Day Returns</h4>
                                        <p class="text-gray-600">Free returns within 30 days of purchase</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-exchange-alt text-blue-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Easy Exchanges</h4>
                                        <p class="text-gray-600">Exchange for different size or color</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <i class="fas fa-shield-alt text-purple-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-semibold">Quality Guarantee</h4>
                                        <p class="text-gray-600">100% satisfaction guaranteed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Products -->
        <section class="mt-16">
            <h2 class="text-2xl font-bold text-center mb-8">You May Also Like</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Related Product 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative group">
                        <img src="https://images.unsplash.com/photo-1566479179817-c0db77f3c26b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Summer Maxi Dress" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Summer Maxi Dress</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-pink-600">$89.99</span>
                            <div class="flex items-center">
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="text-gray-500 text-sm ml-1">(42)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Product 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative group">
                        <img src="https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Casual Blouse" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Casual Blouse</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-pink-600">$49.99</span>
                            <div class="flex items-center">
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="text-gray-500 text-sm ml-1">(28)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Product 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative group">
                        <img src="https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Designer Dress" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4 bg-red-600 text-white px-2 py-1 text-xs rounded">
                            Sale
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Designer Dress</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xl font-bold text-pink-600">$149.99</span>
                                <span class="text-sm text-gray-500 line-through ml-2">$199.99</span>
                            </div>
                            <div class="flex items-center">
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="text-gray-500 text-sm ml-1">(56)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Product 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative group">
                        <img src="https://images.unsplash.com/photo-1544441893-675973e31985?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Evening Gown" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 right-4">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4 bg-green-600 text-white px-2 py-1 text-xs rounded">
                            New
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2">Evening Gown</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-pink-600">$199.99</span>
                            <div class="flex items-center">
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="text-gray-500 text-sm ml-1">(34)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Recently Viewed -->
        <section class="mt-16">
            <h2 class="text-2xl font-bold text-center mb-8">Recently Viewed</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                         alt="Designer Handbag" class="w-full h-48 object-cover">
                    <div class="p-3">
                        <h4 class="font-semibold text-sm">Designer Handbag</h4>
                        <span class="text-pink-600 font-bold">$89.99</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                         alt="High Heels" class="w-full h-48 object-cover">
                    <div class="p-3">
                        <h4 class="font-semibold text-sm">Stylish High Heels</h4>
                        <span class="text-pink-600 font-bold">$79.99</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1506630448388-4e683c67ddb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                         alt="Gold Necklace" class="w-full h-48 object-cover">
                    <div class="p-3">
                        <h4 class="font-semibold text-sm">Gold Necklace</h4>
                        <span class="text-pink-600 font-bold">$29.99</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                         alt="Fashion Accessories" class="w-full h-48 object-cover">
                    <div class="p-3">
                        <h4 class="font-semibold text-sm">Fashion Accessories</h4>
                        <span class="text-pink-600 font-bold">$39.99</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
            <div class="flex-1 overflow-y-auto p-6 custom-scrollbar">
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
                <button class="w-full bg-pink-600 text-white py-3 rounded-full hover:bg-pink-700 transition-colors">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 mt-16">
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
                        <li><a href="#" class="hover:text-white">Home</a></li>
                        <li><a href="#" class="hover:text-white">Collections</a></li>
                        <li><a href="#" class="hover:text-white">About Us</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
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

    <script>
        // Shopping Cart Functionality
        let cart = [];
        let cartTotal = 0;
        let selectedColor = 'Black';
        let selectedSize = '';

        // Image Gallery Functions
        function changeImage(thumbnail) {
            const mainImage = document.getElementById('main-image');
            const newSrc = thumbnail.querySelector('img').src.replace('w=200', 'w=800');
            mainImage.src = newSrc;
            
            // Update thumbnail borders
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('border-pink-600');
                thumb.classList.add('border-gray-200');
            });
            thumbnail.classList.add('border-pink-600');
            thumbnail.classList.remove('border-gray-200');
        }

        // Color Selection
        function selectColor(colorBtn) {
            selectedColor = colorBtn.dataset.color;
            document.getElementById('selected-color').textContent = selectedColor;
            
            // Update color button styles
            document.querySelectorAll('.color-option').forEach(btn => {
                btn.classList.remove('border-pink-600');
                btn.classList.add('border-gray-200');
            });
            colorBtn.classList.add('border-pink-600');
            colorBtn.classList.remove('border-gray-200');
        }

        // Size Selection
        function selectSize(sizeBtn) {
            selectedSize = sizeBtn.dataset.size;
            document.getElementById('selected-size').textContent = selectedSize;
            
            // Update size button styles
            document.querySelectorAll('.size-option').forEach(btn => {
                btn.classList.remove('border-pink-600', 'bg-pink-50', 'text-pink-600');
                btn.classList.add('border-gray-300');
            });
            sizeBtn.classList.add('border-pink-600', 'bg-pink-50', 'text-pink-600');
            sizeBtn.classList.remove('border-gray-300');
        }

        // Quantity Functions
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            if (currentValue < 10) {
                quantityInput.value = currentValue + 1;
            }
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        // Tab Functions
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Show selected tab content
            document.getElementById(tabName).classList.remove('hidden');
            
            // Update tab button styles
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('border-pink-600', 'text-pink-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Highlight active tab
            event.target.classList.add('border-pink-600', 'text-pink-600');
            event.target.classList.remove('border-transparent', 'text-gray-500');
        }

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
                            <p class="text-sm text-gray-600">Size: ${item.size} | Color: ${item.color}</p>
                            <p class="text-pink-600 font-bold">${item.price} x ${item.quantity}</p>
                        </div>
                        <button onclick="removeFromCart(${index})" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `).join('');
            }
        }

        function addToCart() {
            if (!selectedSize) {
                showNotification('Please select a size', 'error');
                return;
            }
            
            const quantity = parseInt(document.getElementById('quantity').value);
            const price = 129.99;
            const item = {
                name: 'Elegant Evening Dress',
                price: price,
                color: selectedColor,
                size: selectedSize,
                quantity: quantity
            };
            
            cart.push(item);
            cartTotal += price * quantity;
            updateCartDisplay();
            showNotification(`Added ${quantity} item(s) to cart!`, 'success');
        }

        function addToWishlist() {
            showNotification('Added to wishlist!', 'success');
            // Here you would typically save to wishlist
        }

        function removeFromCart(index) {
            const item = cart[index];
            cartTotal -= item.price * item.quantity;
            cart.splice(index, 1);
            updateCartDisplay();
            showNotification('Item removed from cart', 'info');
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

        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const bgColor = type === 'error' ? 'bg-red-500' : type === 'info' ? 'bg-blue-500' : 'bg-green-500';
            notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
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

        // Event Listeners
        document.getElementById('cart-btn').addEventListener('click', openCart);
        document.getElementById('close-cart').addEventListener('click', closeCart);
        document.getElementById('cart-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCart();
            }
        });

        // Quantity input event listener
        document.getElementById('quantity').addEventListener('change', function() {
            if (this.value < 1) this.value = 1;
            if (this.value > 10) this.value = 10;
        });

        // Social sharing functions
        document.querySelectorAll('button[class*="bg-blue-600"]').forEach(btn => {
            if (btn.querySelector('.fab')) {
                btn.addEventListener('click', function() {
                    const platform = this.querySelector('i').className;
                    if (platform.includes('facebook')) {
                        window.open(`https://www.facebook.com/sharer/sharer.php?u=${window.location.href}`, '_blank');
                    } else if (platform.includes('twitter')) {
                        window.open(`https://twitter.com/intent/tweet?url=${window.location.href}&text=Check out this amazing dress!`, '_blank');
                    } else if (platform.includes('pinterest')) {
                        window.open(`https://pinterest.com/pin/create/button/?url=${window.location.href}&description=Elegant Evening Dress`, '_blank');
                    }
                });
            }
        });

        // Smooth scroll for anchor links
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

        // Image zoom functionality
        const mainImage = document.getElementById('main-image');
        const zoomContainer = mainImage.parentElement;
        
        zoomContainer.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            
            mainImage.style.transformOrigin = `${x}% ${y}%`;
        });

        // Product review helpful button functionality
        document.querySelectorAll('button:contains("Helpful")').forEach(btn => {
            if (btn.textContent.includes('Helpful')) {
                btn.addEventListener('click', function() {
                    const currentText = this.textContent;
                    const currentCount = parseInt(currentText.match(/\d+/)[0]);
                    this.textContent = currentText.replace(/\d+/, currentCount + 1);
                    this.classList.add('text-pink-700');
                    showNotification('Thank you for your feedback!', 'info');
                });
            }
        });

        // Size guide modal (placeholder functionality)
        document.querySelector('button:contains("Size Guide")').addEventListener('click', function() {
            showNotification('Size guide feature coming soon!', 'info');
        });

        // Initialize
        updateCartDisplay();

        // Add to recently viewed (localStorage simulation)
        function addToRecentlyViewed() {
            const product = {
                name: 'Elegant Evening Dress',
                price: '$129.99',
                image: 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80'
            };
            // In a real application, you would save this to localStorage or send to server
            console.log('Added to recently viewed:', product);
        }

        // Call on page load
        addToRecentlyViewed();

        // Lazy loading for images (performance optimization)
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '50px'
        };

        const imageObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        imageObserver.unobserve(img);
                    }
                }
            });
        }, observerOptions);

        // Observe all images with data-src attribute
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });

        // Product availability check (simulated)
        function checkAvailability() {
            const sizes = ['XS', 'S', 'M', 'L', 'XL'];
            const availabilityStatus = {
                'XS': true,
                'S': true,
                'M': true,
                'L': false, // Out of stock
                'XL': true
            };

            document.querySelectorAll('.size-option').forEach(btn => {
                const size = btn.dataset.size;
                if (!availabilityStatus[size]) {
                    btn.disabled = true;
                    btn.classList.add('opacity-50', 'cursor-not-allowed');
                    btn.title = 'Out of stock';
                }
            });
        }

        // Initialize availability check
        checkAvailability();

        // Dynamic pricing based on quantity (example)
        document.getElementById('quantity').addEventListener('input', function() {
            const quantity = parseInt(this.value);
            const basePrice = 129.99;
            let finalPrice = basePrice;

            // Bulk discount example
            if (quantity >= 3) {
                finalPrice = basePrice * 0.9; // 10% discount
                showNotification('Bulk discount applied!', 'success');
            }

            // Update price display (if you want dynamic pricing)
            // document.querySelector('.text-4xl.font-bold.text-pink-600').textContent = `${finalPrice.toFixed(2)}`;
        });

        // Keyboard navigation for image gallery
        document.addEventListener('keydown', function(e) {
            const thumbnails = document.querySelectorAll('.thumbnail');
            const currentActive = document.querySelector('.thumbnail.border-pink-600');
            let currentIndex = Array.from(thumbnails).indexOf(currentActive);

            if (e.key === 'ArrowRight' && currentIndex < thumbnails.length - 1) {
                thumbnails[currentIndex + 1].click();
            } else if (e.key === 'ArrowLeft' && currentIndex > 0) {
                thumbnails[currentIndex - 1].click();
            }
        });

        // Product comparison feature (placeholder)
        function addToCompare() {
            showNotification('Added to comparison list!', 'info');
            // In a real application, you would add this product to a comparison list
        }

        // Stock level indicator update
        function updateStockLevel() {
            const stockElement = document.querySelector('span:contains("Only")');
            if (stockElement) {
                const currentStock = 8;
                if (currentStock <= 5) {
                    stockElement.classList.add('text-red-600', 'font-semibold');
                    stockElement.textContent = `Only ${currentStock} left in stock - order soon!`;
                }
            }
        }

        updateStockLevel();

        // Auto-scroll to reviews when clicking on review count
        document.querySelector('span:contains("reviews")').addEventListener('click', function() {
            document.querySelector('button[onclick="showTab(\'reviews\')"]').click();
            document.querySelector('#reviews').scrollIntoView({ behavior: 'smooth' });
        });

        // Initialize tooltips for color options
        document.querySelectorAll('.color-option').forEach(btn => {
            btn.title = `Select ${btn.dataset.color} color`;
        });

        console.log('Product page loaded successfully!');
    </script>
</body>
</html>