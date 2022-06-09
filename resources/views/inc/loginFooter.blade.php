</footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="{{asset('front/js/core/popper.min.js')}}"></script>
  <script src="{{asset('front/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('front/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('front/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <!-- Kanban scripts -->
  <script src="{{asset('front/js/plugins/dragula/dragula.min.js')}}"></script>
  <script src="{{asset('front/js/plugins/jkanban/jkanban.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('front/js/soft-ui-dashboard.min.js?v=1.0.5')}}"></script>
</body>

</html>