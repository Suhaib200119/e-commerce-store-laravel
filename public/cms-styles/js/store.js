function viewStore(id) {
    axios.get(`stores/${id}`)
        .then(function (response) {
            Swal.fire({
                title: response.data["store"].name,
                text: 'The Store Address : ' + response.data["store"].address,
                imageUrl: "storage/" + response.data["store"].logo,
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: response.data["store"].name + "logo",
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
            deleteStore(id);
        }
    })
}

function deleteStore(id) {
    axios.delete(`stores/${id}`)
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