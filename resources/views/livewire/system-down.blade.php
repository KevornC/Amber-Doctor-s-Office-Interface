<div>
    {{-- Do your work, then step back. --}}
    <div class="alert bg-gray-400 rounded-lg py-5 px-6 text-base text-white inline-flex items-center w-full alert-dismissible fade show" role="alert">
        <strong class="mr-1">Sorry! </strong> System is currently down.
        <button type="button" wire:click="$emit('closeModal')" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
        </button>
      </div>
</div>
