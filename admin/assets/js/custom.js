$(document).ready(function () {
    // Delete product
    $(document).on('click','.delete_product_btn', function(e){
        e.preventDefault();

        var id = $(this).val(); // Get the product ID

        // Show confirmation dialog with SweetAlert
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'product_id': id,
                        'delete_product_btn': true
                    },
                    success: function (response) {
                        console.log(response); // Check the response in the console
                        
                        // Show success message no matter what the response is
                        swal("Success!", "Product deletion process completed", "success")
                        .then(() => {
                            // Check the response for actual success or failure
                            if (response == 200) {
                                // If success, reload the table content after deletion
                                $("#products_table").load(location.href + " #products_table");
                            } else {
                                // If there's an error or product could not be deleted
                                swal("Error!", "The product cannot be recovered", "error");
                            }
                        });
                    }
                });
            }
        });
    });

    $(document).on('click','.delete_category_btn', function(e){

        e.preventDefault();

        var id = $(this).val(); // Get the category ID

        // Show confirmation dialog with SweetAlert
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'category_id': id,
                        'delete_category_btn': true
                    },
                    success: function (response) {
                        console.log(response); // Check the response in the console
                        
                        // Show success message no matter what the response is
                        swal("Success!", "Category deletion process completed", "success")
                        .then(() => {
                            // Check the response for actual success or failure
                            if (response == 200) {
                                // If success, reload the table content after deletion
                                $("#category_table").load(location.href + " #category_table");
                            } else {
                                // If there's an error or category could not be deleted
                                swal("Error!", "The category cannot be recovered", "error");
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log('AJAX Error:', status, error); // Log AJAX error
                        swal("Error!", "There was an issue deleting the category. Please try again.", "error");
                    }
                });
            }
        });
    });

});
