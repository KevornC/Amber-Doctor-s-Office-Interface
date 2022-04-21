<div>
    {{-- Stop trying to control. --}}
    @if(!$editMode)
    <table class="w-full">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Telephone</th>
            <th class="px-4 py-3">Appointment Date</th>
            <th class="px-4 py-3">Appointment Time</th>
            <th class="px-4 py-3">Subject</th>
            <th class="px-4 py-3">Reason</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @forelse($result['appointmentsForToday'] as $data)
          <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
              <div class="flex items-center text-sm">
                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full" src="/icon/icon.png" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">{{$data['firstName'].' '.$data['lastName']}}</p>
                  <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-sm">{{$data['tel']}}</td>
            <td class="px-4 py-3 text-sm">{{date('F d, Y',strtotime($data['appointmentDate']))}}</td>
            <td class="px-4 py-3 text-sm">{{$data['time']}}</td>
            <td class="px-4 py-3 text-sm">{{$data['subject']}}</td>
            <td class="px-4 py-3 text-sm">{{$data['reason']}}</td>
            <td class="px-4 py-3 text-sm">
              @if($data['status']=='New')
              <span class="px-2 py-1 font-semibold leading-tight bg-green-700 text-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{$data['status']}}</span>
              @endif
              @if($data['status']=='Active')
              <span class="px-2 py-1 font-semibold leading-tight bg-gray-700 text-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{$data['status']}}</span>
              @endif
              @if($data['status']=='Follow Up')
              <span class="px-2 py-1 font-semibold leading-tight bg-yellow-400 text-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{$data['status']}}</span>
              @endif
              @if($data['status']=='Cancelled')
              <span class="px-2 py-1 font-semibold leading-tight bg-gray-500 text-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{$data['status']}}</span>
              @endif
              @if($data['status']=='Showed')
              <span class="px-2 py-1 font-semibold leading-tight bg-blue-700 text-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{$data['status']}}</span>
              @endif
              @if($data['status']=='Did Not Show')
              <span class="px-2 py-1 font-semibold leading-tight bg-red-700 text-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{$data['status']}}</span>
              @endif
            </td>
            <td class="px-4 py-3 text-sm" colspan="2">
              <button class="rounded w-full bg-yellow-400" wire:click.prevent="editAppointment({{$data['id']}})">Edit</button>
              <select wire:model="statusChanged"class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="">Update Status</option>
                <option value="{{'Showed'.$data['id']}}">Showed</option>
                <option value="{{'Follow Up'.$data['id']}}">Follow Up</option>
                <option value="{{'Cancelled'.$data['id']}}">Cancelled</option>
                <option value="{{'Did Not Show'.$data['id']}}">Did Not Show</option>
              </select>
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
                  <p class="font-semibold">No Appointments For Today</p>
                  <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                </div>
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
      @else
      <div class="relative bg-white shadow-xl">
        <div class=" px-6">
          <h3 class="text-lg font-medium text-white text-center bg-primary-500 rounded p-4">Update Appointment</h3>
          <form wire:submit.prevent="updateAppointment" autocomplete="off">
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
  
            <div class="flex justify-around p-4">
              <div class="flex">
                <button wire:click.prevent="cancel" type="button" class="  px-10 py-3 border border-transparent rounded-md shadow text-base font-medium text-white bg-primary-500 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2">
                  Cancel
                </button>
              </div>
              <div>
              <button type="submit" class="pl-6 px-10 py-3 border border-transparent rounded-md shadow text-base font-medium text-white bg-green-500 hover:bg-green700 focus:outline-none focus:ring-2 focus:ring-offset-2">
                Update
              </button>
              </div>
            </div>
  
          </form>
        </div>
  
      @endif
</div>