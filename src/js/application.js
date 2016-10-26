$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").delay(100).fadeOut(200);
});

/* When the user clicks on the button,
 toggle between hiding and showing the dropdown content */
function menuDropDown() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

(function() {

    $('.logout').bind('mouseenter mouseleave', function () {
        $('.logout-img').attr({
            src: $('.logout-img').attr('data-alt-src')
            , 'data-alt-src': $('.logout-img').attr('src')
        })
    });

}());

(function() {

    var body = $('body');
    var $tableWrapper = $('#stage-table-wrapper');

    body.on('change', '#updateUser', function(e) {
        var url = this.form.action,
            data = $(this.form).serialize();

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(response)
            {
                $tableWrapper.html(response);
            }
        });

        e.preventDefault();

    });

    body.on('click', '#deleteUser', function(e) {
        e.preventDefault();
        var url = $(this).attr('data-url');

        $.get( url, function( data ) {
            $tableWrapper.html( data );
        });

    });

}());



