<x-app-layout>
  <x-slot name="header">
		<h2 class="font-semibold text-lg text-slate-50 leading-tight m-0">
			{{ __('注文詳細') }}
		</h2>
	</x-slot>

  <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="my-4 relative">
      <ul class="px-6">
        @foreach ($orders as $order)
          <li class="flex justify-between mb-2 bg-white border rounded-lg px-4 px-4">
            <p class="text-2xl flex items-center my-2">{{ $order->name }}</p>
            <p class="test-xl flex items-center my-0">{{ $order->num_of }}個</p>
          </li>
        @endforeach
      </ul>
      <a href="{{ route('order.index') }}" class="mt-2 absolute right-4 inline-block ml-4 py-1 px-4 btn bg-white text-decoration-none">戻る</a>
    </div>
  </div>
</x-app-layout>
