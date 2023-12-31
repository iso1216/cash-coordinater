<x-app-layout>
    <x-slot name="header">
		<h2 class="font-semibold text-lg text-slate-50 leading-tight m-0">
			{{ __('トップページ') }}
		</h2>
	</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('order.index') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    会計管理へ移動
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
