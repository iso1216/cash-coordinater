<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('日ごと売上') }}
		</h2>
	</x-slot>

	<div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
		<div >
			@if ($len != 0)
				<ul>
					@foreach ($sum_cash_days as $day => $sum_cash_day)
					@if ($day != 0)
						<li class="mb-2 bg-white border rounded-lg p-3">
							<div class="flex" >
								<h3 class="text-xl font-bold pr-4 border-r-4 flex items-center my-0 w-36">{{ $day }}</h3>
								<p class="ml-4 text-xl flex items-center my-0">売上{{ $sum_cash_day }}円</p>
							</div>
						</li>
					@endif
					@endforeach
				</ul>
			@else
				<div class="flex justify-center items-center h-full">
					<p class="text-lg text-gray-600">売上はありません。</p>
				</div>
			@endif
		</div>
	</div>
</x-app-layout>
