<x-layout heading="Create Product">


    <form method="POST" action="/products">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Product Details</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Provide detailed information about the product you are creating.
                </p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="name">
                            Name
                        </x-form-label>

                        <div class="mt-2">
                            <x-form-input name="name" id="name" placeholder="NoteBook" />
                            <x-form-error name="name" />
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <x-form-label for="price">
                            Price
                        </x-form-label>

                        <div class="mt-2">
                            <x-form-input name="price" id="price" placeholder="13.99$" />
                            <x-form-error name="price" />
                        </div>
                    </div>


                </div>
            </div>


        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>



</x-layout>
