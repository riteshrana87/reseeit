<?php
/*
    @Description : User edit
    @Author      : Niral Patel
    @Date        : 23-10-2015

*/
 
$head_action = !empty($editRecord)?"Edit":"Add";

$formAction = !empty($editRecord)?'update_data':'insert_data'; 
$this->type = ADMIN_SITE;
$this->viewname = $this->uri->segment(2);
$path = $this->type.'/'.$this->viewname.'/'.$formAction;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$this->lang->line('cms_module_title')?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=base_url($this->type.'/dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?=$head_action?> <?=$this->lang->line('admin_user_module_sub_title')?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$head_action?> <?=$this->lang->line('cms_module_title')?></h3>
                  <a class="btn btn-primary pull-right" onclick="history.go(-1)" href="javascript:void(0)">Back</a> 
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="<?=$this->viewname?>" data-parsley-validate method="post" action="<?=base_url($path)?>"  ENCTYPE="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name"><?=$this->lang->line('common_label_page_name')?>:</label>
                      <input type="text" name="page_name" id="page_name" value="<?=!empty($editRecord[0]['page_name'])?$editRecord[0]['page_name']:''?>" class="form-control" required >
                    </div>
                    <div class="form-group">
                      <label for="email"><?=$this->lang->line('common_label_slug')?>:</label>
                      <input type="text" name="slug" id="slug" value="<?=!empty($editRecord[0]['slug'])?$editRecord[0]['slug']:''?>" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="content"><?=$this->lang->line('common_label_content')?>:</label>
                      <textarea type="text" name="content" id="content"  class="textarea form-control"><?=!empty($editRecord[0]['content'])?$editRecord[0]['content']:''?></textarea>
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" name="id" id="id" value="<?=!empty($editRecord[0]['cms_id'])?$editRecord[0]['cms_id']:''?>">
                    <button class="btn btn-primary" onclick="return setdefaultdata();" type="submit"><?=$this->lang->line('common_label_submit')?></button>
                    <input type="button" onclick="history.go(-1); return false;" class="btn btn-primary"  name="login" id="login" value="<?=$this->lang->line('common_label_cancel')?>">
                  </div>
                </form>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php /*<link rel="stylesheet" href="<?=$this->config->item('css_path');?>bootstrap3-wysihtml5.min.css" typet="text/css">
<script src="<?=$this->config->item('js_path');?>bootstrap3-wysihtml5.all.min.js"></script>
*/?>

    <!--<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('content');
      //bootstrap WYSIHTML5 - text editor
      //$(".textarea").wysihtml5();
    });
  </script> -->
  <script src="<?=$this->config->item('js_path');?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    height : 500,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

<script type="text/javascript">
//On submit loading
function setdefaultdata()
{
    if ($('#<?php echo $this->viewname ?>').parsley().isValid()) {
        $.blockUI({message: '<?= '<img src="' . base_url('images') . '/ajaxloader.gif" border="0" align="absmiddle"/>' ?> Please Wait...'});
    }
}
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}
//Function for chrck user
function check_email(email,id)
{
    $.ajax({
        type: "POST",
        url: "<?php echo $this->config->item('admin_base_url').$this->viewname.'/check_user';?>",
        //dataType: 'json',
        async: false,
        data: {'email':email,'id':id},
        success: function(data)
        {
        
        if(data == '1')
        {   
            $("#save").prop("disabled", true);           
             $.alert({
                title: 'Alert!',
                backgroundDismiss: false,
                content: 'This email already existing ! Please select other email.',
                confirm: function(){
                    $('#email').val('');
                    $('#email').focus();
                    $("#save").prop("disabled", false);
                }
            });         
        }
        else
        {
          if(data != '0')
          { $('#email').val(data);}
          return false;             
        }
        
        }
    });
    return false;                 
}
//image upload
function showimagepreview(input) 
{

  console.log(input.files[0]['name']);
  var maximum = input.files[0].size/1024;
  //alert(maximum);
  if (input.files && input.files[0] && maximum <= 2048) 
  {
    var arr1 = input.files[0]['name'].split('.');
    var arr= arr1[1].toLowerCase(); 
    if(arr == 'jpg' || arr == 'jpeg' || arr == 'png' || arr == 'bmp' || arr == 'gif')
    {
      var filerdr = new FileReader();
      filerdr.onload = function(e) {
      $('#uploadPreview1').attr('src', e.target.result);
      }
      filerdr.readAsDataURL(input.files[0]);
    }
    else
    {
      $.alert({
              title: 'Alert!',
              //backgroundDismiss: false,
              content: "<strong> Please upload jpg | jpeg | png | bmp | gif file only "+"<strong>",
              confirm: function(){
              }
          }); 
      return false;
    } 
  }
  else
  {
    $.alert({
              title: 'Alert!',
              //backgroundDismiss: false,
              content: "<strong> Maximum upload size 2 MB "+"<strong>",
              confirm: function(){
              }
          }); 
    return false;
  }
}
</script>