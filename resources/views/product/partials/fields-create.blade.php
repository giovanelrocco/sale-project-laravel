<form method="post" action="{{ route('product.create') }}" class="mt-6 space-y-6">
    @csrf
    @method('put')

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')" />
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $product->description)" required autocomplete="description" />
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>

    <div>
        <x-input-label for="price" :value="__('Price')" />
        <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price', $product->price)" required autocomplete="price" />
        <x-input-error class="mt-2" :messages="$errors->get('price')" />
    </div>

    <div>
        <x-input-label for="qty" :value="__('Quantity')" />
        <x-text-input id="qty" name="qty" type="number" class="mt-1 block w-full" :value="old('qty', $product->qty)" required autocomplete="qty" />
        <x-input-error class="mt-2" :messages="$errors->get('qty')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'product-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Saved.') }}</p>
        @endif
    </div>
</form>