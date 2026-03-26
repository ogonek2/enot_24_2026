@extends('layouts.app')

@section('title', 'Реєстрація')

@section('content')
<div class="mx-auto w-full max-w-md py-10">
    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Створення акаунта</h1>
            <p class="mt-1 text-sm text-slate-500">Зареєструйтесь для доступу до панелі.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="mb-1 block text-sm font-medium text-slate-700">Ім'я</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('name') border-red-400 @enderror">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('email') border-red-400 @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-1 block text-sm font-medium text-slate-700">Пароль</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('password') border-red-400 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password-confirm" class="mb-1 block text-sm font-medium text-slate-700">Підтвердіть пароль</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring">
            </div>

            <button type="submit"
                    class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700">
                Зареєструватися
            </button>

            @if (Route::has('login'))
                <p class="text-center text-sm text-slate-600">
                    Вже є акаунт?
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">Увійти</a>
                </p>
            @endif
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
