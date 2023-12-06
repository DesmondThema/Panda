@extends('app') @section('content') <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://www.joinpanda.com/img/ph-logo/horizontal-sm.png" alt="Panda" />
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('login') }}" method="POST"> @csrf <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email"  required class="block w-full rounded-md border-2 @if($errors->any()) border-red-500 @endif
                                      py-2 px-4 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                </div> @if($errors->has('email')) <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p> @endif @if($errors->has('non_field_errors')) <p class="text-red-500 text-sm mt-1">{{ $errors->first('non_field_errors') }}</p> @endif
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-2
                                      py-2 px-4 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                </div> @if($errors->has('password')) <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p> @endif
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> Sign in </button>
            </div>
        </form>
    </div>
</div> @endsection
