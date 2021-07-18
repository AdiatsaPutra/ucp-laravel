<div>
   <x-app-layout>
      <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data') }}
         </h2>
      </x-slot>

      @livewire('form-tambah-data')
   </x-app-layout>
</div>