@extends('layouts.app')

@section('title')
    Для бізнесу / B2B - Екочистка одягу та домашнього текстилю
@endsection

@section('content')
    {{-- Hero Section --}}
    <div class="container mx-auto px-4 my-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center flex flex-col-reverse lg:flex-row">
            {{-- Left Content --}}
            <div class="space-y-8">
                <div class="space-y-6">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-medium">
                        <i class="fas fa-building mr-2"></i>
                        B2B
                    </div>

                    <h2 class="text-4xl lg:text-5xl font-bold leading-tight text-gray-900">
                        Послуги<br>для бізнесу
                    </h2>
                </div>
            </div>

            {{-- Right Form --}}
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 border border-gray-100 relative overflow-hidden">
                    {{-- Background Pattern --}}
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary/5 to-secondary/5 rounded-full -translate-y-16 translate-x-16">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-secondary/5 to-primary/5 rounded-full translate-y-12 -translate-x-12">
                    </div>

                    <div class="relative z-10">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Зв'яжіться з нами</h3>
                            <p class="text-gray-600">Заповніть форму і ми обов'язково відповімо</p>
                        </div>

                        <form id="consultationForm" method="POST" action="{{ route('feedback.submit') }}"
                            class="space-y-6">
                            @csrf
                            <div class="space-y-4">
                                <div class="form-group">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Ім'я *</label>
                                    <input type="text" name="name" id="name_fd" placeholder="Введіть ваше ім'я"
                                        required
                                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-primary focus:outline-none transition-all duration-300 text-lg bg-gray-50 focus:bg-white">
                                    <div class="error-message" id="name_fdError"></div>
                                </div>
                                <div class="form-group">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Номер телефону *</label>
                                    <input type="tel" name="phone" id="phone_fd" placeholder="+380 (XX) XXX XX XX"
                                        required
                                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-2xl focus:border-primary focus:outline-none transition-all duration-300 text-lg bg-gray-50 focus:bg-white">
                                    <div class="error-message" id="phone_fdError"></div>
                                </div>
                            </div>

                            <div class="pt-4">
                                <button id="consultationSubmitBtn"
                                    class="w-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-white px-8 py-4 rounded-2xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl group"
                                    type="submit">
                                    <i
                                        class="fas fa-paper-plane mr-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                    Відправити заявку
                                </button>
                            </div>

                            <div class="text-center pt-4">
                                <p class="text-sm text-gray-500">
                                    Натискаючи кнопку, ви погоджуєтесь з
                                    <a href="#" class="text-primary hover:underline">умовами обробки даних</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/scripts/price_slide.js') }}"></script>
    <script>
        // Page-specific animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add floating animation to stats
            document.querySelectorAll('.grid.grid-cols-3 > div').forEach((stat, index) => {
                stat.style.animationDelay = `${index * 0.2}s`;
                stat.classList.add('animate-fade-in-up');
            });
        });
    </script>
@endsection
