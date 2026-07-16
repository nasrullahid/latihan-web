{{--
    partials/footer.blade.php
    Footer situs: logo, tautan navigasi ringkas, dan teks hak cipta.
    Dipanggil di layout sehingga tampil di semua halaman.
--}}
<footer class="border-t border-slate-200 bg-white">
    <div class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
            {{-- Logo toko di footer --}}
            <a href="{{ route('beranda') }}" class="flex items-center gap-3">
                <span class="grid h-9 w-9 place-items-center rounded-lg bg-slate-950 text-xs font-black text-white">TK</span>
                <span class="text-xl font-black tracking-tight text-slate-950">Tokoku</span>
            </a>
            {{-- Tautan navigasi ringkas --}}
            <ul class="flex flex-wrap items-center gap-x-5 gap-y-2 text-sm font-semibold text-slate-500">
                <li>
                    <a href="{{ route('tentang') }}" class="hover:text-slate-950">Tentang</a>
                </li>
                <li>
                    <a href="{{ route('produk.index') }}" class="hover:text-slate-950">Produk</a>
                </li>
                <li>
                    <a href="{{ route('beranda') }}" class="hover:text-slate-950">Beranda</a>
                </li>
            </ul>
        </div>
        <p class="mt-6 border-t border-slate-200 pt-5 text-sm text-slate-500">© 2026 Tokoku. Belanja sederhana,
            tampil lebih rapi.</p>
    </div>
</footer>
