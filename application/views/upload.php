

    <div class="push large"></div>
    <div class="container">
      <div class="form-row">
        <div class="col-sm-2 mb-3">
          <button class="btn btn-primary btn-sm form-control" id="btn-upload">Upload</button>
        </div>
        <div class="offset-sm-5 col-sm-4 mb-3">
          <input type="text" class="form-control form-control-sm" id="cari-judul" placeholder="Enter Judul">
        </div>
        <div class="col-sm-1 mb-3">
          <button class="btn btn-primary btn-sm form-control" id="btn-cari">Get</button>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Hits</th>
            <th scope="col">Kategori</th>
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
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Judul</label>
              <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" id="edit-judul" placeholder="Enter Judul">
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



    <div class="modal fade" tabindex="-1" role="dialog" id="modalUpload">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Upload Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo site_url('wuw/save_karya'); ?>" method="POST" id="form">
          <div class="modal-body">
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Judul</label>
              <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" name="judul" placeholder="Enter Judul">
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Kategori</label>
              <div class="col-sm-10">
              <select name='kategori' id='upload-kategori' class="form-control">
                
              </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Karya</label>
              <div class="col-sm-10">
              <input type="file" class="form-control-file" id="gambar" name="gambar">
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Deskripsi</label>
              <div class="col-sm-10">
              <textarea class="form-control" name="deskripsi"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tags</label>
              <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" name="tags" placeholder="Enter Tags (separate with ,)">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
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
        show_kateg();

        // lihat subscriber
        function show_subs() {
          var username = '<?php echo $this->session->userdata('username') ?>';
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('wuw/karya_user'); ?>",
            dataType : "JSON",
            data : {username : username},
            success : function(data) {
              var html = '';
              var i;
              for(i=0; i<data.length; i++) {
                html += '<tr>' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + data[i].judul + '</td>' +
                        '<td>' + data[i].tanggal + '</td>' +
                        '<td>' + data[i].hits + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + '<a class="edit" data-id="' + data[i].id_karya + '" data-judul="' + data[i].judul + '" data-hits="' + data[i].hits+ '" style="cursor:pointer"><i class="material-icons">settings</i></a><a class="show" data-gambar="' + data[i].gambar + '" style="cursor:pointer"><i class="material-icons">airplay</i></a><a class="delete" data-id="' + data[i].id_karya + '" style="cursor:pointer"><i class="material-icons">clear</i></a></td>' +  
                        '</tr>'
              }
              $('#show_data').html(html);
            }
          });
        }


        $('#form').submit(function(e) {

          e.preventDefault();

          $.ajax({
              url:'<?php echo site_url('wuw/save_karya'); ?>',
              type:"post",
              data:new FormData(this),
              processData:false,
              contentType:false,
              cache:false,
              async:false,
               success: function(data){
                  show_subs();
              $("#modalUpload").modal('hide');
            }
          });

          return false;

        });

        function show_kateg() {
          $.ajax({
            type : "AJAX",
            url : "<?php echo site_url('wuw/kategori_karya'); ?>",
            dataType : "JSON",
            success : function(data) {
              var html = '';
              var i;
              for (var i=0; i<data.length; i++) {
                html += '<option value="'+data[i].id_kategori+'">'+data[i].nama+'</option>'
              }
              $('#upload-kategori').html(html);
            }
          })
        }

        $('#btn-edit-save').on('click', function() {
          var id = $('#edit-id').val();
          var judul = $('#edit-judul').val();
          $.ajax({
            type : "POST",
            url : "<?php echo site_url('wow/karya_user_edit'); ?>",
            dataType : "JSON",
            data : {judul : judul, id : id},
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
            url : "<?php echo site_url('wow/karya_get') ?>",
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
                        '<td>' + data[i].hits + '</td>' +
                        '<td>' + data[i].nama + '</td>' +
                        '<td>' + '<a class="edit" data-id="' + data[i].id_karya + '" data-judul="' + data[i].judul + '" data-hits="' + data[i].hits+ '" style="cursor:pointer"><i class="material-icons">settings</i></a><a class="show" data-gambar="' + data[i].gambar + '" style="cursor:pointer"><i class="material-icons">airplay</i></a><a class="delete" data-id="' + data[i].id_karya + '" style="cursor:pointer"><i class="material-icons">clear</i></a></td>' +  
                        '</tr>'
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

          $("#edit-id").val(id);
          $("#edit-judul").val(judul);

          $("#modalEdit").modal('show');

        });

        $('#show_data').on('click','.delete',function(){

          var id   = $(this).data('id');

          $("#delete-id").val(id);

          $("#modalDelete").modal('show');

        });

        $('#btn-upload').on('click', function() {
          $('#modalUpload').modal('show');
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