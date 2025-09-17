<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Boutique Name</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .fade-in { animation: fadeIn 0.8s ease-out; }
        .slide-in-left { animation: slideInLeft 0.8s ease-out; }
        .slide-in-right { animation: slideInRight 0.8s ease-out; }
        
        /* Smooth scrolling */
        html { scroll-behavior: smooth; }
        
        /* Timeline styles */
        .timeline-item {
            position: relative;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: linear-gradient(to bottom, #ec4899, #8b5cf6);
        }
        
        .timeline-dot {
            position: relative;
            z-index: 10;
            width: 16px;
            height: 16px;
            background: #ec4899;
            border: 4px solid white;
            border-radius: 50%;
            box-shadow: 0 0 0 4px #ec4899;
        }
        
        /* Team member card hover effects */
        .team-card {
            transition: all 0.3s ease;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        /* Parallax effect */
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        /* Counter animation */
        .counter {
            font-weight: bold;
            font-size: 2rem;
        }
        
        /* Values cards */
        .value-card {
            transition: all 0.3s ease;
        }
        
        .value-card:hover {
            transform: scale(1.05);
        }
        
        /* Testimonial carousel */
        .testimonial-slider {
            overflow-x: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        .testimonial-slider::-webkit-scrollbar {
            display: none;
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
                    <li><a href="#" class="text-pink-600 font-semibold">About</a></li>
                    <li><a href="#" class="hover:text-pink-600 transition-colors">Contact</a></li>
                </ul>
                
                <!-- Cart and Mobile Menu -->
                <div class="flex items-center space-x-4">
                    <button class="relative hover:text-pink-600">
                        <i class="fas fa-shopping-bag text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-pink-600 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">0</span>
                    </button>
                    <button class="md:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative h-96 bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 flex items-center">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 fade-in">About Our Story</h1>
                <p class="text-xl md:text-2xl mb-8 fade-in">Crafting elegance, defining style, inspiring confidence</p>
                <div class="flex justify-center space-x-1 fade-in">
                    <div class="w-12 h-1 bg-white rounded"></div>
                    <div class="w-12 h-1 bg-pink-300 rounded"></div>
                    <div class="w-12 h-1 bg-white rounded"></div>
                </div>
            </div>
        </div>
        
        <!-- Floating elements -->
        <div class="absolute top-20 left-10 w-4 h-4 bg-pink-300 rounded-full opacity-60 animate-pulse"></div>
        <div class="absolute top-32 right-20 w-6 h-6 bg-purple-300 rounded-full opacity-40 animate-bounce"></div>
        <div class="absolute bottom-20 left-1/4 w-3 h-3 bg-indigo-300 rounded-full opacity-50 animate-ping"></div>
    </section>

    <!-- Our Story Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="slide-in-left">
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Our Journey</h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Founded in 2010 with a simple vision: to make every woman feel confident, beautiful, and authentically herself. What started as a small boutique with a carefully curated collection has grown into a beloved destination for fashion-forward individuals seeking unique, high-quality pieces.
                    </p>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Our passion for fashion goes beyond trends – we believe in timeless elegance, sustainable practices, and the power of the perfect outfit to transform not just how you look, but how you feel.
                    </p>
                    <div class="flex items-center space-x-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-pink-600 counter" data-target="12">0</div>
                            <div class="text-gray-600">Years Experience</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-pink-600 counter" data-target="10000">0</div>
                            <div class="text-gray-600">Happy Customers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-pink-600 counter" data-target="500">0</div>
                            <div class="text-gray-600">Unique Pieces</div>
                        </div>
                    </div>
                </div>
                <div class="slide-in-right">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Boutique Interior" class="rounded-lg shadow-2xl">
                        <div class="absolute -bottom-6 -right-6 bg-pink-600 text-white p-6 rounded-lg shadow-xl">
                            <div class="text-2xl font-bold">Since 2010</div>
                            <div class="text-pink-100">Serving Style</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-16 bg-gradient-to-br from-pink-50 to-purple-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Core Values</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    These principles guide everything we do, from selecting our collections to serving our customers.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="value-card bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-2xl text-pink-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Quality First</h3>
                    <p class="text-gray-600">We believe in offering only the finest materials and craftsmanship, ensuring every piece meets our high standards.</p>
                </div>
                
                <div class="value-card bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-leaf text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Sustainability</h3>
                    <p class="text-gray-600">Committed to ethical fashion practices and supporting brands that care about our planet's future.</p>
                </div>
                
                <div class="value-card bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Community</h3>
                    <p class="text-gray-600">Building relationships with our customers and supporting local artisans and designers.</p>
                </div>
                
                <div class="value-card bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Excellence</h3>
                    <p class="text-gray-600">Striving for perfection in every aspect of our service, from curation to customer experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Milestones</h2>
                <p class="text-lg text-gray-600">Key moments that shaped our journey</p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="timeline-item py-8">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right">
                            <div class="bg-pink-50 p-6 rounded-lg">
                                <h3 class="text-xl font-bold text-pink-600 mb-2">2010 - The Beginning</h3>
                                <p class="text-gray-600">Started as a small boutique with a dream to bring unique fashion to our community. Our first collection featured 50 carefully selected pieces.</p>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="timeline-dot"></div>
                        </div>
                        <div class="hidden md:block"></div>
                    </div>
                </div>
                
                <div class="timeline-item py-8">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:order-2">
                            <div class="bg-purple-50 p-6 rounded-lg">
                                <h3 class="text-xl font-bold text-purple-600 mb-2">2015 - Online Expansion</h3>
                                <p class="text-gray-600">Launched our e-commerce platform, allowing us to reach fashion lovers nationwide and expand our curated collections.</p>
                            </div>
                        </div>
                        <div class="flex justify-center md:order-2">
                            <div class="timeline-dot"></div>
                        </div>
                        <div class="hidden md:block md:order-1"></div>
                    </div>
                </div>
                
                <div class="timeline-item py-8">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right">
                            <div class="bg-indigo-50 p-6 rounded-lg">
                                <h3 class="text-xl font-bold text-indigo-600 mb-2">2018 - Sustainable Fashion</h3>
                                <p class="text-gray-600">Committed to sustainability by partnering with eco-conscious brands and implementing our green packaging initiative.</p>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="timeline-dot"></div>
                        </div>
                        <div class="hidden md:block"></div>
                    </div>
                </div>
                
                <div class="timeline-item py-8">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:order-2">
                            <div class="bg-yellow-50 p-6 rounded-lg">
                                <h3 class="text-xl font-bold text-yellow-600 mb-2">2020 - Community Support</h3>
                                <p class="text-gray-600">During challenging times, we launched our virtual styling sessions and supported local designers through our platform.</p>
                            </div>
                        </div>
                        <div class="flex justify-center md:order-2">
                            <div class="timeline-dot"></div>
                        </div>
                        <div class="hidden md:block md:order-1"></div>
                    </div>
                </div>
                
                <div class="timeline-item py-8">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right">
                            <div class="bg-pink-50 p-6 rounded-lg">
                                <h3 class="text-xl font-bold text-pink-600 mb-2">2024 - New Chapter</h3>
                                <p class="text-gray-600">Celebrating over a decade of style with expanded collections, personalized services, and a growing community of fashion enthusiasts.</p>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="timeline-dot"></div>
                        </div>
                        <div class="hidden md:block"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet Our Team Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Meet Our Team</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    The passionate individuals behind our boutique, dedicated to bringing you the best in fashion and style.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="team-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616c999c8c6?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Sarah Johnson" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Sarah Johnson</h3>
                        <p class="text-pink-600 font-semibold mb-3">Founder & Creative Director</p>
                        <p class="text-gray-600 mb-4">With over 15 years in fashion, Sarah curates every piece with passion and precision, ensuring our collections reflect the latest trends while maintaining timeless appeal.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <i class="fas fa-envelope text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="team-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Michael Chen" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Michael Chen</h3>
                        <p class="text-pink-600 font-semibold mb-3">Head of Operations</p>
                        <p class="text-gray-600 mb-4">Michael ensures seamless operations from inventory management to customer service, bringing efficiency and innovation to every aspect of our business.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <i class="fas fa-envelope text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="team-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Emma Rodriguez" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Emma Rodriguez</h3>
                        <p class="text-pink-600 font-semibold mb-3">Senior Style Consultant</p>
                        <p class="text-gray-600 mb-4">Emma's keen eye for style and personal approach helps our customers discover pieces that perfectly express their individuality and enhance their confidence.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors">
                                <i class="fas fa-envelope text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Testimonials -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">What Our Customers Say</h2>
                <p class="text-lg text-gray-600">Real stories from our fashion-loving community</p>
            </div>
            
            <div class="testimonial-slider flex space-x-6 pb-6" id="testimonial-slider">
                <!-- Testimonial 1 -->
                <div class="flex-none w-80 bg-pink-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616c999c8c6?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="Customer" class="w-12 h-12 rounded-full object-cover mr-3">
                        <div>
                            <div class="font-semibold">Jessica Miller</div>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Absolutely love this boutique! The quality is amazing and the styling advice is spot-on. I always leave feeling confident and beautiful."</p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="flex-none w-80 bg-purple-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="Customer" class="w-12 h-12 rounded-full object-cover mr-3">
                        <div>
                            <div class="font-semibold">Amanda Davis</div>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"The customer service here is exceptional. They really care about helping you find pieces that suit your style and body type perfectly."</p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="flex-none w-80 bg-indigo-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="Customer" class="w-12 h-12 rounded-full object-cover mr-3">
                        <div>
                            <div class="font-semibold">Rachel Thompson</div>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"I've been shopping here for years and they never disappoint. The curation is impeccable and I always find unique pieces I can't get anywhere else."</p>
                </div>
                
                <!-- Testimonial 4 -->
                <div class="flex-none w-80 bg-yellow-50 rounded-xl p-6">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="Customer" class="w-12 h-12 rounded-full object-cover mr-3">
                        <div>
                            <div class="font-semibold">Lisa Park</div>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"The quality and attention to detail in every piece is outstanding. I love that they focus on sustainable and ethical fashion too!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Statement -->
    <section class="py-16 bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold mb-6">Our Mission</h2>
                <p class="text-xl leading-relaxed mb-8">
                    "To empower every individual to express their unique style through carefully curated fashion that celebrates authenticity, quality, and sustainability. We believe that the right outfit can transform not just how you look, but how you feel about yourself."
                </p>
                <div class="flex justify-center">
                    <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-full p-6">
                        <i class="fas fa-heart text-4xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Awards & Recognition -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Awards & Recognition</h2>
                <p class="text-lg text-gray-600">Proud of the recognition we've received from the fashion community</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-trophy text-3xl text-yellow-600"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Best Boutique 2023</h3>
                    <p class="text-gray-600 text-sm">Fashion Excellence Awards</p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-leaf text-3xl text-green-600"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Sustainable Fashion Leader</h3>
                    <p class="text-gray-600 text-sm">Eco Fashion Council</p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Customer Choice Award</h3>
                    <p class="text-gray-600 text-sm">Retail Excellence 2022</p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-medal text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Innovation in Fashion</h3>
                    <p class="text-gray-600 text-sm">Style Industry Awards</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Behind the Scenes -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Behind the Scenes</h2>
                <p class="text-lg text-gray-600">A glimpse into our creative process and daily operations</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="relative group overflow-hidden rounded-lg shadow-lg">
                    <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Curation Process" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="font-bold text-lg mb-1">Curation Process</h3>
                            <p class="text-sm opacity-90">Every piece is carefully selected</p>
                        </div>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-lg shadow-lg">
                    <img src="https://images.unsplash.com/photo-1556905055-8f358a7a47b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Quality Control" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="font-bold text-lg mb-1">Quality Control</h3>
                            <p class="text-sm opacity-90">Rigorous quality checks</p>
                        </div>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-lg shadow-lg">
                    <img src="https://images.unsplash.com/photo-1559563458-527698bf5295?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         alt="Personal Styling" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                        <div class="p-4 text-white">
                            <h3 class="font-bold text-lg mb-1">Personal Styling</h3>
                            <p class="text-sm opacity-90">One-on-one consultations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-pink-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4">Join Our Fashion Journey</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Ready to discover your perfect style? Explore our latest collections and become part of our fashion-loving community.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="collections.html" 
                   class="bg-white text-pink-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                    Shop Collections
                </a>
                <a href="#contact" 
                   class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-pink-600 transition-colors">
                    Book Consultation
                </a>
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
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-pinterest text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="index.html" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="collections.html" class="hover:text-white transition-colors">Collections</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Size Guide</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Customer Service</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Returns</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Order Status</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-3 text-gray-400">
                        <p><i class="fas fa-map-marker-alt mr-2"></i> 123 Fashion Street, Style City</p>
                        <p><i class="fas fa-phone mr-2"></i> +1 (555) 123-4567</p>
                        <p><i class="fas fa-envelope mr-2"></i> info@boutiquename.com</p>
                        <p><i class="fas fa-clock mr-2"></i> Mon-Fri: 9AM-8PM, Sat-Sun: 10AM-6PM</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Boutique Name. All rights reserved. | Privacy Policy | Terms of Service</p>
            </div>
        </div>
    </footer>

    <script>
        // Counter Animation
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            
            counters.forEach(counter => {
                const target = parseInt(counter.dataset.target);
                const increment = target / 100;
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 20);
            });
        }

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('counter')) {
                        // Only animate counters once
                        if (!entry.target.classList.contains('animated')) {
                            entry.target.classList.add('animated');
                            setTimeout(() => animateCounters(), 500);
                        }
                    } else {
                        entry.target.classList.add('fade-in');
                    }
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.addEventListener('DOMContentLoaded', function() {
            // Observe sections and key elements
            const elementsToAnimate = document.querySelectorAll('section, .value-card, .team-card, .timeline-item');
            elementsToAnimate.forEach(el => observer.observe(el));

            // Observe counters specifically
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => observer.observe(counter));
        });

        // Smooth scrolling for navigation links
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

        // Auto-scroll testimonials
        function autoScrollTestimonials() {
            const slider = document.getElementById('testimonial-slider');
            let scrollAmount = 0;
            const scrollStep = 1;
            const scrollInterval = 30;

            setInterval(() => {
                scrollAmount += scrollStep;
                slider.scrollLeft = scrollAmount;
                
                // Reset when reaching the end
                if (scrollAmount >= slider.scrollWidth - slider.clientWidth) {
                    scrollAmount = 0;
                }
            }, scrollInterval);
        }

        // Parallax effect for hero section (optional)
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroSection = document.querySelector('section:first-of-type');
            if (heroSection) {
                heroSection.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Initialize testimonial auto-scroll after page load
        window.addEventListener('load', function() {
            setTimeout(autoScrollTestimonials, 2000);
        });

        // Team member card interaction
        document.querySelectorAll('.team-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Value cards hover effect
        document.querySelectorAll('.value-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.05)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add staggered animation to timeline items
        function staggerTimelineAnimation() {
            const timelineItems = document.querySelectorAll('.timeline-item');
            timelineItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('fade-in');
                }, index * 200);
            });
        }

        // Initialize staggered animations when timeline comes into view
        const timelineObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    staggerTimelineAnimation();
                    timelineObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        const timelineSection = document.querySelector('.timeline-item');
        if (timelineSection) {
            timelineObserver.observe(timelineSection.parentElement);
        }

        console.log('About page loaded successfully!');
    </script>
</body>
</html>