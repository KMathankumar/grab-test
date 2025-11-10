<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Products by Seller</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/images/grabbasket.png') }}">

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

       /* ===== OLD-STYLE SIDEBAR (FLAT DARK) ===== */
.sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    width: 250px;
    background-color: #1e1e2f;
    color: #fff;
    padding-top: 20px;
    z-index: 1000;
    box-shadow: 3px 0 10px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
    overflow: hidden;
    height: 100vh;
}

@media (max-width: 768px) {
    .sidebar {
        left: -250px;
    }
    .sidebar.show {
        left: 0;
    }
}

.sidebar .logo {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 4px 10px;
    border-radius: 6px;
    width: 100%;
    box-sizing: border-box;
    height: 100px;
    
}

.sidebar .logo img {
    width: 150px;
    height: 200px;
    object-fit: cover;
    position: relative;
    left: 30px;
    transition: transform 0.2s;
}

.sidebar-content {
    overflow-y: auto;
    overflow-x: hidden;
    height: calc(100vh - 180px);
    padding-bottom: 20px;
    padding-left: 15px;
    padding-right: 15px;
    margin-top: 50px;
}

.sidebar-content::-webkit-scrollbar {
    width: 6px;
}
.sidebar-content::-webkit-scrollbar-track {
    background: #2d2d40;
    border-radius: 10px;
}
.sidebar-content::-webkit-scrollbar-thumb {
    background: #555;
    border-radius: 10px;
}
.sidebar-content::-webkit-scrollbar-thumb:hover {
    background: #777;
}

.sidebar .nav-link {
    color: #bdc3c7;
    margin: 8px 15px;
    padding: 12px 20px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s;
}

.sidebar .nav-link:hover,
.sidebar .nav-link.active {
    background-color: #2d2d40;
    color: #fff;
}

.sidebar .nav-link.active {
    background-color: #007bff;
    color: white;
    border-left: 4px solid #0056b3;
}

.sidebar .nav-link i {
    font-size: 18px;
    width: 24px;
    text-align: center;
}

.sidebar .nav-link.text-danger {
    color: #ff6b6b;
}
.sidebar .nav-link.text-danger:hover {
    color: #ff4757;
    background-color: #2d2d40;
}
        .content {
            margin-left: 230px;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
            }
        }

        .menu-toggle {
            position: fixed;
            top: 10px;
            left: 15px;
            font-size: 1.8rem;
            cursor: pointer;
            color: #212529;
            z-index: 1200;
        }

        @media (min-width: 769px) {
            .menu-toggle {
                display: none;
            }
        }

        .card {
            border-radius: 12px;
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .seller-card {
            cursor: pointer;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .seller-card:hover {
            transform: translateY(-3px);
            border-left-color: #0d6efd;
        }

        .seller-card.selected {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-left-color: #fff;
        }

        .seller-card.selected .text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .product-card {
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .badge-count {
            font-size: 0.9rem;
            padding: 6px 12px;
        }
    </style>
</head>

<body>

    {{-- Sidebar --}}
    <div class="menu-toggle d-md-none">
        <i class="bi bi-list"></i>
    </div>
    <div class="sidebar" id="sidebarMenu">
        <div class="sidebar-header">
            <div class="logo">
                <img src="{{ asset('asset/images/grabbasket.png') }}" alt="Logo" width="150px">
            </div>
        </div>
        {{-- Sidebar --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <img src="{{ asset('asset/images/grabbasket.png') }}" alt="Logo" width="150px">
        </div>
    </div>
    <div class="sidebar-content">
        <ul class="nav nav-pills flex-column">
            <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a class="nav-link" href="{{ route('admin.products') }}"><i class="bi bi-box-seam"></i> Products</a></li>
            <li><a class="nav-link" href="{{ route('admin.orders') }}"><i class="bi bi-cart-check"></i> Orders</a></li>
            <li><a class="nav-link" href="{{ route('tracking.form') }}"><i class="bi bi-truck"></i> Track Package</a></li>
            <li><a class="nav-link" href="{{ route('admin.manageuser') }}"><i class="bi bi-people"></i> Users</a></li>
            <li><a class="nav-link" href="{{ route('admin.banners.index') }}"><i class="bi bi-images"></i> Banner Management</a></li>
            <li><a class="nav-link" href="{{ route('admin.index-editor.index') }}"><i class="bi bi-house-gear-fill"></i> Index Page Editor</a></li>
            <li><a class="nav-link" href="{{ route('admin.category-emojis.index') }}"><i class="bi bi-emoji-smile-fill"></i> Category Emojis</a></li>
            <li><a class="nav-link" href="{{ route('admin.promotional.form') }}"><i class="bi bi-bell-fill"></i> Promotional Notifications</a></li>
            <li><a class="nav-link" href="{{ route('admin.sms.dashboard') }}"><i class="bi bi-chat-dots"></i> SMS Management</a></li>
            <li><a class="nav-link" href="{{ route('admin.bulkProductUpload') }}"><i class="bi bi-upload"></i> Bulk Product Upload</a></li>
            <li><a class="nav-link" href="{{ route('admin.warehouse.dashboard') }}"><i class="bi bi-shop"></i> Warehouse Management</a></li>
            <li><a class="nav-link" href="{{ route('admin.delivery-partners.dashboard') }}"><i class="bi bi-bicycle"></i> Delivery Partners</a></li>
            <li><a class="nav-link active" href="{{ route('admin.products.bySeller') }}"><i class="bi bi-shop"></i> Products by Seller</a></li>
            <li><a class="nav-link text-danger" href="{{ route('admin.logout') }}"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul>
    </div>
</div>
    </div>

    {{-- Main Content --}}
    <div class="content">
        <div class="container-fluid">

            {{-- Page Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-1">
                        <i class="bi bi-shop text-primary"></i> Products by Seller
                    </h2>
                    <p class="text-muted mb-0">Browse products organized by sellers</p>
                </div>
            </div>

            {{-- Search Bar --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.products.bySeller') }}" class="row g-3">
                        <div class="col-md-10">
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control" 
                                       placeholder="Search sellers by name or email..." 
                                       value="{{ $search ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-funnel"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                {{-- Sellers List --}}
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-dark text-white">
                            <h5 class="mb-0"><i class="bi bi-people"></i> Sellers ({{ $sellers->count() }})</h5>
                        </div>
                        <div class="card-body p-0" style="max-height: 600px; overflow-y: auto;">
                            @forelse($sellers as $seller)
                                <a href="{{ route('admin.products.bySeller', ['seller_id' => $seller->id, 'search' => $search]) }}" 
                                   class="text-decoration-none">
                                    <div class="seller-card p-3 border-bottom {{ $selectedSeller == $seller->id ? 'selected' : '' }}">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1 fw-bold">{{ $seller->name }}</h6>
                                                <p class="text-muted small mb-1">
                                                    <i class="bi bi-envelope"></i> {{ $seller->email }}
                                                </p>
                                            </div>
                                            <span class="badge {{ $selectedSeller == $seller->id ? 'bg-white text-primary' : 'bg-primary' }} badge-count">
                                                {{ $seller->products_count }} products
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="p-4 text-center text-muted">
                                    <i class="bi bi-inbox fs-3"></i>
                                    <p class="mt-2">No sellers found</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Products Display --}}
                <div class="col-md-8">
                    @if($selectedSellerInfo && $products)
                        {{-- Seller Info Header --}}
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="mb-2">
                                            <i class="bi bi-shop"></i> {{ $selectedSellerInfo->name }}
                                        </h4>
                                        <p class="mb-0">
                                            <i class="bi bi-envelope"></i> {{ $selectedSellerInfo->email }}
                                        </p>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="mb-0">{{ $products->total() }}</h3>
                                        <small>Total Products</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Products Grid --}}
                        @if($products->count() > 0)
                            <div class="row g-4">
                                @foreach($products as $product)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card product-card h-100 border-0 shadow-sm">
                                            @if($product->image || $product->image_data)
                                                <img src="{{ $product->image_url }}" 
                                                     alt="{{ $product->name }}" 
                                                     class="product-img">
                                            @else
                                                <div class="product-img bg-light d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                                </div>
                                            @endif
                                            <div class="card-body">
                                                <h6 class="fw-bold mb-2">{{ $product->name }}</h6>
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span class="text-success fw-bold fs-5">₹{{ number_format($product->price, 2) }}</span>
                                                    @if($product->stock > 10)
                                                        <span class="badge bg-success">In Stock</span>
                                                    @elseif($product->stock > 0)
                                                        <span class="badge bg-warning text-dark">Low Stock</span>
                                                    @else
                                                        <span class="badge bg-danger">Out of Stock</span>
                                                    @endif
                                                </div>
                                                <div class="text-muted small mb-2">
                                                    <i class="bi bi-tag"></i> {{ $product->category->name ?? 'Uncategorized' }}
                                                    @if($product->subcategory)
                                                        / {{ $product->subcategory->name }}
                                                    @endif
                                                </div>
                                                <a href="{{ route('product.details', $product->id) }}" 
                                                   class="btn btn-sm btn-outline-primary w-100" target="_blank">
                                                    <i class="bi bi-eye"></i> View Product
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center mt-4">
                                {{ $products->links() }}
                            </div>
                        @else
                            <div class="card shadow-sm border-0">
                                <div class="card-body text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted"></i>
                                    <h5 class="mt-3 text-muted">No products with images found for this seller</h5>
                                </div>
                            </div>
                        @endif
                    @else
                        {{-- No Seller Selected --}}
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center py-5">
                                <i class="bi bi-arrow-left-circle fs-1 text-primary"></i>
                                <h4 class="mt-3">Select a Seller</h4>
                                <p class="text-muted">Choose a seller from the list to view their products</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile menu toggle
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menuToggle');

        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function (event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggle = menuToggle.contains(event.target);

            if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>

</html>
