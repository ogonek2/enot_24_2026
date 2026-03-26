@extends('layouts.app')

@section('title', 'Вхід')

@section('content')
<div class="mx-auto w-full max-w-md py-10">
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Вхід в акаунт</h1>
            <p class="mt-1 text-sm text-slate-500">Увійдіть, щоб керувати контентом.</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('email') border-red-400 @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-1 block text-sm font-medium text-slate-700">Пароль</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('password') border-red-400 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label for="remember" class="flex items-center gap-2 text-sm text-slate-600">
                <input class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                Запам'ятати мене
            </label>

            <button type="submit"
                    class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700">
                Увійти
            </button>

            <div class="flex items-center justify-between pt-1 text-sm">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">
                        Забули пароль?
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-slate-600 hover:text-slate-800 hover:underline">
                        Реєстрація
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection

@section('styles')
<style>
    #app .app-container-elements {
        padding-top: 80px !important;
    }
</style>
@endsection
