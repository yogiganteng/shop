<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	$this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">
        <div class="container-fluid">


		<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
        <form class="form-horizontal" action="<?php echo site_url('admin/transaksi/store') ?>" method="post">

        <div class="form-group row">
            <label for="kriteria" class="col-sm-1 col-form-label">Tanggal</label>
            <div class="col-sm-4">
            <input type="text"  name="tanggal" class="form-control tanggal" required/>
            </div>

            <label for="divisi" class="col-sm-1 col-form-label">Divisi</label>
            <div class="col-sm-4">
            <input type="number" name="divisi"  class="form-control" id="divisi" placeholder="divisi" required>
            </div>
            
        </div>
  
            <div id="dynamic_field">
                <div class="form-group ">
                    <div class="row ">
                    <div class="col-sm-1">
                    </div>
                        <div class="col-sm-4">
                        <label for="idbuah" class="col-sm-1 col-form-label">Kriteria</label>
                        <select class="custom-select mr-sm-2" id="idbuah" name="idbuah[]" required>
                        <option value="">Pilih</option>
                        <?php
                        foreach($kriteriabuah as $data){ // Lakukan looping pada variabel siswa dari controller
                            echo "<option value='".$data->id."'>".$data->name."</option>";
                        }
                        ?>
                        </select>
                        </div>
                        
                        <div class="col-sm-1">
                        </div>

                        <div class="col-sm-4">
                        <label for="jumlah" class="col-sm-1 col-form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah[]" autocomplete="off" required>  
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>  
            <div class="form-group ">      
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" /> 
                </div>
        </div>
        </form>
        </div>


</div>

</div>
<!-- /.container-fluid -->

<!-- Sticky Footer -->
<?php $this->load->view("admin/_partials/footer.php") ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>

<?php $this->load->view("admin/_partials/js.php") ?>
<script>
    $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
                $('.tanggal').datepicker('setDate', new Date());
            });

function deleteConfirm(url){
$('#btn-delete').attr('href', url);
$('#deleteModal').modal();
}
</script>

<script type="text/javascript">
    $(document).ready(function(){      
    
      var i=1;  
      var data_php = "<?php foreach($kriteriabuah as $data){ echo "<option value='".$data->id."'>".$data->name."</option>"; }?>";
      console.log(data_php);
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'">   <div class="form-group "><div class="row "><div class="col-sm-1"></div><div class="col-sm-4"><select class="custom-select mr-sm-2" id="idbuah" name="idbuah[]" required><option value="">Pilih</option>'+data_php+'</select></div><div class="col-sm-1"></div><div class="col-sm-4"><input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah[]" autocomplete="off" required></div><div class="col"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div><div>');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Are You Sure You Want To Delete This?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>
</html>