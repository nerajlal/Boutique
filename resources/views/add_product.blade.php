<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product - Boutique Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.6s ease-out; }

        /* File upload styling */
        .file-upload-area {
            border: 2px dashed #d1d5db;
            transition: all 0.3s ease;
        }
        .file-upload-area:hover {
            border-color: #ec4899;
            background-color: #fdf2f8;
        }
        .file-upload-area.dragover {
            border-color: #ec4899;
            background-color: #fdf2f8;
        }

        /* Color picker styling */
        .color-picker {
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }

        /* Rich text editor placeholder */
        .rich-editor {
            min-height: 120px;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 0.75rem;
        }

        /* Tag input styling */
        .tag {
            background: #ec4899;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            margin: 0.125rem;
        }

        /* Form section styling */
        .form-section {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            padding: 1.5rem;
        }

        /* Preview styles */
        .preview-image {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
        }

        /* Custom checkbox and radio styles */
        .custom-checkbox {
            appearance: none;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid #d1d5db;
            border-radius: 0.25rem;
            position: relative;
        }
        .custom-checkbox:checked {
            background-color: #ec4899;
            border-color: #ec4899;
        }
        .custom-checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 0.875rem;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <nav class="flex justify-between items-center py-4">
                <div class="text-2xl font-bold text-pink-600">
                    <i class="fas fa-gem mr-2"></i>BOUTIQUE ADMIN
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                        <i class="fas fa-eye mr-2"></i>Preview
                    </button>
                    <button class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition-colors" onclick="saveProduct()">
                        <i class="fas fa-save mr-2"></i>Save Product
                    </button>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Add New Product</h1>
            <p class="text-gray-600">Fill in the details below to add a new product to your boutique.</p>
        </div>

        <form id="product-form" class="grid lg:grid-cols-3 gap-8">
            <!-- Left Column - Main Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="form-section">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-info-circle text-pink-600 mr-2"></i>
                        Basic Information
                    </h2>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                            <input type="text" id="product-name" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                   placeholder="e.g., Elegant Evening Dress">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product SKU *</label>
                            <input type="text" id="product-sku" required 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                   placeholder="e.g., EED-001">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Short Description *</label>
                        <input type="text" id="short-description" required 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                               placeholder="e.g., Perfect for special occasions">
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Detailed Description *</label>
                        <div class="rich-editor" contenteditable="true" id="detailed-description"
                             data-placeholder="Enter detailed product description...">
                        </div>
                        <div class="mt-2 flex space-x-2">
                            <button type="button" onclick="formatText('bold')" class="px-2 py-1 bg-gray-200 rounded text-sm hover:bg-gray-300">
                                <i class="fas fa-bold"></i>
                            </button>
                            <button type="button" onclick="formatText('italic')" class="px-2 py-1 bg-gray-200 rounded text-sm hover:bg-gray-300">
                                <i class="fas fa-italic"></i>
                            </button>
                            <button type="button" onclick="formatText('insertUnorderedList')" class="px-2 py-1 bg-gray-200 rounded text-sm hover:bg-gray-300">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pricing & Stock -->
                <div class="form-section">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-dollar-sign text-pink-600 mr-2"></i>
                        Pricing & Stock
                    </h2>
                    
                    <div class="grid md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Regular Price *</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500">$</span>
                                <input type="number" id="regular-price" required step="0.01" 
                                       class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                       placeholder="0.00">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sale Price</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500">$</span>
                                <input type="number" id="sale-price" step="0.01" 
                                       class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                       placeholder="0.00">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label>
                            <input type="number" id="stock-quantity" required min="0" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                   placeholder="0">
                        </div>
                    </div>

                    <div class="mt-4 grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cost Price</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500">$</span>
                                <input type="number" id="cost-price" step="0.01" 
                                       class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                       placeholder="0.00">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Low Stock Alert</label>
                            <input type="number" id="low-stock-alert" min="0" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                   placeholder="5">
                        </div>
                    </div>
                </div>

                <!-- Product Variants -->
                <div class="form-section">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-palette text-pink-600 mr-2"></i>
                        Product Variants
                    </h2>
                    
                    <!-- Colors -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Available Colors</label>
                        <div class="flex flex-wrap gap-3 mb-3" id="selected-colors">
                            <!-- Selected colors will appear here -->
                        </div>
                        <div class="flex items-center space-x-3">
                            <input type="color" id="color-picker" class="color-picker" value="#000000">
                            <input type="text" id="color-name" placeholder="Color name" 
                                   class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                            <button type="button" onclick="addColor()" 
                                    class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition-colors">
                                Add Color
                            </button>
                        </div>
                    </div>

                    <!-- Sizes -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Available Sizes</label>
                        <div class="grid grid-cols-6 md:grid-cols-12 gap-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="XXS">
                                <span class="text-sm">XXS</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="XS">
                                <span class="text-sm">XS</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="S">
                                <span class="text-sm">S</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="M">
                                <span class="text-sm">M</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="L">
                                <span class="text-sm">L</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="XL">
                                <span class="text-sm">XL</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="XXL">
                                <span class="text-sm">XXL</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="XXXL">
                                <span class="text-sm">XXXL</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="One Size">
                                <span class="text-sm">One Size</span>
                            </label>
                        </div>
                        <div class="mt-3">
                            <button type="button" onclick="toggleCustomSizes()" 
                                    class="text-pink-600 hover:underline text-sm">
                                + Add Custom Sizes
                            </button>
                            <div id="custom-sizes" class="hidden mt-3">
                                <div class="flex items-center space-x-2">
                                    <input type="text" id="custom-size-input" placeholder="Enter custom size" 
                                           class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                                    <button type="button" onclick="addCustomSize()" 
                                            class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition-colors">
                                        Add
                                    </button>
                                </div>
                                <div id="custom-size-list" class="mt-2 flex flex-wrap gap-2">
                                    <!-- Custom sizes will appear here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Specifications -->
                <div class="form-section">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-clipboard-list text-pink-600 mr-2"></i>
                        Specifications
                    </h2>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Material</label>
                            <input type="text" id="material" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                   placeholder="e.g., 95% Polyester, 5% Elastane">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Care Instructions</label>
                            <input type="text" id="care-instructions" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                   placeholder="e.g., Machine wash cold, hang dry">
                        </div>
                    </div>

                    <div class="mt-4 grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Weight (grams)</label>
                            <input type="number" id="weight" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                   placeholder="0">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Dimensions (L x W x H cm)</label>
                            <input type="text" id="dimensions" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                                   placeholder="e.g., 30 x 20 x 5">
                        </div>
                    </div>

                    <!-- Key Features -->
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Key Features</label>
                        <div id="features-list" class="space-y-2">
                            <div class="flex items-center space-x-2">
                                <input type="text" placeholder="Enter a key feature" 
                                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                                <button type="button" onclick="removeFeature(this)" 
                                        class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" onclick="addFeature()" 
                                class="mt-2 text-pink-600 hover:underline text-sm">
                            + Add Another Feature
                        </button>
                    </div>
                </div>

                <!-- SEO & Tags -->
                <!--  -->
            </div>

            <!-- Right Column - Images & Categories -->
            <div class="space-y-6">
                <!-- Product Images -->
                <div class="form-section">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-images text-pink-600 mr-2"></i>
                        Product Images
                    </h2>
                    
                    <!-- Main Image Upload -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Main Product Image *</label>
                        <div class="file-upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 text-center"
                             ondrop="handleDrop(event, 'main')" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                            <div id="main-upload-content">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                <p class="text-gray-600 mb-2">Drag & drop your main image here</p>
                                <p class="text-sm text-gray-500 mb-3">or</p>
                                <button type="button" onclick="document.getElementById('main-image-input').click()" 
                                        class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition-colors">
                                    Browse Files
                                </button>
                                <input type="file" id="main-image-input" accept="image/*" class="hidden" onchange="handleFileSelect(event, 'main')">
                            </div>
                            <div id="main-preview" class="hidden">
                                <img id="main-preview-img" class="w-full h-48 object-cover rounded-lg">
                                <button type="button" onclick="removeImage('main')" 
                                        class="mt-2 text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash mr-1"></i>Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Images Upload -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Additional Images</label>
                        <div class="file-upload-area border-2 border-dashed border-gray-300 rounded-lg p-6 text-center"
                             ondrop="handleDrop(event, 'gallery')" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                            <div id="gallery-upload-content">
                                <i class="fas fa-images text-3xl text-gray-400 mb-2"></i>
                                <p class="text-gray-600 mb-2">Add more product images</p>
                                <button type="button" onclick="document.getElementById('gallery-images-input').click()" 
                                        class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                                    Add Images
                                </button>
                                <input type="file" id="gallery-images-input" accept="image/*" multiple class="hidden" onchange="handleFileSelect(event, 'gallery')">
                            </div>
                        </div>
                        <div id="gallery-preview" class="grid grid-cols-2 gap-2 mt-3">
                            <!-- Gallery images will appear here -->
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="form-section">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-folder text-pink-600 mr-2"></i>
                        Categories
                    </h2>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary Category *</label>
                        <select id="primary-category" required 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                            <option value="">Select primary category</option>
                            <option value="dresses">Dresses</option>
                            <option value="tops">Tops & Blouses</option>
                            <option value="bottoms">Bottoms</option>
                            <option value="accessories">Accessories</option>
                            <option value="shoes">Shoes</option>
                            <option value="bags">Bags</option>
                            <option value="jewelry">Jewelry</option>
                            <option value="outerwear">Outerwear</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Categories</label>
                        <div class="space-y-2 max-h-40 overflow-y-auto">
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="formal-wear">
                                <span class="text-sm">Formal Wear</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="casual-wear">
                                <span class="text-sm">Casual Wear</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="evening-wear">
                                <span class="text-sm">Evening Wear</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="work-wear">
                                <span class="text-sm">Work Wear</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="party-wear">
                                <span class="text-sm">Party Wear</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="summer-collection">
                                <span class="text-sm">Summer Collection</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="winter-collection">
                                <span class="text-sm">Winter Collection</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="new-arrivals">
                                <span class="text-sm">New Arrivals</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="best-sellers">
                                <span class="text-sm">Best Sellers</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="custom-checkbox mr-2" value="sale-items">
                                <span class="text-sm">Sale Items</span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </form>

        <!-- Action Buttons -->
        <div class="mt-8 flex justify-end space-x-4">
            <button type="button" onclick="saveDraft()" 
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors">
                <i class="fas fa-file-alt mr-2"></i>Save as Draft
            </button>
            <button type="button" onclick="previewProduct()" 
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-eye mr-2"></i>Preview Product
            </button>
            <button type="button" onclick="saveProduct()" 
                    class="bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition-colors">
                <i class="fas fa-check mr-2"></i>Publish Product
            </button>
        </div>
    </main>

    <script>
        // Global variables
        let selectedColors = [];
        let customSizes = [];
        let productTags = [];
        let mainImageFile = null;
        let galleryImageFiles = [];

        // Rich text editor functions
        function formatText(command) {
            document.execCommand(command, false, null);
            document.getElementById('detailed-description').focus();
        }

        // Color management
        function addColor() {
            const colorPicker = document.getElementById('color-picker');
            const colorName = document.getElementById('color-name');
            
            if (!colorName.value.trim()) {
                showNotification('Please enter a color name', 'error');
                return;
            }

            const color = {
                hex: colorPicker.value,
                name: colorName.value.trim()
            };

            // Check if color already exists
            if (selectedColors.some(c => c.hex === color.hex || c.name.toLowerCase() === color.name.toLowerCase())) {
                showNotification('This color already exists', 'error');
                return;
            }

            selectedColors.push(color);
            renderSelectedColors();
            
            // Reset inputs
            colorName.value = '';
            colorPicker.value = '#000000';
        }

        function renderSelectedColors() {
            const container = document.getElementById('selected-colors');
            container.innerHTML = selectedColors.map((color, index) => `
                <div class="flex items-center bg-gray-100 rounded-full px-3 py-2">
                    <div class="w-4 h-4 rounded-full mr-2" style="background-color: ${color.hex}"></div>
                    <span class="text-sm">${color.name}</span>
                    <button type="button" onclick="removeColor(${index})" class="ml-2 text-red-600 hover:text-red-800">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            `).join('');
        }

        function removeColor(index) {
            selectedColors.splice(index, 1);
            renderSelectedColors();
        }

        // Custom sizes management
        function toggleCustomSizes() {
            const customSizesDiv = document.getElementById('custom-sizes');
            customSizesDiv.classList.toggle('hidden');
        }

        function addCustomSize() {
            const input = document.getElementById('custom-size-input');
            const size = input.value.trim();
            
            if (!size) {
                showNotification('Please enter a size', 'error');
                return;
            }

            if (customSizes.includes(size)) {
                showNotification('This size already exists', 'error');
                return;
            }

            customSizes.push(size);
            renderCustomSizes();
            input.value = '';
        }

        function renderCustomSizes() {
            const container = document.getElementById('custom-size-list');
            container.innerHTML = customSizes.map((size, index) => `
                <span class="inline-flex items-center bg-pink-100 text-pink-800 px-2 py-1 rounded-full text-sm">
                    ${size}
                    <button type="button" onclick="removeCustomSize(${index})" class="ml-1 text-pink-600 hover:text-pink-800">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </span>
            `).join('');
        }

        function removeCustomSize(index) {
            customSizes.splice(index, 1);
            renderCustomSizes();
        }

        // Features management
        function addFeature() {
            const container = document.getElementById('features-list');
            const newFeature = document.createElement('div');
            newFeature.className = 'flex items-center space-x-2';
            newFeature.innerHTML = `
                <input type="text" placeholder="Enter a key feature" 
                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                <button type="button" onclick="removeFeature(this)" 
                        class="text-red-600 hover:text-red-800">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(newFeature);
        }

        function removeFeature(button) {
            const featureDiv = button.parentElement;
            const container = document.getElementById('features-list');
            
            if (container.children.length > 1) {
                featureDiv.remove();
            }
        }

        // Tags management
        document.getElementById('tag-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addTag();
            }
        });

        function addTag() {
            const input = document.getElementById('tag-input');
            const tag = input.value.trim().toLowerCase();
            
            if (!tag) return;
            
            if (productTags.includes(tag)) {
                showNotification('This tag already exists', 'error');
                return;
            }

            productTags.push(tag);
            renderTags();
            input.value = '';
        }

        function renderTags() {
            const container = document.getElementById('tags-container');
            const existingTags = container.querySelectorAll('.tag');
            
            // Remove existing tags
            existingTags.forEach(tag => tag.remove());
            
            // Add new tags
            productTags.forEach((tag, index) => {
                const tagElement = document.createElement('span');
                tagElement.className = 'tag';
                tagElement.innerHTML = `
                    ${tag}
                    <button type="button" onclick="removeTag(${index})" class="ml-1 hover:text-pink-200">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                `;
                container.appendChild(tagElement);
            });
        }

        function removeTag(index) {
            productTags.splice(index, 1);
            renderTags();
        }

        // File upload handling
        function handleDragOver(e) {
            e.preventDefault();
            e.currentTarget.classList.add('dragover');
        }

        function handleDragLeave(e) {
            e.preventDefault();
            e.currentTarget.classList.remove('dragover');
        }

        function handleDrop(e, type) {
            e.preventDefault();
            e.currentTarget.classList.remove('dragover');
            
            const files = Array.from(e.dataTransfer.files);
            const imageFiles = files.filter(file => file.type.startsWith('image/'));
            
            if (type === 'main' && imageFiles.length > 0) {
                handleMainImage(imageFiles[0]);
            } else if (type === 'gallery') {
                handleGalleryImages(imageFiles);
            }
        }

        function handleFileSelect(e, type) {
            const files = Array.from(e.target.files);
            
            if (type === 'main' && files.length > 0) {
                handleMainImage(files[0]);
            } else if (type === 'gallery') {
                handleGalleryImages(files);
            }
        }

        function handleMainImage(file) {
            mainImageFile = file;
            const reader = new FileReader();
            
            reader.onload = function(e) {
                document.getElementById('main-upload-content').classList.add('hidden');
                document.getElementById('main-preview').classList.remove('hidden');
                document.getElementById('main-preview-img').src = e.target.result;
            };
            
            reader.readAsDataURL(file);
        }

        function handleGalleryImages(files) {
            galleryImageFiles = [...galleryImageFiles, ...files];
            renderGalleryPreview();
        }

        function renderGalleryPreview() {
            const container = document.getElementById('gallery-preview');
            container.innerHTML = galleryImageFiles.map((file, index) => {
                const url = URL.createObjectURL(file);
                return `
                    <div class="preview-image">
                        <img src="${url}" class="w-full h-20 object-cover rounded">
                        <button type="button" onclick="removeGalleryImage(${index})" 
                                class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            }).join('');
        }

        function removeImage(type) {
            if (type === 'main') {
                mainImageFile = null;
                document.getElementById('main-upload-content').classList.remove('hidden');
                document.getElementById('main-preview').classList.add('hidden');
                document.getElementById('main-image-input').value = '';
            }
        }

        function removeGalleryImage(index) {
            galleryImageFiles.splice(index, 1);
            renderGalleryPreview();
        }

        // Form validation
        function validateForm() {
            const requiredFields = [
                'product-name',
                'product-sku',
                'short-description',
                'regular-price',
                'stock-quantity',
                'primary-category'
            ];

            let isValid = true;
            const errors = [];

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                    errors.push(`${field.previousElementSibling.textContent} is required`);
                } else {
                    field.classList.remove('border-red-500');
                }
            });

            // Check if main image is uploaded
            if (!mainImageFile) {
                isValid = false;
                errors.push('Main product image is required');
            }

            // Check if at least one size is selected
            const sizeCheckboxes = document.querySelectorAll('input[type="checkbox"][value*="S"], input[type="checkbox"][value*="M"], input[type="checkbox"][value*="L"], input[type="checkbox"][value="One Size"]');
            const sizeSelected = Array.from(sizeCheckboxes).some(cb => cb.checked) || customSizes.length > 0;
            
            if (!sizeSelected) {
                isValid = false;
                errors.push('At least one size must be selected');
            }

            if (!isValid) {
                showNotification(errors[0], 'error');
            }

            return isValid;
        }

        // Form submission functions
        function saveProduct() {
            if (!validateForm()) {
                return;
            }

            // Collect all form data
            const formData = collectFormData();
            
            // In a real application, you would send this to your backend
            console.log('Saving product:', formData);
            showNotification('Product saved successfully!', 'success');
            
            // Simulate API call
            setTimeout(() => {
                window.location.href = 'collections.html';
            }, 2000);
        }

        function saveDraft() {
            const formData = collectFormData();
            formData.status = 'draft';
            
            console.log('Saving draft:', formData);
            showNotification('Draft saved successfully!', 'success');
        }

        function previewProduct() {
            if (!validateForm()) {
                return;
            }
            
            showNotification('Opening preview...', 'info');
            // In a real application, you would open a preview window
            setTimeout(() => {
                window.open('product.html', '_blank');
            }, 1000);
        }

        function collectFormData() {
            // Get all form values
            const formData = {
                name: document.getElementById('product-name').value,
                sku: document.getElementById('product-sku').value,
                shortDescription: document.getElementById('short-description').value,
                detailedDescription: document.getElementById('detailed-description').innerHTML,
                regularPrice: parseFloat(document.getElementById('regular-price').value),
                salePrice: document.getElementById('sale-price').value ? parseFloat(document.getElementById('sale-price').value) : null,
                stockQuantity: parseInt(document.getElementById('stock-quantity').value),
                costPrice: document.getElementById('cost-price').value ? parseFloat(document.getElementById('cost-price').value) : null,
                lowStockAlert: parseInt(document.getElementById('low-stock-alert').value) || 5,
                colors: selectedColors,
                sizes: getSelectedSizes(),
                customSizes: customSizes,
                material: document.getElementById('material').value,
                careInstructions: document.getElementById('care-instructions').value,
                weight: document.getElementById('weight').value ? parseFloat(document.getElementById('weight').value) : null,
                dimensions: document.getElementById('dimensions').value,
                features: getFeatures(),
                metaTitle: document.getElementById('meta-title').value,
                metaDescription: document.getElementById('meta-description').value,
                tags: productTags,
                primaryCategory: document.getElementById('primary-category').value,
                secondaryCategories: getSecondaryCategories(),
                isActive: document.getElementById('product-active').checked,
                isFeatured: document.getElementById('featured-product').checked,
                trackInventory: document.getElementById('track-inventory').checked,
                allowBackorders: document.getElementById('allow-backorders').checked,
                shippingClass: document.getElementById('shipping-class').value,
                packageWidth: document.getElementById('package-width').value ? parseFloat(document.getElementById('package-width').value) : null,
                packageHeight: document.getElementById('package-height').value ? parseFloat(document.getElementById('package-height').value) : null,
                mainImage: mainImageFile,
                galleryImages: galleryImageFiles,
                createdAt: new Date().toISOString()
            };

            return formData;
        }

        function getSelectedSizes() {
            const sizeCheckboxes = document.querySelectorAll('input[type="checkbox"][value*="S"], input[type="checkbox"][value*="M"], input[type="checkbox"][value*="L"], input[type="checkbox"][value="One Size"]');
            return Array.from(sizeCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);
        }

        function getSecondaryCategories() {
            const categoryCheckboxes = document.querySelectorAll('input[type="checkbox"][value*="-"]');
            return Array.from(categoryCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);
        }

        function getFeatures() {
            const featureInputs = document.querySelectorAll('#features-list input[type="text"]');
            return Array.from(featureInputs)
                .map(input => input.value.trim())
                .filter(feature => feature.length > 0);
        }

        // Utility functions
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

        // Auto-save functionality
        let autoSaveTimer;
        function setupAutoSave() {
            const form = document.getElementById('product-form');
            form.addEventListener('input', function() {
                clearTimeout(autoSaveTimer);
                autoSaveTimer = setTimeout(() => {
                    const formData = collectFormData();
                    localStorage.setItem('product-draft', JSON.stringify(formData));
                    console.log('Auto-saved draft');
                }, 5000);
            });
        }

        // Load saved draft
        function loadDraft() {
            const savedDraft = localStorage.getItem('product-draft');
            if (savedDraft) {
                const draftData = JSON.parse(savedDraft);
                // Populate form with saved data
                // This would be implemented based on your specific needs
                console.log('Loaded draft:', draftData);
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            setupAutoSave();
            loadDraft();
            
            // Add placeholder content to rich editor
            const editor = document.getElementById('detailed-description');
            editor.addEventListener('focus', function() {
                if (this.textContent === '') {
                    this.style.color = '#000';
                }
            });
            
            editor.addEventListener('blur', function() {
                if (this.textContent === '') {
                    this.style.color = '#9ca3af';
                    this.innerHTML = '<p>Enter detailed product description...</p>';
                }
            });
            
            // Initialize with placeholder
            editor.style.color = '#9ca3af';
            editor.innerHTML = '<p>Enter detailed product description...</p>';
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch(e.key) {
                    case 's':
                        e.preventDefault();
                        saveProduct();
                        break;
                    case 'd':
                        e.preventDefault();
                        saveDraft();
                        break;
                    case 'p':
                        e.preventDefault();
                        previewProduct();
                        break;
                }
            }
        });

        console.log('Product form loaded successfully!');
    </script>
</body>
</html>