(function (win, doc) {
    'use strict';
    if (!doc.querySelectorAll || !win.addEventListener) {
    
        return;
    }
    var forms = doc.querySelectorAll('form[method="post"]'),
        formcount = forms.length,
        i,
        submitting = false,
        checkForm = function (ev) {
            if (submitting) {
                ev.preventDefault();
            } else {
                submitting = true;
                this.appendChild(doc.createElement('progress'));
            }
        };
    for (i = 0; i < formcount; i = i + 1) {
        forms[i].addEventListener('submit', checkForm, false);
    }
}(this, this.document));