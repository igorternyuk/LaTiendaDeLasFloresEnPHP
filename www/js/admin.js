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

/*
    'admin/category/add' => 'adminCategory/add',
    'admin/category/edit/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/remove/([0-9]+)' => 'adminCategory/remove/$1',
*/

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
                clearForm("#addCategoryForm");
                document.location = '/admin/category/page-1';
            } 
        }
    });
}

function editCategory(id){
    let postData = getData("#categoryEditForm");
    console.log("registerFormData:");
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
                document.location = '/admin/category/page-1';
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
                document.location = '/admin/category/page-1';
            } 
        }
    });
}




