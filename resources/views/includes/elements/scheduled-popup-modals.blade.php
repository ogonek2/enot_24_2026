{{-- Заплановані банерні поп-апи: банер + форма як у секції консультації (FeedbackController) --}}
<div id="scheduled-popup-modal" class="fixed inset-0 z-[10102] hidden items-center justify-center p-3 sm:p-4" aria-hidden="true">
    <div class="scheduled-popup-backdrop absolute inset-0 bg-black/60 backdrop-blur-sm" data-scheduled-popup-close></div>
    <div class="relative z-10 w-full max-w-4xl max-h-[95vh] overflow-y-auto pointer-events-auto rounded-2xl shadow-2xl bg-white">
        <button type="button" class="absolute top-2 right-2 z-20 w-10 h-10 flex items-center justify-center text-gray-400 hover:text-gray-700 hover:bg-gray-100 rounded-full transition" data-scheduled-popup-close aria-label="Закрити">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>
        <div class="flex flex-col lg:flex-row lg:min-h-[420px]">
            <div class="w-full lg:w-1/2 bg-gradient-to-br from-primary/20 to-secondary/10 flex items-stretch justify-center min-h-[180px] lg:min-h-0">
                <img id="scheduled-popup-banner-mobile" src="" alt="" class="hidden w-full h-auto object-cover max-h-56 max-w-full lg:hidden" loading="lazy">
                <img id="scheduled-popup-banner-desktop" src="" alt="" class="hidden w-full h-auto object-contain p-4 max-h-[70vh] lg:block" loading="lazy">
            </div>
            <div class="w-full lg:w-1/2 p-6 sm:p-8 lg:p-10">
                <div class="text-center mb-6">
                    <div class="w-14 h-14 bg-enot-light-purple rounded-2xl flex items-center justify-center mx-auto mb-3 shadow">
                        <i class="fas fa-paper-plane text-primary text-xl"></i>
                    </div>
                    <h3 id="scheduled-popup-form-title" class="text-xl sm:text-2xl font-bold text-gray-900 mb-2">Зв'яжіться з нами</h3>
                    <p id="scheduled-popup-form-subtitle" class="text-gray-600 text-sm sm:text-base">Заповніть форму і ми обов'язково відповімо</p>
                </div>
                <form id="scheduledPopupConsultationForm" method="POST" action="{{ route('feedback.submit') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="source" value="scheduled_popup_modal">
                    <input type="hidden" name="popup_modal_id" id="scheduled_popup_modal_id" value="">
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ім'я *</label>
                        <input type="text" name="name" id="scheduled_popup_name" placeholder="Введіть ваше ім'я" required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-primary focus:outline-none transition text-base bg-gray-50 focus:bg-white">
                        <div class="error-message text-sm text-red-600 mt-1" id="scheduled_popup_nameError"></div>
                    </div>
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Номер телефону *</label>
                        <input type="tel" name="phone" id="scheduled_popup_phone" placeholder="+380 (XX) XXX XX XX" required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl focus:border-primary focus:outline-none transition text-base bg-gray-50 focus:bg-white">
                        <div class="error-message text-sm text-red-600 mt-1" id="scheduled_popup_phoneError"></div>
                    </div>
                    <button type="submit" id="scheduled_popup_submit" class="w-full bg-gradient-to-r from-primary to-secondary text-white px-8 py-3 rounded-full font-semibold text-base transition shadow hover:opacity-95">
                        <i class="fas fa-paper-plane mr-2"></i> Відправити заявку
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    var STORAGE_KEY = 'scheduled_popup_state_v1';

    function todayKey() {
        return new Date().toISOString().slice(0, 10);
    }

    function loadState() {
        try {
            var raw = localStorage.getItem(STORAGE_KEY);
            if (!raw) return { date: todayKey(), shownIds: [] };
            var s = JSON.parse(raw);
            if (s.date !== todayKey()) return { date: todayKey(), shownIds: [] };
            return { date: s.date, shownIds: Array.isArray(s.shownIds) ? s.shownIds : [] };
        } catch (e) {
            return { date: todayKey(), shownIds: [] };
        }
    }

    function saveState(state) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(state));
    }

    function markShown(id) {
        var state = loadState();
        if (state.shownIds.indexOf(id) === -1) state.shownIds.push(id);
        saveState(state);
    }

    function isValidPhone(phone) {
        var clean = phone.replace(/\D/g, '');
        if (clean.indexOf('380') === 0 && clean.length === 12) return true;
        if (clean.indexOf('0') === 0 && clean.length === 10) return true;
        if (phone.length === 18 && phone.indexOf('+380') !== -1 && phone.indexOf('(') !== -1 && phone.indexOf('_') === -1) {
            var d = phone.replace(/\D/g, '');
            return d.length === 12 && d.indexOf('380') === 0;
        }
        return false;
    }

    var overlay = document.getElementById('scheduled-popup-modal');
    if (!overlay) return;

    var queue = [];
    var pendingTimer = null;
    var gapTimer = null;
    var currentModal = null;

    function clearTimers() {
        if (pendingTimer) { clearTimeout(pendingTimer); pendingTimer = null; }
        if (gapTimer) { clearTimeout(gapTimer); gapTimer = null; }
    }

    function closeOverlay() {
        overlay.classList.add('hidden');
        overlay.classList.remove('flex');
        overlay.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
    }

    function applyBannerUrls(m) {
        var desk = document.getElementById('scheduled-popup-banner-desktop');
        var mob = document.getElementById('scheduled-popup-banner-mobile');
        var du = m.desktop_image_url;
        var mu = m.mobile_image_url;
        desk.removeAttribute('src');
        mob.removeAttribute('src');
        mob.classList.add('hidden');
        if (!du && !mu) {
            return;
        }
        if (du) {
            desk.src = du;
        } else if (mu) {
            desk.src = mu;
        }
        if (mu) {
            mob.src = mu;
        } else if (du) {
            mob.src = du;
        }
        if (mob.src) {
            mob.classList.remove('hidden');
        }
    }

    function fillFormCopy(m) {
        document.getElementById('scheduled_popup_modal_id').value = m.id;
        document.getElementById('scheduled-popup-form-title').textContent = m.form_title || "Зв'яжіться з нами";
        document.getElementById('scheduled-popup-form-subtitle').textContent = m.form_subtitle || "Заповніть форму і ми обов'язково відповімо";
        applyBannerUrls(m);
    }

    function openModal(m) {
        currentModal = m;
        fillFormCopy(m);
        overlay.classList.remove('hidden');
        overlay.classList.add('flex');
        overlay.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
        setTimeout(function () {
            var el = document.getElementById('scheduled_popup_name');
            if (el) el.focus();
        }, 200);
    }

    function scheduleNextAfterClose(closedModal) {
        var state = loadState();
        var remaining = queue.filter(function (x) { return state.shownIds.indexOf(x.id) === -1; });
        if (!remaining.length) return;
        var gapSec = closedModal && closedModal.seconds_after_close_until_next != null
            ? closedModal.seconds_after_close_until_next
            : 300;
        gapTimer = setTimeout(function () { tryShowFromQueue(); }, Math.max(0, gapSec) * 1000);
    }

    function tryShowFromQueue() {
        clearTimers();
        var state = loadState();
        var remaining = queue.filter(function (m) { return state.shownIds.indexOf(m.id) === -1; });
        if (!remaining.length) return;

        var first = remaining[0];
        var initialDelaySec = state.shownIds.length === 0
            ? (first.delay_before_show_seconds != null ? first.delay_before_show_seconds : 3)
            : 1;

        pendingTimer = setTimeout(function () {
            openModal(first);
        }, Math.max(0, initialDelaySec) * 1000);
    }

    function onCloseClicked() {
        var closed = currentModal;
        closeOverlay();
        if (closed) markShown(closed.id);
        currentModal = null;
        if (closed) scheduleNextAfterClose(closed);
    }

    document.querySelectorAll('[data-scheduled-popup-close]').forEach(function (el) {
        el.addEventListener('click', onCloseClicked);
    });

    document.addEventListener('DOMContentLoaded', function () {
        if (typeof jQuery !== 'undefined' && jQuery.fn.inputmask) {
            jQuery('#scheduled_popup_phone').inputmask({
                mask: '+380 (99) 999-99-99',
                placeholder: '_',
                showMaskOnHover: false,
                showMaskOnFocus: true,
                clearIncomplete: true,
                onBeforePaste: function (pastedValue) {
                    var processedValue = pastedValue.replace(/\D/g, '');
                    if (processedValue.indexOf('380') === 0) processedValue = processedValue.substring(3);
                    return processedValue;
                }
            });
        }

        jQuery(document).on('input', '#scheduledPopupConsultationForm input', function () {
            jQuery(this).removeClass('error');
            jQuery(this).siblings('.error-message').removeClass('show').text('');
        });
        jQuery(document).on('keyup', '#scheduled_popup_phone', function () {
            jQuery(this).removeClass('error');
            jQuery('#scheduled_popup_phoneError').removeClass('show').text('');
        });

        jQuery(document).on('submit', '#scheduledPopupConsultationForm', function (e) {
            e.preventDefault();
            var form = jQuery(this);
            form.find('.error').removeClass('error');
            form.find('.error-message').removeClass('show').text('');

            var name = jQuery.trim(jQuery('#scheduled_popup_name').val());
            var phone = jQuery.trim(jQuery('#scheduled_popup_phone').val());
            var ok = true;
            if (!name) {
                jQuery('#scheduled_popup_name').addClass('error');
                jQuery('#scheduled_popup_nameError').text("Ім'я є обов'язковим полем").addClass('show');
                ok = false;
            }
            if (!phone) {
                jQuery('#scheduled_popup_phone').addClass('error');
                jQuery('#scheduled_popup_phoneError').text('Номер телефону є обов\'язковим полем').addClass('show');
                ok = false;
            } else if (!isValidPhone(phone)) {
                jQuery('#scheduled_popup_phone').addClass('error');
                jQuery('#scheduled_popup_phoneError').text('Введіть коректний номер телефону').addClass('show');
                ok = false;
            }
            if (!ok) return;

            jQuery.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') },
                success: function () {
                    if (typeof showSuccessModal === 'function') showSuccessModal();
                    form[0].reset();
                    onCloseClicked();
                },
                error: function (xhr) {
                    var errors = (xhr.responseJSON && xhr.responseJSON.errors) ? xhr.responseJSON.errors : {};
                    var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Помилка відправки';
                    Object.keys(errors).forEach(function (field) {
                        var fe = jQuery('#scheduled_popup_' + field);
                        var ee = jQuery('#scheduled_popup_' + field + 'Error');
                        if (fe.length && ee.length) {
                            fe.addClass('error');
                            ee.text(errors[field][0]).addClass('show');
                        }
                    });
                    if (!Object.keys(errors).length) alert(msg);
                }
            });
        });

        fetch('/api/scheduled-popup-modals', { headers: { 'Accept': 'application/json' } })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (!data.modals || !data.modals.length) return;
                queue = data.modals;
                tryShowFromQueue();
            })
            .catch(function () {});
    });
})();
</script>

<style>
    #scheduledPopupConsultationForm .error-message { display: none; }
    #scheduledPopupConsultationForm .error-message.show { display: block; }
    #scheduledPopupConsultationForm input.error { border-color: #ef4444; background-color: #fef2f2; }
</style>
