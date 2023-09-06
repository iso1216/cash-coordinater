<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('会計管理') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="my-4">
            <a href="{{ route('order.create') }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
                {{ __('注文する') }}
            </a>

            <a href="{{ route('goods.index') }}" class="inline-block ml-4 py-2 px-4 btn btn-secondary text-decoration-none">
                {{ __('商品の確認') }}
            </a>
        </div>

        <div class="my-4">
            @if (!empty($orders))
                <ul>
                    @foreach ($orders as $order)
                        <li class="mb-6 bg-white border rounded-lg p-4">
                            <h3 class="text-lg font-bold mb-2 border-bottom">{{ $order->id }}</h3>
                            <p class="text-gray-1000 mt-4">{{ $order->costs }}</p>
                            <a href="order.detail"></a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="flex justify-center items-center h-full">
                    <p class="text-lg text-gray-600">注文はありません。</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
