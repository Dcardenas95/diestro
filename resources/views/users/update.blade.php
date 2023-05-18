
@extends('users.index')

@section('users-update')

<x-guest-layout>
  <form method="POST" action="{{ route('user.seller.update', $user) }}">
     {{ method_field('PUT') }}
      @csrf

      <!-- Cedula -->
        <div>
            <x-input-label for="cedula" :value="__('Cedula')" />
            <x-text-input id="cedula" class="block mt-1 w-full" type="text" name="name" :value="old('cedula')" 
            value="{{$user->cedula}}"
            required autofocus autocomplete="cedula" />
            <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
        </div>
      <!-- Name -->
      <div>
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" 
          value="{{$user->name}}"
          required autofocus autocomplete="name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" 
          value="{{$user->email}}"
          required autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
          <x-input-label for="password" :value="__('Password')" />

          <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          value="{{$user->password}}"
                          name="password"
                          required autocomplete="new-password" />

          <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
          <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

          <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          value="{{$user->password}}"
                          name="password_confirmation" required autocomplete="new-password" />

          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">
          <x-primary-button class="ml-4">
              {{ __('Actualizar Usuario') }}
          </x-primary-button>
      </div>
  </form>
</x-guest-layout>    


@endsection
