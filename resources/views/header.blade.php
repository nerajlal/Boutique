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
