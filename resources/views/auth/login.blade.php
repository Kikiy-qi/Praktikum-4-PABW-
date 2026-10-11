@extends('layouts.app')

@section('title', 'Masuk ke ParkTrack')

@section('content')
<div class="flex justify-center items-center py-12">
    <div class="w-full max-w-md">
        @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/50 text-red-500 px-4 py-3 rounded-xl mb-6 flex items-center">
                <i class="bi bi-exclamation-circle-fill mr-3"></i> {{ session('error') }}
            </div>
        @endif
        <div class="bg-slate-800 border border-slate-700 rounded-2xl shadow-xl overflow-hidden hover:border-slate-600 transition-colors">
            <div class="bg-slate-900 border-b border-slate-700 p-6 text-center">
                <h4 class="font-bold text-white text-xl tracking-tight">Masuk ke ParkTrack</h4>
                <p class="text-slate-400 text-sm mt-1">Masuk ke akun Anda untuk mengelola reservasi dan parkir.</p>
            </div>
            <div class="p-8">
                <form action="{{ route('login.post') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-5">
                        <label class="block text-slate-300 text-sm font-semibold mb-2">Alamat Email / Nomor Telepon</label>
                        <input type="text" id="loginEmail" name="login_id" class="w-full bg-slate-900 border border-slate-700 text-slate-50 placeholder:text-slate-500 placeholder:font-normal text-sm rounded-lg focus:ring-brand-500 focus:border-brand-500 block p-3" required placeholder="nama@gmail.com / 081...">
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-slate-300 text-sm font-semibold">Kata Sandi</label>
                            <a href="#" class="text-brand-500 hover:text-brand-400 text-sm font-medium">Lupa Password?</a>
                        </div>
                        <div class="relative">
                            <input type="password" id="loginPassword" name="password" class="w-full bg-slate-900 border border-slate-700 text-slate-50 placeholder:text-slate-500 placeholder:font-normal text-sm rounded-lg focus:ring-brand-500 focus:border-brand-500 block p-3 pr-11" required placeholder="Masukkan kata sandi">
                            <button type="button" onclick="togglePassword('loginPassword', 'loginEyeIcon')" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-white transition-colors focus:outline-none p-1">
                                <i class="bi bi-eye text-lg" id="loginEyeIcon"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-brand-500 hover:bg-brand-600 text-white font-bold py-3 px-4 rounded-xl transition-colors mb-4 shadow">Masuk</button>
                    <div class="text-center mt-4">
                        <span class="text-slate-400 text-sm">Belum memiliki akun?</span>
                        <a href="{{ route('register') }}" class="text-brand-500 hover:text-brand-400 text-sm font-bold ml-1 transition-colors">Daftar di sini</a>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-700/60 text-center">
                        <button type="button" onclick="fillOfficer()" class="text-xs bg-slate-700 hover:bg-slate-600 text-brand-400 hover:text-white px-3 py-1.5 rounded-lg transition-colors">
                            <i class="bi bi-shield-lock mr-1"></i> Gunakan Akun Petugas (Demo)
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if(input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}

function fillOfficer() {
    document.getElementById('loginEmail').value = 'admin@parktrack.com';
    document.getElementById('loginPassword').value = 'admin123';
}
</script>
@endsection
