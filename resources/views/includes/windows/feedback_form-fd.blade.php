<div class="modal feedback" id="modalfade_feedbackmd">
    <div class="modal-container">
        <div class="m-head">
            <h1>Зворотній зв'язок</h1>
            <p>Заповніть форму і ми з вами зв'яжимось!</p>
            <span class="close-modal-md" data-modal="feedbackmd">
                <i class="fa-solid fa-circle-xmark"></i>
            </span>
        </div>
        <div class="m-body">
            <div class="success-message" id="successMessage">
                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                Дякуємо! Ми зв'яжемося з вами найближчим часом.
            </div>
            <form id="feedbackForm" action="{{ route('feedback.submit') }}" method="POST">
                @csrf
                <div class="enter-element">
                    <label for="name">Ім'я*</label>
                    <input type="text" name="name" id="name" placeholder="Ваше ім'я" required>
                    <div class="error-message" id="nameError"></div>
                </div>
                <div class="enter-element">
                    <label for="phone">Номер телефону*</label>
                    <input type="tel" name="phone" id="phone" required>
                    <div class="error-message" id="phoneError"></div>
                </div>
                <div class="enter-element">
                    <label for="message">Повідомлення</label>
                    <textarea name="message" id="message" placeholder="Ваше повідомлення" rows="4"></textarea>
                    <div class="error-message" id="messageError"></div>
                </div>
                <div class="btn-sb">
                    <button type="submit" id="submitBtn">
                        <div class="btn btn-style-fas-head_2">
                            <p>Зв'язатися</p>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="overlay close-modal-md" data-modal="feedbackmd"></div>
</div>
