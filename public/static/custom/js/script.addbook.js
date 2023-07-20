function loadResults(){

    var url =  "/books?category_id=" + $('#category_fill').val();
    // alert(url);
    var table = $('#all-books');
    
    // alert(table);
    var default_tpl = _.template($('#allbooks_show').html());

    $.ajax({
        url : url,
        success : function(data){
            console.log(data);
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Books in this category</td></tr>');
            } else {
                table.html('');
                for (var book in data) {
                    table.append(default_tpl(data[book]));
                }
            }
        },
        beforeSend : function(){
            table.css({'opacity' : 0.4});
        },
        complete : function() {
            table.css({'opacity' : 1.0});
        }
    });
}

$(document).ready(function(){

    $("#category_fill").change(function(){

        var url =  "/bookBycategory/" + $('#category_fill').val();
        // alert(url);
        var table = $('#all-books');
        
        // alert(table);
        var default_tpl = _.template($('#allbooks_show').html());
    
        $.ajax({
            url : url,
            success : function(data){
                console.log(data);
                if($.isEmptyObject(data)){
                    table.html('<tr><td colspan="99">No Books in this category</td></tr>');
                } else {
                    table.html('');
                    for (var book in data) {
                        table.append(default_tpl(data[book]));
                    }
                }
            },
            beforeSend : function(){
                table.css({'opacity' : 0.4});
            },
            complete : function() {
                table.css({'opacity' : 1.0});
            }
        });
    });

    $(document).on("click", "#addbooks", function(){
        var form = $(this).parents('form'),
            module_body = $(this).parents('.module-body'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        var title = f$('input[data-form-field~=title]').val();
        var author = f$('input[data-form-field~=author]').val();
        var description = f$('textarea[data-form-field~=description]').val();
        var category_id = f$('select[data-form-field~=category]').val();
        var number = parseInt(f$('input[data-form-field~=number]').val());
        var photo = f$('input[data-form-field~=photo]')[0].files[0]; // Get the file object
        var attachment = f$('input[data-form-field~=attachment]')[0].files[0]; // Get the file object
        var auth_user = f$('input[data-form-field~=auth_user]').val();
        var _token = f$('input[data-form-field~=token]').val();

        if(title == "" || author == "" || description == "" || isNaN(number)){
            module_body.prepend(templates.alert_box( {type: 'danger', message: 'Book Details Not Complete'} ));
            send_flag = false;
        }
        
        if(send_flag == true){
            var formData = new FormData();
            formData.append('title', title);
            formData.append('author', author);
            formData.append('description', description);
            formData.append('category_id', category_id);
            formData.append('number', number);
            formData.append('photo', photo);
            formData.append('attachment', attachment);
            formData.append('_token', _token);
            formData.append('auth_user', auth_user);

            $.ajax({
                type: 'POST',
                data: formData,
                contentType: false, // Important for file uploads
                processData: false, // Important for file uploads
                url: '/books',
                success: function(data) {                    
                    module_body.prepend(templates.alert_box({type: 'success', message: data}));
                    clearform();
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    module_body.prepend(templates.alert_box({type: 'danger', message: err.error.message}));
                },
                beforeSend: function() {
                    form.css({'opacity' : '0.4'});
                },
                complete: function() {
                    form.css({'opacity' : '1.0'});
                }
            });
        }
    });

    function clearform() {
        // Add logic to clear the form fields after successful submission.
    }


    loadResults();

});

function clearform(){
    $('#title').val('');
    $('#author').val('');
    $('#description').val('');
    $('#number').val('');
    $('#category').val('');
    $('#photo').val('');
    
}