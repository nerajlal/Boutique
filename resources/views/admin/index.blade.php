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
@include('admin.sidebar')

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

@include('admin.footer')