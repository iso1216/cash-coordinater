<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-lg text-slate-50 leading-tight m-0">
			{{ __('注文一覧') }}
		</h2>
	</x-slot>

	<div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
		<div class="my-4 relative">
			<a href="{{ route('order.create') }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
				{{ __('会計追加') }}
			</a>

			<h3 class="absolute right-4 top-0 text-slate-50">総売上{{ $sum_cash_total }}円</h3>
		</div>

		<div class="my-4">
			@if (!empty($orders))
				<ul class="px-6">
					@foreach ($orders as $order)
						<li class="flex relative mb-2 bg-white border rounded-lg p-3">
							<div class="pt-2 pr-4 mr-8 border-r-4 w-20"><h3 class="text-2xl font-bold">{{ $order->cash_id }}</h3></div>
							<div class="flex justify-between w-5/6">
								<p class="text-gray-1000 text-xl flex items-center my-0">{{ $order->cash_total }}円</p>
								<p class="text-gray-1000 pl-4 align-bottom my-0 pt-4 pr-2">{{ $order->created_at->format('Y/m/d H:i') }}</p>
							</div>
							<a href="{{ route('order.detail', $order->cash_id) }}" class="mt-2 absolute right-4 inline-block ml-4 py-1 px-4 btn btn-secondary text-decoration-none shadow">詳細</a>
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
