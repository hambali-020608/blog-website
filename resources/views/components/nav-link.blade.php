@props(['active'=>false])
    <a {{$attributes}}  style="cursor: pointer"  class="rounded-md text-sm font-medium text-white text-gray-300 px-3 py-2 {{$active ? 'bg-gray-900': ''}} "  >{{$slot}}</a>