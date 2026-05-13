<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopZone</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .sunrise-gradient {
            background: linear-gradient(135deg, #FF9B44 0%, #D4145A 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="sunrise-gradient min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-xl">

        <!-- Logo -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-white uppercase">
                Shop<span class="text-orange-200">Zone</span>
            </h1>
            <p class="text-orange-100 mt-2">Join our community today!</p>
        </div>

        <!-- Card -->
        <div class="glass-card rounded-3xl shadow-2xl border border-white/20">
            <div class="p-8">

                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Create Account</h2>

                <form class="space-y-6" method="POST" action={{ route('create.customer') }}>
                    @csrf
                    <!-- Name -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" placeholder="First Name" name="name"
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">
                        <input type="text" placeholder="Last Name"
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">
                    </div>

                    <!-- Email & Phone -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="email" placeholder="Email" name="email"
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">
                        <input type="tel" placeholder="Phone Number" name="phone_number"
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">
                    </div>

                    <!-- Password -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl pr-12"
                                placeholder="Password">
                            <button type="button" onclick="togglePassword('password')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">👁️</button>
                        </div>

                        <div class="relative">
                            <input type="password" id="confirmPassword" name="password_confirmation"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl pr-12"
                                placeholder="Confirm Password">
                            <button type="button" onclick="togglePassword('confirmPassword')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">👁️</button>
                        </div>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full py-3 rounded-xl text-white font-bold bg-gradient-to-r from-orange-500 to-red-600">
                        Register Account
                    </button>
                </form>

                <!-- Footer -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="/login" class="text-orange-600 font-bold">Login</a>
                    </p>
                </div>

            </div>
        </div>

        <p class="mt-6 text-center text-white/60 text-sm">
            © 2026 shopeZone
        </p>

    </div>

    <script>
        function togglePassword(id) {
            let input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>

</body>
</html>
