<!-- /page content -->
                <!-- footer content -->
                <footer>
                    <div class="text-center">
                        Template Admin  <a href="">TrungPhuNA</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <!-- jQuery -->
        <script src="{{ asset('backend/') }}/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('backend/') }}/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="{{ asset('backend/') }}/js/fastclick.js"></script>
        <!-- NProgress -->
        <script src="{{ asset('backend/') }}/js/nprogress.js"></script>
        <!-- jQuery custom content scroller -->
        <script src="{{ asset('backend/') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset('backend/') }}/js/custom.min.js"></script>
    </body>
</html>


<script type="text/javascript">

    /**
     *  checkall
     */
    $(function() {
        $("#checkall").click(function(){
            $('input:checkbox').prop('checked', this.checked);
        });
    })



    $(function() {
        $("#demo-form2").submit(function(){
            var $name = $.trim($('"#name"').val());
            var flag = true;

            if ($name == '')
            {
                flag = false;
            }
           return flag;
        })
    })


    /**
     * load image thunbar
     */
   
    var loadFileThunbar = function(event) {
        var outputthunbar = document.getElementsByClassName('outputthunbar');
        outputthunbar[0].src = URL.createObjectURL(event.target.files[0]);
    };

    /**
     * load image banner
     */
    
    var loadFile = function(event) {
        var output = document.getElementsByClassName('outputimg');
        output[0].src = URL.createObjectURL(event.target.files[0]);
    };

    /**
     *  thêm bg  khi click vào  checkbox
     */
    $(function() {
        $('.checkbox').click(function(){
            if($(this).prop("checked") == true){
               $(this).parent().parent().addClass("trbg");
            }
            else
            {
                $(this).parent().parent().removeClass("trbg");
            }
            
        });
    })

    /**
     * delete ajax producer
     */
    
    $(function() {
        $delete = $(".btn-delete-action");
        $delete.click(function() {
            $id = $(this).attr("data-id");
            $tr = $(this).parent().parent();
            $alert = $(".showalertjs");
            $alertda = (".showalerterrorjs");
            $.ajax({
                url: '{{ asset('backend/producer') }}' + '/' + $id + '/delete',
                type : "GET",
                dataType : 'json', 
                success:function(data)
                {
                    if(data.success == 'true')
                    {
                        $tr.hide(1000);
                        $alert.addClass("show");
                        $alert.text('Xóa thành công');
                    }
                    else
                    {
                        $alertda.addClass("show");
                        $alertda.text('Xóa thất bại');
                    }
                }
            })
        })
    })

    /**
     * delete all producer
     */
    
    $(function() {
        $deleteallProducer = $(".deleteall");

        $deleteallProducer.click(function() {
            var $idall = new Array();
            var $trdeall = new Array();
            $token = $(this).attr("data-token");
            $(this).parents().parents().parents('div#x_content').find('[name="idall[]"]:checked').each(function()
            {
                $idall.push($(this).val());
                $trdeall.push($(this).parent().parent());
            });
            
            $alert = $(".showalertjs");
            $alertda = (".showalerterrorjs");
            console.log($trdeall);
            $.ajax({
                url: '{{ asset('backend/producer') }}' + '/deleteall',
                type : "POST",
                dataType : 'json',
                data : {idall : $idall,_token : $token},
                success:function(data)
                {
                    if(data.success == 'true')
                    {
                        // $trdeall.hide(1000);
                        jQuery.each($trdeall,function(i,val){
                            $(this).hide(500);
                        });
                        $alert.addClass("show");
                        $alert.text('Xóa thành công');
                    }
                    else
                    {
                        $alertda.addClass("show");
                        $alertda.text('Xóa thất bại');
                    }
                }
            })
        }) ;
    });
   
</script>

