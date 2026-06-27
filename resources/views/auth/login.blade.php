<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>

<div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
            class="mx-auto h-10 w-auto">

        <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-black">
            Login
        </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">

            @csrf

            <!-- Email -->
            <div>

                <label for="email"
                    class="block text-sm font-medium text-black">

                    Email address

                </label>

                <div class="mt-2">

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"

                        class="block w-full rounded-md border border-gray-300 px-3 py-2 text-black focus:border-indigo-500 focus:ring-indigo-500">

                </div>

                @error('email')
                    <p class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Password -->

            <div>

                <div class="flex items-center justify-between">

                    <label for="password"
                        class="block text-sm font-medium text-black">

                        Password

                    </label>

                    @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}"
                            class="text-sm font-semibold text-indigo-500 hover:text-indigo-400">

                            Forgot password?

                        </a>

                    @endif

                </div>

                <div class="mt-2">

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"

                        class="block w-full rounded-md border border-gray-300 px-3 py-2 text-black focus:border-indigo-500 focus:ring-indigo-500">

                </div>

                @error('password')
                    <p class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
            </div>

            <!-- Button -->
            <div>
                <button
                    type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-400">Sign in</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>