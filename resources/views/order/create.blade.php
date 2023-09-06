<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('注文') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="my-4 flex justify-center">
            <div class="bg-white shadow p-6 rounded-lg w-1/2">
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    @foreach ($goods as $part_of_goods)
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{ $part_of_goods->name }}</label>
                        <input type="number" value=0 name="{{ $part_of_goods->id }}" id="{{ $part_of_goods->id }}" class="w-11/12 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500" required>
                        <label class="text-lg">個</label>
                    </div>
                    @endforeach
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="py-2 px-4 btn btn-primary">確定する</button>
                        <a href="{{ route('order.index') }}" class="py-2 px-4 ml-4 btn btn-secondary">キャンセル</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
