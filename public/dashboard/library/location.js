(function($)
{
    "use strict";
    var HT= {};

    HT.province = () => {
        $(document).on('change','.province',function(){
            let _this = $(this)
            let province_id=_this.val()
            $.ajax({
                url: 'http://127.0.0.1:8000/ajax/location/getLocation', 
                type: 'GET',
                data: {
                    'province_id' : province_id 
                },
                dataType: 'json',
                success: function(res)
                {
                    $('.districts').html(res.html)
                    console.log(res)
                },
                error: function(jqXHR,textStatus,errorThrown){
                    console.log('Lỗi:' + textStatus + ' ' + errorThrown);
                }
            });
        })
    }
    HT.province();
})(jQuery);
