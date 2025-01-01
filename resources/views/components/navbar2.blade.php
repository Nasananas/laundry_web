<nav  class="bg-white shadow-lg fixed top-0 left-0 right-0 z-10">
   <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
     <div class="relative flex h-16 items-center justify-between">
       <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
         <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-[#556bce] hover:bg-gray-100 hover:text-[#556bce] focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#556bce]" aria-controls="mobile-menu" aria-expanded="false">
           <span class="absolute -inset-0.5"></span>
           <span class="sr-only">Open main menu</span>
           <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
             <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
           </svg>
           <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
             <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
           </svg>
         </button>
       </div>
       <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
         <div class="flex shrink-0 items-center">
         </div>
         <div class="hidden sm:ml-6 sm:block">
           <div class="flex space-x-4">
             <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-[#556bce] hover:bg-gray-100 hover:text-[#556bce]" aria-current="page">Dashboard</a>
           </div>
         </div>
       </div>
       <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
         <button type="button" class="relative rounded-full bg-white p-1 text-[#556bce] hover:text-[#556bce] focus:outline-none focus:ring-2 focus:ring-[#556bce] focus:ring-offset-2 focus:ring-offset-white">
             <span class="absolute -inset-1.5"></span>
             <span class="sr-only">View notifications</span>
             <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
             </svg>
         </button>
         <p class="text-gray-700 ml-4">Hello, <span class="font-bold">{{ Auth::guard('admin')->user()->name }}!</span></p>
     </div>     
     </div>
   </div>
 
   <div class="sm:hidden" id="mobile-menu">
     <div class="space-y-1 px-2 pb-3 pt-2">
       <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-[#556bce]" aria-current="page">Dashboard</a>
       <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-[#556bce] hover:bg-gray-100 hover:text-[#556bce]">Team</a>
       <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-[#556bce] hover:bg-gray-100 hover:text-[#556bce]">Projects</a>
       <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-[#556bce] hover:bg-gray-100 hover:text-[#556bce]">Calendar</a>
     </div>
   </div>
 </nav>
 