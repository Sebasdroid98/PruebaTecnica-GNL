 <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg {{ $class ?? '' }}">
   @isset($header)
      <div class="p-6 text-gray-900 dark:text-gray-100">
         {{ $header }}
      </div>
   @endisset

   <div class="p-6 text-gray-900 dark:text-gray-100">
      {{ $slot }}
   </div>
</div>