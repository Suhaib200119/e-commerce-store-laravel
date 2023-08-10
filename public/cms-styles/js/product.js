function viewProduct(id) {
    console.log(id);
    axios.get(`products/${id}`)
        .then(function (response) {
            console.log(response.data["product"]);
            Swal.fire({
                title: response.data["product"].name,
                text: response.data["product"].description,
                imageUrl: "storage/"+response.data["product"].image,
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: response.data["product"].name + "image",
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
            deleteProduct(id);
        }
    })
}

function deleteProduct(id) {
    axios.delete(`products/${id}`)
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