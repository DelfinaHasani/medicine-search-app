<x-app-layout>
    <div class="min-h-screen flex flex-col items-center py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 mt-4 text-black">Aplikacioni për Kërkimin e Ilaçeve</h1>

        <form id="searchForm" method="POST" action="{{ route('medicine.search') }}" class="w-full max-w-4xl flex gap-4 items-center">
            @csrf
            <input
                type="text"
                name="ndc"
                id="ndc"
                placeholder="Shkruaj kodet të ndara me presje, 12345-6789, 11111-2222, 99999-0000"
                class="flex-grow border border-gray-300 rounded-md p-3 shadow-sm focus:ring-2 focus:ring-blue-500"
                required
            >
            <button
                type="submit"
                class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition"
            >
                Kërko
            </button>
            <a
                href="{{ route('medicine.index') }}"
                class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 transition"
            >
                Pastro
            </a>
        </form>

        {{-- Spinner --}}
        <div id="spinner" class="hidden mt-6">
            <div class="w-10 h-10 border-4 border-gray-300 border-t-blue-500 rounded-full animate-spin"></div>
        </div>

        @isset($results)
            <div id="resultsContainer" class="w-full flex justify-center mt-10 px-4 transition-opacity duration-300">
                <div class="max-w-4xl w-full overflow-x-auto">
                    <table class="w-full border border-gray-200 shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Kodi</th>
                                <th class="px-4 py-2 border">Emri i produktit</th>
                                <th class="px-4 py-2 border">Prodhuesi</th>
                                <th class="px-4 py-2 border">Lloji i produktit</th>
                                <th class="px-4 py-2 border">Burimi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($results as $item)
                                <tr class="border-t">
                                    <td class="px-4 py-2 border">{{ $item['ndc_code'] }}</td>
                                    <td class="px-4 py-2 border">{{ $item['brand_name'] ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item['labeler_name'] ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item['product_type'] ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $item['source'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endisset
    </div>

    {{-- Spinner JS --}}
    <script>
        const form = document.getElementById('searchForm');
        const spinner = document.getElementById('spinner');
        const results = document.getElementById('resultsContainer');

        form.addEventListener('submit', function () {
            spinner.classList.remove('hidden');
            if (results) {
                results.classList.add('opacity-50');
            }
        });
    </script>
</x-app-layout>
