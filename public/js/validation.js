// Document is ready
$(document).ready(function () {

    // Validate firstname
    let firstnameError = true;
    $('#first_name').keyup(function () {
        validateFirstname();
    });

    let lastnameError = true;
    $('#last_name').keyup(function () {
        validateLastname();
    });

    let policynumberError = true;
    $('#policy_number').keyup(function () {
        validatePolicyNumber();
    });


    let premiumError = true;
    $('#premium').keyup(function () {
        validatePremium();
    });


    let startDateError = true;
    $('#start_date').keyup(function () {
        validateStartdate();
    });

    let endDateError = true;
    $('#end_date').keyup(function () {
        validateEnddate();
    });

    function validateStartdate() {
        let startDate = $('#start_date').val();
        if (startDate.length == '') {
            $('#start_date_err').html
                ("Please enter start date");
            $('#start_date_err').show();
            $("#start_date").addClass("is-invalid")
            startDateError = false;
            return false;
        }
        else {
            $("#start_date").removeClass("is-invalid")
            $('#start_date_err').hide();
        }
    }
    function validateFirstname() {
        let firstname = $('#first_name').val();
        if (firstname.length == '') {
            $('#first_name_err').html
                ("Please enter first name");
            $('#first_name_err').show();
            $("#first_name").addClass("is-invalid")
            firstnameError = false;
            return false;
        }
        else {
            $("#first_name").removeClass("is-invalid")
            $('#first_name_err').hide();
        }
    }

    function validateLastname() {
        let lastname = $('#last_name').val();
        if (lastname.length == '') {
            $('#last_name_err').html
                ("Please enter last name");
            $('#last_name_err').show();
            $("#last_name").addClass("is-invalid")
            lastnameError = false;
            return false;
        }
        else {
            $("#last_name").removeClass("is-invalid")
            $('#last_name_err').hide();
        }
    }

    function validatePolicyNumber() {
        let policynumber = $('#policy_number').val();
        if (policynumber.length == '') {
            $('#policy_number_err').html
                ("Please enter policy number");
            $('#policy_number_err').show();
            $("#policy_number").addClass("is-invalid")
            policyNumberError = false;
            return false;
        } else if (!(Math.floor(policynumber) == policynumber && $.isNumeric(policynumber))) {
            $('#policy_number_err').html
                ("Please enter numeric policy number");
            $('#policy_number_err').show();
            $("#policy_number").addClass("is-invalid")
            policyNumberError = false;
            return false;
        }
        else {
            $("#policy_number").removeClass("is-invalid")
            $('#policy_number_err').hide();
        }
    }

    function validatePremium() {
        let premium = $('#premium').val();
        if (premium.length == '') {
            $('#premium_err').html
                ("Please enter premium");
            $('#premium_err').show();
            $("#premium").addClass("is-invalid")
            premiumError = false;
            return false;
        } else if (!(Math.floor(premium) == premium && $.isNumeric(premium))) {
            $('#premium_err').html
                ("Please enter numeric premium");
            $('#premium_err').show();
            $("#premium").addClass("is-invalid")
            premiumError = false;
            return false;
        }
        else {
            $("#premium").removeClass("is-invalid")
            $('#premium_err').hide();
        }
    }

    function validateEnddate() {
        let endDate = $('#end_date').val();
        if (endDate.length == '') {
            $('#end_date_err').html
                ("Please enter end date");
            $('#end_date_err').show();
            $("#end_date").addClass("is-invalid")
            endDateError = false;
            return false;
        }
        else {
            $("#end_date").removeClass("is-invalid")
            $('#end_date_err').hide();
        }
    }


    function verifyDates() {
        var startDate = new Date($('#start_date').val());
        var endDate = new Date($('#end_date').val());

        if (startDate > endDate) {
            $('#end_date_err').html
                ("Please enter end date greater than start date");
            $('#end_date_err').show();
            $("#end_date").addClass("is-invalid")
            endDateError = false;
            return false;
        }else{
            endDateError = true;
        }
    }

    // Submit button
    $('#submit_button').click(function () {
        validateFirstname();
        validateLastname();
        validatePolicyNumber();
        validatePremium();
        validateStartdate();
        validateEnddate();
        verifyDates();
        if ((firstnameError == true) &&
            (lastnameError == true) &&
            (policynumberError == true) &&
            (premiumError == true) &&
            (startDateError == true) &&
            (endDateError == true)) {
            return true;
        } else {
            return false;
        }
    });
});
