<section id="contact" class="bg-white py-16">
  <div class="mx-auto max-w-3xl px-6 sm:px-8 lg:px-12">
    <h2 class="text-4xl font-extrabold text-center mb-10 text-gray-900">Contact</h2>
    <form action="#" method="POST" class="space-y-8 bg-white p-8 rounded-lg shadow-xl border border-gray-200">
      <!-- Name Field -->
      <div class="relative">
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Kamu</label>
        <div class="relative mt-1">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A6.974 6.974 0 0112 15c1.66 0 3.19.571 4.379 1.52m.622-1.52A6.974 6.974 0 0112 9a6.974 6.974 0 00-5.379 2.52M8 14c.368-.474.935-.998 1.621-1.303M12 3c2.209 0 4 1.791 4 4a4 4 0 11-8 0c0-2.209 1.791-4 4-4z" />
            </svg>
          </span>
          <input type="text" id="name" name="name" required class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
      </div>
      <!-- Email Field -->
      <div class="relative">
        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email Kamu</label>
        <div class="relative mt-1">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 5h-9a2.5 2.5 0 00-2.5 2.5v9a2.5 2.5 0 002.5 2.5h9a2.5 2.5 0 002.5-2.5v-9a2.5 2.5 0 00-2.5-2.5zM4.5 9H12M4.5 15H12" />
            </svg>
          </span>
          <input type="email" id="email" name="email" required class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
      </div>
      <!-- Message Field -->
      <div class="relative">
        <label for="message" class="block text-sm font-medium text-gray-700">Pesan Kamu</label>
        <textarea id="message" name="message" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
      </div>
      <!-- Submit Button -->
      <div>
        <button type="submit" class="w-full rounded-md bg-indigo-600 py-3 text-white hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Send Message</button>
      </div>
    </form>
  </div>
</section>
