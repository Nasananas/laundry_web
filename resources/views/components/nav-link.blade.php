@props(['active' => false])

<a {{ $attributes }} 
    class=" {{ $active ? 'bg-[#10375C] text-white' : 'text-gray-700 hover:bg-gray-700 hover:text-white'}} 
    rounded-md  px-3 py-2 text-sm font-medium " 
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>