<x-layout heading="Products">

    <x-product-list :products="$products" />
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</x-layout>
