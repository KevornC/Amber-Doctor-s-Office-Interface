<div>
    {{-- Stop trying to control. --}}
    <div>
        {{-- Because she competes with no one, no one can compete with her. --}}

    <body class="antialiased font-sans bg-gray-200">
        @if(!$editMode)
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Amber Doctor's Office Staff</h2>
                </div>
                {{-- <form > --}}
                <div class="my-2 flex sm:flex-row flex-col">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative">
                            <p
                                class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            {{$staffCount}}
                            </p>
                        </div>
                        <div class="relative">
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                
                        <div class="relative">
                            <button wire:click="$emit('openModal','live-add-staff')" type="button" class='appearance-none h-full  sm:rounded-md rounded-md block w-full border-gray-400 text-white ml-2 py-2 px-4  leading-tight focus:outline-none hover:bg-blue-800 bg-blue-900 focus:border-gray-500'>Staff +</button>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
            <form wire:submit.prevent="search()">
                <div class="my-2 flex sm:flex-row flex-col">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative">
                           <input type='email' placeholder="Enter Email to search..." wire:model='searchItem' />
                           @error('searchItem')
                               <p class='text-xs text-red-500 italic'>
                                   {{$message}}
                               </p>
                           @enderror
                        </div>
                
                        <div class="relative">
                            <button type="submit" class='appearance-none h-full  sm:rounded-md rounded-md block w-full border-gray-400 text-white ml-2 py-2 px-4  leading-tight focus:outline-none hover:bg-red-600 bg-blue-900 focus:border-gray-500'>Search</button>
                        </div>
                    </div>
                </div>
            </form>
    
                       
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        @if($searchMode)
        <div class="relative">
            <button wire:click.prevent="returnBack" type="button" class='appearance-none h-full  sm:rounded-md rounded-md block w-full border-gray-400 text-white ml-2 py-2 px-4  leading-tight focus:outline-none hover:bg-red-600 bg-gray-500 focus:border-gray-500'>Return Back</button>
        </div>
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        name
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Email
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Action
                    </th>
                    
                </tr>
                </thead>
                <tbody>
                <tr>
                    @forelse ($search as $data )
                    
                   
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="ml-3">
                            {{ucfirst($data['name'])}}
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$data['email']}}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                       @if($data['status']=='Active')
                        <p class="bg-green-200 rounded-md text-center text-green-800 pr-2 pl-2 focus:outline-none">
                            {{ucfirst($data['status'])}}
                        </p>
                        @endif
                        @if($data['status']=='newlyOpened')
                        <p class="bg-orange-200 rounded-md text-center text-orange-800 pr-2 pl-2 focus:outline-none">
                            New
                        </p>
                        @endif
                        @if($data['status']=='Password Changed')
                        <p class="bg-yellow-200 rounded-md text-center text-orange-800 pr-2 pl-2 focus:outline-none">
                            Password Reset{{ucfirst($data['status'])}}
                        </p>
                        @endif
                        @if($data['status']=='disabled')
                        <p class="bg-red-600 rounded-md text-center text-white pr-2 pl-2 focus:outline-none">
                            Disabled
                        </p>
                        @endif
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <button class="bg-blue-900 rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="editStaff({{$data['id']}})">Edit</button>  
                        <button class="bg-orange-400 rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="updatePassword({{$data['id']}})">Reset Password</button>
                        @if($data['status']=='disabled')
                        <button class="bg-green-500 rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="enableStaff({{$data['id']}})">Enable</button>
                        @else
                        <button class="bg-red-900 text-white rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="disableStaff({{$data['id']}})">Disable</button>
                        @endif  
                      
                   </td>
                </tr>   
                    
                @empty
                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3" colspan="8">
                      <div class="flex items-center justify-center text-sm text-center">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="/icon/icon.png" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold">No Appointment Found</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforelse                      
            </tbody>
        </table>
        @else
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        name
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Email
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Action
                    </th>
                    
                </tr>
                </thead>
                <tbody>
                <tr>
                    @forelse ($staff['data'] as $data )
                    
                   
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-black text-sm">
                        <div class="flex items-center">
                            <div class="ml-3">
                            {{ucfirst($data['name'])}}
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-black bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{$data['email']}}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @if($data['status']=='Active')
                        <p class="bg-green-200 rounded-md text-center text-green-800 pr-2 pl-2 focus:outline-none">
                            {{ucfirst($data['status'])}}
                        </p>
                        @endif
                        @if($data['status']=='newlyOpened')
                        <p class="bg-orange-200 rounded-md text-center text-orange-800 pr-2 pl-2 focus:outline-none">
                            New
                        </p>
                        @endif
                        @if($data['status']=='Password Changed')
                        <p class="bg-yellow-200 rounded-md text-center text-orange-800 pr-2 pl-2 focus:outline-none">
                            Password Reset
                        </p>
                        @endif
                        @if($data['status']=='disabled')
                        <p class="bg-red-600 rounded-md text-center text-white pr-2 pl-2 focus:outline-none">
                            Disabled
                        </p>
                        @endif
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <button class="bg-blue-900 rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="editStaff({{$data['id']}})">Edit</button>  
                        <button class="bg-orange-400 rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="updatePassword({{$data['id']}})">Reset Password</button>
                        @if($data['status']=='disabled')
                        <button class="bg-green-500 rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="enableStaff({{$data['id']}})">Enable</button>
                        @else
                        <button class="bg-red-900 text-white rounded-md text-center text-white pr-2 pl-2 focus:outline-none" wire:click.prevent="disableStaff({{$data['id']}})">Disable</button>
                        @endif  
                      
                   </td>
                </tr>   
                    
                @empty
                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3" colspan="8">
                      <div class="flex items-center justify-center text-sm text-center">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="/icon/icon.png" alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold">No Appointments Available</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforelse                      
            </tbody>
        </table>

        @endif
                </div>
            </div>
    </div>
    </div>
    @else
    <div>
        {{-- Stop trying to control. --}}
        <div class="w-full bg-white items-center justify-center">
                <form wire:submit.prevent="updateStaff">
                    <div class="flex justify-center py-4 p-20">
                        <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
                            {{-- <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg> --}}
                            <img src="/icon/icon.png" />
                </div>
                </div>
            
                <div class="flex justify-center">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Edit Form</h1>
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
                    <button type="button" wire:click.prevent="cancel" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancel</button>
                    <button type="submit" class='w-auto bg-red-500 hover:bg-red-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Update</button>
                </div>
                </div>
                
                </form>        
        </div>
    </div>
    
    @endif
    </body>
    </div>
    
</div>
