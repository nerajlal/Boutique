<!-- Sidebar -->
        <div class="sidebar bg-gray-800 text-white w-64 flex-shrink-0 custom-scrollbar overflow-y-auto" id="sidebar">
            <div class="p-4">
                <!-- Logo -->
                <div class="flex items-center space-x-2 mb-8">
                    <i class="fas fa-gem text-2xl text-pink-500"></i>
                    <span class="text-xl font-bold sidebar-text">Boutique Admin</span>
                </div>

                <!-- Navigation -->
                <nav class="space-y-2">
                    <a href="#" class="nav-link active flex items-center space-x-3 p-3 rounded-lg bg-pink-600" data-section="dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                    <a href="#" class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700" data-section="products">
                        <i class="fas fa-box"></i>
                        <span class="sidebar-text">Products</span>
                        <span class="ml-auto bg-red-500 text-xs px-2 py-1 rounded-full sidebar-text" id="low-stock-count">12</span>
                    </a>
                    <a href="#" class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700" data-section="orders">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="sidebar-text">Orders</span>
                        <span class="ml-auto bg-blue-500 text-xs px-2 py-1 rounded-full sidebar-text" id="pending-orders-count">8</span>
                    </a>
                    <a href="#" class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700" data-section="customers">
                        <i class="fas fa-users"></i>
                        <span class="sidebar-text">Customers</span>
                    </a>
                    <a href="#" class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700" data-section="inventory">
                        <i class="fas fa-warehouse"></i>
                        <span class="sidebar-text">Inventory</span>
                    </a>
                    <a href="#" class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700" data-section="analytics">
                        <i class="fas fa-chart-line"></i>
                        <span class="sidebar-text">Analytics</span>
                    </a>
                    <a href="#" class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700" data-section="marketing">
                        <i class="fas fa-bullhorn"></i>
                        <span class="sidebar-text">Marketing</span>
                    </a>
                    <a href="#" class="nav-link flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700" data-section="settings">
                        <i class="fas fa-cog"></i>
                        <span class="sidebar-text">Settings</span>
                    </a>
                </nav>
            </div>

            <!-- User Profile -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700">
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616c999c8c6?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                         alt="Admin" class="w-10 h-10 rounded-full">
                    <div class="sidebar-text">
                        <div class="font-medium">Sarah Johnson</div>
                        <div class="text-xs text-gray-400">Administrator</div>
                    </div>
                    <button class="ml-auto text-gray-400 hover:text-white" onclick="logout()">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>
        </div>
