$(document).ready(function () {
    "use strict";
    $(".repeater").repeater({
        defaultValues: {
            "textarea-input": "foo",
            "text-input": "bar",
            "select-input": "B",
            "checkbox-input": ["A", "B"],
            "radio-input": "B"
        }, show: function () {
            $(this).slideDown()
        }, hide: function (e) {
            // confirm("Voulez-vous vraiment supprimer cet element?") && $(this).slideUp(e)
            let $this = $(this)
            Notiflix.Confirm.show(
                'Confirmez',
                'Voulez-vous vraiment supprimer cet element?',
                'Oui',
                'Non',
                function okCb() {
                    $this.slideUp(e)
                },
                function cancelCb() {
                },
            );
        }, ready: function (e) {
        }
    }), window.outerRepeater = $(".outer-repeater").repeater({
        defaultValues: {"text-input": "outer-default"},
        show: function () {
            console.log("outer show"), $(this).slideDown()
        },
        hide: function (e) {
            console.log("outer delete"), $(this).slideUp(e)
        },
        repeaters: [{
            selector: ".inner-repeater",
            defaultValues: {"inner-text-input": "inner-default"},
            show: function () {
                console.log("inner show"), $(this).slideDown()
            },
            hide: function (e) {
                console.log("inner delete"), $(this).slideUp(e)
            }
        }]
    })
});