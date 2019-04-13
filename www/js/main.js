function getData(objForm){
    console.log("js - getting data from register form");
    var data = {};
    console.log($(objForm).children('input textarea select'));  
    $('input, select, textarea', $(objForm)).each(function(){
        if(this.name && this.name !== ''){
            data[this.name] = this.value;
            console.log("data[" + this.name + "]=" + this.value);
        }
    });

    return data;
}

function register(){
    
}

function login(){
    
}

function logout(){
    
}

function addToCart(productId){
    let postData= {};
    postData['productId'] = productId;
    console.log('postData:');
    console.log(postData);
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/cart/add/' + productId,
        success: function(data){
            console.log('Data received: ');
            console.log(data);
            $("#cartTotalItems").html(data['cartTotalItems']);
            $("#cartTotalSum").html(data['cartTotalSum']);
        }
    });
}

function removeFromCart(productId){
    let postData= {};
    postData['productId'] = productId;
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/cart/remove/' + productId,
        success: function(data){
            console.log('Data received: ');
            console.log(data);
            $("#cartTotalItems").html(data['cartTotalItems']);
            $("#cartTotalSum").html(data['cartTotalSum']);
            $("#cartTotalSumInTable").html(data['cartTotalSum']);
            $("#productRow_" + productId).hide();
        }
    });
}

function updateProductCount(productId){
    let postData= {};
    let newProductCount = $("#productCount_" + productId).val();
    postData['productId'] = productId;
    postData['newProductCount'] = newProductCount;
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/cart/update/' + productId + '/' + newProductCount,
        success: function(data){
            console.log('Data received: ');
            console.log(data);
            $("#cartTotalItems").html(data['cartTotalItems']);
            $("#cartTotalSum").html(data['cartTotalSum']);
            $("#cartTotalSumInTable").html(data['cartTotalSum']);
            $("#subtotal_" + productId).html(data['newSubTotal']);
        }
    });
}


