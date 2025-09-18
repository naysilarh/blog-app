<x-app-layout>
    <h1 class="text-2xl font-bold">Admin Dashboard</h1>
    <p>Halo, {{ auth()->user()->name }} (Admin)</p>
    <ul>
        <li><a href="#">Kelola Semua Artikel</a></li>
        <li><a href="#">Kelola Kategori</a></li>
        <li><a href="#">Kelola User</a></li>
    </ul>
</x-app-layout>
