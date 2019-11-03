document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    // console.log('hoi');

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        // console.log('hoi2');

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);
                console.log('hoi3');

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});

$(function () {
    $('.toggle-class').change(function () {
        console.log('hello this is nog good');

        var is_admin = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeAdmin',
            data: {
                'is_admin': is_admin,
                'user_id': user_id
            },
            success: function (data) {
                console.log(data.success)
            }
        });
    })
})
