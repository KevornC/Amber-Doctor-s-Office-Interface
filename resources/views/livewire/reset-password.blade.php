<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
<div class="container max-w-full mx-auto md:py-24 px-6">
  <div class="max-w-sm mx-auto px-6">
        <div class="relative flex flex-wrap">
            <div class="w-full relative">
                <div class="md:mt-6">
                    <form class="mt-8" wire:submit.prevent="changePassword" autocomplete="off">
                        <div class="mx-auto max-w-lg ">
                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">New Password</span>
                                <input placeholder="Enter new password..." type="password" wire:model="password"
                                       class="@error('password') border-red-600 @enderror text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                                @error('password')
                                <p class="mt-4 italic text-red-500 text-xs">
                                {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="py-1">
                                <span class="px-1 text-sm text-gray-600">Password Confirm</span>
                                <input placeholder="Confirm password..." type="password" wire:model="passwordConfirmation"
                                       class=" @error('passwordConfirmation') border-red-600 @enderror text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">

                                @error('passwordConfirmation')
                                <p class="mt-4 italic text-red-500 text-xs">
                                {{$message}}
                                </p>
                                @enderror
                            </div>
                            <button class="mt-3 text-lg font-semibold
            bg-gray-800 w-full text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black" type="submit">
                                Reset
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
