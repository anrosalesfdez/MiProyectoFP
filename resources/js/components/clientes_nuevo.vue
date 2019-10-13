<template>
<div class="row" id="clientes_nuevo">
    <div class="col-sm-12">
        <h3>Mantenimiento de Clientes</h3>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 style="display: inline; float: left">Alta nuevo cliente</h4>
                <button @click="info" class="btn btn-default" title="reglas para crear cliente">
                    <i class="mdi mdi-information-outline" aria-hidden="true"></i>  
                    <!-- https://materialdesignicons.com/cdn/2.0.46/                -->
                </button>
                <div style="display: inline; float: right">
                    <button type="submit" class="btn btn-primary" @click.prevent="storeCliente">Guardar</button>
                    <a href="/clientes/clientes" class="btn btn-danger">Cancelar</a>
                </div>
                
            </div>
            <div class="card-body">
                <!--formulario nuevo cliente-->
                <form>
                    <div class="form-group">
                        <label for="razon_social" class="col-form-label">Razón social</label>      
                        <input type="text" class="form-control" name="razon_social" id="razon_social" ref="focus" required v-model="nuevoCliente.razon_social" v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" name="nif" id="nif" required placeholder="Ejemplo: 12345678N" v-model="nuevoCliente.nif" v-touppercase>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="niva" class="col-form-label">NIVA</label>      
                            <input type="text" class="form-control" name="niva" id="niva" v-model="nuevoCliente.niva" v-touppercase>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección fiscal</label>      
                        <input type="text" class="form-control" name="direccion" id="direccion" v-model="nuevoCliente.direccion" v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="pais" class="col-form-label">Pais</label>      
                            <input type="text" class="form-control" name="pais" id="pais" required v-model="nuevoCliente.pais" v-touppercase>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="provincia" class="col-form-label">Provincia</label>      
                            <input type="text" class="form-control" name="provincia" id="provincia" v-model="nuevoCliente.provincia" v-touppercase>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp" class="col-form-label">Código Postal</label>      
                            <input type="text" class="form-control" name="cp" id="cp" v-model="nuevoCliente.cp" v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tlfn" class="col-form-label">Teléfono</label>      
                            <input type="tel" class="form-control" name="tlfn" id="tlfn" v-model="nuevoCliente.tlfn" placeholder="+xx-xxx xx xx xx">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">Email</label>      
                            <input type="email" class="form-control" name="email" id="email" v-model="nuevoCliente.email" v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ambito_cl" class="col-form-label">Ámbito cliente</label>
                            <select class="form-control" name="ambito_cl" id="ambito_cl" required v-model="nuevoCliente.ambito_cl">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_cl" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" name="tipo_cl" id="tipo_cl" required v-model="nuevoCliente.tipo_cl">
                                <option disabled selected value="">Tipo de cliente...</option>
                                <option value="PERSONA FISICA">PERSONA FISICA</option>
                                <option value="PERSONA JURIDICA">PERSONA JURIDICA</option>
                            </select>        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="forma_pago" class="col-form-label">Método de pago</label>
                            <select class="form-control" name="forma_pago" id="forma_pago" v-model="nuevoCliente.forma_pago">
                                <option disabled selected value="">Elije método...</option>
                                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                <option value="PAY PAL">PAY PAL</option>
                                <option value="CONTADO">CONTADO</option>
                            </select>      
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dias_pago" class="col-form-label">Plazo para el pago</label>
                            <select class="form-control" name="dias_pago" id="dias_pago" v-model="nuevoCliente.dias_pago">
                                <option disabled selected value="">Elige días...</option>
                                <option value="0">0</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                            </select>        
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="observ" class="col-form-label">Observaciones</label>
                        <textarea class="form-control" name="observ" id="observ" v-model="nuevoCliente.observ"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" @click.prevent="storeCliente">Guardar</button>
                        <a href="/clientes/clientes" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</template> 


<script>

export default{
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
                tlfn: '',
                email: '',
                ambito_cl: '',
                tipo_cl: '',
                forma_pago: '',
                dias_pago: '',
                observ: ''
            },
            validado: false
        }
    },
    created() {
        console.log(this.nuevoCliente == null ? 'created nuevoCliente: true' : 'created nuevoCliente: false');
        console.log('created validado: '+this.validado);
        this.info();
    },
    methods:{
        validarForm(){
            if(this.nuevoCliente.razon_social == '' && this.nuevoCliente.nif == '' && this.nuevoCliente.niva == '' && this.nuevoCliente.direccion == '' && 
                this.nuevoCliente.provincia == '' && this.nuevoCliente.pais == '' && this.nuevoCliente.cp == '' && this.nuevoCliente.tlfn == '' && 
                this.nuevoCliente.email == '' && this.nuevoCliente.ambito_cl == '' && this.nuevoCliente.tipo_cl == '' && this.nuevoCliente.forma_pago == '' && 
                this.nuevoCliente.dias_pago == '' && this.nuevoCliente.observ == ''){
                    
                    this.$notification.error("Debes rellenar los campos", {  timer: 10, position:'topRigth' });
                    this.$refs.focus.focus();
                    console.log('todo blanco. form no validado');

            }else{
                if(this.controlRazonSocial(this.nuevoCliente.razon_social) && this.controlNif(this.nuevoCliente.nif) && this.controlNiva(this.nuevoCliente.niva) && this.controlPais(this.nuevoCliente.pais)
                    && this.controlAmbito(this.nuevoCliente.ambito_cl) && this.controlTipo(this.nuevoCliente.tipo_cl)){
                    TODO://INCLUIR MÁS CONTROLES...
                    this.validado = true;
                    console.log('validarForm: '+this.validado);
                }
            }
        },
        storeCliente(){
            //Validaciones del form en cliente
            this.validarForm();
            //si validado
            if(this.validado == true){
                var url='/clientes/clientes_nuevo';
                console.log(this.nuevoCliente);
                axios.post(url, this.nuevoCliente)
                .then(response => {   
                    console.log(response.data);
                    this.nuevoCliente = response.data;
                    this.$notification.success("Cliente guardado correctamente!", {  timer: 10, position:'topRigth' }); //FIXME: incluir id creado
                    history.back(); //location.href()
                })
                .catch(error => {
                    console.log(error);
                });
            }
            
        },
        controlTipo(tipo_cl){
            if(!tipo_cl){
                console.log('tipo_cl es obligatorio');
                $('#tipo_cl').focus();
                this.$notification.error("Campo tipo cliente obligatorio", {  timer: 10, position:'topRigth' });
                return false;
            }
            else{
                console.log('tipo_cl ok: '+pais)
                return true;
            }
        },
        controlAmbito(ambito_cl){
            if(!ambito_cl){
                console.log('ambito_cl es obligatorio')
                $('#ambito_cl').focus();
                this.$notification.error("Campo ámbito obligatorio", {  timer: 10, position:'topRigth' });
                return false;
            }
            else{
                console.log('ambito_cl ok: '+pais)
                return true;
            }
        },
        controlPais: function(pais){
            if(!pais){
                console.log('pais es obligatorio');
                $('#pais').focus();
                this.$notification.error("Campo pais obligatorio", {  timer: 10, position:'topRigth' });
                return false;
            }
            else{
                console.log('pais ok: '+pais)
                return true;
            }
        },
        controlTlfn: function (tlfn){
            if(tlfn){
                let patronTlfn = /^\+?([0-9]{2})\)?[-]?([0-9]{3})[ ]?([0-9]{2})[ ]?([0-9]{2})[ ]?([0-9]{2})$/;
                
                if(!patronTlfn.test(tlfn)){
                    console.log('tlfn mal: '+tlfn);
                    $('#tlfn').focus();
                    this.$notification.error("Campo telefono incorrecto", {  timer: 10, position:'topRigth' });
                    return false;

                }else{
                    console.log('tlfn ok: '+tlfn);
                    return true;
                }
            }
        },
        controlEmail: function (email) {
            
            if(this.nuevoCliente.email){
               let emailPatron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if(!emailPatron.test(email)){
                    console.log('email formato invalido');
                    $('#email').focus();
                    this.$notification.error("Formato email inválido", {  timer: 10, position:'topRigth' });
                    return false;

                }else{
                    console.log('email oK: '+ email);
                    return true;
                }
            }
        },
        controlNiva: function(niva){
            // console.log(this.nuevoCliente.niva);
            // console.log(this.nuevoCliente.niva.substr(2, (this.nuevoCliente.niva.length- 2)));
            // console.log(this.nuevoCliente.nif);
            if(!this.nuevoCliente.niva){
                console.log('niva necesario...');
                $('#niva').focus();
                this.$notification.error("NIVA es campo obligatorio", {  timer: 10, position:'topRigth' });
                return false;

            }else if(this.nuevoCliente.niva.substr(2, (this.nuevoCliente.niva.length- 2)).toString() !== this.nuevoCliente.nif.toString()){
                console.log('niva no valido... '+niva+' '+nif);
                $('#niva').focus();
                this.$notification.error("Formato NIVA inválido", {  timer: 10, position:'topRigth' });
                return false;
            }else{
                console.log('niva validado... '+niva);
                return true;
            }
            
        },
        controlNif: function(dni) {
            /**
            * patrones de NIF
            * persona fisica nacional: 99999999X => 8 dígitos + letra control
            * persona fisica no residente sin DNI: L9999999X => L+ siete dígitos+ letra control
            * persona fisica residente < 14 años sin DNI: K9999999X => K+ siete dígitos + letra control	
            * personas residentes extranjeros con NIE: X ó Y ó Z9999999X => X ó Y ó Z+ siete dígitos+ letra control
            * personas residentes extranjeros sin NIE: M9999999L => M + siete dígitos+ letra control
            * personas jurídicas: OPPNNNNNC => O: Tipo de Organización; P: Código provincia; N: Número correlativo por provincia; C: Dígito o letra de control
            *   A = sociedad anónima
            *   B = sociedad responsabilidad limitada
            *   C = sociedad colectiva
            *   D = sociedad comanditaria
            *   E = comunidad de bienes
            *   F = sociedad cooperativa
            *   G = Asociaciones y otros tipos no definidos
            *   H = Comunidad de propietarios en régimen de propiedad horizontal
            *   K,L,M = formato antiguo
            *   N = entidades no residentes
            *   P = corporacion local
            *   Q = Organismo autónomo estatal o no, y asimilados, congregaciones e instituciones religiosas
            *   S = Organos de la Administración del Estado y Comunidades Autónomas	
            *   es letra control si la clave de la  organización es K, P, Q ó S
            *   es número de control si la clave de la organización es A, B, E ó H
            *   para el resto de claves indentificativas del tipo de organización podrá ser tanto número como letra.
            */

            let dniPatron1 = /^\d{8}[a-zA-Z]$/; //personas físicas
            let dniPatron2 = /[M|X-Z]^\d{7}[A-Z]$/; //extranjeros residentes
            let dniPatron3 = /[A-V]^\d{7}[a-zA-Z]$/; //personas jurídicas
            let letras = 'TRWAGMYFPDXBNJZSQVHLCKET';

            if(!dni){
                console.log('nif es campo oblig');
                $('#nif').focus();
                this.$notification.error("Campo NIF es obligatorio", {  timer: 10, position:'topRigth' });
                return false;

            }else if(dniPatron1.test(dni)){ // pfisicas
                let numero = parseInt(dni.substr(0, dni.length - 1)) % 23;
                console.log(numero);
                let letraTeorica = letras.substring(numero, numero +1);
                console.log(letraTeorica);
                let letra = dni.substr(dni.length - 1, 1);
                console.log(letra);
                // if(letra != letraTeorica){
                //     console.log("Formato NIF persona física inválido");
                //     this.$notification.error("Formato NIF persona física inválido", {  timer: 10, position:'topRigth' });
                //     return false;
                // }
                //53117466R 53183401H
                console.log('nif persona fisica ok');
                return true;

            }else if(dniPatron2.test(dni)){ //residentes extranjeros
                let letra1 = dni.substr(0,1);
                let numero = dni.substr(1, dni.length-2);
                let letraControl = (dni.length-1)
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
                letra = dni.substr(dni.length - 1, 1);
                if(letra != letraTeorica){
                    console.log("Formato NIF residente extranjero inválido");
                    $('#nif').focus();
                    this.$notification.error("Formato NIF residente extranjero inválido", {  timer: 10, position:'topRigth' });
                    return false;
                }
                console.log('nif persona residente extranjero ok');
                return true;
            }else{
                console.log('no errores en nif, pero no se puede validar: '+dni);
                this.$notification.warning("Imposible validar NIF. Compruebe en AEAT", {  timer: 10, position:'topRigth' }); //FIXME: meter link a la web de aeat¿?
                return true;
            }
        },
        controlRazonSocial: function(razon_social){
            if(!razon_social){
                console.log('Campo razón social es obligatorio');
                $('#razon_social').focus();
                this.$notification.error("Campo razón social es obligatorio", {  timer: 10, position:'topRigth' });
                return false;
            }else if (razon_social.length == 0 || razon_social.length > 50){
                console.log('Campo razón social máximo de caracteres: 50');
                this.$notification.error("Campo razón social máximo de caracteres: 50", {  timer: 10, position:'topRigth' });
                return false;
            }else{
                console.log('razon social ok: '+razon_social);
                return true;
            }
        },
        info: function () {
            console.log('info');
            let infoCrear = "Debes tener en cuenta que estos datos deben ser fiables!"
            alert(infoCrear);
        }
    } //end methods
}
</script>

<style>
/* Popup container - can be anything you want */
.popup {
  visibility: hidden;
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>