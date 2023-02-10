	<!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ url('frontendStyle/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ url('frontendStyle/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ url('frontendStyle/js/bootstrap.min.js') }}"></script>
    <!-- magnific js -->
    <script src="{{ url('frontendStyle/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ url('frontendStyle/js/swiper.min.js') }}"></script>
    <!-- masonry js -->
    <script src="{{ url('frontendStyle/js/masonry.pkgd.js') }}"></script>
    <script src="{{ url('frontendStyle/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- <script src="{{ url('frontendStyle/js/jquery.form.js') }}"></script> -->
    <script src="{{ url('frontendStyle/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('frontendStyle/js/mail-script.js') }}"></script>
    <script src="{{ url('frontendStyle/js/contact.js') }}"></script>
    <script src="{{ url('frontendStyle/js/owl.carousel.js') }}"></script>
    <script src="{{ url('frontendStyle/js/jquery.prettyPhoto.js') }}"></script>
    <!-- custom js -->
    <script src="{{ url('frontendStyle/js/custom.js') }}"></script>

    <script>
        $(document).ready(function(){
            $(".visitor-info-close").click(function(){
                $(".ip-area").hide(1000);
                $(".visitor-info-show").addClass('d-block');
            });

            $(".visitor-info-show").click(function() {
                $(".ip-area").show(1000);
                $(".visitor-info-show").removeClass('d-block');
            });
        });
    </script>

    <script>
        //Pretty Photo
        $("a[rel^='prettyPhoto']").prettyPhoto({
            social_tools: false
        });
        //Preloading Js
        $(window).on('load', function (e) {
            $("#preloader").fadeOut("slow");
        });
        $(document).ready(function () {

            $("#owl-items").owlCarousel({
                items: 4,
                lazyLoad: true,
                navigation: true
            });

            $("#owl-team").owlCarousel({
                items: 4,
                lazyLoad: true,
                navigation: true
            });

            $("#owl-project-featured-image").owlCarousel({
                items: 3,
                lazyLoad: true,
                navigation: true
            });

            // disable right click
            // $(document).bind('contextmenu', function (e) {
                
            //     $("#error").fadeIn("slow");
            //     setTimeout(function(){
            //         $("#error").fadeOut("slow");
            //     },2000);
            //     return false;
                
            // });

            // Disable cut copy paste
            // $(document).bind('cut copy paste', function (e) {
                
            //     $("#error").fadeIn("slow");
            //     setTimeout(function(){
            //         $("#error").fadeOut("slow");
            //     },2000);
            //     return false;
                
            // });

        });

    </script>