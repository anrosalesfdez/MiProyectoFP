<template>
<div class="row" id="clientes_nuevo">
    <div class="col-sm-12">
        <h1>Mantenimiento de Clientes</h1>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h2 style="display: inline; float: left">Alta nuevo cliente</h2>
                <button @click="info" class="btn btn-default">
                    <i class="mdi mdi-information-outline" aria-hidden="true"></i>                 
                </button>
                <div class="popuptext popup" id="myPopup">
                    <ul>Consideraciones
                        <li>El campo NIF debe ser validado en la web de AEAT</li>
                        <li>Una vez creado un cliente nuevo, el campo NIF no podrá ser modificado</li>
                        <li>Blablabla</li>
                    </ul>
                    A Simple Popup!</span>
                </div>

                <div style="display: inline; float: right">
                    <button type="submit" class="btn btn-primary" @click.prevent="storeCliente">Guardar</button>
                    <a href="clientes" class="btn btn-danger">Cancelar</a>
                </div>
                
            </div>
            <div class="card-body">
                <!--formulario nuevo cliente-->
                <form>
                    <div class="form-group">
                        <label for="razon_social" class="col-form-label">Razón social</label>      
                        <input type="text" class="form-control" name="razon_social" id="razon_social" required v-model="nuevoCliente.razon_social" v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" nif="cliente" id="nif" required placeholder="Ejemplo: 12345678N" v-model="nuevoCliente.nif" v-touppercase>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="niva" class="col-form-label">NIVA</label>      
                            <input type="text" class="form-control" name="niva" id="niva" required v-model="nuevoCliente.niva" v-touppercase>
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
                            <input type="tel" class="form-control" name="tlfn" id="tlfn" v-model="nuevoCliente.tlfn">
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

                    <!-- <p v-for="error in errores" v-bind:key="error" class="text-danger">{{ error }}</p> -->
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" @click.prevent="storeCliente">Guardar</button>
                        <a href="clientes" class="btn btn-danger">Cancelar</a>
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
    methods:{
        storeCliente(){
            //Validaciones del form en cliente
            console.log(this.checkForm());
            if(this.checkForm()){
                var url='clientesData';
                // console.log(this.nuevoCliente);
                axios.post(url, this.nuevoCliente)
                    .then(response => {   
                        console.log(this.nuevoCliente);
                        history.back(); //location.href()
                    });
                this.$notification.success("Cliente guardado correctamente!", {  timer: 10, position:'topRigth' });
            }
        },
        checkForm: function () {
            if(this.controlRazonSocial(this.nuevoCliente.razon_social) &&
               this.controlNif(this.nuevoCliente.nif) &&
               this.controlEmail(this.nuevoCliente.email)){
                
                // this.validado = true;
                return true;
            }
        },
        controlEmail: function (email) {
            let emailPatron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            
            if(!email){
                this.$notification.error("Campo email es obligatorio", {  timer: 10, position:'topRigth' });
                return false;

            }else if(!emailPatron.test(email)){
                this.$notification.error("Formato email inválido", {  timer: 10, position:'topRigth' });
                return false;
            }else{
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
                this.$notification.error("Campo NIF es obligatorio", {  timer: 10, position:'topRigth' });
                return false;

            }else if(dniPatron1.test(dni)){ // pfisicas
                let numero = parseInt(dni.substr(0, dni.length - 1)) % 23;
                let letraTeorica = letras.substring(numero, numero +1);
                let letra = dni.substr(dni.length - 1, 1);
                if(letra != letraTeorica){
                    this.$notification.error("Formato NIF persona física inválido", {  timer: 10, position:'topRigth' });
                    return false;
                }
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
                    this.$notification.error("Formato NIF residente extranjero inválido", {  timer: 10, position:'topRigth' });
                    return false;
                }
            }else{
                this.$notification.warning("Imposible validar. Compruebe en AEAT", {  timer: 10, position:'topRigth' }); //FIXME: meter link a la web de aeat¿?
                return true;
            }
        },
        controlRazonSocial: function(razon_social){
            if(!razon_social){
                this.$notification.error("Campo razón social es obligatorio", {  timer: 10, position:'topRigth' });
                return false;
            }else if (razon_social.length == 0 || razon_social.length > 50){
                this.$notification.error("Campo razón social máximo de caracteres: 50", {  timer: 10, position:'topRigth' });
                return false;
            }else{
                return true;
            }
            console.log('dentro');
        },
        info: function () {
            console.log('info');
            $('#myPopup').toggleClass("show");
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