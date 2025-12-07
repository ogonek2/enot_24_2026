@php
    // Получаем данные из контроллера, если они переданы
    $branches = $branches ?? [];
    
    // Если данных нет, получаем пустой массив
    if (empty($branches)) {
        $branches = [];
    }
@endphp

<div 
    id="branches-slider-app"
    data-branches="{{ json_encode($branches) }}"
    data-initial-city="Київ"
></div>

