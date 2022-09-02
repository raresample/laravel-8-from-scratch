<x-dropdown>
  <x-slot name="trigger">
    <button class="py-2 pl-3 pr-9 text-sm font-semibold lg:w-32 w-full text-left flex lg:inline-flex">
      {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

      <x-icon class="absolute pointer-events-none" name="down-arrow"></x-down-arrow>
    </button>
  </x-slot>

  <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>

@php
  ['name' => 'john'] // name=john&
@endphp

  @foreach ($categories as $category)
    <x-dropdown-item 
    href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
    :active='request()->is("categories/{$category->slug}")'
    >
      {{ ucwords($category->name) }}
    </x-dropdown-item>
  @endforeach
</x-dropdown>