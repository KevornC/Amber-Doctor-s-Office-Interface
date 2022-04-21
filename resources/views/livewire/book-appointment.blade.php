<div>
  {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
<div class="">
<div class="flex justify-end p-2 bg-white">
  <button wire:click="$emit('closeModal')"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg></button>
</div>
  <div class="relative bg-white shadow-xl">
      <div class=" px-6">
        <h3 class="text-lg font-medium text-white text-center bg-primary-500 rounded p-4">Set Appointment</h3>
        <form wire:submit.prevent="setAppointment" autocomplete="off">
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
          <div class="mt-6 grid grid-cols-2 gap-y-6">
          <div>
            <label for="first-name" class="block text font-medium text-gray-900">First name</label>
            <div class="mt-1">
              <input type="text" id="first-name" placeholder="Enter first name..." wire:model='firstName' class="py-3 px-4 block w-full shadow text-gray-900 border-indigo-500 rounded-md">
            </div>
            @error('firstName')
            <p class="text-xs text-red-500 italic">
              {{$message}}
            </p>
            @enderror
          </div>
          <div class="pl-4">
            <label for="last-name" class="block text font-medium text-gray-900">Last name</label>
            <div class="mt-1">
              <input type="text" id="last-name" placeholder="Enter last name..." wire:model="lastName" class="py-3 px-4 block w-full shadow text-gray-900 focus:border-indigo-500 rounded-md">
            </div>
            @error('lastName')
            <p class="text-xs text-red-500 italic">
              {{$message}}
            </p>
            @enderror
          </div>
          <div>
            <label for="appointmentdate" class="block text font-medium text-gray-900">Appointment Date</label>
            <div class="mt-1">
              <input id="appointmentdate" placeholder="Enter appointment date..." type="date" wire:model='appointmentDate' class="py-3 px-4 block w-full shadow text-gray-900 focus:border-indigo-500 rounded-md">
            </div>
            @error('appointmentDate')
            <p class="text-xs text-red-500 italic">
              {{$message}}
            </p>
            @enderror
          </div>
          <div class='pl-4'>
            <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
            <select id="time" wire:model='time' class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
              <option value="">Select Slot</option>
              <option value="9:00 AM">9:00 AM</option>
              <option value="9:30 AM">9:30 AM</option>
              <option value="10:00 AM">10:00 AM</option>
              <option value="10:30 AM">10:30 AM</option>
              <option value="11:00 AM">11:00 AM</option>
              <option value="11:30 AM">11:30 AM</option>
              <option value="12:00 PM">12:00 PM</option>
              <option value="12:30 PM">12:30 PM</option>
              <option value="2:00 PM">2:00 PM</option>
              <option value="2:30 PM">2:30 PM</option>
              <option value="3:00 PM">3:00 PM</option>
              <option value="3:30 PM">3:30 PM</option>
              <option value="4:00 PM">4:00 PM</option>
            </select>
            @error('time')
            <p class="text-xs text-red-500 italic">
              {{$message}}
            </p>
            @enderror
          </div>

          <div class="">
            <div class="flex justify-between">
              <label for="phone" class="block text font-medium text-gray-900">Phone</label>
              <span id="phone" class="text text-gray-500"></span>
            </div>
            <div class="mt-1">
              <input type="tel" placeholder="xxx-xxx-xxxx" wire:model='phoneNumber' id="phone" class="py-3 px-4 block w-full shadow text-gray-900 focus:border-indigo-500 rounded-md" aria-describedby="phone-required">
            </div>
            @error('phoneNumber')
            <p class="text-xs text-red-500 italic">
              {{$message}}
            </p>
            @enderror
          </div>
          <div class="pl-4">
            <label for="subject" class="block text font-medium text-gray-900">Subject</label>
            <div class="mt-1">
              <input type="text" placeholder="What is it about?" wire:model='subject' id="subject" class="py-3 px-4 block w-full shadow text-gray-900 focus:border-indigo-500 rounded-md">
            </div>
            @error('subject')
            <p class="text-xs text-red-500 italic">
              {{$message}}
            </p>
            @enderror
          </div>
          <div class="sm:col-span-2">
            <div class="flex justify-between">
              <label for="message" class="block text font-medium text-gray-900">Reason</label>
              <span id="message-max" class="text text-gray-500">Max. 500 characters</span>
            </div>
            <div class="mt-1">
              <textarea wire:model='reason' placeholder="Enter reason..." id="message" rows="4" class="py-3 px-4 block w-full shadow text-gray-900 focus:border-indigo-500 border rounded-md" aria-describedby="message-max"></textarea>
            </div>
            @error('reason')
            <p class="text-xs text-red-500 italic">
              {{$message}}
            </p>
            @enderror
          </div>
          </div>

          <div class="flex justify-center p-4">
            <button type="submit" class="  px-10 py-3 border border-transparent rounded-md shadow text-base font-medium text-white bg-primary-500 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2">
              Book
            </button>
          </div>

        </form>
      </div>
  </div>
</div>

</div>
