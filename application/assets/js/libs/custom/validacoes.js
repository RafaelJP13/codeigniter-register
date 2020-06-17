const telephoneValidate = telefone => /^\d(?!.*(\d)\1{5,}).+$/.test(telefone.replace(/[^0-9 ]/g, ""))

const passwordValidate = (passwordFieldId, passwordConfirmFieldId ) => 
{
    const password1 = $(`#${passwordFieldId}`).val()
    const password2 = $(`#${passwordConfirmFieldId}`).val()
    let displayMessageInvalidPassword = $('#passwordMessage').css('display')

    if(password1 != "" && password2 != ""){
        
        if(password1 === password2 && displayMessageInvalidPassword == 'block'){

            $('#passwordMessage').css('display', 'none')
            $('#btnSubmit').prop("disabled", false)

        } 
        if(password1 != password2 && displayMessageInvalidPassword == 'block'){

            $('#passwordMessage').css('display', 'none')
            $('#btnSubmit').prop("disabled", false)

        } 
        if(password1 != password2 && displayMessageInvalidPassword == 'none'){
            
            $('#passwordMessage').css('display', 'block')
            $('#btnSubmit').prop("disabled", true)

        } 
    }	
}


