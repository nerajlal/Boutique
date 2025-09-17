<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Boutique Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #ec4899;
            border-radius: 3px;
        }
        
        /* Sidebar animations */
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar.collapsed {
            width: 64px;
        }
        .sidebar.collapsed .sidebar-text {
            display: none;
        }
        
        /* Content animations */
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Chart containers */
        .chart-container {
            position: relative;
            height: 300px;
        }
        
        /* Table styles */
        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }
        
        /* Status badges */
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        /* Modal styles */
        .modal {
            backdrop-filter: blur(4px);
        }
        
        /* Card hover effects */
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        /* Notification dropdown */
        .notification-dropdown {
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .notification-dropdown.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
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

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-500 hover:text-gray-700" onclick="toggleSidebar()">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h1 class="text-2xl font-semibold text-gray-800" id="page-title">Dashboard</h1>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" placeholder="Search..." id="global-search"
                                   class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        
                        <!-- Notifications -->
                        <div class="relative">
                            <button class="text-gray-500 hover:text-gray-700 relative" onclick="toggleNotifications()">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center" id="notification-count">3</span>
                            </button>
                            <!-- Notifications Dropdown -->
                            <div id="notifications-dropdown" class="notification-dropdown absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border z-50">
                                <div class="p-4 border-b">
                                    <h3 class="font-semibold">Notifications</h3>
                                </div>
                                <div class="max-h-64 overflow-y-auto" id="notifications-list">
                                    <!-- Notifications will be populated here -->
                                </div>
                                <div class="p-4 border-t text-center">
                                    <button class="text-pink-600 hover:underline" onclick="markAllAsRead()">Mark all as read</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition-colors" onclick="showModal('add-product-modal')">
                            <i class="fas fa-plus mr-2"></i>Add Product
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto custom-scrollbar">
                <!-- Dashboard Section -->
                <div id="dashboard-section" class="section-content p-6">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="stat-card bg-white p-6 rounded-xl shadow-sm cursor-pointer" onclick="showSection('orders-section')">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Total Revenue</p>
                                    <p class="text-3xl font-bold text-gray-900" id="total-revenue">$24,567</p>
                                    <p class="text-sm text-green-600" id="revenue-change"><i class="fas fa-arrow-up mr-1"></i>12.5% vs last month</p>
                                </div>
                                <div class="bg-green-100 p-3 rounded-full">
                                    <i class="fas fa-dollar-sign text-2xl text-green-600"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="stat-card bg-white p-6 rounded-xl shadow-sm cursor-pointer" onclick="showSection('orders-section')">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Orders</p>
                                    <p class="text-3xl font-bold text-gray-900" id="total-orders">1,234</p>
                                    <p class="text-sm text-blue-600" id="orders-change"><i class="fas fa-arrow-up mr-1"></i>8.2% vs last month</p>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="fas fa-shopping-cart text-2xl text-blue-600"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="stat-card bg-white p-6 rounded-xl shadow-sm cursor-pointer" onclick="showSection('customers-section')">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Customers</p>
                                    <p class="text-3xl font-bold text-gray-900" id="total-customers">5,678</p>
                                    <p class="text-sm text-purple-600" id="customers-change"><i class="fas fa-arrow-up mr-1"></i>15.3% vs last month</p>
                                </div>
                                <div class="bg-purple-100 p-3 rounded-full">
                                    <i class="fas fa-users text-2xl text-purple-600"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="stat-card bg-white p-6 rounded-xl shadow-sm cursor-pointer" onclick="showSection('products-section')">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Products</p>
                                    <p class="text-3xl font-bold text-gray-900" id="total-products">456</p>
                                    <p class="text-sm text-pink-600" id="products-change"><i class="fas fa-arrow-up mr-1"></i>5.1% vs last month</p>
                                </div>
                                <div class="bg-pink-100 p-3 rounded-full">
                                    <i class="fas fa-box text-2xl text-pink-600"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Row -->
                    <div class="grid lg:grid-cols-2 gap-6 mb-8">
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Revenue Overview</h3>
                                <select id="revenue-period" class="border border-gray-300 rounded px-3 py-1 text-sm" onchange="updateRevenueChart()">
                                    <option value="6months">Last 6 Months</option>
                                    <option value="12months">Last 12 Months</option>
                                    <option value="year">This Year</option>
                                </select>
                            </div>
                            <div class="chart-container">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <h3 class="text-lg font-semibold mb-4">Product Categories</h3>
                            <div class="chart-container">
                                <canvas id="categoryChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="grid lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Recent Orders</h3>
                                <button class="text-pink-600 hover:underline" onclick="showSection('orders-section')">View All</button>
                            </div>
                            <div class="table-container">
                                <table class="w-full">
                                    <thead class="bg-gray-50 sticky top-0">
                                        <tr>
                                            <th class="text-left p-3 font-medium text-gray-600">Order ID</th>
                                            <th class="text-left p-3 font-medium text-gray-600">Customer</th>
                                            <th class="text-left p-3 font-medium text-gray-600">Amount</th>
                                            <th class="text-left p-3 font-medium text-gray-600">Status</th>
                                            <th class="text-left p-3 font-medium text-gray-600">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="recent-orders-table">
                                        <!-- Orders will be populated here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Low Stock Alert</h3>
                                <button class="text-pink-600 hover:underline" onclick="showSection('inventory-section')">View All</button>
                            </div>
                            <div class="space-y-4" id="low-stock-alerts">
                                <!-- Low stock items will be populated here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Section -->
                <div id="products-section" class="section-content p-6 hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Products</h2>
                        <div class="flex space-x-3">
                            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700" onclick="exportProducts()">
                                <i class="fas fa-download mr-2"></i>Export
                            </button>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="bulkUpdateProducts()">
                                <i class="fas fa-edit mr-2"></i>Bulk Edit
                            </button>
                            <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700" onclick="showModal('add-product-modal')">
                                <i class="fas fa-plus mr-2"></i>Add Product
                            </button>
                        </div>
                    </div>
                    
                    <!-- Filters -->
                    <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <select class="border border-gray-300 rounded-lg px-3 py-2" id="category-filter" onchange="filterProducts()">
                                <option value="">All Categories</option>
                                <option value="dresses">Dresses</option>
                                <option value="accessories">Accessories</option>
                                <option value="shoes">Shoes</option>
                                <option value="bags">Bags</option>
                            </select>
                            <select class="border border-gray-300 rounded-lg px-3 py-2" id="status-filter" onchange="filterProducts()">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="out-of-stock">Out of Stock</option>
                            </select>
                            <select class="border border-gray-300 rounded-lg px-3 py-2" id="price-filter" onchange="filterProducts()">
                                <option value="">All Prices</option>
                                <option value="0-50">$0 - $50</option>
                                <option value="50-100">$50 - $100</option>
                                <option value="100+">$100+</option>
                            </select>
                            <input type="text" placeholder="Search products..." id="product-search"
                                   class="border border-gray-300 rounded-lg px-3 py-2" onkeyup="filterProducts()">
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="resetFilters()">
                                <i class="fas fa-undo mr-2"></i>Reset
                            </button>
                        </div>
                    </div>

                    <!-- Products Table -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex items-center space-x-4">
                                    <input type="checkbox" id="select-all-products" onchange="toggleSelectAll()">
                                    <span class="text-sm text-gray-600">Select All</span>
                                    <span class="text-sm text-gray-600" id="selected-count">0 selected</span>
                                </div>
                                <div class="hidden" id="bulk-actions">
                                    <button class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" onclick="bulkDeleteProducts()">Delete Selected</button>
                                    <button class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 ml-2" onclick="bulkActivateProducts()">Activate</button>
                                    <button class="bg-gray-600 text-white px-3 py-1 rounded text-sm hover:bg-gray-700 ml-2" onclick="bulkDeactivateProducts()">Deactivate</button>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="text-left p-4 font-medium text-gray-600">
                                                <input type="checkbox" onclick="toggleSelectAll()">
                                            </th>
                                            <th class="text-left p-4 font-medium text-gray-600 cursor-pointer" onclick="sortProducts('name')">
                                                Product <i class="fas fa-sort ml-1"></i>
                                            </th>
                                            <th class="text-left p-4 font-medium text-gray-600">SKU</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Category</th>
                                            <th class="text-left p-4 font-medium text-gray-600 cursor-pointer" onclick="sortProducts('price')">
                                                Price <i class="fas fa-sort ml-1"></i>
                                            </th>
                                            <th class="text-left p-4 font-medium text-gray-600 cursor-pointer" onclick="sortProducts('stock')">
                                                Stock <i class="fas fa-sort ml-1"></i>
                                            </th>
                                            <th class="text-left p-4 font-medium text-gray-600">Status</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="products-table">
                                        <!-- Products will be populated here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="flex justify-between items-center p-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600" id="products-pagination-info">Showing 1-10 of 45 products</p>
                            <div class="flex space-x-2" id="products-pagination">
                                <!-- Pagination will be populated here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders Section -->
                <div id="orders-section" class="section-content p-6 hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Orders</h2>
                        <div class="flex space-x-3">
                            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700" onclick="exportOrders()">
                                <i class="fas fa-download mr-2"></i>Export
                            </button>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="showModal('add-order-modal')">
                                <i class="fas fa-plus mr-2"></i>New Order
                            </button>
                        </div>
                    </div>

                    <!-- Order Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Total Orders</p>
                                    <p class="text-2xl font-bold" id="orders-total">1,234</p>
                                </div>
                                <i class="fas fa-shopping-cart text-2xl text-blue-500"></i>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Pending</p>
                                    <p class="text-2xl font-bold text-yellow-600" id="orders-pending">45</p>
                                </div>
                                <i class="fas fa-clock text-2xl text-yellow-500"></i>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Processing</p>
                                    <p class="text-2xl font-bold text-blue-600" id="orders-processing">28</p>
                                </div>
                                <i class="fas fa-cogs text-2xl text-blue-500"></i>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Completed</p>
                                    <p class="text-2xl font-bold text-green-600" id="orders-completed">1,161</p>
                                </div>
                                <i class="fas fa-check-circle text-2xl text-green-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Order Filters -->
                    <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <select class="border border-gray-300 rounded px-3 py-2" id="order-status-filter" onchange="filterOrders()">
                                <option value="">All Orders</option>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <input type="date" class="border border-gray-300 rounded px-3 py-2" id="order-date-from" onchange="filterOrders()">
                            <input type="date" class="border border-gray-300 rounded px-3 py-2" id="order-date-to" onchange="filterOrders()">
                            <input type="text" placeholder="Search orders..." class="border border-gray-300 rounded px-3 py-2" id="order-search" onkeyup="filterOrders()">
                            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" onclick="resetOrderFilters()">
                                <i class="fas fa-undo mr-2"></i>Reset
                            </button>
                        </div>
                    </div>

                    <!-- Orders Table -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Order Management</h3>
                                <div class="flex space-x-2">
                                    <button class="bg-yellow-600 text-white px-3 py-1 rounded text-sm hover:bg-yellow-700" onclick="bulkUpdateOrderStatus()">Bulk Update Status</button>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="text-left p-4 font-medium text-gray-600">
                                                <input type="checkbox" onclick="toggleSelectAllOrders()">
                                            </th>
                                            <th class="text-left p-4 font-medium text-gray-600">Order ID</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Customer</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Date</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Amount</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Status</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders-table">
                                        <!-- Orders will be populated here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        
                        <!-- Pagination -->
                        <div class="flex justify-between items-center p-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600" id="orders-pagination-info">Showing 1-10 of 123 orders</p>
                            <div class="flex space-x-2" id="orders-pagination">
                                <!-- Pagination will be populated here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customers Section -->
                <div id="customers-section" class="section-content p-6 hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Customer Management</h2>
                        <div class="flex space-x-3">
                            <button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700" onclick="exportCustomers()">
                                <i class="fas fa-download mr-2"></i>Export Customers
                            </button>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="sendNewsletter()">
                                <i class="fas fa-envelope mr-2"></i>Send Newsletter
                            </button>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="showModal('add-customer-modal')">
                                <i class="fas fa-user-plus mr-2"></i>Add Customer
                            </button>
                        </div>
                    </div>

                    <!-- Customer Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Total Customers</p>
                                    <p class="text-2xl font-bold" id="customers-total">5,678</p>
                                    <p class="text-sm text-green-600">+15% this month</p>
                                </div>
                                <i class="fas fa-users text-2xl text-purple-500"></i>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">New This Month</p>
                                    <p class="text-2xl font-bold text-blue-600" id="customers-new">234</p>
                                    <p class="text-sm text-blue-600">+8% vs last month</p>
                                </div>
                                <i class="fas fa-user-plus text-2xl text-blue-500"></i>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">VIP Customers</p>
                                    <p class="text-2xl font-bold text-yellow-600" id="customers-vip">89</p>
                                    <p class="text-sm text-yellow-600">High-value clients</p>
                                </div>
                                <i class="fas fa-crown text-2xl text-yellow-500"></i>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600">Newsletter Subs</p>
                                    <p class="text-2xl font-bold text-pink-600" id="newsletter-subs">3,456</p>
                                    <p class="text-sm text-pink-600">61% of customers</p>
                                </div>
                                <i class="fas fa-envelope text-2xl text-pink-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Filters -->
                    <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <select class="border border-gray-300 rounded px-3 py-2" id="customer-type-filter" onchange="filterCustomers()">
                                <option value="">All Customers</option>
                                <option value="vip">VIP</option>
                                <option value="regular">Regular</option>
                                <option value="new">New</option>
                            </select>
                            <select class="border border-gray-300 rounded px-3 py-2" id="customer-status-filter" onchange="filterCustomers()">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <input type="text" placeholder="Search customers..." class="border border-gray-300 rounded px-3 py-2" id="customer-search" onkeyup="filterCustomers()">
                            <input type="text" placeholder="Search by email..." class="border border-gray-300 rounded px-3 py-2" id="customer-email-search" onkeyup="filterCustomers()">
                            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" onclick="resetCustomerFilters()">
                                <i class="fas fa-undo mr-2"></i>Reset
                            </button>
                        </div>
                    </div>

                    <!-- Customers Table -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Customer Directory</h3>
                                <div class="flex space-x-2">
                                    <button class="bg-purple-600 text-white px-3 py-1 rounded text-sm hover:bg-purple-700" onclick="segmentCustomers()">Segment Customers</button>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="text-left p-4 font-medium text-gray-600">
                                                <input type="checkbox" onclick="toggleSelectAllCustomers()">
                                            </th>
                                            <th class="text-left p-4 font-medium text-gray-600">Customer</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Email</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Orders</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Total Spent</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Status</th>
                                            <th class="text-left p-4 font-medium text-gray-600">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="customers-table">
                                        <!-- Customers will be populated here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="flex justify-between items-center p-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600" id="customers-pagination-info">Showing 1-10 of 5,678 customers</p>
                            <div class="flex space-x-2" id="customers-pagination">
                                <!-- Pagination will be populated here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inventory Section -->
                <div id="inventory-section" class="section-content p-6 hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Inventory Management</h2>
                        <div class="flex space-x-3">
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="showLowStockReport()">
                                <i class="fas fa-exclamation-triangle mr-2"></i>Low Stock Report
                            </button>
                            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="bulkUpdateStock()">
                                <i class="fas fa-boxes mr-2"></i>Bulk Update
                            </button>
                        </div>
                    </div>
                    
                    <!-- Inventory Overview -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-4 text-red-600">Critical Stock Items</h3>
                            <div class="space-y-3" id="critical-stock-items">
                                <!-- Critical items will be populated here -->
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-4 text-green-600">Top Selling Items</h3>
                            <div class="space-y-3" id="top-selling-items">
                                <!-- Top selling items will be populated here -->
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-4 text-blue-600">Inventory Value</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span>Total Value</span>
                                    <span class="text-blue-600 font-semibold" id="total-inventory-value">$125,430</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Low Stock Value</span>
                                    <span class="text-red-600 font-semibold" id="low-stock-value">$2,340</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Dead Stock</span>
                                    <span class="text-gray-600 font-semibold" id="dead-stock-value">$890</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inventory Actions -->
                    <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                        <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <button class="bg-blue-600 text-white p-4 rounded-lg hover:bg-blue-700 transition-colors" onclick="generateStockReport()">
                                <i class="fas fa-file-alt text-2xl mb-2"></i>
                                <div class="font-semibold">Stock Report</div>
                            </button>
                            <button class="bg-green-600 text-white p-4 rounded-lg hover:bg-green-700 transition-colors" onclick="restockItems()">
                                <i class="fas fa-plus text-2xl mb-2"></i>
                                <div class="font-semibold">Restock Items</div>
                            </button>
                            <button class="bg-yellow-600 text-white p-4 rounded-lg hover:bg-yellow-700 transition-colors" onclick="adjustInventory()">
                                <i class="fas fa-edit text-2xl mb-2"></i>
                                <div class="font-semibold">Adjust Inventory</div>
                            </button>
                            <button class="bg-purple-600 text-white p-4 rounded-lg hover:bg-purple-700 transition-colors" onclick="setupAlerts()">
                                <i class="fas fa-bell text-2xl mb-2"></i>
                                <div class="font-semibold">Setup Alerts</div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Analytics Section -->
                <div id="analytics-section" class="section-content p-6 hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Analytics & Reports</h2>
                        <div class="flex space-x-3">
                            <select class="border border-gray-300 rounded px-3 py-2" id="analytics-period" onchange="updateAnalytics()">
                                <option value="7days">Last 7 Days</option>
                                <option value="30days">Last 30 Days</option>
                                <option value="90days">Last 90 Days</option>
                                <option value="year">This Year</option>
                            </select>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="exportAnalytics()">
                                <i class="fas fa-download mr-2"></i>Export Report
                            </button>
                        </div>
                    </div>
                    
                    <!-- Analytics Charts -->
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-4">Sales Performance</h3>
                            <div class="chart-container">
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-4">Customer Acquisition</h3>
                            <div class="chart-container">
                                <canvas id="acquisitionChart"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Performance Metrics -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="font-semibold mb-3">Conversion Rate</h4>
                            <div class="text-3xl font-bold text-green-600 mb-2" id="conversion-rate">3.2%</div>
                            <div class="text-sm text-gray-500">+0.5% vs last period</div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 32%"></div>
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="font-semibold mb-3">Average Order Value</h4>
                            <div class="text-3xl font-bold text-blue-600 mb-2" id="avg-order-value">$89.50</div>
                            <div class="text-sm text-gray-500">+$12.30 vs last period</div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 65%"></div>
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="font-semibold mb-3">Customer Lifetime Value</h4>
                            <div class="text-3xl font-bold text-purple-600 mb-2" id="customer-ltv">$456</div>
                            <div class="text-sm text-gray-500">+8.2% vs last period</div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
                                <div class="bg-purple-600 h-2 rounded-full" style="width: 78%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Detailed Analytics -->
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg font-semibold mb-4">Traffic & Behavior Analytics</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600" id="page-views">125,430</div>
                                <div class="text-sm text-gray-600">Page Views</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600" id="unique-visitors">45,678</div>
                                <div class="text-sm text-gray-600">Unique Visitors</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-600" id="bounce-rate">42.3%</div>
                                <div class="text-sm text-gray-600">Bounce Rate</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-pink-600" id="session-duration">3:45</div>
                                <div class="text-sm text-gray-600">Avg Session</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Marketing Section -->
                <div id="marketing-section" class="section-content p-6 hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Marketing Campaigns</h2>
                        <div class="flex space-x-3">
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="createEmailCampaign()">
                                <i class="fas fa-envelope mr-2"></i>Email Campaign
                            </button>
                            <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700" onclick="createSocialCampaign()">
                                <i class="fas fa-share-alt mr-2"></i>Social Campaign
                            </button>
                            <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700" onclick="showModal('add-campaign-modal')">
                                <i class="fas fa-plus mr-2"></i>New Campaign
                            </button>
                        </div>
                    </div>
                    
                    <!-- Marketing Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-sm text-gray-600 mb-2">Email Open Rate</h4>
                            <div class="text-2xl font-bold text-blue-600" id="email-open-rate">24.5%</div>
                            <div class="text-sm text-green-600">+2.1% vs last month</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-sm text-gray-600 mb-2">Click-through Rate</h4>
                            <div class="text-2xl font-bold text-green-600" id="click-through-rate">3.2%</div>
                            <div class="text-sm text-green-600">+0.8% vs last month</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-sm text-gray-600 mb-2">Social Media Reach</h4>
                            <div class="text-2xl font-bold text-purple-600" id="social-reach">45.2K</div>
                            <div class="text-sm text-green-600">+15% vs last month</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-sm text-gray-600 mb-2">Campaign ROI</h4>
                            <div class="text-2xl font-bold text-pink-600" id="campaign-roi">245%</div>
                            <div class="text-sm text-green-600">+32% vs last month</div>
                        </div>
                    </div>
                    
                    <!-- Campaign Management -->
                    <div class="grid lg:grid-cols-2 gap-6">
                        <!-- Active Campaigns -->
                        <div class="bg-white rounded-lg shadow-sm">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold mb-4">Active Campaigns</h3>
                                <div class="space-y-4" id="active-campaigns">
                                    <!-- Active campaigns will be populated here -->
                                </div>
                            </div>
                        </div>
                        
                        <!-- Campaign Performance -->
                        <div class="bg-white rounded-lg shadow-sm">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold mb-4">Performance Overview</h3>
                                <div class="chart-container">
                                    <canvas id="marketingChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Section -->
                <div id="settings-section" class="section-content p-6 hidden">
                    <h2 class="text-2xl font-semibold mb-6">Settings</h2>
                    
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        <!-- Store Settings -->
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-4">Store Settings</h3>
                            <form id="store-settings-form" class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Store Name</label>
                                    <input type="text" id="store-name" value="Boutique Name" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Store Description</label>
                                    <textarea rows="3" id="store-description" class="w-full border border-gray-300 rounded-lg px-3 py-2">Your destination for fashion and style</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Currency</label>
                                    <select id="store-currency" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                        <option value="USD">USD ($)</option>
                                        <option value="EUR">EUR (€)</option>
                                        <option value="GBP">GBP (£)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Time Zone</label>
                                    <select id="store-timezone" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                        <option value="UTC-5">Eastern Time (UTC-5)</option>
                                        <option value="UTC-6">Central Time (UTC-6)</option>
                                        <option value="UTC-7">Mountain Time (UTC-7)</option>
                                        <option value="UTC-8">Pacific Time (UTC-8)</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Notification Settings -->
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-4">Notification Preferences</h3>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="font-medium">Email notifications for new orders</span>
                                        <p class="text-sm text-gray-500">Get notified when new orders are placed</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="notify-new-orders" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-600"></div>
                                    </label>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="font-medium">Low stock alerts</span>
                                        <p class="text-sm text-gray-500">Alert when product stock is running low</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="notify-low-stock" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-600"></div>
                                    </label>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="font-medium">Marketing campaign updates</span>
                                        <p class="text-sm text-gray-500">Updates on campaign performance</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="notify-campaigns" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Settings -->
                    <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                        <h3 class="text-lg font-semibold mb-4">Security Settings</h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-medium mb-3">Change Password</h4>
                                <form class="space-y-3">
                                    <input type="password" placeholder="Current Password" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                    <input type="password" placeholder="New Password" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                    <input type="password" placeholder="Confirm New Password" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                    <button type="button" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="changePassword()">
                                        Update Password
                                    </button>
                                </form>
                            </div>
                            <div>
                                <h4 class="font-medium mb-3">Two-Factor Authentication</h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span>Enable 2FA</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-600"></div>
                                        </label>
                                    </div>
                                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="setup2FA()">
                                        Setup 2FA
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600" onclick="resetSettings()">
                            Reset to Default
                        </button>
                        <button class="bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700" onclick="saveSettings()">
                            Save All Settings
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modals -->
    <!-- Add Product Modal -->
    <div id="add-product-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 modal">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg max-w-4xl w-full max-h-screen overflow-y-auto">
                <div class="p-6 border-b">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold">Add New Product</h2>
                        <button onclick="hideModal('add-product-modal')" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <form id="add-product-form" class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Product Name *</label>
                                <input type="text" id="new-product-name" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">SKU *</label>
                                <input type="text" id="new-product-sku" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Description</label>
                            <textarea rows="3" id="new-product-description" class="w-full border border-gray-300 rounded-lg px-3 py-2"></textarea>
                        </div>
                        <div class="grid md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Price *</label>
                                <input type="number" step="0.01" id="new-product-price" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Stock *</label>
                                <input type="number" id="new-product-stock" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Category *</label>
                                <select id="new-product-category" class="w-full border border-gray-300 rounded-lg px-3 py-2" required>
                                    <option value="">Select Category</option>
                                    <option value="dresses">Dresses</option>
                                    <option value="accessories">Accessories</option>
                                    <option value="shoes">Shoes</option>
                                    <option value="bags">Bags</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Cost Price</label>
                                <input type="number" step="0.01" id="new-product-cost" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Low Stock Alert</label>
                                <input type="number" id="new-product-alert" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="5">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="p-6 border-t flex justify-end space-x-3">
                    <button onclick="hideModal('add-product-modal')" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button onclick="addNewProduct()" class="px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                        Add Product
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Details Modal -->
    <div id="order-details-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 modal">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg max-w-4xl w-full max-h-screen overflow-y-auto">
                <div class="p-6 border-b">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold" id="order-modal-title">Order Details</h2>
                        <button onclick="hideModal('order-details-modal')" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6" id="order-modal-content">
                    <!-- Order details will be populated here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentPage = 1;
        let itemsPerPage = 10;
        let currentSection = 'dashboard';
        let sortDirection = 'asc';
        let sortColumn = '';

        // Sample data for demonstration
        const sampleData = {
            products: [
                {
                    id: 1,
                    name: 'Elegant Evening Dress',
                    sku: 'EED-001',
                    category: 'dresses',
                    price: 129.99,
                    cost: 65.00,
                    stock: 15,
                    lowStockAlert: 5,
                    status: 'active',
                    image: 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80'
                },
                {
                    id: 2,
                    name: 'Designer Handbag',
                    sku: 'DHB-002',
                    category: 'bags',
                    price: 89.99,
                    cost: 45.00,
                    stock: 3,
                    lowStockAlert: 5,
                    status: 'active',
                    image: 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80'
                },
                {
                    id: 3,
                    name: 'Stylish High Heels',
                    sku: 'SHH-003',
                    category: 'shoes',
                    price: 79.99,
                    cost: 40.00,
                    stock: 8,
                    lowStockAlert: 5,
                    status: 'active',
                    image: 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80'
                }
            ],
            orders: [
                {
                    id: 'ORD-001',
                    customer: 'Sarah Wilson',
                    email: 'sarah.wilson@email.com',
                    date: '2024-01-15',
                    amount: 156.00,
                    status: 'delivered',
                    items: [
                        { name: 'Elegant Evening Dress', quantity: 1, price: 129.99 },
                        { name: 'Gold Necklace', quantity: 1, price: 26.01 }
                    ]
                },
                {
                    id: 'ORD-002',
                    customer: 'Emma Davis',
                    email: 'emma.davis@email.com',
                    date: '2024-01-16',
                    amount: 89.50,
                    status: 'processing',
                    items: [
                        { name: 'Designer Handbag', quantity: 1, price: 89.50 }
                    ]
                }
            ],
            customers: [
                {
                    id: 1,
                    name: 'Sarah Wilson',
                    email: 'sarah.wilson@email.com',
                    orders: 15,
                    totalSpent: 2345.00,
                    status: 'vip',
                    joinDate: '2023-01-15',
                    avatar: 'https://images.unsplash.com/photo-1494790108755-2616c999c8c6?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80'
                },
                {
                    id: 2,
                    name: 'Emma Davis',
                    email: 'emma.davis@email.com',
                    orders: 8,
                    totalSpent: 890.50,
                    status: 'regular',
                    joinDate: '2023-06-20',
                    avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80'
                }
            ],
            notifications: [
                {
                    id: 1,
                    type: 'order',
                    message: 'New order received from Sarah Wilson',
                    time: '2 minutes ago',
                    read: false
                },
                {
                    id: 2,
                    type: 'stock',
                    message: 'Designer Handbag is running low on stock',
                    time: '1 hour ago',
                    read: false
                },
                {
                    id: 3,
                    type: 'marketing',
                    message: 'Summer Sale campaign performance update',
                    time: '3 hours ago',
                    read: true
                }
            ]
        };

        // Navigation functionality
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.section-content').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.remove('hidden');
            document.getElementById(sectionId).classList.add('fade-in');
            
            // Update page title
            const titles = {
                'dashboard-section': 'Dashboard',
                'products-section': 'Products',
                'orders-section': 'Orders',
                'customers-section': 'Customers',
                'inventory-section': 'Inventory',
                'analytics-section': 'Analytics',
                'marketing-section': 'Marketing',
                'settings-section': 'Settings'
            };
            
            document.getElementById('page-title').textContent = titles[sectionId];
            currentSection = sectionId.replace('-section', '');
            
            // Load section-specific data
            loadSectionData(currentSection);
        }

        // Load data for specific sections
        function loadSectionData(section) {
            switch(section) {
                case 'dashboard':
                    loadDashboardData();
                    break;
                case 'products':
                    loadProductsData();
                    break;
                case 'orders':
                    loadOrdersData();
                    break;
                case 'customers':
                    loadCustomersData();
                    break;
                case 'inventory':
                    loadInventoryData();
                    break;
                case 'analytics':
                    loadAnalyticsData();
                    break;
                case 'marketing':
                    loadMarketingData();
                    break;
            }
        }

        // Dashboard data loading
        function loadDashboardData() {
            initializeDashboardCharts();
            // Load recent orders
            const recentOrdersTable = document.getElementById('recent-orders-table');
            recentOrdersTable.innerHTML = sampleData.orders.slice(0, 5).map(order => `
                <tr class="border-b border-gray-100">
                    <td class="p-3 font-medium text-blue-600 cursor-pointer" onclick="viewOrder('${order.id}')">${order.id}</td>
                    <td class="p-3">${order.customer}</td>
                    <td class="p-3">${order.amount.toFixed(2)}</td>
                    <td class="p-3"><span class="status-badge ${getStatusColor(order.status)}">${order.status}</span></td>
                    <td class="p-3">
                        <button class="text-blue-600 hover:underline mr-2" onclick="viewOrder('${order.id}')">View</button>
                        <button class="text-gray-600 hover:underline" onclick="editOrder('${order.id}')">Edit</button>
                    </td>
                </tr>
            `).join('');

            // Load low stock alerts
            const lowStockAlerts = document.getElementById('low-stock-alerts');
            const lowStockItems = sampleData.products.filter(p => p.stock <= p.lowStockAlert);
            lowStockAlerts.innerHTML = lowStockItems.map(item => `
                <div class="flex items-center justify-between p-3 ${item.stock <= 2 ? 'bg-red-50' : 'bg-yellow-50'} rounded-lg">
                    <div>
                        <p class="font-medium">${item.name}</p>
                        <p class="text-sm text-gray-600">Only ${item.stock} left</p>
                    </div>
                    <i class="fas fa-exclamation-triangle ${item.stock <= 2 ? 'text-red-500' : 'text-yellow-500'}"></i>
                </div>
            `).join('');
        }

        // Products data loading
        function loadProductsData() {
            const productsTable = document.getElementById('products-table');
            productsTable.innerHTML = sampleData.products.map(product => `
                <tr class="border-b border-gray-100">
                    <td class="p-4">
                        <input type="checkbox" class="product-checkbox" value="${product.id}">
                    </td>
                    <td class="p-4">
                        <div class="flex items-center space-x-3">
                            <img src="${product.image}" alt="Product" class="w-12 h-12 object-cover rounded">
                            <div>
                                <p class="font-medium">${product.name}</p>
                                <p class="text-sm text-gray-500">${product.category}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 font-mono text-sm">${product.sku}</td>
                    <td class="p-4 capitalize">${product.category}</td>
                    <td class="p-4 font-semibold">${product.price.toFixed(2)}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 rounded-full text-xs ${product.stock <= product.lowStockAlert ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800'}">
                            ${product.stock} in stock
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="status-badge ${product.status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'}">${product.status}</span>
                    </td>
                    <td class="p-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:underline" onclick="editProduct(${product.id})">Edit</button>
                            <button class="text-red-600 hover:underline" onclick="deleteProduct(${product.id})">Delete</button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        // Orders data loading
        function loadOrdersData() {
            const ordersTable = document.getElementById('orders-table');
            ordersTable.innerHTML = sampleData.orders.map(order => `
                <tr class="border-b border-gray-100">
                    <td class="p-4">
                        <input type="checkbox" class="order-checkbox" value="${order.id}">
                    </td>
                    <td class="p-4 font-medium text-blue-600 cursor-pointer" onclick="viewOrder('${order.id}')">${order.id}</td>
                    <td class="p-4">
                        <div>
                            <p class="font-medium">${order.customer}</p>
                            <p class="text-sm text-gray-500">${order.email}</p>
                        </div>
                    </td>
                    <td class="p-4">${order.date}</td>
                    <td class="p-4 font-semibold">${order.amount.toFixed(2)}</td>
                    <td class="p-4">
                        <select class="status-badge ${getStatusColor(order.status)} border-none bg-transparent" onchange="updateOrderStatus('${order.id}', this.value)">
                            <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>Pending</option>
                            <option value="processing" ${order.status === 'processing' ? 'selected' : ''}>Processing</option>
                            <option value="shipped" ${order.status === 'shipped' ? 'selected' : ''}>Shipped</option>
                            <option value="delivered" ${order.status === 'delivered' ? 'selected' : ''}>Delivered</option>
                            <option value="cancelled" ${order.status === 'cancelled' ? 'selected' : ''}>Cancelled</option>
                        </select>
                    </td>
                    <td class="p-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:underline" onclick="viewOrder('${order.id}')">View</button>
                            <button class="text-gray-600 hover:underline" onclick="editOrder('${order.id}')">Edit</button>
                            <button class="text-green-600 hover:underline" onclick="trackOrder('${order.id}')">Track</button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        // Customers data loading
        function loadCustomersData() {
            const customersTable = document.getElementById('customers-table');
            customersTable.innerHTML = sampleData.customers.map(customer => `
                <tr class="border-b border-gray-100">
                    <td class="p-4">
                        <input type="checkbox" class="customer-checkbox" value="${customer.id}">
                    </td>
                    <td class="p-4">
                        <div class="flex items-center space-x-3">
                            <img src="${customer.avatar}" alt="Customer" class="w-10 h-10 rounded-full">
                            <div>
                                <p class="font-medium">${customer.name}</p>
                                <p class="text-sm text-gray-500">Joined ${customer.joinDate}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">${customer.email}</td>
                    <td class="p-4">${customer.orders} orders</td>
                    <td class="p-4 font-semibold">${customer.totalSpent.toFixed(2)}</td>
                    <td class="p-4">
                        <span class="status-badge ${customer.status === 'vip' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800'}">${customer.status.toUpperCase()}</span>
                    </td>
                    <td class="p-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:underline" onclick="viewCustomer(${customer.id})">View</button>
                            <button class="text-green-600 hover:underline" onclick="emailCustomer('${customer.email}')">Email</button>
                            <button class="text-gray-600 hover:underline" onclick="editCustomer(${customer.id})">Edit</button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        // Inventory data loading
        function loadInventoryData() {
            // Critical stock items
            const criticalStockItems = document.getElementById('critical-stock-items');
            const criticalItems = sampleData.products.filter(p => p.stock <= 2);
            criticalStockItems.innerHTML = criticalItems.map(item => `
                <div class="flex justify-between items-center">
                    <span>${item.name}</span>
                    <span class="text-red-600 font-semibold">${item.stock} left</span>
                </div>
            `).join('');

            // Top selling items (mock data)
            const topSellingItems = document.getElementById('top-selling-items');
            topSellingItems.innerHTML = `
                <div class="flex justify-between items-center">
                    <span>Casual Dress</span>
                    <span class="text-green-600 font-semibold">45 sold</span>
                </div>
                <div class="flex justify-between items-center">
                    <span>High Heels</span>
                    <span class="text-green-600 font-semibold">32 sold</span>
                </div>
                <div class="flex justify-between items-center">
                    <span>Gold Necklace</span>
                    <span class="text-green-600 font-semibold">28 sold</span>
                </div>
            `;
        }

        // Analytics data loading
        function loadAnalyticsData() {
            // This would typically load real analytics data
            // For demo purposes, we'll use the existing charts
            initializeAnalyticsCharts();
        }

        // Marketing data loading
        function loadMarketingData() {
            initializeMarketingChart();
            const activeCampaigns = document.getElementById('active-campaigns');
            activeCampaigns.innerHTML = `
                <div class="flex justify-between items-center p-4 border rounded-lg">
                    <div>
                        <h4 class="font-medium">Summer Sale 2024</h4>
                        <p class="text-sm text-gray-500">Email Campaign • Started 3 days ago</p>
                        <div class="mt-2">
                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">Open Rate: 28.5%</span>
                            <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded ml-1">CTR: 4.2%</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="font-semibold">$12,450</p>
                            <p class="text-sm text-gray-500">Revenue</p>
                        </div>
                        <span class="status-badge bg-green-100 text-green-800">Active</span>
                        <div class="flex flex-col space-y-1">
                            <button class="text-blue-600 hover:underline text-sm" onclick="viewCampaign('summer-sale-2024')">View</button>
                            <button class="text-gray-600 hover:underline text-sm" onclick="pauseCampaign('summer-sale-2024')">Pause</button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center p-4 border rounded-lg">
                    <div>
                        <h4 class="font-medium">New Collection Launch</h4>
                        <p class="text-sm text-gray-500">Social Media Campaign • Started 1 week ago</p>
                        <div class="mt-2">
                            <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded">Reach: 45.2K</span>
                            <span class="text-xs bg-pink-100 text-pink-800 px-2 py-1 rounded ml-1">Engagement: 6.8%</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="font-semibold">$8,920</p>
                            <p class="text-sm text-gray-500">Revenue</p>
                        </div>
                        <span class="status-badge bg-green-100 text-green-800">Active</span>
                        <div class="flex flex-col space-y-1">
                            <button class="text-blue-600 hover:underline text-sm" onclick="viewCampaign('new-collection-launch')">View</button>
                            <button class="text-gray-600 hover:underline text-sm" onclick="pauseCampaign('new-collection-launch')">Pause</button>
                        </div>
                    </div>
                </div>
            `;
        }

        // Sidebar navigation
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                document.querySelectorAll('.nav-link').forEach(l => {
                    l.classList.remove('active', 'bg-pink-600');
                    l.classList.add('hover:bg-gray-700');
                });
                
                // Add active class to clicked link
                this.classList.add('active', 'bg-pink-600');
                this.classList.remove('hover:bg-gray-700');
                
                // Show corresponding section
                const section = this.dataset.section + '-section';
                showSection(section);
            });
        });

        // Toggle sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        }

        // Modal functions
        function showModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function hideModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Notifications
        function toggleNotifications() {
            const dropdown = document.getElementById('notifications-dropdown');
            dropdown.classList.toggle('show');
            
            if (dropdown.classList.contains('show')) {
                loadNotifications();
            }
        }

        function loadNotifications() {
            const notificationsList = document.getElementById('notifications-list');
            notificationsList.innerHTML = sampleData.notifications.map(notification => `
                <div class="p-3 ${notification.read ? 'bg-gray-50' : 'bg-blue-50'} border-b hover:bg-gray-100 cursor-pointer" onclick="markAsRead(${notification.id})">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 rounded-full ${getNotificationColor(notification.type)} flex items-center justify-center">
                            <i class="fas ${getNotificationIcon(notification.type)} text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium">${notification.message}</p>
                            <p class="text-xs text-gray-500">${notification.time}</p>
                        </div>
                        ${!notification.read ? '<div class="w-2 h-2 bg-blue-600 rounded-full"></div>' : ''}
                    </div>
                </div>
            `).join('');
        }

        function markAsRead(notificationId) {
            const notification = sampleData.notifications.find(n => n.id === notificationId);
            if (notification) {
                notification.read = true;
                loadNotifications();
                updateNotificationCount();
            }
        }

        function markAllAsRead() {
            sampleData.notifications.forEach(n => n.read = true);
            loadNotifications();
            updateNotificationCount();
        }

        function updateNotificationCount() {
            const unreadCount = sampleData.notifications.filter(n => !n.read).length;
            document.getElementById('notification-count').textContent = unreadCount;
        }

        // Product functions
        function addNewProduct() {
            const form = document.getElementById('add-product-form');
            const formData = new FormData(form);
            
            const newProduct = {
                id: sampleData.products.length + 1,
                name: document.getElementById('new-product-name').value,
                sku: document.getElementById('new-product-sku').value,
                category: document.getElementById('new-product-category').value,
                price: parseFloat(document.getElementById('new-product-price').value),
                cost: parseFloat(document.getElementById('new-product-cost').value) || 0,
                stock: parseInt(document.getElementById('new-product-stock').value),
                lowStockAlert: parseInt(document.getElementById('new-product-alert').value) || 5,
                status: 'active',
                image: 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80'
            };
            
            if (validateProductForm(newProduct)) {
                sampleData.products.push(newProduct);
                showNotification('Product added successfully!', 'success');
                hideModal('add-product-modal');
                form.reset();
                if (currentSection === 'products') {
                    loadProductsData();
                }
                updateStats();
            }
        }

        function validateProductForm(product) {
            if (!product.name || !product.sku || !product.category || !product.price || !product.stock) {
                showNotification('Please fill in all required fields', 'error');
                return false;
            }
            
            // Check for duplicate SKU
            if (sampleData.products.some(p => p.sku === product.sku && p.id !== product.id)) {
                showNotification('SKU already exists', 'error');
                return false;
            }
            
            return true;
        }

        function editProduct(productId) {
            const product = sampleData.products.find(p => p.id === productId);
            if (product) {
                // Populate form with existing data
                document.getElementById('new-product-name').value = product.name;
                document.getElementById('new-product-sku').value = product.sku;
                document.getElementById('new-product-category').value = product.category;
                document.getElementById('new-product-price').value = product.price;
                document.getElementById('new-product-cost').value = product.cost;
                document.getElementById('new-product-stock').value = product.stock;
                document.getElementById('new-product-alert').value = product.lowStockAlert;
                
                showModal('add-product-modal');
                
                // Change modal title and button
                document.querySelector('#add-product-modal h2').textContent = 'Edit Product';
                document.querySelector('#add-product-modal button[onclick="addNewProduct()"]').setAttribute('onclick', `updateProduct(${productId})`);
                document.querySelector('#add-product-modal button[onclick="addNewProduct()"]').textContent = 'Update Product';
            }
        }

        function updateProduct(productId) {
            const productIndex = sampleData.products.findIndex(p => p.id === productId);
            if (productIndex !== -1) {
                const updatedProduct = {
                    ...sampleData.products[productIndex],
                    name: document.getElementById('new-product-name').value,
                    sku: document.getElementById('new-product-sku').value,
                    category: document.getElementById('new-product-category').value,
                    price: parseFloat(document.getElementById('new-product-price').value),
                    cost: parseFloat(document.getElementById('new-product-cost').value) || 0,
                    stock: parseInt(document.getElementById('new-product-stock').value),
                    lowStockAlert: parseInt(document.getElementById('new-product-alert').value) || 5
                };
                
                if (validateProductForm(updatedProduct)) {
                    sampleData.products[productIndex] = updatedProduct;
                    showNotification('Product updated successfully!', 'success');
                    hideModal('add-product-modal');
                    loadProductsData();
                    updateStats();
                    
                    // Reset modal
                    document.querySelector('#add-product-modal h2').textContent = 'Add New Product';
                    document.querySelector('#add-product-modal button[onclick^="updateProduct"]').setAttribute('onclick', 'addNewProduct()');
                    document.querySelector('#add-product-modal button[onclick^="updateProduct"]').textContent = 'Add Product';
                }
            }
        }

        function deleteProduct(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                const productIndex = sampleData.products.findIndex(p => p.id === productId);
                if (productIndex !== -1) {
                    sampleData.products.splice(productIndex, 1);
                    showNotification('Product deleted successfully!', 'success');
                    loadProductsData();
                    updateStats();
                }
            }
        }

        // Order functions
        function viewOrder(orderId) {
            const order = sampleData.orders.find(o => o.id === orderId);
            if (order) {
                document.getElementById('order-modal-title').textContent = `Order ${orderId}`;
                document.getElementById('order-modal-content').innerHTML = `
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Order Information</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Order ID:</span>
                                    <span class="font-medium">${order.id}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Date:</span>
                                    <span class="font-medium">${order.date}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="status-badge ${getStatusColor(order.status)}">${order.status}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total:</span>
                                    <span class="font-bold text-lg">${order.amount.toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Customer Information</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Name:</span>
                                    <span class="font-medium">${order.customer}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Email:</span>
                                    <span class="font-medium">${order.email}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-4">Order Items</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full border">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="text-left p-3 font-medium text-gray-600">Product</th>
                                        <th class="text-left p-3 font-medium text-gray-600">Quantity</th>
                                        <th class="text-left p-3 font-medium text-gray-600">Price</th>
                                        <th class="text-left p-3 font-medium text-gray-600">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${order.items.map(item => `
                                        <tr class="border-b">
                                            <td class="p-3">${item.name}</td>
                                            <td class="p-3">${item.quantity}</td>
                                            <td class="p-3">${item.price.toFixed(2)}</td>
                                            <td class="p-3">${(item.quantity * item.price).toFixed(2)}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-3">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700" onclick="printOrder('${order.id}')">
                            <i class="fas fa-print mr-2"></i>Print
                        </button>
                        <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="emailInvoice('${order.id}')">
                            <i class="fas fa-envelope mr-2"></i>Email Invoice
                        </button>
                    </div>
                `;
                showModal('order-details-modal');
            }
        }

        function updateOrderStatus(orderId, newStatus) {
            const order = sampleData.orders.find(o => o.id === orderId);
            if (order) {
                order.status = newStatus;
                showNotification(`Order ${orderId} status updated to ${newStatus}`, 'success');
                
                // Add notification
                sampleData.notifications.unshift({
                    id: Date.now(),
                    type: 'order',
                    message: `Order ${orderId} status changed to ${newStatus}`,
                    time: 'Just now',
                    read: false
                });
                updateNotificationCount();
            }
        }

        // Filter functions
        function filterProducts() {
            const category = document.getElementById('category-filter').value;
            const status = document.getElementById('status-filter').value;
            const price = document.getElementById('price-filter').value;
            const search = document.getElementById('product-search').value.toLowerCase();
            
            let filteredProducts = sampleData.products.filter(product => {
                let matches = true;
                
                if (category && product.category !== category) matches = false;
                if (status && product.status !== status) matches = false;
                if (search && !product.name.toLowerCase().includes(search) && !product.sku.toLowerCase().includes(search)) matches = false;
                
                if (price) {
                    const [min, max] = price.split('-').map(p => p.replace('+', ''));
                    if (max) {
                        if (product.price < parseInt(min) || product.price > parseInt(max)) matches = false;
                    } else {
                        if (product.price < parseInt(min)) matches = false;
                    }
                }
                
                return matches;
            });
            
            // Update table with filtered results
            const productsTable = document.getElementById('products-table');
            productsTable.innerHTML = filteredProducts.map(product => `
                <tr class="border-b border-gray-100">
                    <td class="p-4">
                        <input type="checkbox" class="product-checkbox" value="${product.id}">
                    </td>
                    <td class="p-4">
                        <div class="flex items-center space-x-3">
                            <img src="${product.image}" alt="Product" class="w-12 h-12 object-cover rounded">
                            <div>
                                <p class="font-medium">${product.name}</p>
                                <p class="text-sm text-gray-500">${product.category}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 font-mono text-sm">${product.sku}</td>
                    <td class="p-4 capitalize">${product.category}</td>
                    <td class="p-4 font-semibold">${product.price.toFixed(2)}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 rounded-full text-xs ${product.stock <= product.lowStockAlert ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800'}">
                            ${product.stock} in stock
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="status-badge ${product.status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'}">${product.status}</span>
                    </td>
                    <td class="p-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:underline" onclick="editProduct(${product.id})">Edit</button>
                            <button class="text-red-600 hover:underline" onclick="deleteProduct(${product.id})">Delete</button>
                        </div>
                    </td>
                </tr>
            `).join('');
            
            // Update pagination info
            document.getElementById('products-pagination-info').textContent = `Showing 1-${filteredProducts.length} of ${filteredProducts.length} products`;
        }

        // Bulk operations
        function toggleSelectAll() {
            const selectAll = document.getElementById('select-all-products');
            const checkboxes = document.querySelectorAll('.product-checkbox');
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
            
            updateSelectedCount();
        }

        function updateSelectedCount() {
            const selectedCheckboxes = document.querySelectorAll('.product-checkbox:checked');
            const count = selectedCheckboxes.length;
            
            document.getElementById('selected-count').textContent = `${count} selected`;
            
            const bulkActions = document.getElementById('bulk-actions');
            if (count > 0) {
                bulkActions.classList.remove('hidden');
            } else {
                bulkActions.classList.add('hidden');
            }
        }

        function bulkDeleteProducts() {
            const selectedIds = Array.from(document.querySelectorAll('.product-checkbox:checked')).map(cb => parseInt(cb.value));
            
            if (selectedIds.length === 0) {
                showNotification('No products selected', 'error');
                return;
            }
            
            if (confirm(`Are you sure you want to delete ${selectedIds.length} products?`)) {
                selectedIds.forEach(id => {
                    const index = sampleData.products.findIndex(p => p.id === id);
                    if (index !== -1) {
                        sampleData.products.splice(index, 1);
                    }
                });
                
                showNotification(`${selectedIds.length} products deleted successfully!`, 'success');
                loadProductsData();
                updateStats();
            }
        }

        // Export functions
        function exportProducts() {
            const csvContent = "data:text/csv;charset=utf-8," 
                + "Name,SKU,Category,Price,Stock,Status
"
                + sampleData.products.map(p => `"${p.name}","${p.sku}","${p.category}",${p.price},${p.stock},"${p.status}"`).join('
');
            
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "products.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            showNotification('Products exported successfully!', 'success');
        }

        function exportOrders() {
            const csvContent = "data:text/csv;charset=utf-8," 
                + "Order ID,Customer,Email,Date,Amount,Status 
"
                + sampleData.orders.map(o => `"${o.id}","${o.customer}","${o.email}","${o.date}",${o.amount},"${o.status}"`).join('
');
            
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "orders.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            showNotification('Orders exported successfully!', 'success');
        }

        // Utility functions
        function getStatusColor(status) {
            const colors = {
                'pending': 'bg-yellow-100 text-yellow-800',
                'processing': 'bg-blue-100 text-blue-800',
                'shipped': 'bg-purple-100 text-purple-800',
                'delivered': 'bg-green-100 text-green-800',
                'cancelled': 'bg-red-100 text-red-800',
                'active': 'bg-green-100 text-green-800',
                'inactive': 'bg-gray-100 text-gray-800'
            };
            return colors[status] || 'bg-gray-100 text-gray-800';
        }

        function getNotificationColor(type) {
            const colors = {
                'order': 'bg-blue-600',
                'stock': 'bg-red-600',
                'marketing': 'bg-purple-600'
            };
            return colors[type] || 'bg-gray-600';
        }

        function getNotificationIcon(type) {
            const icons = {
                'order': 'fa-shopping-cart',
                'stock': 'fa-exclamation-triangle',
                'marketing': 'fa-bullhorn'
            };
            return icons[type] || 'fa-bell';
        }

        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const bgColor = type === 'error' ? 'bg-red-500' : type === 'info' ? 'bg-blue-500' : 'bg-green-500';
            const icon = type === 'error' ? 'fa-exclamation-triangle' : type === 'info' ? 'fa-info-circle' : 'fa-check-circle';
            
            notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-all duration-300 max-w-sm`;
            notification.innerHTML = `
                <div class="flex items-start">
                    <i class="fas ${icon} mr-3 mt-1"></i>
                    <span class="text-sm">${message}</span>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 5000);
        }

        function updateStats() {
            // Update dashboard stats
            document.getElementById('total-products').textContent = sampleData.products.length;
            document.getElementById('total-orders').textContent = sampleData.orders.length;
            document.getElementById('total-customers').textContent = sampleData.customers.length;
            
            // Update low stock count
            const lowStockCount = sampleData.products.filter(p => p.stock <= p.lowStockAlert).length;
            document.getElementById('low-stock-count').textContent = lowStockCount;
            
            // Update pending orders count
            const pendingOrders = sampleData.orders.filter(o => o.status === 'pending').length;
            document.getElementById('pending-orders-count').textContent = pendingOrders;
        }

        // Chart initialization
        function initializeDashboardCharts() {
            if(window.revenueChart) window.revenueChart.destroy();
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            window.revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Revenue',
                        data: [12000, 19000, 15000, 25000, 22000, 30000],
                        borderColor: '#ec4899',
                        backgroundColor: 'rgba(236, 72, 153, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });

            if(window.categoryChart) window.categoryChart.destroy();
            const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            window.categoryChart = new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Dresses', 'Bags', 'Shoes', 'Accessories'],
                    datasets: [{
                        data: [40, 25, 20, 15],
                        backgroundColor: ['#ec4899', '#8b5cf6', '#3b82f6', '#10b981'],
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        }

        function initializeAnalyticsCharts() {
            if(window.salesChart) window.salesChart.destroy();
            const salesCtx = document.getElementById('salesChart').getContext('2d');
            window.salesChart = new Chart(salesCtx, {
                type: 'bar',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'Sales',
                        data: [150, 230, 310, 280],
                        backgroundColor: '#3b82f6',
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });

            if(window.acquisitionChart) window.acquisitionChart.destroy();
            const acquisitionCtx = document.getElementById('acquisitionChart').getContext('2d');
            window.acquisitionChart = new Chart(acquisitionCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Organic',
                        data: [150, 200, 300, 250, 400, 450],
                        borderColor: '#10b981',
                        fill: false,
                    }, {
                        label: 'Paid',
                        data: [100, 150, 200, 180, 250, 300],
                        borderColor: '#f59e0b',
                        fill: false,
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        }

        function initializeMarketingChart() {
            if(window.marketingChart) window.marketingChart.destroy();
            const marketingCtx = document.getElementById('marketingChart').getContext('2d');
            window.marketingChart = new Chart(marketingCtx, {
                type: 'radar',
                data: {
                    labels: ['Email', 'Social Media', 'Affiliate', 'SEO', 'PPC'],
                    datasets: [{
                        label: 'Effectiveness',
                        data: [70, 85, 60, 75, 90],
                        backgroundColor: 'rgba(139, 92, 246, 0.2)',
                        borderColor: '#8b5cf6',
                        pointBackgroundColor: '#8b5cf6',
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            showSection('dashboard-section');
            updateStats();
            updateNotificationCount();
        });
    </script>
</body>
</html>