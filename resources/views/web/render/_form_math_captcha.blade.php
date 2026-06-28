@if(isFormCaptchaEnabled())
    @php $captchaFlag = $formFlag ?? 'contact'; @endphp
    <div class="form-group col-md-12 mb-4 math-captcha-wrap">
        <label for="{{ $captchaFlag }}_captcha_answer">Security Question <span>*</span></label>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <span class="math-captcha-question fw-bold mr-2">{{ currentMathCaptchaQuestion() }}</span>
            <button type="button" class="btn btn-sm btn-outline-secondary math-captcha-refresh mb-2" title="New question">↻</button>
            <input type="number"
                   class="form-control {{ $captchaFlag }}-required math-captcha-field mb-2"
                   name="captcha_answer"
                   id="{{ $captchaFlag }}_captcha_answer"
                   placeholder="Your answer"
                   inputmode="numeric"
                   style="max-width: 140px;">
        </div>
        <div class="invalid" id="{{ $captchaFlag }}_captcha_answer_error"></div>
    </div>
@endif
