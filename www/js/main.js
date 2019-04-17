function getData(objForm){
    var data = {};
    $('input, select, textarea', $(objForm)).each(function(){
        if(this.name && this.name !== ''){
            data[this.name] = this.value;
        }
    });

    return data;
}

function clearForm(objForm){
    $('input, textarea', $(objForm)).each(function(){
        if(this.name && this.name !== ''){
            this.value = '';
        }
    });
}

function register(){
    let postData = getData("#registerForm");
    console.log("registerFormData:");
    console.log(postData);
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/user/register',
        success: function(data){
            if(data['success']){
                alert("Пользователь успешно зарегистрирован");
                clearForm("#registerForm");
            } else {
                let errors = data['errors'];
                let errorHtml = "<h3>Ошибки:</h3>";
                for(let i = 0; i < errors.length; ++i){
                    errorHtml += "<p>" + (i + 1) + ") <span style='color:red;' >" + errors[i] + "</span></p><br />";
                }
                $("#errors").html(errorHtml);
            } 
        }
    });
}

function login(){
    let postData = getData("#loginForm");
    console.log("loginFormData:");
    console.log(postData);
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/user/login',
        success: function(data){
            if(data['success']){
                document.location = '/cabinet';
            } else {
                errors = data['errors'];
                let errorHtml = "<h3>Ошибка:</h3>";
                for(let i = 0; i < errors.length; ++i){
                    errorHtml += "<p>" + (i + 1) + ") <span style='color:red;' >" + errors[i] + "</span></p><br />";
                }
                $("#errors").html(errorHtml);
            }
        }
    });
}

function logout(){
    let data = {};
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/logout",
        data: data,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                document.location = '/home';
            }
        }
    });
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

function updateUser(){
    let postData= getData("#userEditForm");
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/user/update',
        success: function(data){
            if(data['success']){
                document.location = '/cabinet';
            } else {
                errors = data['errors'];
                let errorHtml = "<h3>Ошибка:</h3>";
                for(let i = 0; i < errors.length; ++i){
                    errorHtml += "<p>" + (i + 1) + ") <span style='color:red;' >" + errors[i] + "</span></p><br />";
                }
                $("#errors").html(errorHtml);
            }
        }
    });
}

function saveorder(){
    let postData= getData("#checkOutForm");
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/cart/saveorder',
        success: function(data){
            if(data['success']){
                alert(data['message']);
                document.location = '/catalog';
            } else {
                errors = data['errors'];
                let errorHtml = "<h3>Ошибка:</h3>";
                for(let i = 0; i < errors.length; ++i){
                    errorHtml += "<p>" + (i + 1) + ") <span style='color:red;' >" + errors[i] + "</span></p><br />";
                }
                $("#errors").html(errorHtml);
            }
        }
    });
}

function toggleOrderProductsView(orderId){
    if($("#orderProducts_" + orderId).is(":visible")){
        $("#orderProducts_" + orderId).hide();
        $("#toggleProducts_" + orderId).html("Показать товары");
    } else {
        $("#orderProducts_" + orderId).show();
        $("#toggleProducts_" + orderId).html("Скрыть товары");
    }
}