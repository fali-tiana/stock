$(function(){
        
    // initializing feather icons

    feather.replace();

    // opening the popover while clicking on the profile section

    $("#profilePopover").click(function() {

        $("#popoverElement").fadeToggle();

    });

    // close the popover when clicking outside the profile section

    $(document).click(function(event) {

        if (!$(event.target).closest('#profilePopover').length) {
            $("#popoverElement").fadeOut();

        }
    });

    // Add click event handler to all anchor tags inside the navigation menu

    $('#sidebar a').click(function(e) {

        // Remove the 'active' class from all links
        $('#sidebar a').removeClass('text-primary-900');
        
        // Add the 'active' class to the clicked link
        $(this).removeClass('text-neutral-500');
        $(this).addClass('text-primary-900');
        
    });

    // toggling between dark mode and light mode

    $('#darkToggle').on("click", function(e) {
        e.preventDefault();

        // Toggle visibility of sun and moon icons
        $("#sun").toggleClass("hidden");
        $("#moon").toggleClass("hidden");
        
        document.documentElement.classList.toggle('dark');
    });


});  