@if(isset($discounts) && $discounts->count() > 0)
<div id="promotions-block-app" data-promotions="{{ json_encode($discounts->map(function($discount) {
    return [
        'id' => $discount->id,
        'name' => $discount->name ?? 'Акція',
        'discount_action' => $discount->discount_action ?? '-50%',
        'locations' => $discount->locations ?? 'Всі',
        'color' => $discount->color ?? null,
        'text_color' => $discount->text_color ?? null,
        'discount_color' => $discount->discount_color ?? null,
        'banner' => $discount->banner ? asset('storage/' . $discount->banner) : null
    ];
})) }}"></div>
@endif
