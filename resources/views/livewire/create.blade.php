<form class="flex" wire:submit.prevent="create">

    <div class="w-1/4 flex flex-col">
        <input type="text" class="focus:outline-none focus:border-gray-400 border border-gray-200 w-5/6 rounded py-2 px-4 w-5/6 @error('name') border-red-300 @enderror" wire:model.lazy="name" placeholder="Provider Name">
        @error('name')
            <span class="px-2 text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="w-2/4 flex flex-col">
        <input type="text" class="focus:outline-none focus:border-gray-400 border border-gray-200 w-5/6 rounded py-2 px-4 w-5/6 @error('class') border-red-300 @enderror" wire:model.lazy="class" placeholder="Class Namespace">
        @error('class')
            <span class="px-2 text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="w-1/4">
        <input type="submit" class="cursor-pointer hover:bg-indigo-600 rounded w-full py-2 bg-indigo-500 text-white" value="Add">
    </div>
</form>
