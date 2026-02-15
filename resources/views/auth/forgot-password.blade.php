<x-guest-layout>
    <div class="w-full max-w-[400px] bg-white dark:bg-dark-surface rounded-[20px] shadow-xl p-8 animate-fade-up relative z-10">
        
        <!-- Header -->
        <div class="text-center mb-8 text-center justify-center">
            <div class="flex items-center justify-center mb-4">
                <img src="https://disdik.tulungagung.go.id/wp-content/uploads/2022/01/logo-kominfo.png" alt="Logo" class="w-12 h-auto drop-shadow-sm">
                <span class="ml-3 text-2xl font-bold text-primary dark:text-white tracking-tight">KOMINFO</span>
            </div>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Reset Password Akun</p>
        </div>

        <div class="mb-6 text-sm text-slate-600 dark:text-slate-400 text-center leading-relaxed">
            {{ __('Lupa password Anda? Tidak masalah. Beritahu kami alamat email Anda dan kami akan mengirimkan tautan reset password.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div class="space-y-1.5">
                <label for="email" class="block text-sm font-medium text-slate-600 dark:text-slate-300">Email</label>
                <input id="email" class="block w-full px-4 py-2.5 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Button -->
            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-xl shadow-lg shadow-primary/20 text-sm font-semibold text-white bg-primary hover:bg-primary-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all transform hover:-translate-y-0.5">
                Kirim Tautan Reset
            </button>
            
            <!-- Back Link -->
            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 text-sm font-medium transition-colors flex items-center justify-center gap-2 group">
                    <iconify-icon icon="solar:arrow-left-linear" class="group-hover:-translate-x-1 transition-transform"></iconify-icon>
                    Kembali ke Login
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
