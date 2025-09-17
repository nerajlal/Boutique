<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections - Boutique Name</title>
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
        
        /* Product hover effects */
        .product-card {
            transition: all 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        /* Filter sidebar */
        .filter-sidebar {
            transition: transform 0.3s ease;
        }
        
        /* Grid animations */
        .product-grid-item {
            animation: fadeIn 0.6s ease-out;
        }
        
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #ec4899;
            border-radius: 3px;
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
                    <li><a href="#" class="text-pink-600 font-semibold">Collections</a></li>
                    <li><a href="#" class="hover:text-pink-600 transition-colors">About</a></li>
                    <li><a href="#" class="hover:text-pink-600 transition-colors">Contact</a></li>
                </ul>
                
                <!-- Search and Cart -->
                <div class="flex items-center space-x-4">
                    <button class="hover:text-pink-600" id="search-btn">
                        <i class="fas fa-search text-xl"></i>
                    </button>
                    <button class="relative hover:text-pink-600" id="cart-btn">
                        <i class="fas fa-shopping-bag text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-pink-600 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center" id="cart-count">0</span>
                    </button>
                    <button class="md:hidden" id="mobile-menu-btn">
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
                            <span class="text-pink-600 font-semibold">Collections</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Collections Header -->
    <section class="bg-gradient-to-r from-pink-50 to-purple-50 py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">
                Our <span class="text-pink-600">Collections</span>
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Discover our carefully curated collections featuring the latest trends and timeless classics. From elegant evening wear to casual everyday pieces.
            </p>
        </div>
    </section>

    <!-- Search Bar -->
    <section class="bg-white py-6 border-b" id="search-section">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="relative">
                    <input type="text" id="search-input" placeholder="Search products..." 
                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-full focus:outline-none focus:border-pink-600 focus:ring-2 focus:ring-pink-100">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-pink-600 text-white px-6 py-2 rounded-full hover:bg-pink-700 transition-colors">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <aside class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <!-- Mobile Filter Toggle -->
                    <div class="lg:hidden mb-4">
                        <button id="filter-toggle" class="w-full bg-pink-600 text-white py-2 px-4 rounded-lg">
                            <i class="fas fa-filter mr-2"></i>Filters
                        </button>
                    </div>
                    
                    <div id="filters" class="hidden lg:block">
                        <h3 class="text-lg font-bold mb-6">Filter Products</h3>
                        
                        <!-- Category Filter -->
                        <div class="mb-6">
                            <h4 class="font-semibold mb-3">Category</h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" class="category-filter" value="all" checked class="text-pink-600">
                                    <span class="ml-2">All Items</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="category-filter" value="dresses" class="text-pink-600">
                                    <span class="ml-2">Dresses</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="category-filter" value="tops" class="text-pink-600">
                                    <span class="ml-2">Tops & Blouses</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="category-filter" value="accessories" class="text-pink-600">
                                    <span class="ml-2">Accessories</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="category-filter" value="shoes" class="text-pink-600">
                                    <span class="ml-2">Shoes</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="category-filter" value="bags" class="text-pink-600">
                                    <span class="ml-2">Bags</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Price Range -->
                        <div class="mb-6">
                            <h4 class="font-semibold mb-3">Price Range</h4>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="price" value="all" checked class="text-pink-600">
                                    <span class="ml-2">All Prices</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="price" value="0-50" class="text-pink-600">
                                    <span class="ml-2">Under $50</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="price" value="50-100" class="text-pink-600">
                                    <span class="ml-2">$50 - $100</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="price" value="100-200" class="text-pink-600">
                                    <span class="ml-2">$100 - $200</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="price" value="200+" class="text-pink-600">
                                    <span class="ml-2">Over $200</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Size Filter -->
                        <div class="mb-6">
                            <h4 class="font-semibold mb-3">Size</h4>
                            <div class="grid grid-cols-3 gap-2">
                                <button class="size-filter border border-gray-300 py-2 px-3 rounded text-center hover:border-pink-600 hover:text-pink-600" data-size="XS">XS</button>
                                <button class="size-filter border border-gray-300 py-2 px-3 rounded text-center hover:border-pink-600 hover:text-pink-600" data-size="S">S</button>
                                <button class="size-filter border border-gray-300 py-2 px-3 rounded text-center hover:border-pink-600 hover:text-pink-600" data-size="M">M</button>
                                <button class="size-filter border border-gray-300 py-2 px-3 rounded text-center hover:border-pink-600 hover:text-pink-600" data-size="L">L</button>
                                <button class="size-filter border border-gray-300 py-2 px-3 rounded text-center hover:border-pink-600 hover:text-pink-600" data-size="XL">XL</button>
                                <button class="size-filter border border-gray-300 py-2 px-3 rounded text-center hover:border-pink-600 hover:text-pink-600" data-size="XXL">XXL</button>
                            </div>
                        </div>
                        
                        <!-- Color Filter -->
                        <div class="mb-6">
                            <h4 class="font-semibold mb-3">Color</h4>
                            <div class="grid grid-cols-6 gap-2">
                                <button class="color-filter w-8 h-8 rounded-full bg-black border-2 border-gray-300 hover:border-pink-600" data-color="black"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-white border-2 border-gray-300 hover:border-pink-600" data-color="white"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-red-500 border-2 border-gray-300 hover:border-pink-600" data-color="red"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-blue-500 border-2 border-gray-300 hover:border-pink-600" data-color="blue"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-green-500 border-2 border-gray-300 hover:border-pink-600" data-color="green"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-pink-500 border-2 border-gray-300 hover:border-pink-600" data-color="pink"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-purple-500 border-2 border-gray-300 hover:border-pink-600" data-color="purple"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-yellow-500 border-2 border-gray-300 hover:border-pink-600" data-color="yellow"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-gray-500 border-2 border-gray-300 hover:border-pink-600" data-color="gray"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-orange-500 border-2 border-gray-300 hover:border-pink-600" data-color="orange"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-indigo-500 border-2 border-gray-300 hover:border-pink-600" data-color="indigo"></button>
                                <button class="color-filter w-8 h-8 rounded-full bg-teal-500 border-2 border-gray-300 hover:border-pink-600" data-color="teal"></button>
                            </div>
                        </div>
                        
                        <!-- Clear Filters -->
                        <button id="clear-filters" class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-300 transition-colors">
                            Clear All Filters
                        </button>
                    </div>
                </div>
            </aside>

            <!-- Products Section -->
            <section class="lg:w-3/4">
                <!-- Toolbar -->
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <span class="text-gray-600">Showing <span id="products-count">24</span> of <span id="total-products">48</span> products</span>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <!-- View Toggle -->
                            <div class="flex items-center space-x-2">
                                <button id="grid-view" class="p-2 bg-pink-600 text-white rounded">
                                    <i class="fas fa-th"></i>
                                </button>
                                <button id="list-view" class="p-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300">
                                    <i class="fas fa-list"></i>
                                </button>
                            </div>
                            
                            <!-- Sort Dropdown -->
                            <select id="sort-select" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-pink-600">
                                <option value="featured">Featured</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="newest">Newest First</option>
                                <option value="popular">Most Popular</option>
                                <option value="name-az">Name: A to Z</option>
                                <option value="name-za">Name: Z to A</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div id="products-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Product 1 -->
                    <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="dresses" data-price="129.99" data-size="S,M,L" data-color="black">
                        <div class="relative group">
                            <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 alt="Elegant Evening Dress" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-4 right-4 space-y-2">
                                <button class="wishlist-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="quick-view-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="absolute top-4 left-4 bg-pink-600 text-white px-2 py-1 text-xs rounded">
                                New
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                <button class="add-to-cart opacity-0 group-hover:opacity-100 bg-white text-pink-600 px-6 py-2 rounded-full font-semibold hover:bg-pink-600 hover:text-white transition-all duration-300" 
                                        data-name="Elegant Evening Dress" data-price="129.99">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2">Elegant Evening Dress</h3>
                            <p class="text-gray-600 text-sm mb-2">Perfect for special occasions</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-pink-600">$129.99</span>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">(24)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="bags" data-price="89.99" data-size="One Size" data-color="brown">
                        <div class="relative group">
                            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 alt="Designer Handbag" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-4 right-4 space-y-2">
                                <button class="wishlist-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="quick-view-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                <button class="add-to-cart opacity-0 group-hover:opacity-100 bg-white text-pink-600 px-6 py-2 rounded-full font-semibold hover:bg-pink-600 hover:text-white transition-all duration-300"
                                        data-name="Designer Handbag" data-price="89.99">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2">Designer Handbag</h3>
                            <p class="text-gray-600 text-sm mb-2">Luxury leather collection</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-pink-600">$89.99</span>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">(18)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="shoes" data-price="79.99" data-size="6,7,8,9,10" data-color="black">
                        <div class="relative group">
                            <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 alt="Stylish High Heels" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-4 right-4 space-y-2">
                                <button class="wishlist-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="quick-view-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="absolute top-4 left-4 bg-red-600 text-white px-2 py-1 text-xs rounded">
                                Sale
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                <button class="add-to-cart opacity-0 group-hover:opacity-100 bg-white text-pink-600 px-6 py-2 rounded-full font-semibold hover:bg-pink-600 hover:text-white transition-all duration-300"
                                        data-name="Stylish High Heels" data-price="79.99">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2">Stylish High Heels</h3>
                            <p class="text-gray-600 text-sm mb-2">Comfortable and elegant</p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xl font-bold text-pink-600">$79.99</span>
                                    <span class="text-sm text-gray-500 line-through ml-2">$99.99</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">(32)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="tops" data-price="49.99" data-size="XS,S,M,L,XL" data-color="white">
                        <div class="relative group">
                            <img src="https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 alt="Casual Blouse" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-4 right-4 space-y-2">
                                <button class="wishlist-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="quick-view-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                <button class="add-to-cart opacity-0 group-hover:opacity-100 bg-white text-pink-600 px-6 py-2 rounded-full font-semibold hover:bg-pink-600 hover:text-white transition-all duration-300"
                                        data-name="Casual Blouse" data-price="49.99">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2">Casual Blouse</h3>
                            <p class="text-gray-600 text-sm mb-2">Perfect for everyday wear</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-pink-600">$49.99</span>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">(15)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="accessories" data-price="29.99" data-size="One Size" data-color="gold">
                        <div class="relative group">
                            <img src="https://images.unsplash.com/photo-1506630448388-4e683c67ddb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 alt="Gold Necklace" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-4 right-4 space-y-2">
                                <button class="wishlist-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="quick-view-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                <button class="add-to-cart opacity-0 group-hover:opacity-100 bg-white text-pink-600 px-6 py-2 rounded-full font-semibold hover:bg-pink-600 hover:text-white transition-all duration-300"
                                        data-name="Gold Necklace" data-price="29.99">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2">Gold Necklace</h3>
                            <p class="text-gray-600 text-sm mb-2">Elegant jewelry piece</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-pink-600">$29.99</span>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">(41)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="product-card bg-white rounded-lg shadow-md overflow-hidden" data-category="dresses" data-price="159.99" data-size="S,M,L,XL" data-color="blue">
                        <div class="relative group">
                            <img src="https://images.unsplash.com/photo-1566479179817-c0db77f3c26b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                 alt="Summer Maxi Dress" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-4 right-4 space-y-2">
                                <button class="wishlist-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="quick-view-btn bg-white rounded-full p-2 shadow-md hover:bg-pink-600 hover:text-white transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="absolute top-4 left-4 bg-green-600 text-white px-2 py-1 text-xs rounded">
                                Best Seller
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                <button class="add-to-cart opacity-0 group-hover:opacity-100 bg-white text-pink-600 px-6 py-2 rounded-full font-semibold hover:bg-pink-600 hover:text-white transition-all duration-300"
                                        data-name="Summer Maxi Dress" data-price="159.99">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2">Summer Maxi Dress</h3>
                            <p class="text-gray-600 text-sm mb-2">Flowy and comfortable</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-pink-600">$159.99</span>
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="text-gray-500 text-sm ml-1">(67)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-8">
                    <button id="load-more" class="bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700 transition-colors">
                        Load More Products
                    </button>
                </div>
            </section>
        </div>
    </main>

    <!-- Quick View Modal -->
    <div id="quick-view-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg max-w-4xl w-full max-h-screen overflow-y-auto">
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
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-500 text-sm">(24 reviews)</span>
                        </div>
                        <p id="quick-view-price" class="text-3xl font-bold text-pink-600 mb-4"></p>
                        <p id="quick-view-description" class="text-gray-600 mb-6">
                            Beautiful and elegant piece perfect for any occasion. Made with high-quality materials and attention to detail.
                        </p>
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2">Size:</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                <option>Select Size</option>
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
                                <button class="w-8 h-8 bg-black rounded-full border-2 border-gray-300 hover:border-pink-600"></button>
                                <button class="w-8 h-8 bg-white rounded-full border-2 border-gray-300 hover:border-pink-600"></button>
                                <button class="w-8 h-8 bg-pink-500 rounded-full border-2 border-gray-300 hover:border-pink-600"></button>
                                <button class="w-8 h-8 bg-blue-500 rounded-full border-2 border-gray-300 hover:border-pink-600"></button>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <button class="flex-1 bg-pink-600 text-white py-3 rounded-lg hover:bg-pink-700 transition-colors">
                                Add to Cart
                            </button>
                            <button class="px-6 py-3 border border-pink-600 text-pink-600 rounded-lg hover:bg-pink-600 hover:text-white transition-colors">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                // Add mobile menu functionality if needed
            });
        }

        // Filter Toggle (Mobile)
        const filterToggle = document.getElementById('filter-toggle');
        const filters = document.getElementById('filters');
        
        filterToggle.addEventListener('click', function() {
            filters.classList.toggle('hidden');
        });

        // Search Functionality
        const searchBtn = document.getElementById('search-btn');
        const searchSection = document.getElementById('search-section');
        const searchInput = document.getElementById('search-input');

        searchBtn.addEventListener('click', function() {
            searchSection.classList.toggle('hidden');
            if (!searchSection.classList.contains('hidden')) {
                searchInput.focus();
            }
        });

        // View Toggle
        const gridView = document.getElementById('grid-view');
        const listView = document.getElementById('list-view');
        const productsGrid = document.getElementById('products-grid');

        gridView.addEventListener('click', function() {
            this.classList.add('bg-pink-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-600');
            listView.classList.remove('bg-pink-600', 'text-white');
            listView.classList.add('bg-gray-200', 'text-gray-600');
            
            productsGrid.className = 'grid md:grid-cols-2 lg:grid-cols-3 gap-6';
        });

        listView.addEventListener('click', function() {
            this.classList.add('bg-pink-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-600');
            gridView.classList.remove('bg-pink-600', 'text-white');
            gridView.classList.add('bg-gray-200', 'text-gray-600');
            
            productsGrid.className = 'grid grid-cols-1 gap-6';
        });

        // Filter Functions
        function applyFilters() {
            const products = document.querySelectorAll('.product-card');
            const selectedCategories = Array.from(document.querySelectorAll('.category-filter:checked')).map(cb => cb.value);
            const selectedPrice = document.querySelector('input[name="price"]:checked').value;
            const selectedSizes = Array.from(document.querySelectorAll('.size-filter.active')).map(btn => btn.dataset.size);
            const selectedColors = Array.from(document.querySelectorAll('.color-filter.active')).map(btn => btn.dataset.color);
            const searchTerm = searchInput.value.toLowerCase();

            let visibleCount = 0;

            products.forEach(product => {
                let visible = true;

                // Category filter
                if (!selectedCategories.includes('all') && selectedCategories.length > 0) {
                    if (!selectedCategories.includes(product.dataset.category)) {
                        visible = false;
                    }
                }

                // Price filter
                if (selectedPrice !== 'all') {
                    const price = parseFloat(product.dataset.price);
                    switch (selectedPrice) {
                        case '0-50':
                            if (price >= 50) visible = false;
                            break;
                        case '50-100':
                            if (price < 50 || price >= 100) visible = false;
                            break;
                        case '100-200':
                            if (price < 100 || price >= 200) visible = false;
                            break;
                        case '200+':
                            if (price < 200) visible = false;
                            break;
                    }
                }

                // Size filter
                if (selectedSizes.length > 0) {
                    const productSizes = product.dataset.size.split(',');
                    const hasSize = selectedSizes.some(size => productSizes.includes(size));
                    if (!hasSize) visible = false;
                }

                // Color filter
                if (selectedColors.length > 0) {
                    if (!selectedColors.includes(product.dataset.color)) {
                        visible = false;
                    }
                }

                // Search filter
                if (searchTerm) {
                    const productName = product.querySelector('h3').textContent.toLowerCase();
                    const productDescription = product.querySelector('p').textContent.toLowerCase();
                    if (!productName.includes(searchTerm) && !productDescription.includes(searchTerm)) {
                        visible = false;
                    }
                }

                if (visible) {
                    product.style.display = 'block';
                    visibleCount++;
                } else {
                    product.style.display = 'none';
                }
            });

            document.getElementById('products-count').textContent = visibleCount;
        }

        // Filter Event Listeners
        document.querySelectorAll('.category-filter').forEach(filter => {
            filter.addEventListener('change', applyFilters);
        });

        document.querySelectorAll('input[name="price"]').forEach(filter => {
            filter.addEventListener('change', applyFilters);
        });

        document.querySelectorAll('.size-filter').forEach(filter => {
            filter.addEventListener('click', function() {
                this.classList.toggle('active');
                this.classList.toggle('border-pink-600');
                this.classList.toggle('text-pink-600');
                this.classList.toggle('bg-pink-50');
                applyFilters();
            });
        });

        document.querySelectorAll('.color-filter').forEach(filter => {
            filter.addEventListener('click', function() {
                this.classList.toggle('active');
                this.classList.toggle('border-pink-600');
                applyFilters();
            });
        });

        // Clear Filters
        document.getElementById('clear-filters').addEventListener('click', function() {
            // Reset all filters
            document.querySelectorAll('.category-filter').forEach(cb => cb.checked = false);
            document.querySelector('.category-filter[value="all"]').checked = true;
            document.querySelector('input[name="price"][value="all"]').checked = true;
            document.querySelectorAll('.size-filter').forEach(btn => {
                btn.classList.remove('active', 'border-pink-600', 'text-pink-600', 'bg-pink-50');
            });
            document.querySelectorAll('.color-filter').forEach(btn => {
                btn.classList.remove('active', 'border-pink-600');
            });
            searchInput.value = '';
            applyFilters();
        });

        // Search functionality
        searchInput.addEventListener('input', applyFilters);

        // Sort functionality
        const sortSelect = document.getElementById('sort-select');
        sortSelect.addEventListener('change', function() {
            const products = Array.from(document.querySelectorAll('.product-card'));
            const grid = document.getElementById('products-grid');
            
            products.sort((a, b) => {
                const priceA = parseFloat(a.dataset.price);
                const priceB = parseFloat(b.dataset.price);
                const nameA = a.querySelector('h3').textContent;
                const nameB = b.querySelector('h3').textContent;
                
                switch (this.value) {
                    case 'price-low':
                        return priceA - priceB;
                    case 'price-high':
                        return priceB - priceA;
                    case 'name-az':
                        return nameA.localeCompare(nameB);
                    case 'name-za':
                        return nameB.localeCompare(nameA);
                    default:
                        return 0;
                }
            });
            
            // Re-append sorted products
            products.forEach(product => grid.appendChild(product));
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

        // Quick View Modal
        const quickViewModal = document.getElementById('quick-view-modal');
        const closeQuickView = document.getElementById('close-quick-view');

        document.querySelectorAll('.quick-view-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const productCard = this.closest('.product-card');
                const img = productCard.querySelector('img');
                const title = productCard.querySelector('h3');
                const price = productCard.querySelector('.text-pink-600');

                document.getElementById('quick-view-image').src = img.src;
                document.getElementById('quick-view-title').textContent = title.textContent;
                document.getElementById('quick-view-price').textContent = price.textContent;

                quickViewModal.classList.remove('hidden');
            });
        });

        closeQuickView.addEventListener('click', function() {
            quickViewModal.classList.add('hidden');
        });

        quickViewModal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });

        // Add to Cart Event Listeners
        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const name = this.dataset.name;
                const price = this.dataset.price;
                addToCart(name, price);
            });
        });

        // Wishlist functionality
        document.querySelectorAll('.wishlist-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                this.classList.toggle('text-pink-600');
                const icon = this.querySelector('i');
                icon.classList.toggle('fas');
                icon.classList.toggle('far');
                
                if (this.classList.contains('text-pink-600')) {
                    showNotification('Added to wishlist!');
                } else {
                    showNotification('Removed from wishlist!');
                }
            });
        });

        // Cart Modal Event Listeners
        document.getElementById('cart-btn').addEventListener('click', openCart);
        document.getElementById('close-cart').addEventListener('click', closeCart);
        document.getElementById('cart-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCart();
            }
        });

        // Load More Functionality
        document.getElementById('load-more').addEventListener('click', function() {
            showNotification('Loading more products...');
            // Here you would typically load more products from the server
        });

        // Initialize
        updateCartDisplay();
        applyFilters();
    </script>
</body>
</html>