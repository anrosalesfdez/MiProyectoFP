<template>
<div class="row" id="clientes_nuevo">
<notifications classes="my-style" position="top right"/>

    <div class="col-sm-12">
        <div class="card">

            <form method="post" action="/clientes/store" @submit="validarForm($event)">

                <div class="card-header">
                    <h3 style="display: inline">Alta nuevo cliente</h3>
                    <div style="display: inline; float: right">
                        <button type="submit" class="crearButton">Guardar</button>
                        <a href="/clientes/listar" class="cancelarButton">Cancelar</a>
                    </div>
                </div>

                <div class="card-body espacios">

                    <input type="hidden" name="_token" v-model="csrf">
                    
                    <div class="form-group">
                        <label for="razon_social" class="col-form-label">Razón social</label>      
                        <input type="text" class="form-control" name="razon_social" id="razon_social" 
                                v-model="nuevoCliente.razon_social"
                                v-touppercase>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" name="nif" id="nif" 
                                    v-model="nuevoCliente.nif"
                                    v-touppercase>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="niva" class="col-form-label">NIVA</label>      
                            <input type="text" class="form-control" name="niva" id="niva"
                                    v-model="nuevoCliente.niva"
                                    v-touppercase>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección fiscal</label>      
                        <input type="text" class="form-control" name="direccion" id="direccion"
                                v-model="nuevoCliente.direccion"
                                v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="pais" class="col-form-label">Pais</label>      
                            <input type="text" class="form-control" name="pais" id="pais"
                                v-model="nuevoCliente.pais"
                                v-touppercase>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="provincia" class="col-form-label">Provincia</label>      
                            <input type="text" class="form-control" name="provincia" id="provincia"
                                    v-model="nuevoCliente.provincia"
                                    v-touppercase>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp" class="col-form-label">Código Postal</label>      
                            <input type="text" class="form-control" name="cp" id="cp"
                                v-model="nuevoCliente.cp"
                                v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefono" class="col-form-label">Teléfono</label>      
                            <input type="tel" class="form-control" name="telefono" id="telefono"
                                    v-model="nuevoCliente.telefono">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">Email</label>      
                            <input type="email" class="form-control" name="email" id="email"
                                    v-model="nuevoCliente.email"
                                    v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ambito" class="col-form-label">Ámbito cliente</label>
                            <select class="form-control" name="ambito" id="ambito"
                                    v-model="nuevoCliente.ambito">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" name="tipo" id="tipo"
                                    v-model="nuevoCliente.tipo">
                                <option disabled selected value="">Tipo de cliente...</option>
                                <option value="PERSONA FISICA">PERSONA FISICA</option>
                                <option value="PERSONA JURIDICA">PERSONA JURIDICA</option>
                            </select>        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="forma_pago" class="col-form-label">Método de pago</label>
                            <select class="form-control" name="forma_pago" id="forma_pago"
                                    v-model="nuevoCliente.forma_pago">
                                <option disabled selected value="">Elije método...</option>
                                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                <option value="PAY PAL">PAY PAL</option>
                                <option value="CONTADO">CONTADO</option>
                            </select>      
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dias_pago" class="col-form-label">Plazo para el pago</label>
                            <select class="form-control" name="dias_pago" id="dias_pago"
                                    v-model="nuevoCliente.dias_pago">
                                <option disabled selected value="">Elige días...</option>
                                <option value="0">0</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                            </select>        
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="observaciones" class="col-form-label">Observaciones</label>
                        <textarea class="form-control" name="observaciones" id="observaciones"
                                v-model="nuevoCliente.observaciones"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="crearButton">Guardar</button>
                        <a href="/clientes/listar" class="cancelarButton">Cancelar</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</template> 


<script>
//FIXME: enviar notificación desde server cuando se guarda OK.
//FIXME: meter control si NIF ya existe. traer datos desde clientes.vue
//FIXME: No funciona la directiva de pintar en mayusc

export default{
    name:'clientesnuevo',
    data(){ //datos del componente
        return {
            nuevoCliente: { //objeto que recoge datos del request a usuario para nuevo
                razon_social: '',
                nif: '',
                niva: '',
                direccion: '',
                provincia: '',
                pais: '',
                cp: '',
                telefono: '',
                email: '',
                ambito: '',
                tipo: '',
                forma_pago: '',
                dias_pago: '',
                observaciones: ''
            },
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            validado:'' //recoge errores en form TANTO PARA CLIENTE COMO PARA SERVIDOR!!!!!!!!!!!!!!!!
        }
    },
    props:[
        'olds',
        'errors'
    ],
    created(){

        if('razon_social' in this.olds) { this.nuevoCliente.razon_social = this.olds.razon_social; }
        if('nif' in this.olds) { this.nuevoCliente.nif = this.olds.nif; }
        if('niva' in this.olds) { this.nuevoCliente.niva = this.olds.niva; }
        if('direccion' in this.olds) { this.nuevoCliente.direccion = this.olds.direccion; }
        if('pais' in this.olds) { this.nuevoCliente.pais = this.olds.pais; }
        if('provincia' in this.olds) { this.nuevoCliente.provincia = this.olds.provincia; }
        if('cp' in this.olds) { this.nuevoCliente.cp = this.olds.cp; }
        if('telefono' in this.olds) { this.nuevoCliente.telefono = this.olds.telefono; }
        if('email' in this.olds) { this.nuevoCliente.email = this.olds.email; }
        if('ambito' in this.olds) { this.nuevoCliente.ambito = this.olds.ambito; }
        if('tipo' in this.olds) { this.nuevoCliente.tipo = this.olds.tipo; }
        if('forma_pago' in this.olds) { this.nuevoCliente.forma_pago = this.olds.forma_pago; }
        if('dias_pago' in this.olds) { this.nuevoCliente.dias_pago = this.olds.dias_pago; }
        if('observaciones' in this.olds) { this.nuevoCliente.observaciones = this.olds.observaciones; }
        
        //si form validado en cliente pero falla en servidor.
        console.log('enviado true, devuelve errors: '+this.errors);
        if(this.errors.length !== 0){
            this.validado = '';
            for(let i=0; i < this.errors.length; i++){
                this.validado += this.errors[i];
            }
            this.$notify({
                    text: this.validado,
                    type: 'error',
                });
        }
        
    },
    methods:{
        //VALIDACION DEL FORM. SI TODO OK ENVÍA HTTP REQUEST, SINO, MUESTRA NOTIFICACIÓN CON ERRORES.
        validarForm(e){
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            this.controlRazonSocial(e, this.nuevoCliente.razon_social);
            this.controlNif(e, this.nuevoCliente.nif);
            this.controlPais(e, this.nuevoCliente.pais);
            this.controlAmbito(e, this.nuevoCliente.ambito, this.nuevoCliente.niva, this.nuevoCliente.pais);
            this.controlTipo(e, this.nuevoCliente.tipo, this.nuevoCliente.ambito, this.nuevoCliente.nif);
            this.controlEmail(e, this.nuevoCliente.email);

            if(this.validado !== ''){
                this.$notify({
                    text: this.validado,
                    type: 'error',
                });
                e.preventDefault();
                return;
            }          
        },
        //VALIDA EN CLIENTE. Se ejecutan todas de golpe al click en crear/actualizar
        controlRazonSocial(e, razon_social){
            if(!razon_social)
                this.validado += "RAZÓN SOCIAL es campo obligatorio<br>";
            else if(razon_social.length == 0 || razon_social.length > 50)
                this.validado += "RAZÓN SOCIAL máximo de caracteres: 50<br>";
        },
        controlNif(e, dni) {
            if(!dni)
                this.validado += "NIF es campo obligatorio<br>";
        },
        controlEmail(e, email) {
            if(email){
               let emailPatron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(!emailPatron.test(email))
                    this.validado += "Formato email inválido<br>";
            }
        },
        controlPais(e, pais){
            if(!pais)
                this.validado += "Campo pais obligatorio<br>";
        },
        controlAmbito(e, ambito, niva, pais){
            if(!ambito)
                this.validado += "ÁMBITO es campo obligatorio<br>";

            if(ambito == 'NACIONAL' && pais.toUpperCase() !== 'ESPAÑA')
                this.validado += "ÁMBITO: "+ambito+ " incorrecto para PAÍS: "+pais+"<br>";
            
            if(ambito !== 'NACIONAL' && pais =='ESPAÑa')
                this.validado += "ÁMBITO: "+ambito+ " incorrecto para PAÍS: "+pais+"<br>";

            if(ambito == 'INTRACOMUNITARIO' && !niva)
                this.validado += "NIVA es campo obligatorio para ÁMBITO: "+ambito+"<br>";

            if((ambito == 'EXTRACOMUNITARIO') && !niva)
                this.validado += "NIVA es campo obligatorio para ÁMBITO: "+ambito+"<br>";
        },
        controlTipo(e, tipo, ambito, nif){
            if(!tipo)
                this.validado += "TIPO es campo obligatorio<br>";

            if(ambito == 'NACIONAL' && tipo == 'PERSONA FISICA'){
                let dniPatron1 = /^\d{8}[a-zA-Z]$/; //personas físicas
                let dniPatron2 = /[M|X-Z]^\d{7}[A-Z]$/; //extranjeros residentes
                let letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
                
                if(dniPatron1.test(nif)){ // pfisicas
                    let numero = parseInt(nif.substr(0, nif.length - 1)) % 23;
                    let letraTeorica = letras.substring(numero, numero +1);
                    let letra = nif.substr(nif.length - 1, 1);
                    
                    if(letra != letraTeorica)
                        this.validado += "Formato NIF para NACIONAL + PERSONA FÍSICA inválido<br>";
                }
                
                if(dniPatron2.test(nif)){ //residentes extranjeros
                    let letra1 = nif.substr(0,1);
                    let numero = nif.substr(1, nif.length-2);
                    let letraControl = (nif.length-1)
                    
                    switch(letra1){
                        case 'X':
                            numero = str.concat('0', numero);
                            break;
                        case 'Y':
                            numero = str.concat('1', numero);
                            break;
                        case 'Z':
                            numero = str.concat('2', numero);
                            break;
                        default:
                            break;
                    }
                    
                    numero = numero % 23;
                    letraTeorica = letras.substring(numero, numero +1);
                    letra = nif.substr(nif.length - 1, 1);
                    
                    if(letra != letraTeorica)
                        this.validado += "Formato NIF para NACIONAL + PERSONA FÍSICA (RESIDENTE EXTRANJERO) inválido<br>";
                }   
            }
        }
    } //end methods
}
</script>