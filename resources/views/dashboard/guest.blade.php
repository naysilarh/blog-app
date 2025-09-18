<x-app-layout>
    <h1 class="text-2xl font-bold">Guest Dashboard</h1>
    <p>Halo, {{ auth()->user()->name }} (Guest)</p>
    <ul>
        <li><a href="#">Lihat Artikel Publik</a></li>
    </ul>
</x-app-layout>
