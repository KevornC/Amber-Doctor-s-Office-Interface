<div>
    {{-- Stop trying to control. --}}
    <!-- component -->
<div class="h-screen flex">
    <div class="flex w-1/2 bg-gradient-to-tr bg-red-600 i justify-around items-center">
      <div>
        <h1 class="text-white font-bold text-4xl font-sans">Amber Doctor's Office</h1>
        <p class="text-white mt-1">~Good health equals to Long Life</p>
        
      </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-white">
      <form class="bg-white" wire:submit.prevent='login'>
        @if(Session()->has('loginFailed'))
          <div class="flex bg-red-500 max-w-sm mt-4 mb-4 w-full">
            <div class="w-16 bg-red-500">
                <div class="p-4">
                  <button type="button" wire:click="closeLoginFailedAlert">
                    <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z" fill="#FFF"/><path d="M341.22 170.781c-8.077-8.077-21.172-8.077-29.249 0L170.78 311.971c-8.077 8.077-8.077 21.172 0 29.249 4.038 4.039 9.332 6.058 14.625 6.058s10.587-2.019 14.625-6.058l141.19-141.191c8.076-8.076 8.076-21.171 0-29.248z" fill="#FFF"/><path d="M341.22 311.971l-141.191-141.19c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.076-8.077 21.171 0 29.248l141.19 141.191a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058c8.075-8.077 8.075-21.172-.001-29.249z" fill="#FFF"/></svg>
                  </button>
                  </div>
            </div>
            <div class="w-auto text-black opacity-75 items-center p-4">
                <span class="text-lg font-bold pb-4">
                    Oops!
                </span>
                <p class="leading-tight">
                    {{Session()->get('loginFailed')}}
                </p>
            </div>
        </div>
          @endif
        @if(Session()->has('passwordChanged'))
          <div class="flex bg-green-500 max-w-sm mt-4 mb-4 w-full">
            <div class="w-16 bg-green-500">
                <div class="p-4">
                  <button type="button" wire:click="closePasswordChangedAlert">
                    <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z" fill="#FFF"/><path d="M341.22 170.781c-8.077-8.077-21.172-8.077-29.249 0L170.78 311.971c-8.077 8.077-8.077 21.172 0 29.249 4.038 4.039 9.332 6.058 14.625 6.058s10.587-2.019 14.625-6.058l141.19-141.191c8.076-8.076 8.076-21.171 0-29.248z" fill="#FFF"/><path d="M341.22 311.971l-141.191-141.19c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.076-8.077 21.171 0 29.248l141.19 141.191a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058c8.075-8.077 8.075-21.172-.001-29.249z" fill="#FFF"/></svg>
                  </button>
                  </div>
            </div>
            <div class="w-auto text-white opacity-75 items-center p-4">
                <span class="text-lg font-bold pb-4">
                    Yaay!
                </span>
                <p class="leading-tight">
                    {{Session()->get('passwordChanged')}}
                </p>
            </div>
        </div>
          @endif
        <h1 class="text-gray-800 font-bold text-2xl mb-1 text-center">Greetings!</h1>
        <p class="text-sm font-normal text-gray-600 mb-7">Happiness is not by chance but by <span class="text-2xl text-blue-700">choice</span></p>
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
          </svg>
          <input class="@error('email') border-red-500 @enderror pl-2 outline-none border-none" type="text" wire:model="email" id="" placeholder="Email Address" />
          @error('email')
          <p class="text-xs text-red-500 italic">
            {{$message}}
          </p>
          @enderror
        </div>
        <div class="py-2" x-data="{ show: true }">
            {{-- <span class="px-1 text-sm text-gray-600">Password</span> --}}
            <div class="relative flex items-center border-2 py-2 px-3 rounded-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                  </svg>
                  <input wire:model="password" placeholder="password" :type="show ? 'password' : 'text'" class="@error('password') border-red-500 @enderror pl-2 outline-none border-none">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                  :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                  viewbox="0 0 576 512">
                  <path fill="currentColor"
                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                  </path>
                </svg>

                <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                  :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                  viewbox="0 0 640 512">
                  <path fill="currentColor"
                    d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                  </path>
                </svg>

              </div>
              @error('password')
              <p class="text-xs text-red-500 italic">
                {{$message}}
              </p>
              @enderror
            </div>
          </div>
          @if(Session()->has('systemDown'))
        <button type="button" wire:click="$emit('openModal','system-down')" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
        <button type="button" wire:click="$emit('openModal','system-down')"><span class="text-sm ml-2 hover:text-blue-500 cursor-pointer border-b-2 border-gray-200 hover:border-gray-400">Forgot Password ?</span></button>
        @else
        <button type="submit" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
        <button type="button" wire:click="$emit('openModal','forgot-password')"><span class="text-sm ml-2 hover:text-blue-500 cursor-pointer border-b-2 border-gray-200 hover:border-gray-400">Forgot Password ?</span></button>
        @endif
      </form>
    </div>
  </div>
</div>
