<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('storage/source/logo_icon.svg') }}" type="image/x-icon">
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#30C1F0',
                        secondary: '#002B5B',
                        accent: '#26A9D9',
                        success: '#10B981',
                        warning: '#F59E0B',
                        error: '#EF4444',
                        // Gradient colors
                        'gradient-purple': '#8B5CF6',
                        'gradient-blue': '#3B82F6',
                        'gradient-cyan': '#06B6D4',
                        // Custom purple
                        'custom-purple': '#993EFA'
                    },
                    fontFamily: {
                        'inter': ['f_inter', 'Inter', 'sans-serif']
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'fade-in-left': 'fadeInLeft 0.6s ease-out',
                        'fade-in-right': 'fadeInRight 0.6s ease-out',
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'gradient-shift': 'gradientShift 3s ease infinite'
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        fadeInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        fadeInRight: {
                            '0%': { opacity: '0', transform: 'translateX(30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        gradientShift: {
                            '0%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                            '100%': { backgroundPosition: '0% 50%' }
                        }
                    }
                }
            }
        }
    </script>
    
    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/box_containers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fixed_elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/windows.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind-integration.css') }}">
    {{-- SwiperJs CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- For style --}}
    @yield('styles')
    {{-- Seo --}}
    @yield('seo_tags')
</head>

<body>
    {{-- First element --}}
    <div id="app">
        @include('includes.windows.feedback_form-fd')
        <div class="app-container">
            <div class="app-container-navigator">
                @include('includes.fixed.navigator')
            </div>
            <div class="app-container-elements">
                @yield('content')
            </div>
            <div class="app-container-footer">
                @include('includes.fixed.footer')
            </div>
        </div>
    </div>

    {{-- Back to Top Button --}}
    {{-- <button id="back-to-top" class="fixed bottom-6 right-6 bg-primary hover:bg-accent text-white rounded-full w-12 h-12 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 z-50 opacity-0 invisible">
        <i class="fas fa-arrow-up text-lg"></i>
    </button> --}}

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- InputMask --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"
        integrity="sha512-F5Ul1uuyFlGnIT1dk2c4kB4DBdi5wnBJjVhL7gQlGh46Xn0VhvD8kgxLtjdZ5YN83gybk/aASUAlpdoWUjRR3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- SwiperJs CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- Modern UI JavaScript --}}
    <script src="{{ asset('js/modern-ui.js') }}"></script>
    @yield('scripts')
    <script>
        $(document).ready(function() {
            // Hide all modals on page load
            $('.modal').hide();
            
            // Initialize modal functionality
            initializeModals();
        });

        function initializeModals() {
            // Open modal
            $(document).on('click', '.modal_fade', function(e) {
                e.preventDefault();
                let modalId = $(this).data('modal');
                let modal = $(`#modalfade_${modalId}`);
                
                if (modal.length) {
                    openModal(modal);
                }
            });

            // Close modal
            $(document).on('click', '.close-modal-md', function(e) {
                e.preventDefault();
                let modalId = $(this).data('modal');
                let modal = $(`#modalfade_${modalId}`);
                
                if (modal.length) {
                    closeModal(modal);
                }
            });

            // Close modal on overlay click
            $(document).on('click', '.modal .overlay', function(e) {
                e.preventDefault();
                let modal = $(this).closest('.modal');
                closeModal(modal);
            });

            // Close modal on Escape key
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape') {
                    let openModal = $('.modal:visible');
                    if (openModal.length) {
                        closeModal(openModal);
                    }
                }
            });

            // Prevent modal content clicks from closing modal
            $(document).on('click', '.modal .modal-container', function(e) {
                e.stopPropagation();
            });
        }

        function openModal(modal) {
            // Add active class for animations
            modal.addClass('active');
            modal.fadeIn(300);
            
            // Prevent body scroll
            $('body').addClass('modal-open');
            
            // Focus on first input
            modal.find('input, textarea, select').first().focus();
        }

        function closeModal(modal) {
            // Remove active class
            modal.removeClass('active');
            modal.fadeOut(300);
            
            // Allow body scroll
            $('body').removeClass('modal-open');
            
            // Clear form if it's a feedback modal
            if (modal.hasClass('feedback')) {
                modal.find('form')[0].reset();
                modal.find('.error').removeClass('error');
                modal.find('.error-message').removeClass('show');
                modal.find('#successMessage').removeClass('show');
                modal.find('form').show(); // Show form again if it was hidden
            }
        }

        // Feedback form handling
        $(document).on('submit', '#feedbackForm', function(e) {
            e.preventDefault();
            
            let form = $(this);
            let submitBtn = form.find('#submitBtn');
            let modal = form.closest('.modal');
            
            // Clear previous errors
            form.find('.error').removeClass('error');
            form.find('.error-message').removeClass('show');
            
            // No loading state to reset
            
            // Validate form
            let isValid = true;
            let name = form.find('#name').val().trim();
            let phone = form.find('#phone').val().trim();
            let message = form.find('#message').val().trim();
            
            // Validate name
            if (!name) {
                form.find('#name').addClass('error');
                form.find('#nameError').text('Ім\'я є обов\'язковим полем').addClass('show');
                isValid = false;
            }
            
            // Validate phone
            if (!phone) {
                form.find('#phone').addClass('error');
                form.find('#phoneError').text('Номер телефону є обов\'язковим полем').addClass('show');
                isValid = false;
            } else if (!isValidPhone(phone)) {
                form.find('#phone').addClass('error');
                form.find('#phoneError').text('Введіть коректний номер телефону').addClass('show');
                isValid = false;
            }
            
            if (!isValid) {
                return;
            }
            
            // No loading state - submit immediately
            
            // Send AJAX request
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Hide form and show success message
                    form.hide();
                    modal.find('#successMessage').addClass('show');
                    
                    // Auto close modal after 3 seconds
                    setTimeout(function() {
                        closeModal(modal);
                    }, 3000);
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors || {};
                    let errorMessage = xhr.responseJSON?.message || 'Виникла помилка при відправці повідомлення';
                    
                    // Show server validation errors
                    Object.keys(errors).forEach(function(field) {
                        let fieldElement = form.find('#' + field);
                        let errorElement = form.find('#' + field + 'Error');
                        
                        if (fieldElement.length && errorElement.length) {
                            fieldElement.addClass('error');
                            errorElement.text(errors[field][0]).addClass('show');
                        }
                    });
                    
                    // Show general error message if no specific field errors
                    if (Object.keys(errors).length === 0) {
                        alert(errorMessage);
                    }
                    
                    // No loading state to reset
                },
                complete: function() {
                    // No loading state to reset
                }
            });
        });
        
        // Phone validation function
        function isValidPhone(phone) {
            // Clean phone number - remove all non-digits
            let cleanPhone = phone.replace(/\D/g, '');
            
            // Ukrainian phone number patterns
            // +380XXXXXXXXX (12 digits) or 0XXXXXXXXX (10 digits)
            if (cleanPhone.startsWith('380') && cleanPhone.length === 12) {
                return true;
            }
            if (cleanPhone.startsWith('0') && cleanPhone.length === 10) {
                return true;
            }
            
            // Check if it's a complete formatted number with InputMask
            // +380 (XX) XXX-XX-XX = 18 characters total
            if (phone.length === 18 && phone.includes('+380') && phone.includes('(') && phone.includes(')') && !phone.includes('_')) {
                let digits = phone.replace(/\D/g, '');
                return digits.length === 12 && digits.startsWith('380');
            }
            
            return false;
        }
        
        // Initialize phone mask using InputMask library
        $(document).ready(function() {
            $('#phone').inputmask({
                mask: '+380 (99) 999-99-99',
                placeholder: '_',
                showMaskOnHover: false,
                showMaskOnFocus: true,
                clearIncomplete: true,
                onBeforePaste: function (pastedValue, opts) {
                    // Remove all non-digits
                    var processedValue = pastedValue.replace(/\D/g, '');
                    // Remove leading 380 if present
                    if (processedValue.startsWith('380')) {
                        processedValue = processedValue.substring(3);
                    }
                    return processedValue;
                }
            });
        });
        
        // Clear errors when user starts typing in any field
        $(document).on('input', '#feedbackForm input, #feedbackForm textarea', function() {
            $(this).removeClass('error');
            $(this).siblings('.error-message').removeClass('show');
        });
        
        // Clear errors when user starts typing in consultation form fields
        $(document).on('input', '#consultationForm input, #consultationForm textarea', function() {
            $(this).removeClass('error');
            $(this).siblings('.error-message').removeClass('show');
        });
        
        // Clear errors when user starts typing in courier form fields
        $(document).on('input', '#courierForm input, #courierForm textarea', function() {
            $(this).removeClass('error');
            $(this).siblings('.error-message').removeClass('show');
        });
        
        // Clear errors when user starts typing in phone fields (for InputMask)
        $(document).on('keyup', '#phone, #phone_fd, #courier_phone', function() {
            $(this).removeClass('error');
            $(this).siblings('.error-message').removeClass('show');
        });
        
        // Initialize phone masks for all forms
        $(document).ready(function() {
            // Phone mask for feedback modal form
            $('#phone').inputmask({
                mask: '+380 (99) 999-99-99',
                placeholder: '_',
                showMaskOnHover: false,
                showMaskOnFocus: true,
                clearIncomplete: true,
                onBeforePaste: function (pastedValue, opts) {
                    var processedValue = pastedValue.replace(/\D/g, '');
                    if (processedValue.startsWith('380')) {
                        processedValue = processedValue.substring(3);
                    }
                    return processedValue;
                }
            });
            
            // Phone mask for consultation form
            $('#phone_fd').inputmask({
                mask: '+380 (99) 999-99-99',
                placeholder: '_',
                showMaskOnHover: false,
                showMaskOnFocus: true,
                clearIncomplete: true,
                onBeforePaste: function (pastedValue, opts) {
                    var processedValue = pastedValue.replace(/\D/g, '');
                    if (processedValue.startsWith('380')) {
                        processedValue = processedValue.substring(3);
                    }
                    return processedValue;
                }
            });
            
            // Phone mask for courier form
            $('#courier_phone').inputmask({
                mask: '+380 (99) 999-99-99',
                placeholder: '_',
                showMaskOnHover: false,
                showMaskOnFocus: true,
                clearIncomplete: true,
                onBeforePaste: function (pastedValue, opts) {
                    var processedValue = pastedValue.replace(/\D/g, '');
                    if (processedValue.startsWith('380')) {
                        processedValue = processedValue.substring(3);
                    }
                    return processedValue;
                }
            });
        });
        
        // Consultation form handling
        $(document).on('submit', '#consultationForm', function(e) {
            e.preventDefault();
            
            let form = $(this);
            let submitBtn = form.find('#consultationSubmitBtn');
            
            // Clear previous errors
            form.find('.error').removeClass('error');
            form.find('.error-message').removeClass('show');
            
            // Validate form
            let isValid = true;
            let name = form.find('#name_fd').val().trim();
            let phone = form.find('#phone_fd').val().trim();
            
            // Validate name
            if (!name) {
                form.find('#name_fd').addClass('error');
                form.find('#name_fdError').text('Ім\'я є обов\'язковим полем').addClass('show');
                isValid = false;
            }
            
            // Validate phone
            if (!phone) {
                form.find('#phone_fd').addClass('error');
                form.find('#phone_fdError').text('Номер телефону є обов\'язковим полем').addClass('show');
                isValid = false;
            } else if (!isValidPhone(phone)) {
                form.find('#phone_fd').addClass('error');
                form.find('#phone_fdError').text('Введіть коректний номер телефону').addClass('show');
                isValid = false;
            }
            
            if (!isValid) {
                return;
            }
            
            // Send AJAX request
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Show success message
                    alert('Дякуємо! Ми зв\'яжемося з вами найближчим часом.');
                    form[0].reset();
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors || {};
                    let errorMessage = xhr.responseJSON?.message || 'Виникла помилка при відправці повідомлення';
                    
                    // Show server validation errors
                    Object.keys(errors).forEach(function(field) {
                        let fieldElement = form.find('#' + field + '_fd');
                        let errorElement = form.find('#' + field + '_fdError');
                        
                        if (fieldElement.length && errorElement.length) {
                            fieldElement.addClass('error');
                            errorElement.text(errors[field][0]).addClass('show');
                        }
                    });
                    
                    // Show general error message if no specific field errors
                    if (Object.keys(errors).length === 0) {
                        alert(errorMessage);
                    }
                }
            });
        });
        
        // Courier form handling
        $(document).on('submit', '#courierForm', function(e) {
            e.preventDefault();
            
            let form = $(this);
            let submitBtn = form.find('#courierSubmitBtn');
            
            // Clear previous errors
            form.find('.error').removeClass('error');
            form.find('.error-message').removeClass('show');
            
            // Validate form
            let isValid = true;
            let name = form.find('#courier_name').val().trim();
            let phone = form.find('#courier_phone').val().trim();
            let message = form.find('#courier_message').val().trim();
            
            // Validate name
            if (!name) {
                form.find('#courier_name').addClass('error');
                form.find('#courier_nameError').text('Ім\'я є обов\'язковим полем').addClass('show');
                isValid = false;
            }
            
            // Validate phone
            if (!phone) {
                form.find('#courier_phone').addClass('error');
                form.find('#courier_phoneError').text('Номер телефону є обов\'язковим полем').addClass('show');
                isValid = false;
            } else if (!isValidPhone(phone)) {
                form.find('#courier_phone').addClass('error');
                form.find('#courier_phoneError').text('Введіть коректний номер телефону').addClass('show');
                isValid = false;
            }
            
            if (!isValid) {
                return;
            }
            
            // Send AJAX request
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Show success message
                    alert('Дякуємо! Ми зв\'яжемося з вами найближчим часом.');
                    form[0].reset();
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors || {};
                    let errorMessage = xhr.responseJSON?.message || 'Виникла помилка при відправці повідомлення';
                    
                    // Show server validation errors
                    Object.keys(errors).forEach(function(field) {
                        let fieldElement = form.find('#courier_' + field);
                        let errorElement = form.find('#courier_' + field + 'Error');
                        
                        if (fieldElement.length && errorElement.length) {
                            fieldElement.addClass('error');
                            errorElement.text(errors[field][0]).addClass('show');
                        }
                    });
                    
                    // Show general error message if no specific field errors
                    if (Object.keys(errors).length === 0) {
                        alert(errorMessage);
                    }
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.burger-btn', function() {
            $(this).toggleClass('active')
            $('.fixed-container-burger-bar').toggleClass('fade')
        })
    </script>

    {{-- Back to Top Button Script --}}
    <script>
        $(document).ready(function() {
            // Show/hide back to top button based on scroll position
            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    $('#back-to-top').removeClass('opacity-0 invisible').addClass('opacity-100 visible');
                } else {
                    $('#back-to-top').removeClass('opacity-100 visible').addClass('opacity-0 invisible');
                }
            });

            // Smooth scroll to top when button is clicked
            $('#back-to-top').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 800, 'easeInOutQuart');
                return false;
            });

            // Add easing function for smooth scroll
            $.easing.easeInOutQuart = function (x, t, b, c, d) {
                if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
                return -c/2 * ((t-=2)*t*t*t - 2) + b;
            };
        });
    </script>
    
    {{-- Reviews Slider Initialization --}}
    <script>
        $(document).ready(function() {
            // Initialize Reviews Swiper
            function initReviewsSwiper() {
                if (typeof Swiper !== 'undefined' && $('.reviews-swiper').length > 0) {
                    const reviewsSwiper = new Swiper('.reviews-swiper', {
                        slidesPerView: 2,
                        spaceBetween: 0,
                        centeredSlides: true,
                        loop: true,
                        autoplay: {
                            delay: 4000,
                            disableOnInteraction: false,
                            pauseOnMouseEnter: true,
                            stopOnLastSlide: false,
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                            dynamicBullets: false,
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 10,
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 10,
                            },
                            1024: {
                                slidesPerView: 2,
                                spaceBetween: 10,
                            }
                        },
                        effect: 'slide',
                        speed: 800,
                        watchSlidesProgress: true,
                        watchSlidesVisibility: true,
                        freeMode: false,
                        allowTouchMove: true,
                        grabCursor: true,
                    });
                    
                    // Event handlers
                    reviewsSwiper.on('autoplayStart', function () {
                        console.log('Reviews autoplay started');
                    });
                    
                    reviewsSwiper.on('slideChange', function () {
                        console.log('Reviews slide changed to:', reviewsSwiper.activeIndex);
                    });
                    
                    // Manual start if needed
                    setTimeout(function() {
                        if (reviewsSwiper && !reviewsSwiper.autoplay.running) {
                            reviewsSwiper.autoplay.start();
                            console.log('Manually started reviews autoplay');
                        }
                    }, 1000);
                    
                    console.log('Reviews Swiper initialized successfully');
                } else if (typeof Swiper === 'undefined') {
                    setTimeout(initReviewsSwiper, 100);
                }
            }
            
            // Start initialization
            initReviewsSwiper();
        });
    </script>
    
    <!-- Модальное окно для акций -->
    @include('includes.elements.promotion-modal')
</body>

</html>
