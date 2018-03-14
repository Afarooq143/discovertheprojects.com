    <footer class="footer">
        <span class="text-right">
        Copyright &copy; <a target="_blank" href="https://ftcinternational.com">FTC International</a>
        </span>
        <span class="float-right">
        Developed by <a target="_blank" href="https://discovertheprojects.com"><b>www.discovertheprojects.com</b></a>
        </span>
    </footer>

</div>
<!-- END main -->

<script src="<?php echo base_url('assets/js/modernizr.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>





<script src="<?php echo base_url('assets/js/detect.js');?>"></script>
<script src="<?php echo base_url('assets/js/fastclick.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.blockUI.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/switchery/switchery.min.js'); ?>"></script>




<!-- App js -->
<script src="<?php echo base_url('assets/js/pikeadmin.js');?>"></script>

<!-- BEGIN Java Script for this page -->
    <script src="<?php echo base_url('assets/chartjs/Chart.min.js');?>"></script>
    <script src="<?php echo base_url('assets/datatable/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/datatable/dataTables.bootstrap4.min.js');?>"></script>

    <!-- Counter-Up-->
    <script src="<?php echo base_url('assets/plugins/waypoints/lib/jquery.waypoints.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/counterup/jquery.counterup.min.js');?>"></script> 

    <!-- App js -->
<script src="<?php echo base_url('assets/js/mdtimepicker.js');?>"></script>

    <!--- CUSTOM JS -->
     <script src="<?php echo base_url('assets/custom-js/custom.js');?>"></script> 




<!-- BEGIN Java Script for this page -->
<script src="<?php echo base_url('assets/plugins/parsleyjs/parsley.min.js');?>"></script>
<script>
  $('#form').parsley();
</script>
<!-- END Java Script for this page -->

    <script>
         $(function () {
          $('[data-toggle="tooltip"]').tooltip();
          $('[data-toggle="popover"]').popover()
        });
        $(document).ready(function() {
            // data-tables
            $('#example1').DataTable();
                    
            // counter-up
            $('.counter').counterUp({
                delay: 10,
                time: 600
            });
        } );

        $(document).ready(function(){
            $('.timePicker').mdtimepicker(); //Initializes the time picker
        });
        // START CODE Individual column searching (text inputs) DATA TABLE      
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example4 thead th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );
         
            // DataTable
            var table = $('#example4').DataTable();
         
            // Apply the search
            table.columns().every( function () {
                var that = this;
         
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        } );
        // END CODE Individual column searching (text inputs) DATA TABLE 




                
    </script>
    
    <script>
    var ctx1 = document.getElementById("lineChart").getContext('2d');
    var lineChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                    label: 'Dataset 1',
                    backgroundColor: '#3EB9DC',
                    data: [10, 14, 6, 7, 13, 9, 13, 16, 11, 8, 12, 9] 
                }, {
                    label: 'Dataset 2',
                    backgroundColor: '#EBEFF3',
                    data: [12, 14, 6, 7, 13, 6, 13, 16, 10, 8, 11, 12]
                }]
                
        },
        options: {
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        responsive: true,
                        scales: {
                            xAxes: [{
                                stacked: true,
                            }],
                            yAxes: [{
                                stacked: true
                            }]
                        }
                    }
    });


    var ctx2 = document.getElementById("pieChart").getContext('2d');
    var pieChart = new Chart(ctx2, {
        type: 'pie',
        data: {
                datasets: [{
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    "Red",
                    "Orange",
                    "Yellow",
                    "Green",
                    "Blue"
                ]
            },
            options: {
                responsive: true
            }
     
    });


    var ctx3 = document.getElementById("doughnutChart").getContext('2d');
    var doughnutChart = new Chart(ctx3, {
        type: 'doughnut',
        data: {
                datasets: [{
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    "Red",
                    "Orange",
                    "Yellow",
                    "Green",
                    "Blue"
                ]
            },
            options: {
                responsive: true
            }
     
    });

    </script>

<!-- END Java Script for this page -->

</body>
</html>