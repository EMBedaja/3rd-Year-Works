<div class="modal fade" id="approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered p-3">
    <div class="modal-content">
       <div class="modal-header bg-light">
          <img src="../dist/img/AdminLTELogo.png" alt="" class="d-block m-auto img-circle img-fluid shadow-sm" width="100">
      </div>
      <div class="modal-body p-5">
          <h6 class="text-center">Your session has timed out. Please login again</h6>
      </div>
      <div class="modal-footer alert-light">
        <a href="../logout.php" type="button" class="btn btn-secondary">Close</a>
      </div>
    </div>
  </div>
</div>

<br>


  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- GOOGLE PIE CHART -->
<script type="text/javascript" src="../plugins/google-pie-chart/loader.js"></script>

<script src="../plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<!-- <script src="js/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="js/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="js/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="js/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="js/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="js/moment/moment.min.js"></script> -->
<!-- <script src="js/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="js/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<!-- <script src="js/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });




 



  // GET IMAGE PREVIEW
  function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }



  // LETTERS ONLY
  function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }




  // EMAIL VALIDATION
  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(mail)\.com$/;
    // var pattern =/.+@(mail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @mail.com';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
        
    }
  }


  // AUTO CALCULATE AGE
  function calculateAge() {
      var birthdate = new Date(document.getElementById("birthdate").value);
      var now = new Date();

      var ageInMilliseconds = now.getTime() - birthdate.getTime();
      var ageInSeconds = ageInMilliseconds / 1000;
      var ageInMinutes = ageInSeconds / 60;
      var ageInHours = ageInMinutes / 60;
      var ageInDays = ageInHours / 24;
      var ageInWeeks = ageInDays / 7;
      var ageInMonths = ageInDays / 30.44;
      var ageInYears = ageInDays / 365;

      var age = Math.floor(ageInYears);

      if (ageInDays >= 365) {
        var ageDescription = age + " year" + (age > 1 ? "s" : "") + " old";
      } else if (ageInDays >= 30) {
        var ageDescription = Math.floor(ageInMonths) + " month" + (Math.floor(ageInMonths) > 1 ? "s" : "") + " old";
      } else if (ageInDays >= 7) {
        var ageDescription = Math.floor(ageInWeeks) + " week" + (Math.floor(ageInWeeks) > 1 ? "s" : "") + " old";
      } else {
        var ageDescription = Math.floor(ageInDays) + " day" + (Math.floor(ageInDays) > 1 ? "s" : "") + " old";
      }
      document.getElementById("txtage").value = ageDescription;
  }



  // PASSWORD MATCHING VALIDATION
  function validate_password_confirm_password() {
    var pass = document.getElementById('password').value;
    var confirm_pass = document.getElementById('cpassword').value;
    if (pass != confirm_pass) {
      document.getElementById('wrong_pass_alert').style.color = '#e60000';
      document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not match!';
      document.getElementById('create_admin').disabled = true;
      document.getElementById('create_admin').style.opacity = (0.4);
    } else {
      document.getElementById('wrong_pass_alert').style.color = 'green';
      document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
      document.getElementById('create_admin').disabled = false;
      document.getElementById('create_admin').style.opacity = (1);
    }
  }



  /*SECURE PASSOWORD AND VALIDATE PASSWORD*/
  const passwordField = document.getElementById('password');
  const passwordMessage = document.getElementById('password-message');
  passwordField.addEventListener('input', () => {
    const password = passwordField.value;
    let errors = [];

    // Check password length
    if (password.length < 8) {
      errors.push('Password must be at least 8 characters long.');
    }


    // Display error messages if any
    if (errors.length > 0) {
      passwordMessage.innerText = errors.join(' ');
      passwordMessage.classList.add('error');
    } else {
      passwordMessage.innerText = '';
      passwordMessage.classList.remove('error');
    }
  });

  
</script>

</body>
</html>