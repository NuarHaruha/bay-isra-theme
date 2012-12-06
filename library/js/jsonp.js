jQuery(document).ready(function(){

     jQuery('#check-username').click(function(){
            mc.checkUsernameExists();
     });
     
     jQuery('#btn-daftarBaru').click(function(){
            mc.submitRegisterForm();
     });     
});

var mc  = {};

mc.submitRegisterForm = function(){
        
     jQuery.ajax({
          type: 'POST',
          url: '/wp-admin/admin-ajax.php',
          data: $('#daftar-baru').serialize(),
          
          success:function(data){      
            
            console.log(data);            
          },
          error: function(errorThrown){
               alert('error');
               console.log(errorThrown);
          }
           
 
     });    
};

mc.checkUsernameExists = function(){
     jQuery.ajax({
          url: '/wp-admin/admin-ajax.php',
          data:{
               'action':'mc_jsonp',
               'fn':'username_exists',
               'uname': $('#user_login').val()
               },
          
          success:function(data){            
            var info = $('#username-info');
            if (data == "true"){
                $('#check-username i').toggleClass('icon-search icon-ok');
                info.text('Login Available')
            } else {
                info.text('Username is taken')
            }
                        
                 console.log(data);
          },
          error: function(errorThrown){
               alert('error');
               console.log(errorThrown);
          }
           
 
     });
 
}