<x-layout heading="Product Review">


    <div class="max-w-4xl mx-auto p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-1/2">
                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                    class="aspect-square w-full rounded-lg bg-gray-200 object-cover">
            </div>
            <div class="md:w-1/2">
                <h1 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h1>
                <p class="mt-4 text-lg font-medium text-gray-900">${{ $product->price }}</p>
                <p class="mt-4 text-gray-700">
                    {{ $product['description'] ?? 'No description available for this product.' }}
                </p>
                <a href="/products/{{ $product->id }}/edit"
                    class="inline-block mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Edit Product
                </a>
            </div>
        </div>
    </div>
</x-layout>
