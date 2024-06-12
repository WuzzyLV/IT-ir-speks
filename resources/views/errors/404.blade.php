<!-- resources/views/errors/404.blade.php -->
<x-app-layout>
    <div class="flex items-center justify-center ">
        <div class="text-center">
            <p class="text-2xl mt-4 text-gray-950">Hmm... Lapa, kuru meklējat, neeksistē.</p>
           <p class="mt-2 text-gray-600">Taču neuztraucieties, mūsu mājaslapā varat atrast daudz citu lietu.</p>
            <a href="{{ url('/') }}" class="mt-6 text-xl px-6 py-2 text-accent1 hover:bg-accent1/50 font-semibold btn btn-outline">
                Doties uz sākumu
            </a>
        </div>
    </div>
</x-app-layout>
