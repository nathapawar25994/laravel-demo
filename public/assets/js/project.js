$(document).ready(function() {
    $('#Projectform').bootstrapValidator({
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Project Name is required and can\'t be empty'
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
            project_type_id: {
                validators: {
                    notEmpty: {
                        message: 'The Project Type is required and can\'t be empty'
                    }
                }
            },
            backend_technologie_id: {
                validators: {
                    notEmpty: {
                        message: 'The Back-end-technology  is required and can\'t be empty'
                    }
                }
            },
            server_id: {
                validators: {
                    notEmpty: {
                        message: 'The Server  is required and can\'t be empty'
                    }
                }
            },
            base_package_name: {
                validators: {
                    notEmpty: {
                        message: 'The Base-package-name  is required and can\'t be empty'
                    }
                }
            }
            
        }
        
    });
});