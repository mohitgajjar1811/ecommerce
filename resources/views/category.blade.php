@extends('masterlayout.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #6366f1;
        }

        .section-full {
            width: 100%;
            padding: 80px 40px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 15px;
        }

        .section-title .underline {
            width: 60px;
            height: 4px;
            background: var(--primary);
            margin: 0 auto;
            border-radius: 2px;
        }

        /* ================= CATEGORIES ================= */
        .category-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .category-tag {
            background: white;
            padding: 15px 30px;
            border-radius: 50px;
            color: var(--text-main);
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .category-tag:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.2);
            border-color: var(--primary);
        }
    </style>

    <!-- ================= CATEGORIES ================= -->
    <section id="categories" class="section-full">
        <div class="section-title">
            <h2>Shop by Category</h2>
            <div class="underline"></div>
        </div>

        <div class="category-grid">
            @foreach ($catgories as $cat)
                <a href="/products?category={{ $cat->name }}" class="category-tag">
                    <span style="font-size: 1.2rem;">🏷️</span>
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </section>
@endsection
