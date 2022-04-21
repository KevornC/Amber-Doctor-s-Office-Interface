<div>
    {{-- In work, do what you enjoy. --}}
    <!-- component -->
<body class="font-mono bg-gray-400">
    <div class="container mx-auto">
        <div class="flex justify-end p-2">
            <button wire:click="$emit('closeModal')"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg></button>
        </div>
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-full lg:w-11/12 flex">
                <!-- Col -->
                <div class="flex w-full bg-gradient-to-tr bg-red-600 i justify-around items-center">
                    <div>
                      <h1 class="text-white font-bold text-4xl font-sans">Forgot Password</h1>
                      <p class="text-white mt-1">~Let's recover your password</p>
                      
                    </div>
                <!-- Col -->
                <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <div class="px-8 mb-4 text-center">
                        <h3 class="pt-4 mb-2 text-2xl">Forgot Your Password?</h3>
                        <p class="mb-4 text-sm text-gray-700">
                            We get it, stuff happens. Just enter your email address below and we'll send you a
                            link to reset your password!
                        </p>
                    </div>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" wire:submit.prevent='sendEmail' autocomplete="off">
                        @if(Session()->has('notFound'))
                        <div class="flex bg-red-500 max-w-sm mt-4 mb-4 w-full">
                          <div class="w-16 bg-red-500">
                              <div class="p-4">
                                <button type="button" wire:click="closeNotFoundAlert">
                                  <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z" fill="#FFF"/><path d="M341.22 170.781c-8.077-8.077-21.172-8.077-29.249 0L170.78 311.971c-8.077 8.077-8.077 21.172 0 29.249 4.038 4.039 9.332 6.058 14.625 6.058s10.587-2.019 14.625-6.058l141.19-141.191c8.076-8.076 8.076-21.171 0-29.248z" fill="#FFF"/><path d="M341.22 311.971l-141.191-141.19c-8.076-8.077-21.172-8.077-29.248 0-8.077 8.076-8.077 21.171 0 29.248l141.19 141.191a20.616 20.616 0 0 0 14.625 6.058 20.618 20.618 0 0 0 14.625-6.058c8.075-8.077 8.075-21.172-.001-29.249z" fill="#FFF"/></svg>
                                </button>
                                </div>
                          </div>
                          <div class="w-auto text-black opacity-75 items-center p-4">
                              <span class="text-lg font-bold pb-4">
                                  Oops!
                              </span>
                              <p class="leading-tight">
                                  {{Session()->get('notFound')}}
                              </p>
                          </div>
                      </div>
                        @endif
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="@error('message') border-red-600 @enderror w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="email"
                                wire:model="email"
                                placeholder="Enter Email Address..."
                            />
                            @error('email')
                                <p class="mt-4 italic text-red-500 text-xs">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Reset Password
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</div>
