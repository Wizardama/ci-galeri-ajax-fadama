

    <div class="push large"></div>
    <div class="container">
      <div class="form-row">
        <div class="offset-sm-7 col-sm-4 mb-2">
          <input type="text" class="form-control form-control-sm" id="cari-user" placeholder="Enter Username">
        </div>
        <div class="col-sm-1 mb-2">
          <button class="btn btn-primary btn-sm form-control" id="btn-cari">Get</button>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Kelas</th>
            <th scope="col">Join</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody id="show_data">
        </tbody>
      </table>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
              <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" id="edit-username" placeholder="Enter Username">
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
              <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" id="edit-email" placeholder="Enter Email">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="edit-id">
            <button type="button" class="btn btn-primary" id="btn-edit-save">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <p>Are you sure want to delete this record?</p>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="delete-id">
            <button type="button" class="btn btn-primary" id="btn-delete">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        show_subs();

        // lihat subscriber
        function show_subs() {
          $.ajax({
            type : "AJAX",
            url : "<?php echo site_url('wow/user_list'); ?>",
            dataType : "JSON",
            success : function(data) {
              var html = '';
              var i;
              for(i=0; i<data.length; i++) {
                if(data[i].kelas_user == 1){
                  data[i].kelas_user = "Active";
                }else{
                  data[i].kelas_user = "Non Active";
                }
                html += '<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + data[i].username + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '<td>' + data[i].kelas_user + '</td>' +
                        '<td>' + data[i].tanggal + '</td>' +
                        '<td>' + '<a class="edit" data-id="' + data[i].id_user + '" data-username="' + data[i].username + '" data-email="' + data[i].email+ '" data-kelas_user="'+ data[i].kelas_user +'" style="cursor:pointer"><i class="material-icons">settings</i></a><a class="delete" data-id="' + data[i].id_user + '" style="cursor:pointer"><i class="material-icons">clear</i></a><a class="flag" data-id="' + data[i].id_user + '" data-flag="' + data[i].kelas_user + '" style="cursor:pointer"><i class="material-icons">check</i></a>'+ '</td>' +  
                        '</tr>'
              }
              $('#show_data').html(html);
            }
          });
        }

        $('#btn-edit-save').on('click', function() {
          var id = $('#edit-id').val();
          var username = $('#edit-username').val();
          var email = $('#edit-email').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('wow/user_edit'); ?>",
            dataType : "JSON",
            data : {username : username, id : id, email : email},
            success : function() {
              $('#editKategori').val("");
              $("#modalEdit").modal('hide');
              show_subs();
            }
          });
          return false;
        });


        $('#btn-cari').on('click', function() {
          var cari = $('#cari-user').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('wow/user_get') ?>",
            dataType : "JSON",
            data : {cari : cari},
            success : function(data) {
              var html = '';
              var i;
              for(i=0; i<data.length; i++) {
                if(data[i].kelas_user == 1){
                  data[i].kelas_user = "Active";
                }else{
                  data[i].kelas_user = "Non Active";
                }
                html += '<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + data[i].username + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '<td>' + data[i].kelas_user + '</td>' +
                        '<td>' + data[i].tanggal + '</td>' +
                        '<td>' + '<a class="edit" data-id="' + data[i].id_user + '" data-username="' + data[i].username + '" data-email="' + data[i].email+ '" data-kelas_user="'+ data[i].kelas_user +'" style="cursor:pointer"><i class="material-icons">settings</i></a><a class="delete" data-id="' + data[i].id_user + '" style="cursor:pointer"><i class="material-icons">clear</i></a><a class="flag" data-id="' + data[i].id_user + '" data-flag="' + data[i].kelas_user + '" style="cursor:pointer"><i class="material-icons">check</i></a>'+ '</td>' +  
                        '</tr>'
              }
              $('#show_data').html(html);
            }
          });
        });

        $('#btn-delete').on('click', function() {
          var id = $('#delete-id').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('wow/user_delete'); ?>",
            dataType : "JSON",
            data : {id : id},
            success : function() {
              $("#modalDelete").modal('hide');
              show_subs();
            }
          });
          return false;
        });

        $('#show_data').on('click','.edit',function(){

          var id   = $(this).data('id');
          var username = $(this).data('username');
          var email = $(this).data('email');
          var kelas = $(this).data('kelas_user');

          $("#edit-id").val(id);
          $("#edit-username").val(username);
          $("#edit-email").val(email);

          $("#modalEdit").modal('show');

        });

        $('#show_data').on('click','.delete',function(){

          var id   = $(this).data('id');

          $("#delete-id").val(id);

          $("#modalDelete").modal('show');

        });

        $('#show_data').on('click','.flag',function(){

          var id     = $(this).data('id');
          var flag   = $(this).data('flag');

          $.ajax({
            type : "POST",
            url : "<?php echo site_url('wow/user_flag'); ?>",
            dataType : "JSON",
            data : {id : id, flag : flag},
            success : function() {
              show_subs();
            }
          });

        });

      });
    </script>
  </body>
</html>