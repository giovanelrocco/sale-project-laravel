<div>
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $customer->name)" required autofocus autocomplete="name" />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
</div>

<div class="flex items-center gap-4">
    <x-primary-button onclick="window.location.href='{{route('customers')}}'" type="button"  >{{ __('Cancel') }}</x-primary-button>
    <x-primary-button>{{ __('Save') }}</x-primary-button>
    @if (session('status') === 'customer-updated')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400"
        >{{ __('Saved.') }}</p>
    @endif
</div>