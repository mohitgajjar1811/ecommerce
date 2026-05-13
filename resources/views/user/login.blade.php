<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | ShopZone</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN (for static use) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .sunrise-gradient {
            background: linear-gradient(135deg, #FF9B44 0%, #D4145A 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="sunrise-gradient h-full flex items-center justify-center p-6">

<div class="w-full max-w-md">

    <!-- Logo -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-white uppercase">
            Shop<span class="text-orange-200">Zone</span>
        </h1>
        <p class="text-orange-100 mt-2">Welcome back! Please login to your account.</p>
    </div>

    <!-- Card -->
    <div class="glass-card rounded-2xl shadow-2xl overflow-hidden border border-white/20">
        <div class="p-8">

            <!-- Form -->
            <form class="space-y-5" method="POST" action={{route('login')}}>
                @csrf
                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500"
                        placeholder="name@example.com">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl pr-12"
                            placeholder="••••••••">

                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                            👁️
                        </button>
                    </div>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full py-3 rounded-xl text-white font-bold bg-gradient-to-r from-orange-500 to-red-600">
                    Log In
                </button>

            </form>

            <!-- Footer -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="/registration" class="text-orange-600 font-bold">Create one</a>
                </p>
            </div>

        </div>
    </div>

    <p class="mt-6 text-center text-white/60 text-sm">
        © 2026 shopeZone
    </p>

</div>

<script>
function togglePassword() {
    let input = document.getElementById("password");
    input.type = input.type === "password" ? "text" : "password";
}
</script>

</body>
</html>