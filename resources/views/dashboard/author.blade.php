<x-app-layout>
    <h1 class="text-2xl font-bold">Author Dashboard</h1>
    <p>Halo, {{ auth()->user()->name }} (Author)</p>
    <ul>
        <li><a href="#">Buat Artikel Baru</a></li>
        <li><a href="#">Daftar Artikel Saya</a></li>
    </ul>
</x-app-layout>
