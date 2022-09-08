<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border-gray-200">
      <h1 class="text-center font-bold text-xl">Register!</h1>
      <form action="/register" method="POST" class="mt-10">
        @csrf
        <div class="mb-6">
          <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
          <input type="text" name="name" id="name" value="{{ old('name') }}" class="border border-gray-400 p-2 w-full">
          @error('name')
            <p class="text-red-500 text-xs mt-1">
              {{ $message }}
            </p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
          <input type="text" name="username" id="username" value="{{ old('username') }}" class="border border-gray-400 p-2 w-full">
          @error('username')
            <p class="text-red-500 text-xs mt-1">
              {{ $message }}
            </p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
          <input type="text" name="email" id="email" value="{{ old('email') }}" class="border border-gray-400 p-2 w-full">
          @error('email')
            <p class="text-red-500 text-xs mt-1">
              {{ $message }}
            </p>
          @enderror
        </div>
        <div class="mb-6">
          <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
          <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full">
          @error('password')
            <p class="text-red-500 text-xs mt-1">
              {{ $message }}
            </p>
          @enderror
        </div>

        <!-- @error('username')
          <p class="text-red-500 text-ms mt-2">{{ $message }}</p>
        @enderror -->

        <div class="mb-6">
          <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" type="submit">Submit</button>
        </div>

        <!-- @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
              <li class="text-red-500 text-xs">{{ $error }}</li>
            @endforeach
          </ul>
        @endif -->
      </form>
    </main>
  </section>
</x-layout>