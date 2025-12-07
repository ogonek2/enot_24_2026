@if(isset($discounts) && $discounts->count() > 0)
<section class="mt-4">
    <div class="container mx-auto bg-white rounded-2xl p-4 md:p-6 lg:p-8">
        <div class="text-center mb-6 md:mb-8">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-enot-pink mb-2">Щотижневі акції:</h2>
            <p class="text-sm md:text-base font-sans text-gray-500">Не пропустіть вигідні акції та знижки</p>
        </div>

        <!-- Grid Container -->
        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 md:gap-6 lg:gap-8 justify-center items-center">
            @foreach($discounts as $discount)
                <a href="{{ route('promotion_page', $discount->id) }}" class="flex mx-auto justify-center items-center w-28 h-28 sm:w-40 sm:h-40 md:w-44 md:h-44 lg:w-48 lg:h-48">
                    <div class="rounded-full w-full h-full flex items-center justify-center transition-all duration-300 hover:scale-105 hover:-translate-y-2 shadow-lg hover:shadow-xl cursor-pointer"
                         style="background-color: {{ $discount->color ?? '#fdd9e5' }};">
                        <div class="text-center px-4">
                            @if($discount->discount_action)
                                <div class="text-xs sm:text-sm md:text-base lg:text-lg font-bold text-gray-800 uppercase leading-tight">
                                    {{ $discount->telegram_name }}
                                </div>
                            @else
                                <div class="text-xs sm:text-sm md:text-base lg:text-lg font-bold text-gray-800 uppercase leading-tight">
                                    Акція
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

