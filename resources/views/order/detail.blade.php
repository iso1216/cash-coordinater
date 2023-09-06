<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('会計詳細') }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="my-4 relative">
      <ul>
        @foreach ($orders as $order)
          <li class="flex justify-between mb-6 bg-white border rounded-lg px-4 pt-2">
            <p class="text-2xl">{{ $order->name }}</p>
            <p class="test-xl pt-2">{{ $order->num_of }}個</p>
          </li>
        @endforeach
      </ul>
      <a href="{{ route('order.index') }}" class="mt-2 absolute right-4 inline-block ml-4 py-1 px-4 btn btn-secondary text-decoration-none">戻る</a>
    </div>
  </div>
</x-app-layout>
