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

function addCategory(){
    let postData = getData("#addCategoryForm");
    console.log(postData);
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/category/add',
        success: function(data){
            alert(data['message']);
            if(data['success']){
                clearForm("#addCategoriesForm");
                document.location = '/admin/categories/page-1';
            } 
        }
    });
}

function editCategory(id){
    let postData = getData("#categoryEditForm");
    console.log(postData);
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/category/edit/' + id,
        success: function(data){
            alert(data['message']);
            if(data['success']){
                clearForm("#editCategoryForm");
                document.location = '/admin/categories/page-1';
            } 
        }
    });
}

function removeCategory(id){
    let postData = {};
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/category/remove/' + id,
        success: function(data){
            alert(data['message']);
            if(data['success']){
                document.location = '/admin/categories/page-1';
            } 
        }
    });
}

function updateOrder(id){
    let postData = getData("#editOrderForm");
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/order/update/' + id,
        success: function(data){
            alert(data['message']);
            if(data['success']){
                clearForm("#orderEditForm");
                document.location = '/admin/orders/page-1';
            } 
        }
    });
}

function addProduct(){
    let postData = getData("#addProductForm");
    console.log(postData);
    let datos = new FormData($("#addProductForm"));
    $.ajax({
        method: 'post',
        dataType: 'json',
        data: postData,
        url: '/product/add',
        success: function(data){
            alert(data['message']);
            if(data['success']){
                clearForm("#addProductForm");
                document.location = '/admin/products/page-1';
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




