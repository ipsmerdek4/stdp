tinymce.init({
    selector: "textarea",theme: "modern", height: 00,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"/Asset/textarea_editor/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "/Asset/textarea_editor/filemanager/plugin.min.js"},

   /* 
   file_browser_callback:  function (field_name, url, type, win) { 
    tinyMCE.activeEditor.windowManager.open({
        // file : cmsURL,
        title : 'My File Browser',
        width : 420,  // Your dimensions may differ - toy around with them!
        height : 400,
        url: '/Asset/textarea_editor/filemanager/dialog.php?type=1&field_id=' + field_name,
        
    }, {
        window : win,
        input : field_name
    });
    return false;
  } */

 });