<x-app-layout>
    <div class="container mx-auto px-4 mt-12 max-w-4xl">
        <h2 class="text-2xl font-bold mb-4">Medikamentet e Ruajtura</h2>

        {{-- Butoni Eksporto--}}
        <div class="flex justify-end mb-4">
            <a href="{{ route('medicines.export') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Eksporto CSV
            </a>
        </div>

        {{-- Tabela --}}
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border">NDC Code</th>
                    <th class="py-2 px-4 border">Brand Name</th>
                    <th class="py-2 px-4 border">Labeler</th>
                    <th class="py-2 px-4 border">Product Type</th>
                    <th class="py-2 px-4 border">Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicines as $medicine)
                    <tr>
                        <td class="py-2 px-4 border">{{ $medicine->ndc_code }}</td>
                        <td class="py-2 px-4 border">{{ $medicine->brand_name }}</td>
                        <td class="py-2 px-4 border">{{ $medicine->labeler_name }}</td>
                        <td class="py-2 px-4 border">{{ $medicine->product_type }}</td>
                        <td class="py-2 px-4 border">{{ $medicine->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Paginimi --}}
        <div class="mt-4">
            {{ $medicines->links() }}
        </div>
    </div>
</x-app-layout>
