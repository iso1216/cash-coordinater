<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('会計一覧') }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="my-4">
      <ul>
        @foreach ($orders as $order)
          <li class="flex relative mb-6 bg-white border rounded-lg pl-4 py-2">
            <p>{{ $order->name }}</p>
            <p>{{ $order->num_of }}個</p>
          </li>
        @endforeach
      </ul>
      <a href="{{ route('order.index') }}">戻る</a>
    </div>
  </div>
</x-app-layout>
