
   @extends('masterLayout.app')
   @section('content')
   <style>
        .product-img {
            width: 100%;
            border-radius: 10px;
        }
        .thumbnail-img {
            cursor: pointer;
            border: 2px solid transparent;
        }
        .thumbnail-img:hover {
            border-color: #0d6efd;
        }
        .footer {
            background-color: #212529;
            color: white;
        }
    </style>
<!-- ================= PRODUCT SECTION ================= -->
<section class="py-5">
    <div class="container">
        <div class="row">

            <!-- Product Images -->
            <div class="col-md-6">
                <img src="https://via.placeholder.com/600x400" class="product-img mb-3" id="mainImage">

                <div class="row">
                    <div class="col-4">
                        <img src="https://via.placeholder.com/150" class="img-fluid thumbnail-img">
                    </div>
                    <div class="col-4">
                        <img src="https://via.placeholder.com/150/cccccc" class="img-fluid thumbnail-img">
                    </div>
                    <div class="col-4">
                        <img src="https://via.placeholder.com/150/999999" class="img-fluid thumbnail-img">
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <h2>Wireless Noise Cancelling Headphones</h2>
                <p class="text-muted">Brand: ShopZone Electronics</p>

                <h4 class="text-primary">$89.99</h4>
                <p>
                    ⭐⭐⭐⭐☆ (4.5/5 Reviews)
                </p>

                <p>
                    Experience high-quality sound with advanced noise cancellation technology.
                    Perfect for travel, work, and entertainment.
                </p>

                <!-- Quantity -->
                <div class="d-flex align-items-center mb-3">
                    <label class="me-3">Quantity:</label>
                    <input type="number" class="form-control w-25" value="1" min="1">
                </div>

                <!-- Buttons -->
                <button class="btn btn-primary me-2">Add to Cart</button>
                <button class="btn btn-outline-secondary">Add to Wishlist</button>

                <hr>

                <p><strong>Availability:</strong> In Stock</p>
                <p><strong>Category:</strong> Electronics</p>
                <p><strong>SKU:</strong> SZ-1001</p>
            </div>

        </div>
    </div>
</section>

<!-- ================= PRODUCT TABS ================= -->
<section class="pb-5">
    <div class="container">
        <ul class="nav nav-tabs" id="productTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#description">Description</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button>
            </li>
        </ul>

        <div class="tab-content p-4 border border-top-0">
            <div class="tab-pane fade show active" id="description">
                <p>
                    These wireless headphones offer premium sound quality with deep bass and crystal-clear highs.
                    Designed with comfort in mind, featuring soft ear cushions and long battery life.
                </p>
            </div>
            <div class="tab-pane fade" id="reviews">
                <p><strong>John D.</strong> ⭐⭐⭐⭐⭐ - Amazing sound quality!</p>
                <p><strong>Sarah K.</strong> ⭐⭐⭐⭐☆ - Very comfortable and long battery life.</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= RELATED PRODUCTS ================= -->
<section class="bg-light py-5">
    <div class="container">
        <h3 class="text-center mb-4">Related Products</h3>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card shadow h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top">
                    <div class="card-body text-center">
                        <h6>Smart Watch</h6>
                        <p class="text-primary">$59.99</p>
                        <button class="btn btn-sm btn-primary">View</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top">
                    <div class="card-body text-center">
                        <h6>Bluetooth Speaker</h6>
                        <p class="text-primary">$39.99</p>
                        <button class="btn btn-sm btn-primary">View</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top">
                    <div class="card-body text-center">
                        <h6>Gaming Mouse</h6>
                        <p class="text-primary">$29.99</p>
                        <button class="btn btn-sm btn-primary">View</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top">
                    <div class="card-body text-center">
                        <h6>Laptop Backpack</h6>
                        <p class="text-primary">$24.99</p>
                        <button class="btn btn-sm btn-primary">View</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('button')
    @parent
    <a href="https://instgram.com">Instagram</a>
@endsection


@push('scripts')
    <script>
        alert("This is About Page");
    </script>
@endpush

@prepend('scripts')
    <script>
         alert("This is Before About Page");
    </script>
@endprepend