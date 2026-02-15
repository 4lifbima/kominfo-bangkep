<x-guest-layout>
    <div class="w-full max-w-[400px] bg-white dark:bg-dark-surface rounded-[20px] shadow-xl p-8 animate-fade-up relative z-10">
        
        <!-- Header -->
            <div class="flex items-center justify-center mb-4">
                <img src="https://disdik.tulungagung.go.id/wp-content/uploads/2022/01/logo-kominfo.png" alt="Logo" class="w-12 h-auto drop-shadow-sm">
                <span class="ml-3 text-2xl font-bold text-primary dark:text-white tracking-tight">KOMINFO</span>
            </div>
            <p class="text-slate-500 dark:text-slate-400 text-sm text-center justify-center">Sistem Informasi Pengawasan & Data</p>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div class="space-y-1.5">
                <label for="email" class="block text-sm font-medium text-slate-600 dark:text-slate-300">Email</label>
                <input id="email" class="block w-full px-4 py-2.5 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div class="space-y-1.5">
                <label for="password" class="block text-sm font-medium text-slate-600 dark:text-slate-300">Password</label>
                <input id="password" class="block w-full px-4 py-2.5 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between text-sm">
                <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                    <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-primary shadow-sm focus:ring-primary/50 cursor-pointer" name="remember">
                    <span class="ml-2 text-slate-500 group-hover:text-slate-700 dark:text-slate-400 dark:group-hover:text-slate-300 transition-colors">Ingat saya</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-primary hover:text-primary-light font-medium transition-colors" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <!-- Button -->
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-xl shadow-lg shadow-primary/20 text-sm font-semibold text-white bg-primary hover:bg-primary-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all transform hover:-translate-y-0.5">
                Masuk Aplikasi
            </button>
            
            <!-- Register Link -->
            <div class="text-center mt-6">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-primary hover:text-primary-light font-medium transition-colors">Daftar disini</a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
