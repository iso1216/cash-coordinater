<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('支出一覧') }}
		</h2>
	</x-slot>

	<div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
		<div class="my-4 relative">
			<a href="{{ route('spends.create') }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
				{{ __('支出追加') }}
			</a>

			<h3 class="absolute right-4 top-0 ">総支出{{ $sum_cost_total }}円</h3>
		</div>

		<div class="my-4">
			@if (!empty($spends))
				<ul>
					@foreach ($spends as $spend)
						<li class="flex relative mb-2 bg-white border rounded-lg p-3">
							<div class="pr-4 mr-8 border-r-4 w-24"><h3 class="text-2xl font-bold flex items-center my-0">{{ $spend->user_name }}</h3></div>
							<div class="flex justify-between w-5/6">
								<p class="text-gray-1000 text-xl flex items-center m-0">{{ $spend->name }}</p>
								<p class="text-gray-1000 text-lg pl-4 flex items-center m-0">{{ $spend->cost }}円</p>
							</div>
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
