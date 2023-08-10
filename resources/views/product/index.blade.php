<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Products') }}
                </h2>
            </div>
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <x-primary-button onclick="window.location.href='{{route('product.create')}}'"  >{{ __('Create Product') }}</x-primary-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->qty }}</td>
                                    <td>
                                        <x-primary-button onclick="window.location.href='{{  route('product.create') . '/' . $product->id  }}'"  >{{ __('Edit') }}</x-primary-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
