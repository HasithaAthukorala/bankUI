$(document).ready(function () {

    alert("asf");
    let product_id = null;

    $('#products-table tbody').on('click', 'td.action .td_edit', function () {

        product_id = $(this).find('.edit_btn').attr("data-id");


        $("#product_id").attr('value', product_id);
        alert("df");

        $.ajax({
            url: "server/ajax/category_edit_fetch.php",
            type: "post",
            data: {product_id: product_id},
            success: function (data) {
                let product = $.parseJSON(data);
                console.log(product.size_name);

                $("#pe_name").attr('value', product.name);
                $("#pe_description").attr('value', product.description);

                let images = product.image.split(',');
                for (let i = 0; i < images.length; i++) {
                    //Initializing dropzone with the current thumb
                    let mockFile = {name: images[i], size: 12345, type: 'image/jpeg', status: Dropzone.ADDED};
                    dropzone_edit.files.push(mockFile);
                    dropzone_edit.emit("addedfile", mockFile);
                    dropzone_edit.options.thumbnail.call(this, mockFile, "uploads/products/" + images[i]);
                }

            }
        }).then(function (data) {
            let product = $.parseJSON(data);
// create the option and append to Select2


        });

    });


    $('#products-table tbody').on('click', 'td.action .td_delete', function () {


        product_id = $(this).find('.delete_btn').attr("data-id");

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            allowOutsideClick: true
        }).then(function (result) {

            if (result.value) {
                $.ajax({
                    url: "server/ajax/category_delete.php",
                    type: "post",
                    data: {product_id: product_id},
                    success: function (data) {
                        if (data == 1) {
                            $("#products-table").DataTable().destroy();
                            fetchProducts();
                            resetForm("#productEditForm");
                            swal(
                                'Deleted!',
                                'Your Category has been deleted!',
                                'success'
                            )

                        } else {

                            swal(
                                'Error!',
                                'Something went wrong. Please try again later!',
                                'warning'
                            );

                            resetForm("#productEditForm");


                        }
                    }

                });
            } else {
                swal(
                    'Canceled!',
                    'Your Category is safe!',
                    'error'
                )
            }

        });


    });
}