<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tech Blog</title>
        <link href="https://unpkg.com/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            :root {
                --primary: #6366f1;
                --secondary: #8b5cf6;
                --accent: #ec4899;
            }

            body {
                font-family: 'Poppins', sans-serif;
                background: #f8fafc;
            }

            .navbar {
                backdrop-filter: blur(10px);
                background: rgba(255, 255, 255, 0.8);
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .hero {
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                padding: 6rem 0;
                position: relative;
                overflow: hidden;
            }

            .hero::before {
                content: '';
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                background: linear-gradient(45deg, transparent 45%, rgba(255,255,255,0.1) 50%, transparent 55%);
                animation: shine 3s infinite;
            }

            @keyframes shine {
                0% { transform: translateX(-100%); }
                100% { transform: translateX(100%); }
            }

            .hero h1 {
                font-size: 3.5rem;
                font-weight: 700;
                color: white;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            }

            .hero p {
                color: rgba(255,255,255,0.9);
                font-size: 1.25rem;
            }

            .card {
                border: none;
                border-radius: 15px;
                background: white;
                box-shadow: 0 10px 20px rgba(0,0,0,0.05);
                transition: all 0.3s ease;
                overflow: hidden;
            }

            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            }

            .card-body {
                padding: 2rem;
            }

            .card-title {
                color: #1a202c;
                font-weight: 600;
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }

            .btn-primary {
                background: linear-gradient(45deg, var(--primary), var(--secondary));
                border: none;
                padding: 0.5rem 1.5rem;
                border-radius: 25px;
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                transform: scale(1.05);
                box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
            }

            .text-muted {
                color: #6b7280 !important;
            }

            @media (max-width: 768px) {
                .hero h1 {
                    font-size: 2.5rem;
                }
                .card-body {
                    padding: 1.5rem;
                }
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
        </nav>

        <div class="hero">
            <div class="container text-center">
                <h1 class="mb-4">Welcome to Tech Blog</h1>
                <p class="lead mb-0">Discover amazing stories and insights from our community</p>
            </div>
        </div>

        <div class="container py-5">
            <div class="row g-4">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">By {{ $post->user ? $post->user->name : 'Unknown' }}</small>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <footer class="bg-dark text-white py-4 mt-5">
            <div class="container text-center">
                <p class="mb-0">© 2024 Tech Blog. All rights reserved.</p>
            </div>
        </footer>

        <script src="https://unpkg.com/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>