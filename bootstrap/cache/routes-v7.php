<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/filament/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.auth.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.auth.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.pages.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/b2bs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.b2bs.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/b2bs/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.b2bs.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.categories.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/categories/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.categories.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.cities.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cities/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.cities.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cta-headers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.cta-headers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cta-headers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.cta-headers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/groups' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.groups.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/groups/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.groups.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/locations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.locations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/locations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.locations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/orders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.orders.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/discounts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.discounts.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/discounts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.discounts.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/services' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.services.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/services/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.services.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vI7LDGFdCfd38gUK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LkbkYMPBbFiW5eGi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s7Ad6CboI6sjyMxs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ypZBemmtz6yM8JeG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/modal-promotion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::R8uLgj9te5U9E4mM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/promotions-banner' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SwBKDgKU9epoJ2KR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iP0Ccgez2ftBxnvL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'welcome',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/poslugi-ta-cini' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'services',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/search-services' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'search_services',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/placeholder-services' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'placeholder_services',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dlya-biznesu' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'b2b_page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/viklikati-kuryera' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'courier_page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dostavka' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delivery_page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/lokatsii' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locations_page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/aktsii' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'promotions',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kontakty' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contacts_page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/cart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cart.get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/cart/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cart.add',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/pickup-locations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pickup.locations',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oformlennya-zamovlennya' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'checkout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/order/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/order/consultation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.consultation',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/order-success' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.success',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/feedback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'feedback.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/services/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.services.import',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test-telegram' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sZ58kjIfGqMHIURT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4sQ2PRQubYPHyKzZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vAlrHSxtljmM6AI0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qDkQqhffhBf4l9b1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/filament/assets/(.*)(*:28)|/admin/(?|b2bs/([^/]++)/edit(*:63)|c(?|ategories/([^/]++)/edit(*:97)|ities/([^/]++)/edit(*:123)|ta\\-headers/([^/]++)/edit(*:156))|groups/([^/]++)/edit(*:185)|locations/([^/]++)/edit(*:216)|orders/([^/]++)/edit(*:244)|discounts/([^/]++)/edit(*:275)|services/([^/]++)/edit(*:305)|users/([^/]++)/edit(*:332))|/livewire/message/([^/]++)(*:367)|/([^/]++)/livewire/message/([^/]++)(*:410)|/l(?|ivewire/preview\\-file/([^/]++)(*:453)|okatsii/(.*)(*:473))|/p(?|oslugi\\-ta\\-cini/(?|posluga/([^/]++)(*:523)|([^/]++)(*:539))|assword/reset/([^/]++)(*:570))|/dlya\\-biznesu/([^/]++)(*:602)|/a(?|ktsii/([^/]++)(*:629)|pi/cart/(?|([^/]++)(?|(*:659))|clear(*:673)))|/order\\-success/([^/]++)(*:707)|/invoice/([^/]++)/download(*:741))/?$}sDu',
    ),
    3 => 
    array (
      28 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.asset',
          ),
          1 => 
          array (
            0 => 'file',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      63 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.b2bs.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      97 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.categories.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      123 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.cities.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      156 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.cta-headers.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      185 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.groups.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      216 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.locations.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.orders.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      275 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.discounts.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      305 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.services.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      332 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.resources.users.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      367 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.message',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      410 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.message-localized',
          ),
          1 => 
          array (
            0 => 'locale',
            1 => 'name',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      453 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.preview-file',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      473 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'location_page',
          ),
          1 => 
          array (
            0 => 'seo_link',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      523 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'service_page',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      539 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category_page',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      570 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      602 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'b2b_page_show',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      629 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'promotion_page',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      659 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cart.update',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'cart.remove',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      673 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cart.clear',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      707 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.success.id',
          ),
          1 => 
          array (
            0 => 'orderId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      741 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.download',
          ),
          1 => 
          array (
            0 => 'orderId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'filament.asset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'filament/assets/{file}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
        ),
        'uses' => 'Filament\\Http\\Controllers\\AssetController@__invoke',
        'controller' => 'Filament\\Http\\Controllers\\AssetController',
        'as' => 'filament.asset',
        'namespace' => NULL,
        'prefix' => '/filament',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'file' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'filament/logout',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:595:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:379:"function (\\Illuminate\\Http\\Request $request): \\Filament\\Http\\Responses\\Auth\\Contracts\\LogoutResponse {
                \\Filament\\Facades\\Filament::auth()->logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return \\app(\\Filament\\Http\\Responses\\Auth\\Contracts\\LogoutResponse::class);
            }";s:5:"scope";s:34:"Illuminate\\Support\\ServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000009b20000000000000000";}";s:4:"hash";s:44:"GYw1UZ+6eIlv47G2S4I+ci/tVq2o40I7EUldywF5qsU=";}}',
        'as' => 'filament.auth.logout',
        'namespace' => NULL,
        'prefix' => '/filament',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.auth.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
        ),
        'uses' => 'Filament\\Http\\Livewire\\Auth\\Login@__invoke',
        'controller' => 'Filament\\Http\\Livewire\\Auth\\Login',
        'as' => 'filament.auth.login',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.pages.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'Filament\\Pages\\Dashboard@__invoke',
        'controller' => 'Filament\\Pages\\Dashboard',
        'as' => 'filament.pages.dashboard',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.b2bs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/b2bs',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\B2bResource\\Pages\\ListB2bs@__invoke',
        'controller' => 'App\\Filament\\Resources\\B2bResource\\Pages\\ListB2bs',
        'as' => 'filament.resources.b2bs.index',
        'namespace' => NULL,
        'prefix' => 'admin/b2bs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.b2bs.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/b2bs/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\B2bResource\\Pages\\CreateB2b@__invoke',
        'controller' => 'App\\Filament\\Resources\\B2bResource\\Pages\\CreateB2b',
        'as' => 'filament.resources.b2bs.create',
        'namespace' => NULL,
        'prefix' => 'admin/b2bs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.b2bs.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/b2bs/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\B2bResource\\Pages\\EditB2b@__invoke',
        'controller' => 'App\\Filament\\Resources\\B2bResource\\Pages\\EditB2b',
        'as' => 'filament.resources.b2bs.edit',
        'namespace' => NULL,
        'prefix' => 'admin/b2bs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.categories.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/categories',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories@__invoke',
        'controller' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\ListCategories',
        'as' => 'filament.resources.categories.index',
        'namespace' => NULL,
        'prefix' => 'admin/categories',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.categories.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/categories/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory@__invoke',
        'controller' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\CreateCategory',
        'as' => 'filament.resources.categories.create',
        'namespace' => NULL,
        'prefix' => 'admin/categories',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.categories.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/categories/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory@__invoke',
        'controller' => 'App\\Filament\\Resources\\CategoryResource\\Pages\\EditCategory',
        'as' => 'filament.resources.categories.edit',
        'namespace' => NULL,
        'prefix' => 'admin/categories',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.cities.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cities',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\CityResource\\Pages\\ListCities@__invoke',
        'controller' => 'App\\Filament\\Resources\\CityResource\\Pages\\ListCities',
        'as' => 'filament.resources.cities.index',
        'namespace' => NULL,
        'prefix' => 'admin/cities',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.cities.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cities/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\CityResource\\Pages\\CreateCity@__invoke',
        'controller' => 'App\\Filament\\Resources\\CityResource\\Pages\\CreateCity',
        'as' => 'filament.resources.cities.create',
        'namespace' => NULL,
        'prefix' => 'admin/cities',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.cities.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cities/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\CityResource\\Pages\\EditCity@__invoke',
        'controller' => 'App\\Filament\\Resources\\CityResource\\Pages\\EditCity',
        'as' => 'filament.resources.cities.edit',
        'namespace' => NULL,
        'prefix' => 'admin/cities',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.cta-headers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cta-headers',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\CtaHeaderResource\\Pages\\ListCtaHeaders@__invoke',
        'controller' => 'App\\Filament\\Resources\\CtaHeaderResource\\Pages\\ListCtaHeaders',
        'as' => 'filament.resources.cta-headers.index',
        'namespace' => NULL,
        'prefix' => 'admin/cta-headers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.cta-headers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cta-headers/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\CtaHeaderResource\\Pages\\CreateCtaHeader@__invoke',
        'controller' => 'App\\Filament\\Resources\\CtaHeaderResource\\Pages\\CreateCtaHeader',
        'as' => 'filament.resources.cta-headers.create',
        'namespace' => NULL,
        'prefix' => 'admin/cta-headers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.cta-headers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cta-headers/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\CtaHeaderResource\\Pages\\EditCtaHeader@__invoke',
        'controller' => 'App\\Filament\\Resources\\CtaHeaderResource\\Pages\\EditCtaHeader',
        'as' => 'filament.resources.cta-headers.edit',
        'namespace' => NULL,
        'prefix' => 'admin/cta-headers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.groups.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/groups',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\GroupResource\\Pages\\ListGroups@__invoke',
        'controller' => 'App\\Filament\\Resources\\GroupResource\\Pages\\ListGroups',
        'as' => 'filament.resources.groups.index',
        'namespace' => NULL,
        'prefix' => 'admin/groups',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.groups.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/groups/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\GroupResource\\Pages\\CreateGroup@__invoke',
        'controller' => 'App\\Filament\\Resources\\GroupResource\\Pages\\CreateGroup',
        'as' => 'filament.resources.groups.create',
        'namespace' => NULL,
        'prefix' => 'admin/groups',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.groups.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/groups/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\GroupResource\\Pages\\EditGroup@__invoke',
        'controller' => 'App\\Filament\\Resources\\GroupResource\\Pages\\EditGroup',
        'as' => 'filament.resources.groups.edit',
        'namespace' => NULL,
        'prefix' => 'admin/groups',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.locations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/locations',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\LocationResource\\Pages\\ListLocations@__invoke',
        'controller' => 'App\\Filament\\Resources\\LocationResource\\Pages\\ListLocations',
        'as' => 'filament.resources.locations.index',
        'namespace' => NULL,
        'prefix' => 'admin/locations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.locations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/locations/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\LocationResource\\Pages\\CreateLocation@__invoke',
        'controller' => 'App\\Filament\\Resources\\LocationResource\\Pages\\CreateLocation',
        'as' => 'filament.resources.locations.create',
        'namespace' => NULL,
        'prefix' => 'admin/locations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.locations.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/locations/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\LocationResource\\Pages\\EditLocation@__invoke',
        'controller' => 'App\\Filament\\Resources\\LocationResource\\Pages\\EditLocation',
        'as' => 'filament.resources.locations.edit',
        'namespace' => NULL,
        'prefix' => 'admin/locations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.orders.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\OrderResource\\Pages\\ListOrders@__invoke',
        'controller' => 'App\\Filament\\Resources\\OrderResource\\Pages\\ListOrders',
        'as' => 'filament.resources.orders.index',
        'namespace' => NULL,
        'prefix' => 'admin/orders',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.orders.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/orders/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\OrderResource\\Pages\\EditOrder@__invoke',
        'controller' => 'App\\Filament\\Resources\\OrderResource\\Pages\\EditOrder',
        'as' => 'filament.resources.orders.edit',
        'namespace' => NULL,
        'prefix' => 'admin/orders',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.discounts.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/discounts',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\PromotionResource\\Pages\\ListPromotions@__invoke',
        'controller' => 'App\\Filament\\Resources\\PromotionResource\\Pages\\ListPromotions',
        'as' => 'filament.resources.discounts.index',
        'namespace' => NULL,
        'prefix' => 'admin/discounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.discounts.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/discounts/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\PromotionResource\\Pages\\CreatePromotion@__invoke',
        'controller' => 'App\\Filament\\Resources\\PromotionResource\\Pages\\CreatePromotion',
        'as' => 'filament.resources.discounts.create',
        'namespace' => NULL,
        'prefix' => 'admin/discounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.discounts.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/discounts/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\PromotionResource\\Pages\\EditPromotion@__invoke',
        'controller' => 'App\\Filament\\Resources\\PromotionResource\\Pages\\EditPromotion',
        'as' => 'filament.resources.discounts.edit',
        'namespace' => NULL,
        'prefix' => 'admin/discounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.services.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/services',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\ServiceResource\\Pages\\ListServices@__invoke',
        'controller' => 'App\\Filament\\Resources\\ServiceResource\\Pages\\ListServices',
        'as' => 'filament.resources.services.index',
        'namespace' => NULL,
        'prefix' => 'admin/services',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.services.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/services/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\ServiceResource\\Pages\\CreateService@__invoke',
        'controller' => 'App\\Filament\\Resources\\ServiceResource\\Pages\\CreateService',
        'as' => 'filament.resources.services.create',
        'namespace' => NULL,
        'prefix' => 'admin/services',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.services.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/services/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\ServiceResource\\Pages\\EditService@__invoke',
        'controller' => 'App\\Filament\\Resources\\ServiceResource\\Pages\\EditService',
        'as' => 'filament.resources.services.edit',
        'namespace' => NULL,
        'prefix' => 'admin/services',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\UserResource\\Pages\\ListUsers@__invoke',
        'controller' => 'App\\Filament\\Resources\\UserResource\\Pages\\ListUsers',
        'as' => 'filament.resources.users.index',
        'namespace' => NULL,
        'prefix' => 'admin/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/create',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\UserResource\\Pages\\CreateUser@__invoke',
        'controller' => 'App\\Filament\\Resources\\UserResource\\Pages\\CreateUser',
        'as' => 'filament.resources.users.create',
        'namespace' => NULL,
        'prefix' => 'admin/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/{record}/edit',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          1 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          2 => 'Illuminate\\Session\\Middleware\\StartSession',
          3 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          4 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          5 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          6 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          7 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          8 => 'Filament\\Http\\Middleware\\MirrorConfigToSubpackages',
          9 => 'Filament\\Http\\Middleware\\Authenticate',
        ),
        'uses' => 'App\\Filament\\Resources\\UserResource\\Pages\\EditUser@__invoke',
        'controller' => 'App\\Filament\\Resources\\UserResource\\Pages\\EditUser',
        'as' => 'filament.resources.users.edit',
        'namespace' => NULL,
        'prefix' => 'admin/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vI7LDGFdCfd38gUK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::vI7LDGFdCfd38gUK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.message' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/message/{name}',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\HttpConnectionHandler@__invoke',
        'controller' => 'Livewire\\Controllers\\HttpConnectionHandler',
        'as' => 'livewire.message',
        'middleware' => 
        array (
          0 => 'web',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.message-localized' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '{locale}/livewire/message/{name}',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\HttpConnectionHandler@__invoke',
        'controller' => 'Livewire\\Controllers\\HttpConnectionHandler',
        'as' => 'livewire.message-localized',
        'middleware' => 
        array (
          0 => 'web',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/upload-file',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\FileUploadHandler@handle',
        'controller' => 'Livewire\\Controllers\\FileUploadHandler@handle',
        'as' => 'livewire.upload-file',
        'middleware' => 
        array (
          0 => 'web',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.preview-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/preview-file/{filename}',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\FilePreviewHandler@handle',
        'controller' => 'Livewire\\Controllers\\FilePreviewHandler@handle',
        'as' => 'livewire.preview-file',
        'middleware' => 
        array (
          0 => 'web',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LkbkYMPBbFiW5eGi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@source',
        'controller' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@source',
        'as' => 'generated::LkbkYMPBbFiW5eGi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s7Ad6CboI6sjyMxs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@maps',
        'controller' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@maps',
        'as' => 'generated::s7Ad6CboI6sjyMxs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ypZBemmtz6yM8JeG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a530000000000000000";}";s:4:"hash";s:44:"6zMrrmhaDjoZTkm2hdZB00uxB0bAbObDAo0kmMzqy14=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ypZBemmtz6yM8JeG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::R8uLgj9te5U9E4mM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/modal-promotion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PromotionController@getModalPromotion',
        'controller' => 'App\\Http\\Controllers\\Api\\PromotionController@getModalPromotion',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::R8uLgj9te5U9E4mM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SwBKDgKU9epoJ2KR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/promotions-banner',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PromotionController@getPromotionsForBanner',
        'controller' => 'App\\Http\\Controllers\\Api\\PromotionController@getPromotionsForBanner',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::SwBKDgKU9epoJ2KR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iP0Ccgez2ftBxnvL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\FeedbackController@submit',
        'controller' => 'App\\Http\\Controllers\\FeedbackController@submit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::iP0Ccgez2ftBxnvL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'welcome' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@index',
        'controller' => 'App\\Http\\Controllers\\IndexServices@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'welcome',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'services' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'poslugi-ta-cini',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@services',
        'controller' => 'App\\Http\\Controllers\\IndexServices@services',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'services',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'service_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'poslugi-ta-cini/posluga/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@service_page',
        'controller' => 'App\\Http\\Controllers\\IndexServices@service_page',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'service_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'poslugi-ta-cini/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@category_page',
        'controller' => 'App\\Http\\Controllers\\IndexServices@category_page',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'category_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'search_services' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/search-services',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@searchServices',
        'controller' => 'App\\Http\\Controllers\\IndexServices@searchServices',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'search_services',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'placeholder_services' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/placeholder-services',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@getPlaceholderServices',
        'controller' => 'App\\Http\\Controllers\\IndexServices@getPlaceholderServices',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'placeholder_services',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'b2b_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dlya-biznesu',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@b2b',
        'controller' => 'App\\Http\\Controllers\\IndexServices@b2b',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'b2b_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'b2b_page_show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dlya-biznesu/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@b2bShow',
        'controller' => 'App\\Http\\Controllers\\IndexServices@b2bShow',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'b2b_page_show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'courier_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'viklikati-kuryera',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@courier',
        'controller' => 'App\\Http\\Controllers\\IndexServices@courier',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'courier_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'delivery_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dostavka',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@delivery',
        'controller' => 'App\\Http\\Controllers\\IndexServices@delivery',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'delivery_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'locations_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lokatsii',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@locations',
        'controller' => 'App\\Http\\Controllers\\IndexServices@locations',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'locations_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'location_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lokatsii/{seo_link}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@location',
        'controller' => 'App\\Http\\Controllers\\IndexServices@location',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'location_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'seo_link' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'promotions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'aktsii',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@promotions',
        'controller' => 'App\\Http\\Controllers\\IndexServices@promotions',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'promotions',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'promotion_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'aktsii/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@promotion',
        'controller' => 'App\\Http\\Controllers\\IndexServices@promotion',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'promotion_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contacts_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kontakty',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\IndexServices@contacts',
        'controller' => 'App\\Http\\Controllers\\IndexServices@contacts',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'contacts_page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cart.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/cart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@getCart',
        'controller' => 'App\\Http\\Controllers\\CartController@getCart',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'cart.get',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cart.add' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/cart/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@addToCart',
        'controller' => 'App\\Http\\Controllers\\CartController@addToCart',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'cart.add',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cart.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'api/cart/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@updateCart',
        'controller' => 'App\\Http\\Controllers\\CartController@updateCart',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'cart.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cart.remove' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/cart/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@removeFromCart',
        'controller' => 'App\\Http\\Controllers\\CartController@removeFromCart',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'cart.remove',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cart.clear' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/cart/clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@clearCart',
        'controller' => 'App\\Http\\Controllers\\CartController@clearCart',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'cart.clear',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pickup.locations' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/pickup-locations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@getPickupLocations',
        'controller' => 'App\\Http\\Controllers\\CartController@getPickupLocations',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'pickup.locations',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'checkout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oformlennya-zamovlennya',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@checkout',
        'controller' => 'App\\Http\\Controllers\\CartController@checkout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'checkout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/order/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@submitOrder',
        'controller' => 'App\\Http\\Controllers\\CartController@submitOrder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'order.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.consultation' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/order/consultation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@submitConsultation',
        'controller' => 'App\\Http\\Controllers\\CartController@submitConsultation',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'order.consultation',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.success' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'order-success',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@orderSuccess',
        'controller' => 'App\\Http\\Controllers\\CartController@orderSuccess',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'order.success',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.success.id' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'order-success/{orderId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@orderSuccess',
        'controller' => 'App\\Http\\Controllers\\CartController@orderSuccess',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'order.success.id',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'invoice/{orderId}/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CartController@downloadInvoice',
        'controller' => 'App\\Http\\Controllers\\CartController@downloadInvoice',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'invoice.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'feedback.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'feedback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\FeedbackController@submit',
        'controller' => 'App\\Http\\Controllers\\FeedbackController@submit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'feedback.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.resources.services.import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/services/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Filament\\Resources\\ServiceResource\\Pages\\ImportServices@import',
        'controller' => 'App\\Filament\\Resources\\ServiceResource\\Pages\\ImportServices@import',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'filament.resources.services.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sZ58kjIfGqMHIURT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test-telegram',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:808:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:589:"function() {
    $controller = new \\App\\Http\\Controllers\\FeedbackController();
    $reflection = new \\ReflectionClass($controller);
    $method = $reflection->getMethod(\'sendTelegramNotification\');
    $method->setAccessible(true);
    
    try {
        $result = $method->invoke($controller, \'Test User\', \'+380123456789\', \'Test message from website\');
        return \\response()->json([\'success\' => true, \'message\' => \'Telegram notification sent successfully\']);
    } catch (\\Exception $e) {
        return \\response()->json([\'success\' => false, \'message\' => $e->getMessage()]);
    }
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a760000000000000000";}";s:4:"hash";s:44:"7CBfC2/AN7fHd2O84Fm02RDQR0G6HE9YTTE1WNzHkyo=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::sZ58kjIfGqMHIURT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4sQ2PRQubYPHyKzZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4sQ2PRQubYPHyKzZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vAlrHSxtljmM6AI0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vAlrHSxtljmM6AI0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qDkQqhffhBf4l9b1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::qDkQqhffhBf4l9b1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
