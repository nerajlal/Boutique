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

            showSection('dashboard-section');
            updateStats();
            updateNotificationCount();
        });
    </script>
</body>
</html>
