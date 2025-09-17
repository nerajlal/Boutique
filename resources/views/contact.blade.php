<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Boutique Name</title>
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
        
        /* Form styling */
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            background: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #ec4899;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }
        
        .form-input:valid + .form-label,
        .form-input:focus + .form-label {
            top: -0.5rem;
            left: 0.75rem;
            font-size: 0.875rem;
            background: white;
            color: #ec4899;
            padding: 0 0.5rem;
        }
        
        .form-label {
            position: absolute;
            top: 1rem;
            left: 1rem;
            color: #9ca3af;
            transition: all 0.3s ease;
            pointer-events: none;
        }
        
        /* Map container */
        .map-container {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        /* Contact cards hover effects */
        .contact-card {
            transition: all 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        /* FAQ accordion */
        .faq-item {
            border-bottom: 1px solid #e5e7eb;
        }
        
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .faq-answer.active {
            max-height: 200px;
        }
        
        /* Chat widget */
        .chat-widget {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 1000;
        }
        
        .chat-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            box-shadow: 0 4px 20px rgba(236, 72, 153, 0.3);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 4px 20px rgba(236, 72, 153, 0.3); }
            50% { box-shadow: 0 4px 30px rgba(236, 72, 153, 0.5); }
            100% { box-shadow: 0 4px 20px rgba(236, 72, 153, 0.3); }
        }
        
        /* Business hours styling */
        .hours-table {
            background: linear-gradient(135deg, #fdf2f8, #f3e8ff);
        }
        
        /* Success message animation */
        .success-message {
            transform: scale(0);
            transition: transform 0.3s ease;
        }
        
        .success-message.show {
            transform: scale(1);
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
                    <li><a href="about.html" class="hover:text-pink-600 transition-colors">About</a></li>
                    <li><a href="#" class="text-pink-600 font-semibold">Contact</a></li>
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
    <section class="relative h-80 bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 flex items-center">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 fade-in">Get in Touch</h1>
                <p class="text-xl md:text-2xl mb-6 fade-in">We'd love to hear from you. Send us a message!</p>
                <div class="flex justify-center space-x-4 fade-in">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-phone"></i>
                        <span>Call Us</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-envelope"></i>
                        <span>Email Us</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Visit Us</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Cards -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 -mt-32 relative z-10">
                <!-- Phone Contact -->
                <div class="contact-card bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-2xl text-pink-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Call Us</h3>
                    <p class="text-gray-600 mb-3">Speak with our fashion consultants</p>
                    <a href="tel:+15551234567" class="text-pink-600 font-semibold hover:underline">
                        +1 (555) 123-4567
                    </a>
                    <p class="text-sm text-gray-500 mt-2">Mon-Fri: 9AM-8PM</p>
                </div>

                <!-- Email Contact -->
                <div class="contact-card bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Email Us</h3>
                    <p class="text-gray-600 mb-3">Get detailed assistance via email</p>
                    <a href="mailto:info@boutiquename.com" class="text-pink-600 font-semibold hover:underline">
                        info@boutiquename.com
                    </a>
                    <p class="text-sm text-gray-500 mt-2">Response within 2 hours</p>
                </div>

                <!-- Live Chat -->
                <div class="contact-card bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-comments text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Live Chat</h3>
                    <p class="text-gray-600 mb-3">Chat with us in real-time</p>
                    <button onclick="openChat()" class="text-pink-600 font-semibold hover:underline">
                        Start Chat
                    </button>
                    <p class="text-sm text-gray-500 mt-2">Available 24/7</p>
                </div>

                <!-- Visit Store -->
                <div class="contact-card bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Visit Store</h3>
                    <p class="text-gray-600 mb-3">Experience our boutique in person</p>
                    <address class="text-pink-600 font-semibold not-italic">
                        123 Fashion Street<br>
                        Style City, SC 12345
                    </address>
                    <p class="text-sm text-gray-500 mt-2">Free parking available</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="slide-in-left">
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Send us a Message</h2>
                        <p class="text-gray-600 mb-8">Fill out the form below and we'll get back to you as soon as possible.</p>
                        
                        <form id="contact-form" class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="form-group">
                                    <input type="text" id="first-name" name="firstName" class="form-input" required>
                                    <label for="first-name" class="form-label">First Name *</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="last-name" name="lastName" class="form-input" required>
                                    <label for="last-name" class="form-label">Last Name *</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-input" required>
                                <label for="email" class="form-label">Email Address *</label>
                            </div>

                            <div class="form-group">
                                <input type="tel" id="phone" name="phone" class="form-input">
                                <label for="phone" class="form-label">Phone Number</label>
                            </div>

                            <div class="form-group">
                                <select id="inquiry-type" name="inquiryType" class="form-input" required>
                                    <option value="" disabled selected></option>
                                    <option value="general">General Inquiry</option>
                                    <option value="styling">Personal Styling</option>
                                    <option value="orders">Order Support</option>
                                    <option value="returns">Returns & Exchanges</option>
                                    <option value="wholesale">Wholesale Inquiry</option>
                                    <option value="press">Press & Media</option>
                                    <option value="other">Other</option>
                                </select>
                                <label for="inquiry-type" class="form-label">Inquiry Type *</label>
                            </div>

                            <div class="form-group">
                                <input type="text" id="subject" name="subject" class="form-input" required>
                                <label for="subject" class="form-label">Subject *</label>
                            </div>

                            <div class="form-group">
                                <textarea id="message" name="message" rows="5" class="form-input" required style="resize: vertical; min-height: 120px;"></textarea>
                                <label for="message" class="form-label">Your Message *</label>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="newsletter" name="newsletter" class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500">
                                <label for="newsletter" class="ml-2 text-sm text-gray-600">
                                    Subscribe to our newsletter for style tips and exclusive offers
                                </label>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-pink-600 to-purple-600 text-white py-4 px-6 rounded-lg font-semibold hover:from-pink-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-paper-plane mr-2"></i>Send Message
                            </button>
                        </form>

                        <!-- Success Message -->
                        <div id="success-message" class="success-message bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mt-6 hidden">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span>Thank you! Your message has been sent successfully. We'll get back to you soon.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map & Store Info -->
                <div class="slide-in-right space-y-6">
                    <!-- Store Location Map -->
                    <div class="map-container">
                        <div class="bg-gradient-to-br from-pink-100 to-purple-100 h-80 flex items-center justify-center rounded-xl">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt text-6xl text-pink-600 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Interactive Map</h3>
                                <p class="text-gray-600">123 Fashion Street, Style City, SC 12345</p>
                                <button onclick="openDirections()" class="mt-4 bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700 transition-colors">
                                    <i class="fas fa-directions mr-2"></i>Get Directions
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold mb-4 flex items-center">
                            <i class="fas fa-clock text-pink-600 mr-2"></i>
                            Business Hours
                        </h3>
                        <div class="hours-table rounded-lg p-4">
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Monday - Friday</span>
                                    <span class="text-pink-600 font-semibold">9:00 AM - 8:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Saturday</span>
                                    <span class="text-pink-600 font-semibold">10:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Sunday</span>
                                    <span class="text-pink-600 font-semibold">12:00 PM - 5:00 PM</span>
                                </div>
                                <div class="border-t pt-3 mt-3">
                                    <div class="flex justify-between items-center">
                                        <span class="font-medium text-green-600">
                                            <i class="fas fa-circle text-xs mr-1"></i>Currently Open
                                        </span>
                                        <span class="text-sm text-gray-500">Closes at 8:00 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Services -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold mb-4">Our Services</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-user-tie text-pink-600 mr-3"></i>
                                <span>Personal Styling Consultation</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-scissors text-pink-600 mr-3"></i>
                                <span>Alterations & Tailoring</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-gift text-pink-600 mr-3"></i>
                                <span>Personal Shopping Service</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt text-pink-600 mr-3"></i>
                                <span>Private Appointments</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-truck text-pink-600 mr-3"></i>
                                <span>Home Delivery Available</span>
                            </div>
                        </div>
                        <button onclick="bookAppointment()" class="w-full mt-4 border-2 border-pink-600 text-pink-600 py-3 px-6 rounded-lg font-semibold hover:bg-pink-600 hover:text-white transition-colors">
                            Book an Appointment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Find quick answers to common questions. Can't find what you're looking for? Contact us directly!
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <button class="w-full text-left py-6 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                        <span class="text-lg font-semibold text-gray-800">What are your return and exchange policies?</span>
                        <i class="fas fa-chevron-down text-pink-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer pb-6">
                        <p class="text-gray-600">We offer a 30-day return policy for all items in original condition with tags attached. Exchanges are available for different sizes or colors within the same time frame. Sale items are final sale unless defective.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <button class="w-full text-left py-6 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                        <span class="text-lg font-semibold text-gray-800">Do you offer personal styling services?</span>
                        <i class="fas fa-chevron-down text-pink-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer pb-6">
                        <p class="text-gray-600">Yes! We offer complimentary styling consultations in-store and virtual styling sessions. Our expert stylists will help you create looks that express your personal style and flatter your body type.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <button class="w-full text-left py-6 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                        <span class="text-lg font-semibold text-gray-800">What payment methods do you accept?</span>
                        <i class="fas fa-chevron-down text-pink-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer pb-6">
                        <p class="text-gray-600">We accept all major credit cards (Visa, MasterCard, American Express, Discover), PayPal, Apple Pay, Google Pay, and Affirm for financing options. Gift cards are also available for purchase.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <button class="w-full text-left py-6 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                        <span class="text-lg font-semibold text-gray-800">Do you offer alterations?</span>
                        <i class="fas fa-chevron-down text-pink-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer pb-6">
                        <p class="text-gray-600">Yes, we have an in-house alterations service. Basic alterations like hemming are complimentary with purchase over $100. More complex alterations are available for a reasonable fee with 5-7 day turnaround.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item">
                    <button class="w-full text-left py-6 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                        <span class="text-lg font-semibold text-gray-800">What are your shipping options and costs?</span>
                        <i class="fas fa-chevron-down text-pink-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer pb-6">
                        <p class="text-gray-600">We offer free standard shipping on orders over $75 (5-7 business days). Express shipping is $15 (2-3 business days) and overnight shipping is $25. Local delivery is available within 10 miles for $10.</p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item">
                    <button class="w-full text-left py-6 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                        <span class="text-lg font-semibold text-gray-800">How can I track my order?</span>
                        <i class="fas fa-chevron-down text-pink-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer pb-6">
                        <p class="text-gray-600">Once your order ships, you'll receive a tracking email with your tracking number. You can also log into your account on our website to view order status and tracking information in real-time.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <p class="text-gray-600 mb-4">Still have questions?</p>
                <button onclick="scrollToForm()" class="bg-pink-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-pink-700 transition-colors">
                    Contact Us Directly
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="py-16 bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4">Stay Connected</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Subscribe to our newsletter for style tips, exclusive offers, and the latest fashion trends delivered to your inbox.
            </p>
            <div class="max-w-md mx-auto">
                <div class="flex flex-col sm:flex-row gap-4">
                    <input type="email" id="newsletter-email" placeholder="Enter your email address" 
                           class="flex-1 px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-white">
                    <button onclick="subscribeNewsletter()" 
                            class="bg-white text-pink-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Subscribe
                    </button>
                </div>
                <p class="text-sm mt-4 opacity-90">We respect your privacy. Unsubscribe at any time.</p>
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