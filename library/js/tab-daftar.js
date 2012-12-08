    /**
     *  @author Nuarharuha <nhnoah+bay-isra@gmail.com>
     */
    jQuery(document).ready(function(){
        
        var tabDaftarCtrl = {    
                navTab: '#tabDaftar li.active', tabNavItems: 'a[data-toggle="tab"]',
                complete: '#progress-ticker', incomplete: '#progress-ticker-',
                updateProgress: function(e){
                    var val = e.attr('data-percentage');                            
                            console.log('percentage: ' + val);                            
                            $(this.complete).css('width', val + '%');
                            var msg = val + '% Registration process complete.';
                            
                            if (val == 99){
                                msg = '99% complete, please click submit.';    
                            }
                            
                            $(this.complete).text(msg);
                            var bal = 100 - val;
                            $(this.incomplete).css('width',bal + '%');
                },
                go: function(location){               
                var e;                
                  switch (location){
                    case 'next': e = $(this.navTab).next().find(this.tabNavItems); break;
                    case 'previous': e = $(this.navTab).prev().find(this.tabNavItems); break;
                  }; 
              
                if (e.length > 0) {
                        if (location == 'next'){ 
                            $(this.navTab).addClass('hasBeen');
                            this.updateProgress(e);
                            
                        } else {
                           $(this.navTab).removeClass('hasBeen');
                           this.updateProgress(e);
                        }
                        e.click();
                    };
                }
        };
        
        
        $('#tabDaftar a').click(function (e) { 
            e.preventDefault(); 
            tabDaftarCtrl.updateProgress($(this));
            $(this).tab('show').fadeIn(500);
        });
        $('div.tab-pane a.next-tab').click(function(){
            if ($('#progress-daftar').hasClass('hide')){
                $('#progress-daftar').slideToggle(500).removeClass('hide');
            }
            tabDaftarCtrl.go('next');
        });
        $('div.tab-pane a.prev-tab').click(function(){ tabDaftarCtrl.go('previous');});        
        
        /**
         * validator
         */
         
         $("#daftar-baru").validate({
            errorLabelContainer: $("#daftar-baru div.error"),
              rules: {
                    user_login: {
                      minlength: 2,
                      required: true,
                      remote:{
                        url: '/wp-admin/admin-ajax.php',
                        data:{
                           'action':'mc_jsonp',
                           'fn':'username_exists',
                           uname: function(){
                            return $('#user_login').val();
                           }
                           },
                        type: 'post'
                      } // remote
                    }
            },
            messages:{
                    user_login:{
                        minlength: "Must be at least 2 characters",
                        required: "Name required",
                        remote: 'Name has be taken, please choose different username!'
                    }
            },            
            highlight: function(label) {
                $('#error-box').fadeIn(500);
            },
            success: function(label) {                
                $('#error-box').fadeOut(500);
                
            }
         });
    });