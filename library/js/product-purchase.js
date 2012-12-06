

jQuery(document).ready(function(){

    $.fn.capitalize = function () {
        $.each(this, function () {
            var split = this.value.split(' ');
            for (var i = 0, len = split.length; i < len; i++) {
                split[i] = split[i].charAt(0).toUpperCase() + split[i].slice(1);
            }
            this.value = split.join(' ');
        });
        return this;
    };
    
    $('.capwords').on('keyup', function(){
        $(this).capitalize();
    }).capitalize();
        
    jQuery('#products-cart tfoot').hide();
    
        
    // update quantity
    jQuery('button.update-quantity').change(function(){
        var pid = $(this).data("pid");
        var price = $(this).data('price');
        var quantity = $("#quantity_"+pid).val();
        var amount = quantity * price;
        
        if (console){
            console.log('product id:' + pid + ', price: '+ price + ', quantity: ' + quantity + ', amount: ' + amount);
        }        
        
        $("#ttl_price_"+pid)
            .html(amount)
            .currency({ region: 'MYR', thousands: ',', decimal: '.', decimals: 2 })
            .data('amount',amount);  
            
        // update total
        mc_basket_total(); 
    }).click(function(e){ $(this).change();});
    
    jQuery('input.add_cart').click(function(e){
        var pid = $(this).data('pid');
        var cur_item_amount = $("#ttl_price_"+pid).data('amount');
        
        $("#ttl_price_"+pid)
            .html(cur_item_amount)
            .currency({ region: 'MYR', thousands: ',', decimal: '.', decimals: 2 })
            .data('amount',cur_item_amount);
        
        if ($(this).is(':checked') == false) {        
            $("#ttl_price_"+pid)
                .html('');
        }
        
        
        if ($('#products-cart tfoot').is(":hidden")){
            $('#products-cart tfoot').slideDown('slow');
        }
        
        mc_basket_total();
        
        
    });    
    
    function mc_basket_total(){
        
        var total = 0;
        $('.item_amount').each(function(i,v){
            
            // first check if checkbox is selected 
            var cur_pid = $(this).data('pid');
            var is_checked = ($("#cb_"+cur_pid+':checked').length > 0);
            
            if ($("#cb_"+cur_pid+':checked').length > 0 ){
                var amount = $(this).data('amount');
                total += parseFloat(amount);
                $("#cb_"+cur_pid).val(parseFloat(amount) );
                
            $("#ttl_price_"+cur_pid)
            .html(amount)
            .currency({ region: 'MYR', thousands: ',', decimal: '.', decimals: 2 })
            .data('amount',amount);
            
            
            
                console.log('index: '+ i + ', element amount:' + $(this).data('amount') + ', total accummulate: '+ total );
            }
        });
                
        $("#cart-total").html(total)
            .currency({ region: 'MYR', thousands: ',', decimal: '.', decimals: 2 });
        
        $('#ordered_amount').val(total);
    }
    
    $('.checkall').click(function () {
        $(this).parents('form:eq(0)').find(':checkbox').attr('checked', this.checked);
        if ($('#products-cart tfoot').is(":hidden")){
            $('#products-cart tfoot').slideDown('slow');
        }        
        mc_basket_total(); 
    });
});