    <!-- jQuery 3 -->
    <script src="{{ asset('adminStyle/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('adminStyle/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap DatePicker -->
    <script src="{{ asset('adminStyle/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('adminStyle/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('adminStyle/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('adminStyle/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

    <!-- InputMask -->
    <script src="{{ asset('adminStyle/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('adminStyle/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('adminStyle/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('adminStyle/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminStyle/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('adminStyle/plugins/iCheck/icheck.min.js') }}"></script>

    <!-- FastClick -->
    <script src="{{ asset('adminStyle/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminStyle/dist/js/adminlte.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminStyle/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap  -->
    <script src="{{ asset('adminStyle/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('adminStyle/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('adminStyle/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- Select-2 -->
    <script src="{{ asset('adminStyle/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ asset('adminStyle/bower_components/ckeditor/ckeditor.js') }}"></script>

    <!-- ChartJS -->
    <script src="{{ asset('adminStyle/bower_components/chart.js/Chart.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminStyle/dist/js/demo.js') }}"></script>
    <script>
        $(function () {
            //Datatable init
            $('#visitorSessions').DataTable()
            //Initialize Select2 Elements
            $('.select2').select2()
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')

            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieChart = new Chart(pieChartCanvas)
            var PieData = [{
                    value: 500,
                    color: '#00a65a',
                    highlight: '#00a65a',
                    label: 'IE'
                },
                {
                    value: 500,
                    color: '#00a65a',
                    highlight: '#00a65a',
                    label: 'IE'
                },
                {
                    value: 400,
                    color: '#f39c12',
                    highlight: '#f39c12',
                    label: 'FireFox'
                },
                {
                    value: 600,
                    color: '#00c0ef',
                    highlight: '#00c0ef',
                    label: 'Safari'
                },
                {
                    value: 300,
                    color: '#3c8dbc',
                    highlight: '#3c8dbc',
                    label: 'Opera'
                },
                {
                    value: 100,
                    color: '#d2d6de',
                    highlight: '#d2d6de',
                    label: 'Navigator'
                }
            ]
            var pieOptions = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke: true,
                //String - The colour of each segment stroke
                segmentStrokeColor: '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth: 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps: 100,
                //String - Animation easing effect
                animationEasing: 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate: true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale: false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive: true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio: true,
                //String - A legend template
                legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            pieChart.Doughnut(PieData, pieOptions)

        })

    </script>

    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
            //format: 'dd-mm-yyyy'
        })

        //Date picker
        $('#datepicker2').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
            //format: 'dd-mm-yyyy'
        })

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //File upload
        $(document).on('click', '.browse', function () {
            var file = $(this).parent().parent().parent().find('.file');
            file.trigger('click');
        });
        $(document).on('change', '.file', function () {
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });

    </script>