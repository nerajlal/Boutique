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
