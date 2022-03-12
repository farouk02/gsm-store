$(function () {
    "use strict";

    //sidebar menu js
    $.sidebarMenu($(".sidebar-menu"));

    // === toggle-menu js
    $(".toggle-menu").on("click", function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // === sidebar menu activation js

    $(function () {
        for (
            var i = window.location,
                o = $(".sidebar-menu a")
                    .filter(function () {
                        return this.href == i;
                    })
                    .addClass("active")
                    .parent()
                    .addClass("active");
            ;

        ) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }),
        /* Top Header */

        $(document).ready(function () {
            $(window).on("scroll", function () {
                if ($(this).scrollTop() > 60) {
                    $(".topbar-nav .navbar").addClass("bg-dark");
                } else {
                    $(".topbar-nav .navbar").removeClass("bg-dark");
                }
            });
        });

    /* Back To Top */

    $(document).ready(function () {
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 300) {
                $(".back-to-top").fadeIn();
            } else {
                $(".back-to-top").fadeOut();
            }
        });

        $(".back-to-top").on("click", function () {
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
    });

    $(function () {
        $('[data-toggle="popover"]').popover();
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ajaxStop(function () {
        window.location.reload();
    });
    $("#activity-order").sortable({
        axis: "y",
        update: function (event, ui) {
            var data = $(this)
                .sortable("toArray")
                .map(function (x) {
                    return x.replace("act-", "");
                });

            console.log(data);
            // POST to server using $.post or $.ajax
            $.ajax({
                headers: {
                    "X-CSRF-Token": $('input[name="_token"]').attr("value"),
                },
                data: {
                    "order[]": data,
                },
                type: "POST",
                dataType: "json",
                url: "/activities/order",
            });
        },
    });
});
