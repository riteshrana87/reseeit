<script type="text/javascript">
    $(document).ready(function () {
        
        //serch by enter
         $('#searchtext').keyup(function(event) 
         {
                if (event.keyCode == 13) {
                        data_search('changesearch');
                }
        
        });
    });

    //Search data
    function data_search(allflag)
    {
        var uri_segment = $("#uri_segment").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->config->item('admin_base_url').$this->viewname?>/index/"+uri_segment,
            data: {
            result_type:'ajax',perpage:$("#perpage").val(),searchtext:$("#searchtext").val(),sortfield:$("#sortfield").val(),sortby:$("#sortby").val(),allflag:allflag
        },
        beforeSend: function() {
                    $('#common_div').block({ message: 'Loading...' }); 
                  },
            success: function(html){
                $("#common_div").html(html);
                $('#common_div').unblock(); 
            }
        });
        return false;
    }
    function reset_data()
    {
        $("#searchtext").val("");
        apply_sorting('','');
        data_search('all');
    }

    function reset_data_list(data)
    {
        $("#searchtext").val(data);
        apply_sorting('','');
        data_search('all');
    }

    function changepages()
    {
        data_search(''); 
    }
    
    function apply_sorting(sortfilter,sorttype)
    {
        $("#sortfield").val(sortfilter);
        $("#sortby").val(sorttype);
        data_search('changesorting');
    }
    //pagination
    $('body').on('click', '#common_tb ul.pagination a.ajax_paging', function (e) {

        $.ajax({
            type: "POST",
            url: $(this).attr('href'),
            data: {
                result_type: 'ajax',perpage:$("#perpage").val(),searchtext:$("#searchtext").val(),sortfield:$("#sortfield").val(),sortby:$("#sortby").val()
            },
            beforeSend: function () {
                $('#common_div').block({message: 'Loading...'});
            },
            success: function (html) {
                $("#common_div").html(html);
                $.unblockUI();
            }
        });
        return false;

    });
    //check box for delete all
    $('body').on('click','#selecctall',function(e){
     if(this.checked) { // check select status
         $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });

    //check box for delete all
    $('body').on('click','#selecctall_user',function(e){
        if(this.checked) { // check select status
            $('.checkbox_user').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"
            });
        }else{
            $('.checkbox_user').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"
            });
        }
    });

    function deletepopup(id,name)
    {      
            if(id == '0')
            {
                var boxes = $('input[name="check[]"]:checked');
                if(boxes.length == '0')
                  {
                        $.alert({
                            title: 'Alert!',
                            //backgroundDismiss: false,
                            content: "<strong> Please select record(s) to delete.<strong>",
                            confirm: function(){
                            }
                        }); 
                        return false;
                        
                  }
            }
            if(id == '0')
            {
                var msg = 'Are you sure want to delete Record(s)';
            }
            else
            {
                var msg = 'Are you sure want to delete '+name+'?';
            } 
            $.confirm({
                    title: 'Confirm!',
                    content: "<strong> "+msg+" "+"<strong>",
                    confirm: function(){
                        delete_all_multipal('delete',id);
                    },
                    cancel: function(){
                        
                    }
                }); 
    } 
    //Delete multiple
    function delete_all_multipal(val,id)
    {
          var boxes = $('input[name="check[]"]:checked');
          
          var myarray = new Array;
            var i=0;

            if(id != '0')
            {
                var single_remove_id = id;
            }
            else
            {
                var boxes = $('input[name="check[]"]:checked');
                $(boxes).each(function(){
                      myarray[i]=this.value;
                      i++;
                });
            }

          var url = "<?php echo $this->config->item('admin_base_url').$this->viewname.'/ajax_delete_all';?>";
          
          
          $.ajax({
          
          type: "POST",
          url: url,
          //dataType: 'json',
          data: {'myarray':myarray,'single_remove_id':id},
          success: function(data){
            //alert(data);
            $.ajax({
              type: "POST",
              url: "<?php echo $this->config->item('admin_base_url').$this->viewname?>/index/"+data,
              data: {
              result_type:'ajax',perpage:$("#perpage").val(),searchtext:$("#searchtext").val(),sortfield:$("#sortfield").val(),sortby:$("#sortby").val(),allflag:''
            },
            beforeSend: function() {
                  $('#common_div').block({ message: 'Loading...' }); 
                  },
              success: function(html){
                $("#common_div").html(html);
                $('#common_div').unblock(); 
              }
            });
            return false;
          }
        });
    }
    function statuspopup(id,status,name)
    {
            if(status == 1)
            {
                var url =  "<?php echo $this->config->item('admin_base_url').$this->viewname.'/publish_record';?>";
                if(name !=''){val ='publish';}else{val ='unpublish';};
            }
            else
            {
                var url =  "<?php echo $this->config->item('admin_base_url').$this->viewname.'/unpublish_record';?>";
                if(name !=''){val ='unpublish';}else{val ='publish';};
            }
            if(id == '0')
            {
                var boxes = $('input[name="check[]"]:checked');
                if(boxes.length == '0')
                  {
                        $.alert({
                            title: 'Alert!',
                            //backgroundDismiss: false,
                            content: "<strong> Please select record(s) to "+val+".<strong>",
                            confirm: function(){
                            }
                        });
                        return false;

                  }
            }
            if(id == '0')
            {
                var msg = 'Are you sure want to '+val+' Record(s)';
            }
            else
            {
                var msg = 'Are you sure want to '+val+' '+name+'?';
            }
            $.confirm({
                    title: 'Confirm!',
                    content: "<strong> "+msg+" "+"<strong>",
                    confirm: function(){
                        status_change_ajax(id,status);
                    },
                    cancel: function(){

                    }
                });
    }
    //Change status
    function status_change_ajax(id,status)
    {

        if(status == 1)
        {
            var url =  "<?php echo $this->config->item('admin_base_url').$this->viewname.'/publish_record';?>";
            val ='unpublish';
        }
        else
        {
            var url =  "<?php echo $this->config->item('admin_base_url').$this->viewname.'/unpublish_record';?>";
            val ='publish';
        }
        if(id != '0')
        {
            var id = id;
        }
        else
        {
            var boxes = $('input[name="check[]"]:checked');
            var myarray = new Array;
            var i=0;
            $(boxes).each(function(){
            myarray[i]=this.value;
            i++;
            });

        }
         $.ajax({
                type: "post",
                data: {'id':id,'status' : status,'myarray':myarray },
                url: url,
                 success: function(data){
            $.ajax({
              type: "POST",
              url: "<?php echo $this->config->item('admin_base_url').$this->viewname?>/index/"+data,
              data: {
              result_type:'ajax',searchreport:$("#searchreport").val(),perpage:$("#perpage").val(),searchtext:$("#searchtext").val(),sortfield:$("#sortfield").val(),sortby:$("#sortby").val(),allflag:''
            },
            beforeSend: function() {
                  $('#common_div').block({ message: 'Loading...' });
                  },
              success: function(html){
                $("#common_div").html(html);
                $('#common_div').unblock();
              }
            });
            return false;
          }
            });
    }


    function activatpopup(id,status,name)
    {
        //alert(status);
        if(status == 'active')
        {
            var url =  "<?php echo $this->config->item('admin_base_url').$this->viewname.'/publish_record';?>";
            if(name !=''){val ='publish';}else{val ='unpublish';};
        }
        else
        {
            var url =  "<?php echo $this->config->item('admin_base_url').$this->viewname.'/unpublish_record';?>";
            if(name !=''){val ='unpublish';}else{val ='publish';};
        }
        if(id == '0')
        {
            var boxes = $('input[name="check[]"]:checked');
            if(boxes.length == '0')
            {
                $.alert({
                    title: 'Alert!',
                    //backgroundDismiss: false,
                    content: "<strong> Please select record(s) to "+val+".<strong>",
                    confirm: function(){
                    }
                });
                return false;

            }
        }
        if(id == '0')
        {
            var msg = 'Are you sure want to '+val+' Record(s)';
        }
        else
        {
            var msg = 'Are you sure want to '+val+' '+name+'?';
        }
        $.confirm({
            title: 'Confirm!',
            content: "<strong> "+msg+" "+"<strong>",
            confirm: function(){
                activat_change_ajax(id,status);
            },
            cancel: function(){

            }
        });
    }
    //Change status
    function activat_change_ajax(id,status)
    {

        if(status == 'active')
        {
            var url =  "<?php echo $this->config->item('admin_base_url').$this->viewname.'/publish_record';?>";
            val ='unpublish';
        }
        else
        {
            var url =  "<?php echo $this->config->item('admin_base_url').$this->viewname.'/unpublish_record';?>";
            val ='publish';
        }
        if(id != '0')
        {
            var id = id;
        }
        else
        {
            var boxes = $('input[name="check[]"]:checked');
            var myarray = new Array;
            var i=0;
            $(boxes).each(function(){
                myarray[i]=this.value;
                i++;
            });

        }
        $.ajax({
            type: "post",
            data: {'id':id,'activated' : status,'myarray':myarray },
            url: url,
            success: function(data){
                $.ajax({
                    type: "POST",
                    url: "<?php echo $this->config->item('admin_base_url').$this->viewname?>/index/"+data,
                    data: {
                        result_type:'ajax',searchreport:$("#searchreport").val(),perpage:$("#perpage").val(),searchtext:$("#searchtext").val(),sortfield:$("#sortfield").val(),sortby:$("#sortby").val(),allflag:''
                    },
                    beforeSend: function() {
                        $('#common_div').block({ message: 'Loading...' });
                    },
                    success: function(html){
                        $("#common_div").html(html);
                        $('#common_div').unblock();
                    }
                });
                return false;
            }
        });
    }

  /* show image in fancybox */

    $(document).ready(function() {
        /*
         *  Simple image gallery. Uses default settings
         */

        $('.fancybox').fancybox();

        /*
         *  Different effects
         */

        // Change title type, overlay closing speed
        $(".fancybox-effects-a").fancybox({
            helpers: {
                title : {
                    type : 'outside'
                },
                overlay : {
                    speedOut : 0
                }
            }
        });

        // Disable opening and closing animations, change title type
        $(".fancybox-effects-b").fancybox({
            openEffect  : 'none',
            closeEffect	: 'none',

            helpers : {
                title : {
                    type : 'over'
                }
            }
        });

        // Set custom style, close if clicked, change title type and overlay color
        $(".fancybox-effects-c").fancybox({
            wrapCSS    : 'fancybox-custom',
            closeClick : true,

            openEffect : 'none',

            helpers : {
                title : {
                    type : 'inside'
                },
                overlay : {
                    css : {
                        'background' : 'rgba(238,238,238,0.85)'
                    }
                }
            }
        });

        // Remove padding, set opening and closing animations, close if clicked and disable overlay
        $(".fancybox-effects-d").fancybox({
            padding: 0,

            openEffect : 'elastic',
            openSpeed  : 150,

            closeEffect : 'elastic',
            closeSpeed  : 150,

            closeClick : true,

            helpers : {
                overlay : null
            }
        });

        /*
         *  Button helper. Disable animations, hide close button, change title type and content
         */

        $('.fancybox-buttons').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',

            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,

            helpers : {
                title : {
                    type : 'inside'
                },
                buttons	: {}
            },

            afterLoad : function() {
                this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
            }
        });


        /*
         *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
         */

        $('.fancybox-thumbs').fancybox({
            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,
            arrows    : false,
            nextClick : true,

            helpers : {
                thumbs : {
                    width  : 50,
                    height : 50
                }
            }
        });

        /*
         *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
         */
        $('.fancybox-media')
            .attr('rel', 'media-gallery')
            .fancybox({
                openEffect : 'none',
                closeEffect : 'none',
                prevEffect : 'none',
                nextEffect : 'none',

                arrows : false,
                helpers : {
                    media : {},
                    buttons : {}
                }
            });

        /*
         *  Open manually
         */

        $("#fancybox-manual-a").click(function() {
            $.fancybox.open('1_b.jpg');
        });

        $("#fancybox-manual-b").click(function() {
            $.fancybox.open({
                href : 'iframe.html',
                type : 'iframe',
                padding : 5
            });
        });

        $("#fancybox-manual-c").click(function() {
            $.fancybox.open([
                {
                    href : '1_b.jpg',
                    title : 'My title'
                }, {
                    href : '2_b.jpg',
                    title : '2nd title'
                }, {
                    href : '3_b.jpg'
                }
            ], {
                helpers : {
                    thumbs : {
                        width: 75,
                        height: 50
                    }
                }
            });
        });


    });
    /*end image */

</script>
