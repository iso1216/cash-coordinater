<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('注文') }}
		</h2>
	</x-slot>

	<div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
		<div class="my-4 flex justify-center">
			<div class="bg-white shadow p-6 rounded-lg w-1/2">
				<form action="{{ route('goods.store') }}" method="post">
					@csrf
					<div class="mb-4">
						<label for="name" class="block text-gray-700 text-sm font-bold mb-2">商品名</label>
						<input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
					</div>
					<div class="mb-4">
						<label for="cost" class="block text-gray-700 text-sm font-bold mb-2">単価</label>
						<input type="number" name="cost" id="cost" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
					</div>
					<div class="flex justify-end">
						<button type="submit" class="py-2 px-4 btn btn-primary">追加する</button>
						<a href="{{ route('goods.index') }}" class="py-2 px-4 ml-4 btn btn-secondary">キャンセル</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app-layout>
