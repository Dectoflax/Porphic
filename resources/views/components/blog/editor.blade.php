<div class="flex flex-col {{ $width }}">
    <textarea wire:model.defer="{{ $attribute }}" class="{{ $height }}ouline-none rounded"
        placeholder="{{ $placeholder }}"></textarea>
    @error($attribute)
    <span class="text-sm text-red-400">{{ $message }}</span>
    @enderror
</div>
