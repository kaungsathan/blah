$(document).ready(function () {
    const submit = $("#submit")
    const route = submit.data('route')
    const redirectRoute = submit.data('redirect-route')

    submit.click(function (event) {
        event.preventDefault(); // Prevent default form submission

        const name = $("#name").val();
        const email = $("#email").val();
        const mobileNumber = $("#mobile-number").val();
        const address = $("#address").val();

        if (!name) {
            alert("Name can't be empty");
            return;
        }
        if (!email) {
            alert("Email can't be empty");
            return;
        }
        if (!mobileNumber) {
            alert("Mobile Number can't be empty");
            return;
        }
        if (!address) {
            alert("Address can't be empty");
            return;
        }

        $.ajax({
            url: route, // Replace with your actual backend URL
            type: 'POST', // Use POST for form data
            dataType: 'json', // Expect JSON response (or adjust as needed)
            data: {
                name,
                email,
                mobile_number: mobileNumber,
                address
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert("Registered Successfully");
                window.location.href = redirectRoute;
            },
            error: function (xhr, status, error) {

                let validationError = "";

                const errors = xhr.responseJSON.errors;
                const errorList = [];

                for (const field in errors) {
                    if (errors.hasOwnProperty(field)) {
                        errorList.push(errors[field][0]);
                    }
                }

                validationError = errorList.join('\n');
                alert(validationError);
            }
        });
    });
});


