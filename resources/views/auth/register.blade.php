<x-guest-layout>
    <div class="w-full max-w-[400px] bg-white dark:bg-dark-surface rounded-[20px] shadow-xl p-8 animate-fade-up relative z-10">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <img src="https://disdik.tulungagung.go.id/wp-content/uploads/2022/01/logo-kominfo.png" alt="Logo" class="w-12 h-auto drop-shadow-sm">
                <span class="ml-3 text-2xl font-bold text-primary dark:text-white tracking-tight">KOMINFO</span>
            </div>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Buat akun admin baru</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div class="space-y-1.5">
                <label for="name" class="block text-sm font-medium text-slate-600 dark:text-slate-300">Nama Lengkap</label>
                <input id="name" class="block w-full px-4 py-2.5 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama Anda" />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <!-- Email -->
            <div class="space-y-1.5">
                <label for="email" class="block text-sm font-medium text-slate-600 dark:text-slate-300">Email</label>
                <input id="email" class="block w-full px-4 py-2.5 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="nama@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div class="space-y-1.5">
                <label for="password" class="block text-sm font-medium text-slate-600 dark:text-slate-300">Password</label>
                <input id="password" class="block w-full px-4 py-2.5 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-1.5">
                <label for="password_confirmation" class="block text-sm font-medium text-slate-600 dark:text-slate-300">Konfirmasi Password</label>
                <input id="password_confirmation" class="block w-full px-4 py-2.5 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            <!-- Button -->
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-xl shadow-lg shadow-primary/20 text-sm font-semibold text-white bg-primary hover:bg-primary-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all transform hover:-translate-y-0.5">
                Daftar Akun
            </button>
            
            <!-- Login Link -->
            <div class="text-center mt-6">
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-primary hover:text-primary-light font-medium transition-colors">Masuk disini</a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
