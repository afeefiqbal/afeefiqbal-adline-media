<form id="quoteForm" role="form" method="post" class="quote-form">
    {{ csrf_field() }}
    <div class="row">
        <div class="form-group col-md-6 mb-4">
            <label for="quote_name">Name <span>*</span></label>
            <input type="text" class="form-control quote-required" autocomplete="off" name="quote_name" id="quote_name" placeholder="Name">
            <div class="invalid" id="quote_name_error"></div>
        </div>
        <div class="form-group col-md-6 mb-4">
            <label for="quote_email">Email <span>*</span></label>
            <input type="email" class="form-control quote-required" autocomplete="off" name="quote_email" id="quote_email" placeholder="E-mail Address">
            <div class="invalid" id="quote_email_error"></div>
        </div>
        <div class="form-group col-md-6 mb-4">
            <label for="quote_phone">Phone <span>*</span></label>
            <input type="text" class="form-control quote-required" autocomplete="off" id="quote_phone" name="quote_phone" placeholder="Phone No.">
            <div class="invalid" id="quote_phone_error"></div>
        </div>
        <div class="form-group col-md-6 mb-4">
            <label for="quote_company">Company Name <span>*</span></label>
            <input type="text" class="form-control quote-required" autocomplete="off" id="quote_company" name="quote_company" placeholder="Company Name">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label for="quote_city">City <span>*</span></label>
            <input type="text" class="form-control quote-required" autocomplete="off" id="quote_city" name="quote_city" placeholder="City">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label for="quote_subject">Subject <span>*</span></label>
            <input type="text" class="form-control quote-required" autocomplete="off" id="quote_subject" name="quote_subject" placeholder="Subject">
        </div>
        <div class="form-group col-md-12 mb-5">
            <label for="quote_comments">Message</label>
            <textarea class="form-control" name="quote_comments" autocomplete="off" id="quote_comments" rows="4" placeholder="Write Message"></textarea>
        </div>
        @include('web.render._form_math_captcha', ['formFlag' => 'quote'])
        <div class="col-md-12">
            <input type="hidden" name="prefixKey" value="quote">
            <button data-url="quote-form-submit" data-flag="quote" class="submit-form-btn btn-default" type="submit"><span>send message</span></button>
        </div>
    </div>
</form>