
    
    <div class="push large"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          <h6 class="sidebar-heading">Sort</h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item"><a href="">Newest</a></li>
            <li class="nav-item"><a href="">Whats Hot</a></li>
            <li class="nav-item"><a href="">Undiscovered</a></li>
            <li class="nav-item"><a href="">Popular 24 hours</a></li>
          </ul>
          <h6 class="sidebar-heading">Categories</h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item"><a href="">Digital Art</a></li>
            <li class="nav-item"><a href="">Traditionanl Art</a></li>
            <li class="nav-item"><a href="">Photography</a></li>
            <li class="nav-item"><a href="">Artisant Crafts</a></li>
            <li class="nav-item"><a href="">Literature</a></li>
            <li class="nav-item"><a href="">Film & Animation</a></li>
            <li class="nav-item"><a href="">Motion Books</a></li>
            <li class="nav-item"><a href="">Flash</a></li>
            <li class="nav-item"><a href="">Design & Interfaces</a></li>
            <li class="nav-item"><a href="">Customization</a></li>
          </ul>
        </div>
        <div class="col-sm-10">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Username</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody id="show_data">
            </tbody>
          </table>
          <div id="pig">
          </div>
        </div>
      </div>
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
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Judul</label>
              <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" id="edit-judul" placeholder="Enter Judul">
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Hits</label>
              <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" id="edit-hits" placeholder="Enter Hits">
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalShow">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="" id="show-id" style="max-width: 250px">
          </div>
          <div class="modal-footer">
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
            url : "<?php echo site_url('wiw/karya_list'); ?>",
            dataType : "JSON",
            success : function(data) {
              var html = '';
              var i;
              for(i=0; i<data.length; i++) {
                html += '<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + data[i].judul + '</td>' +
                        '<td>' + data[i].username + '</td>' +
                        '<td>' + data[i].tanggal + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + '<a class="show" data-gambar="' + data[i].gambar + '" style="cursor:pointer"><i class="material-icons">airplay</i></a></td>' +  
                        '</tr>'
              }
              $('#show_data').html(html);
            }
          });
        }

        $('#btn-edit-save').on('click', function() {
          var id = $('#edit-id').val();
          var judul = $('#edit-judul').val();
          var hits = $('#edit-hits').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('wow/karya_edit'); ?>",
            dataType : "JSON",
            data : {judul : judul, id : id, hits : hits},
            success : function() {
              $('#editKategori').val("");
              $("#modalEdit").modal('hide');
              show_subs();
            }
          });
          return false;
        });

        $('#btn-cari').on('click', function() {
          var cari = $('#cari-judul').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('wiw/karya_get') ?>",
            dataType : "JSON",
            data : {cari : cari},
            success : function(data) {
              var html = '';
              var i;
              for(i=0; i<data.length; i++) {
                html += '<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + data[i].judul + '</td>' +
                        '<td>' + data[i].username + '</td>' +
                        '<td>' + data[i].tanggal + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + '<a class="show" data-gambar="' + data[i].gambar + '" style="cursor:pointer"><i class="material-icons">airplay</i></a></td>' +  
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
            url : "<?php echo site_url('wow/karya_delete'); ?>",
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
          var judul = $(this).data('judul');
          var hits = $(this).data('hits');

          $("#edit-id").val(id);
          $("#edit-judul").val(judul);
          $("#edit-hits").val(hits);

          $("#modalEdit").modal('show');

        });

        $('#show_data').on('click','.delete',function(){

          var id   = $(this).data('id');

          $("#delete-id").val(id);

          $("#modalDelete").modal('show');

        });


        $('#show_data').on('click','.show',function(){

          var id   = $(this).data('gambar');

          $("#show-id").attr('src', '<?php echo base_url(); ?>assets/img/'+id);

          $("#modalShow").modal('show');

        });

        $('#show_data').on('click','.flag',function(){

          var id     = $(this).data('id');
          var flag   = $(this).data('flag');

          $.ajax({
            type : "POST",
            url : "<?php echo site_url('master/flag_barang'); ?>",
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