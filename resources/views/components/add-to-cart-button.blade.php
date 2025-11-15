<div 
    class="vue-add-to-cart-wrapper"
    data-vue-component="add-to-cart-button"
    data-service-id="{{ isset($serviceId) ? $serviceId : 0 }}"
    data-service-name="{{ isset($serviceName) ? htmlspecialchars($serviceName, ENT_QUOTES, 'UTF-8') : '' }}"
    data-has-individual="{{ (isset($hasIndividual) && $hasIndividual) ? 'true' : 'false' }}"
    data-price="{{ isset($price) ? $price : 0 }}"
    data-individual-price="{{ isset($individualPrice) ? $individualPrice : 0 }}">
</div>
