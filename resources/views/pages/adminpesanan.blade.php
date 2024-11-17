@extends('dashboard.main')
@section('content')

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex flex-wrap mt-6 -mx-3">
                <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
                  <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                    <div class="p-4">
                      <!-- Table -->
                      <div class="overflow-x-auto">
                        <table class="table-fixed w-full text-left border-collapse dark:text-white text-slate-700">
                          <thead>
                            <tr>
                              <th class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">Song</th>
                              <th class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">Artist</th>
                              <th class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">Year</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">Malcolm Lockyer</td>
                              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">1961</td>
                            </tr>
                            <tr>
                              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">Witchy Woman</td>
                              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">The Eagles</td>
                              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">1972</td>
                            </tr>
                            <tr>
                              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">Shining Star</td>
                              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">Earth, Wind, and Fire</td>
                              <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">1975</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- End of Table -->
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection