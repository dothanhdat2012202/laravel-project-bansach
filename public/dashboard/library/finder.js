// (function($)
// {
//     "use strict";
//     var HT= {};

//     HT.inputImage = () => {
//         $(document).on('click','.input-img',function(){
//             let _this = $(this)
//             let fileUpload = _this.attr('data-upload')
//             HT.BrowseSeverInput($(this),'Images',fileUpload);
//         })
//     }
//     HT.BrowseSeverInput = (object,type) => {
//         if(typeof(type) == 'undefined'){
//             type = 'Images';
//         }
//         var finder = new CKFinder();
//         finder.resourceType = type;
//         finder.selectActionFunction = function( fileUrl,data){
//             console.log(fileUrl)
//             // fileUrl = fileUrl.replace(BASE_URL,"/");
//             object.val(fileUrl) 
//         }
//         finder.popup();
//     }
//         HT.BrowseSeverInput();
// })(jQuery);
