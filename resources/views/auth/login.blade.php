@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto my-20 bg-white rounded-lg shadow-lg overflow-hidden md:max-w-lg">
            <div class="md:flex">
                <div class="w-full p-3">
                    <div class="flex justify-between items-center">
                        <h2 class="text-gray-900 font-medium text-xl">Login</h2>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500"
                                value="{{ old('email') }}">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password"
                                class="w-full px-3 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
                        </div>
                    </form>
                    <div class="mt-4 text-center">
                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Don't have an account?
                            Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
