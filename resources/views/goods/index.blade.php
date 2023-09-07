<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('商品一覧') }}
		</h2>
	</x-slot>

	<div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
		<div class="my-4">
			<a href="{{ route('goods.create') }}" class="inline-block py-2 px-4 btn btn-primary text-decoration-none">
				{{ __('商品を追加する') }}
			</a>

		<div class="my-4">
			@if (!empty($goods))
				<ul>
					@foreach ($goods as $part_of_goods)
						<li class="flex justify-between mb-6 bg-white border rounded-lg p-4">
							<div class="flex" >
								<h3 class="text-xl font-bold pr-4 border-r-4">{{ $part_of_goods->name }}</h3>
								<p class="ml-4 text-lg">{{ $part_of_goods->cost }}円</p>
							</div>
							<div class="flex h-fit">
								<a href="{{ route('goods.edit', ['id' => $part_of_goods->id]) }}" class="btn btn-primary mr-2"
									role="button">
									{{ __('編集') }}
								</a>
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
