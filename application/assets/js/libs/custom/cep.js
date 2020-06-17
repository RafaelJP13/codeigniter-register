const iniciaBuscaCep = (campoCep, campoRua, campoBairro, campoCidade) => {

    const cep = $(`#${campoCep}`).val().replace('-','')

    if(cep != ''){

        if(validaCep(cep)) buscaCep(cep, campoRua, campoBairro, campoCidade)
        
        else{
            limpaCamposFormulario(campoRua, campoBairro, campoCidade)
            lidarMensagemCepInvalido('block')
        }

    }

    else limpaCamposFormulario(campoRua, campoBairro, campoCidade)  

}

const validaCep = cep => /^[0-9]{8}$/.test(cep)

const limpaCamposFormulario = (campoRua, campoBairro, campoCidade) => $(`#${campoRua}`, `#${campoBairro}`, `#${campoCidade}`).val("")

const buscaCep = (cep, campoRua, campoBairro, campoCidade)  => {

    $.getJSON(`https://viacep.com.br/ws/${cep}/json/?callback=?`,(dados) => {

        if (!("erro" in dados)) completaCamposFormulario(dados, campoRua, campoBairro, campoCidade)

        else {

            limpaCamposFormulario(campoRua, campoBairro, campoCidade)
            lidarMensagemCepInvalido('block')
        }
    })
}

const completaCamposFormulario = (dados, campoRua, campoBairro, campoCidade) => {

    $(`#${campoRua}`).val(dados.logradouro)
    $(`#${campoBairro}`).val(dados.bairro)
    $(`#${campoCidade}`).val(dados.localidade)
    adicionarUF(dados.uf)
    lidarMensagemCepInvalido('none')
}

const adicionarUF = UF => document.getElementById('state').value = UF;

const lidarMensagemCepInvalido = displayMensagemCepInvalido => {

    $('#cepMessage').css('display', displayMensagemCepInvalido)
    displayMensagemCepInvalido == 'none' ? $('#btnSubmit').prop("disabled", false) : $('#btnSubmit').prop("disabled", true) 
    
}



