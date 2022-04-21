<div>
    {{-- Stop trying to control. --}}
    <div class="w-full bg-white items-center justify-center">
        <div class="flex justify-end p-2 bg-white">
            <button wire:click="$emit('closeModal')"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg></button>
          </div>
            <form>
                <div class="flex justify-center py-4 p-20">
                    <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
                        <img src="/icon/icon.png" />
            </div>
            </div>
        
            <div class="flex justify-center">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Add Form</h1>
            </div>
        </div>
        
        
        @if(Session()->has('error'))
  <div class="flex bg-red-500 max-w-sm mt-4 mb-4 w-full">
    <div class="w-16 bg-red-500">
        <div class="p-4">
          <button type="button" wire:click="closeAlert">
            <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z" fill="#FFF"/><path d="M341.22 170.781c-8.077-8.077-21.172-8.077-29.249 0L170.78 311.971c-8.077 8.077-8.077 21.172 0 29.249 4.038 4.039 9.332 6.058 14.625 6.058s10.587-2.019 14.625-6.058l141.19-141.191c8.076-8.076 8.076-21.171 0-29.248z" fill="#FFF"/><path d="M341.22 311.971l-141.191-141.19c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.076-8.077 21.171 0 29.248l141.19 141.191a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058c8.075-8.077 8.075-21.172-.001-29.249z" fill="#FFF"/></svg>
          </button>
          </div>
    </div>
    <div class="w-auto text-black opacity-75 items-center p-4">
        <span class="text-lg font-bold pb-4">
            Oops!
        </span>
        <p class="leading-tight">
            {{Session()->get('error')}}
        </p>
    </div>
</div>
  @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name</label>
                <input wire:model="name" class="@error('name')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:border-transparent" type="text" placeholder="Enter name..." />
                @error('name')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                <input wire:model="email" class="@error('email')  border-red-500 @enderror py-2 px-3 rounded-lg border-2 border-gray-200 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="email" placeholder="Enter email..." />
                @error('email')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message}}
                </p>
                @enderror
            </div>
            </div>            
            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button type="button" wire:click="$emit('closeModal')" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
                <button type="submit" wire:click.prevent="generateStaff" class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Create</button>
            </div>
            </div>
            
            </form>        
    </div>
</div>

