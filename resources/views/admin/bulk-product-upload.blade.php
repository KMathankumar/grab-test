<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Product Upload - Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/images/grabbasket.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
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
    margin-bottom: -50px;
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
            <li><a class="nav-link active" href="{{ route('admin.bulkProductUpload') }}"><i class="bi bi-upload"></i> Bulk Product Upload</a></li>
            <li><a class="nav-link" href="{{ route('admin.warehouse.dashboard') }}"><i class="bi bi-shop"></i> Warehouse Management</a></li>
            <li><a class="nav-link" href="{{ route('admin.delivery-partners.dashboard') }}"><i class="bi bi-bicycle"></i> Delivery Partners</a></li>
            <li><a class="nav-link " href="{{ route('admin.products.bySeller') }}"><i class="bi bi-shop"></i> Products by Seller</a></li>
            <li><a class="nav-link text-danger" href="{{ route('admin.logout') }}"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul>
    </div>
</div>
    </div>

 

        <!-- Navigation -->
    
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <h2 class="mb-4"><i class="bi bi-upload"></i> Bulk Product Upload</h2>
            <form method="POST" action="{{ route('admin.bulkProductUpload.post') }}" enctype="multipart/form-data" class="card p-4 shadow-sm">
                @csrf
                <div class="mb-3">
                    <label for="seller_email" class="form-label">Seller Email</label>
                    <select name="seller_email" id="seller_email" class="form-select" required>
                        <option value="">-- Select Seller Email --</option>
                        @foreach($sellers as $email)
                            <option value="{{ $email }}">{{ $email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="products_file" class="form-label">Products CSV/Excel File</label>
                    <input type="file" name="products_file" id="products_file" class="form-control" accept=".csv,.xlsx,.xls" required>
                    <div class="form-text">
                        Accepted columns: name, unique_id, category_id, subcategory_id, image, description, price, discount, delivery_charge, gift_option, stock
                    </div>
                </div>
                <div class="mb-3">
                    <label for="images_zip" class="form-label">Images ZIP (optional)</label>
                    <input class="form-control" type="file" id="images_zip" name="images_zip" accept=".zip">
                    <div class="form-text">
                        Place product images inside the ZIP. Filenames should match the Excel image column or the product unique_id (case-insensitive). Example: ABC123.jpg matches unique_id ABC123.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Or select individual images (optional)</label>
                    <input class="form-control" type="file" id="images" name="images[]" accept="image/*" multiple webkitdirectory directory>
                </div>
                <button type="submit" class="btn btn-primary">Upload Products</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.querySelector('.menu-toggle');
            const sidebar = document.getElementById('sidebarMenu');

            if (toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', () => {
                    sidebar.classList.toggle('show');
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>