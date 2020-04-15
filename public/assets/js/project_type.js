$(document).ready(function() {
    $('#ProjectTypeform').bootstrapValidator({
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Project Type Name is required and can\'t be empty'
                    },
                    regexp: {
                        regexp: /^[a-z\s]+$/i,
                        message: 'The input is not a valid'
                    },
                    stringLength: {
                        max: 50,
                        message: 'It must be less than 50 characters'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'The Description is required and can\'t be empty'
                    }
                }
            },
            
            
            
        }
        
    });
});