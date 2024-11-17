<!-- resources/views/admin/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title', 'Dashboard-OLIVIA')</title>
      <style>
         /* CSS untuk konten utama */
         .content {
             margin-left: 16rem;
             padding: 2rem; 
         }
     </style>
      @vite('resources/css/app.css')
   </head>
   <body class="h-full">

      <div class="flex h-screen">
         <!-- Sidebar Component -->
         <x-sidebar2 />

          <!-- Mobile Sidebar (Offcanvas) -->
          <x-mobile-sidebar2 />

         <div class="flex-1 bg-gray-100 p-6">
            <!-- Header -->
            <x-header3 />

            <!-- Main Content -->
            <div class="bg-white shadow-lg rounded-lg content p-6">
               @yield('content')
            </div>
         </div>
      </div>
      <script>
         const menuBtn = document.getElementById('menu-btn');
         const mobileMenu = document.getElementById('mobile-menu');
         const closeMenu = document.getElementById('close-menu');

         // Open mobile menu
         if (menuBtn) {
            menuBtn.addEventListener('click', () => {
               mobileMenu.classList.remove('hidden');
            });
         }

         // Close mobile menu
         if (closeMenu) {
            closeMenu.addEventListener('click', () => {
               mobileMenu.classList.add('hidden');
            });
         }
      </script>
   </body>
</html>
