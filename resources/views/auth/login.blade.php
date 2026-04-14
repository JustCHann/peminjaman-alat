<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Alatify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        @keyframes ping-slow {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.5); opacity: 0.1; }
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
            20%, 40%, 60%, 80% { transform: translateX(4px); }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-ping-slow {
            animation: ping-slow 3s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
        
        .animate-slide-in {
            animation: slideIn 0.5s ease-out forwards;
        }
        
        .shake {
            animation: shake 0.5s ease-in-out;
        }
        
        /* Custom focus styles */
        input:focus {
            outline: none;
            box-shadow: none;
        }
        
        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-gray-100 to-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative overflow-hidden min-h-screen">
    
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden -z-10">
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-indigo-200 opacity-20 animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-[500px] h-[500px] rounded-full bg-purple-200 opacity-20 animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 rounded-full bg-blue-200 opacity-10 animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-20 right-20 w-2 h-2 bg-indigo-300 rounded-full animate-ping-slow"></div>
        <div class="absolute bottom-20 left-20 w-2 h-2 bg-purple-300 rounded-full animate-ping-slow" style="animation-delay: 0.5s;"></div>
        <div class="absolute top-1/3 right-1/4 w-1 h-1 bg-indigo-400 rounded-full animate-ping-slow" style="animation-delay: 1s;"></div>
    </div>

    <!-- Container -->
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <!-- Logo & Brand -->
        <div class="text-center animate-fade-in-up">
            <div class="inline-flex items-center justify-center mb-4">
                <div class="h-16 w-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl shadow-lg shadow-indigo-100 flex items-center justify-center transform hover:scale-105 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                Alatify
            </h2>
            <p class="text-gray-500 mt-2 text-sm font-light">
                Sistem Peminjaman Alat
            </p>
        </div>
    </div>

    <!-- Login Card -->
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md animate-fade-in-up" style="animation-delay: 0.1s;">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 px-8 py-10">
            
            <!-- Welcome Text -->
            <div class="text-center mb-8">
                <h3 class="text-xl font-semibold text-gray-800">Selamat Datang Kembali</h3>
                <p class="text-gray-500 text-sm mt-1">Masuk ke akun Alatify Anda</p>
            </div>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 animate-slide-in">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            @foreach($errors->all() as $error)
                                <p class="text-sm text-red-700">{{ $error }}</p>
                            @endforeach
                        </div>
                        <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-400 hover:text-red-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div class="space-y-1">
                    <label for="email" class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Email Address
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-indigo-500 transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input 
                            id="email" 
                            class="block w-full pl-10 pr-3 py-3 bg-gray-50 border-0 border-b-2 border-gray-200 focus:border-indigo-500 focus:ring-0 text-sm rounded-t-lg transition-all duration-200" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                        />
                        <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 group-focus-within:w-full transition-all duration-300"></div>
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="space-y-1">
                    <div class="flex items-center justify-between">
                        <label for="password" class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Password
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-indigo-600 hover:text-indigo-700 font-medium transition-colors hover:underline">
                                Lupa password?
                            </a>
                        @endif
                    </div>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-indigo-500 transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input 
                            id="password" 
                            class="block w-full pl-10 pr-10 py-3 bg-gray-50 border-0 border-b-2 border-gray-200 focus:border-indigo-500 focus:ring-0 text-sm rounded-t-lg transition-all duration-200" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password" 
                        />
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-indigo-600 transition-all duration-200">
                            
                        </button>
                        <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 group-focus-within:w-full transition-all duration-300"></div>
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium py-3 px-4 rounded-xl text-sm transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg shadow-indigo-100 active:translate-y-0 relative overflow-hidden group">
                        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                        <span class="relative flex items-center justify-center">
                            <span>Log in</span>
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
    <!-- JavaScript -->
    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                `;
            } else {
                passwordInput.type = 'password';
                passwordIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }

        // Fill Demo Credentials
        function fillCredentials(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
            
            // Add success animation
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            emailInput.classList.add('border-indigo-500');
            passwordInput.classList.add('border-indigo-500');
            
            setTimeout(() => {
                emailInput.classList.remove('border-indigo-500');
                passwordInput.classList.remove('border-indigo-500');
            }, 1000);
        }

        // Form validation with loading state
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = form.querySelector('button[type="submit"]');
            
            form.addEventListener('submit', function(e) {
                const email = document.getElementById('email').value.trim();
                const password = document.getElementById('password').value.trim();
                
                if (!email || !password) {
                    e.preventDefault();
                    
                    if (!email) {
                        const input = document.getElementById('email');
                        input.classList.add('shake');
                        setTimeout(() => input.classList.remove('shake'), 500);
                    }
                    
                    if (!password) {
                        const input = document.getElementById('password');
                        input.classList.add('shake');
                        setTimeout(() => input.classList.remove('shake'), 500);
                    }
                } else {
                    // Show loading state
                    const originalText = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <span class="flex items-center justify-center">
                            <svg class="animate-spin h-5 w-5 mr-2 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memproses...
                        </span>
                    `;
                    
                    // Re-enable button after 3 seconds (in case of error)
                    setTimeout(() => {
                        if (submitBtn.disabled) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalText;
                        }
                    }, 3000);
                }
            });
        });
    </script>
</body>
</html>