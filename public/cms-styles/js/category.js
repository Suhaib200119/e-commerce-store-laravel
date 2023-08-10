function viewCategory(id) {
    axios.get(`categories/${id}`)
        .then(function (response) {
            Swal.fire({
                title: response.data["category"].name,
                text: 'The category belong to : ' + response.data["store_name"],
                imageUrl: "storage/"+response.data["store_logo"],
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: response.data["category"].name + "logo",
            })
        })
}


function confirmationFunction(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteCategory(id);
        }
    })
}

function deleteCategory(id) {
    axios.delete(`categories/${id}`)
        .then(function (response) {
            if (response.data["status"] == true) {
                document.getElementById(id).remove();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Your work is not saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

        })

}