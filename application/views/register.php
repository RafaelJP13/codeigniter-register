<body>

<div class="wrapper">

            <div class="row d-flex justify-content-center mt-4">

                <div class="col-xl-6">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="header-title mb-3 text-center" style="line-height: 20px;">Olá, cadastre o máximo de informações que puder para ter uma melhor experiência.</h4>
                            
                            <!-- Erros de sessão -->
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
                            <?php } ?>

                            <!-- Erros de validação -->
                            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                            <?php echo form_open('register/store'); ?>

                                <div id="basicwizard">

                                    <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                        <li class="nav-item">
                                            <a href="#basictab1" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active"> 
                                                <i class="mdi mdi-account-circle mr-1"></i>
                                                <span class="d-none d-sm-inline">Perfil</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Configuração com helper form -->
                                    <?php 
                                        
                                        $name = array(

                                            'name'      => 'name',
                                            'id'        => 'name',
                                            'value'     => set_value('name'),
                                            'minlength' => '1',
                                            'maxlength' => '99',
                                            'required'  => 'required',
                                            'class'     => 'form-control'
                                        );

                                        $rg = array(

                                            'name'  => 'rg',
                                            'id'    => 'rg',
                                            'value' => set_value('rg'),
                                            'class' => 'form-control'
                                        );

                                        $email = array(

                                            'name'      => 'email',
                                            'id'        => 'email',
                                            'value'     => set_value('email'),
                                            'minlength' => '5',
                                            'maxlength' => '99',
                                            'required'  => 'required',
                                            'class'     => 'form-control'
                                        );

                                        $telephone = array(

                                            'name'      => 'telephone',
                                            'id'        => 'telephone',
                                            'value'     => set_value('telephone'),
                                            'minlength' => '5',
                                            'maxlength' => '99',
                                            'required'  => 'required',
                                            'class'     => 'form-control',
                                            'onblur'    => 'handleInvalidTelephoneMessage(this.value)'
                                        );

                                        $password = array(

                                            'name'      => 'password',
                                            'id'        => 'password',
                                            'value'     => set_value('password'),
                                            'minlength' => '6',
                                            'required'  => 'required',
                                            'class'     => 'form-control',
                                            'onblur'    => "passwordValidate('password', 'confirmPassword')",
                                            'type'      => 'password'
                                        );

                                        $confirmPassword = array(

                                            'name'      => 'confirmPassword',
                                            'id'        => 'confirmPassword',
                                            'value'     => set_value('confirmPassword'),
                                            'minlength' => '6',
                                            'required'  => 'required',
                                            'class'     => 'form-control',
                                            'onblur'    => "passwordValidate('password', 'confirmPassword')",
                                            'type'      => 'password'
                                        );

                                        $zipcode = array(

                                            'name'      => 'zipcode',
                                            'id'        => 'zipcode',
                                            'value'     => set_value('zipcode'),
                                            'minlength' => '9',
                                            'maxlength' => '9',
                                            'required'  => 'required',
                                            'class'     => 'form-control',
                                            'onblur'    => "iniciaBuscaCep('zipcode', 'street', 'neighborhood', 'city', 'state')"
                                        );

                                        /* Começo das config do input state */
                                        $ufOptions = array ("AC" => 'AC' ,"AL" => 'AL' ,"AP" => 'AP' ,"AM" => 'AM' ,"BA" => 'BA' ,"CE" => 'CE' ,"DF" => 'DF' ,"ES" => 'ES' ,"GO" => 'GO' ,"MA" => 'MA' ,"MT" => 'MT' ,"MS" => 'MS' ,"MG" => 'MG' ,"PA" => 'PA' ,"PB" => 'PB' ,"PR" => 'PR' ,"PE" => 'PE' ,"PI" => 'PI' ,"RJ" => 'RJ' ,"RN" => 'RN' ,"RS" => 'RS' ,"RO" => 'RO' ,"RR" => 'RR' ,"SC" => 'SC' ,"SP" => 'SP' ,"SE" => 'SE' ,"TO");
                                        
                                        $ufOptionSelected = set_value('state');

                                        $ufProperties = array(

                                            'id'    => 'state',
                                            'class' => 'form-control'
                                        );
                                        /* Fim das config do input state */

                                        $city = array(

                                            'name'      => 'city',
                                            'id'        => 'city',
                                            'value'     => set_value('city'),
                                            'minlength' => '2',
                                            'maxlength' => '45',
                                            'required'  => 'required',
                                            'class'     => 'form-control'
                                        );

                                        $neighborhood = array(

                                            'name'      => 'neighborhood',
                                            'id'        => 'neighborhood',
                                            'value'     => set_value('neighborhood'),
                                            'minlength' => '2',
                                            'maxlength' => '45',
                                            'required'  => 'required',
                                            'class'     => 'form-control',
                                        );

                                        $street = array(

                                            'name'      => 'street',
                                            'id'        => 'street',
                                            'value'     => set_value('street'),
                                            'minlength' => '2',
                                            'maxlength' => '45',
                                            'required'  => 'required',
                                            'class'     => 'form-control',
                                        );

                                        $number = array(

                                            'name'      => 'number',
                                            'id'        => 'number',
                                            'value'     => set_value('number'),
                                            'minlength' => '1',
                                            'maxlength' => '10',
                                            'required'  => 'required',
                                            'class'     => 'form-control',
                                        );

                                        $reference = array(

                                            'name'  => 'reference',
                                            'id'    => 'reference',
                                            'value' => set_value('reference'),
                                            'class' => 'form-control',
                                        );

                                        /* Começo das config do input typeHabitation */
                                        $typeHabitationOptions = array (
                                            '0' => 'Casa',
                                            '1' => 'Apartamento'
                                        );
                                        
                                        $typeHabitationOptionSelected = set_value('typeHabitation');

                                        $typeHabitationProperties = array(

                                            'id'       => 'typeHabitation',
                                            'class'    => 'form-control',
                                            'onchange' => "showApFields(this.value)"
                                        );

                                        /* Fim das config do input typeHabitation */

                                        $floor = array(

                                            'name'        => 'floor',
                                            'id'          => 'floor',
                                            'value'       => set_value('floor'),
                                            'class'       => 'form-control',
                                            'placeholder' => "Ex: 4º",
                        
                                        );

                                        $room = array(

                                            'name'        => 'room',
                                            'id'          => 'room',
                                            'value'       => set_value('room'),
                                            'class'       => 'form-control',
                                            'placeholder' => "Ex: 420",
                                            
                                        );

                                        $submit = array(

                                            'type'  => 'submit',
                                            'value' => 'Finalizar Cadastro',
                                            'class' => 'btn btn-success',
                                            'id'    => 'btnSubmit'
                                        );
                                        
                                    ?>

                                    <div class="tab-content b-0 mb-0">
                                        
                                        <div class="tab-pane active" id="basictab1">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="name">Nome</label>
                                                        <div class="col-md-9">
                                                            <?= form_input($name); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                           
                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="rg">RG</label>
                                                        <div class="col-md-9">
                                                            <?= form_input($rg); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="email">E-mail</label>
                                                        <div class="col-md-9">
                                                            <?= form_input($email); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="telephone">Telefone</label>
                                                        <div class="col-md-9">
                                                            <?= form_input($telephone); ?>
                                                            <span class="text-danger" id="telephoneMessage" style="display:none;font-size:12px;">Telefone inválido!</span>  
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="password">Senha</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group-prepend">
                                                                <?= form_input($password); ?>
                                                                <span class="input-group-text" style="cursor:pointer;" onclick="showPassword('password')"><i class="mdi mdi-eye"></i></span>
                                                            </div>
                                                            <strong style="font-size:12px;">A senha deve ter ao menos 6 caracteres</strong>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="password">Confirmar Senha</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group-prepend">
                                                                <?= form_input($confirmPassword); ?>
                                                                <span class="input-group-text" style="cursor:pointer;" onclick="showPassword('confirmPassword')"><i class="mdi mdi-eye"></i></span>            
                                                            </div>
                                                            <span class="text-danger" id="passwordMessage" style="display:none;font-size:12px;">Senhas não são iguais.</span>  
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                                <li class="nav-item">
                                                    <a href="#basictab1" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active"> 
                                                        <i class=" mdi mdi-map-marker-radius mr-1"></i>
                                                        <span class="d-none d-sm-inline">Endereço</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="zipcode">CEP</label>
                                                        <div class="col-md-9">
                                                            <?= form_input($zipcode); ?>
                                                            <span class="text-danger" id="cepMessage" style="display:none;font-size:12px;">Cep inválido!</span>                                                        
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="state">UF</label>
                                                        <div class="col-md-9">
                                                            <?= form_dropdown('state', $ufOptions, $ufOptionSelected, $ufProperties); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="city">Cidade</label>
                                                        <div class="col-md-9">
                                                            <?= form_input($city); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="neighborhood">Bairro</label>
                                                        <div class="col-md-9">
                                                        <?= form_input($neighborhood); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="street">Rua</label>
                                                        <div class="col-md-9">
                                                        <?= form_input($street); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="number">Número</label>
                                                        <div class="col-md-9">
                                                            <?= form_input($number); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="reference">Referência</label>
                                                        <div class="col-md-9">
                                                        <?= form_input($reference); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="typeHabitation">Tipo</label>
                                                        <div class="col-md-9 form-contro" id="typeHabitation">
                                                        <?= form_dropdown('typeHabitation', $typeHabitationOptions, $typeHabitationOptionSelected, $typeHabitationProperties); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 apFields">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="floor">Andar</label>
                                                        <div class="col-md-9">
                                                            <?= form_input($floor); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 apFields">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="room">Sala</label>
                                                        <div class="col-md-9">
                                                            <?= form_input($room); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> 
                                        </div> 

                                        <ul class="list-inline wizard mb-0">
                                            <li class="next list-inline-item float-right">
                                                <?= form_input($submit); ?>
                                            </li>
                                        </ul>

                                    </div> 

                                </div> 

                            <?php echo form_close(); ?>

                        </div>

                    </div>

                </div> 

            </div> 

        </div>

    <script src="<?= base_url(); ?>application/assets/js/app.min.js"></script>
    <script src="<?= base_url(); ?>application/assets/js/vendor/Chart.bundle.min.js"></script>
    <script src="<?= base_url(); ?>application/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?= base_url(); ?>application/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url(); ?>application/assets/js/pages/demo.dashboard.js"></script>
    <script src="<?= base_url(); ?>application/assets/js/libs/custom/cep.js"></script>
    <script src="<?= base_url(); ?>application/assets/js/libs/custom/validacoes.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/email-autocomplete/0.1.3/jquery.email-autocomplete.min.js" integrity="sha256-z/W9yQDquoQ1y0q9Ckw7t66lD6TESX+V6iAIS0xP1wU=" crossorigin="anonymous"></script>

    <script>
  
            $('#zipcode').mask('00000-000')
            $('#telephone').mask('(00) 00000-0000')
            $('#rg').mask('00.000.000-0')

            $("#email").emailautocomplete({suggClass: "custom-classname",domains: ["example.com"]});

            const showPassword = passwordFieldId => $(`#${passwordFieldId}`).prop("type") == 'password' ? $(`#${passwordFieldId}`).prop('type','text') : $(`#${passwordFieldId}`).prop('type','password')
            
            const showApFields = typeHabitation => {

                const ap = 1, home = 0

                typeHabitation == ap ? $('.apFields').css('display', 'block') :  $('.apFields').css('display', 'none')
            }
            const handleInvalidTelephoneMessage = telefone =>{

                let statusDisplayTelephoneMessage = $('#telephoneMessage').css('display')

                if(telefone != ""){


                    if(telephoneValidate(telefone) && statusDisplayTelephoneMessage == 'block'){
                        
                        $('#telephoneMessage').css('display', 'none')
                        $('#btnSubmit').prop("disabled", false)

                    }
                    if(!telephoneValidate(telefone) && statusDisplayTelephoneMessage == 'none'){
                        
                        $('#telephoneMessage').css('display', 'block')
                        $('#btnSubmit').prop("disabled", true)

                    }
                }
                
            }   
        </script>

        <style>
            .apFields{display:none;}
        </style>
        
