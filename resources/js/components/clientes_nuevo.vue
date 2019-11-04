<template>
<div class="row" id="clientes_nuevo">

    <div class="col-sm-12">
        <div class="card">

            <form method="post" action="/clientes/store" @submit="validarForm($event)">

                <div class="card-header espacios">
                    <h3 style="display: inline">Alta nuevo cliente</h3>
                    <div style="display: inline; float: right">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="/clientes/listar" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>

                <div class="card-body espacios">

                    <input type="hidden" name="_token" v-model="csrf">
                    
                    <div class="form-group">
                        <label for="razon_social" class="col-form-label">Razón social</label>      
                        <input type="text" class="form-control" name="razon_social" id="razon_social" 
                                @focusout="controlRazonSocial($event, nuevoCliente.razon_social)"
                                v-model="nuevoCliente.razon_social"
                                v-touppercase>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" name="nif" id="nif" 
                                    @focusout="controlNif($event, nuevoCliente.nif)" 
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
                                @focusout="controlPais($event, nuevoCliente.pais)"
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
                            <label for="tlfn" class="col-form-label">Teléfono</label>      
                            <input type="tel" class="form-control" name="tlfn" id="tlfn"
                                    v-model="nuevoCliente.tlfn">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">Email</label>      
                            <input type="email" class="form-control" name="email" id="email"
                                    @focusout="controlEmail($event, nuevoCliente.email)"
                                    v-model="nuevoCliente.email"
                                    v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ambito_cl" class="col-form-label">Ámbito cliente</label>
                            <select class="form-control" name="ambito_cl" id="ambito_cl"
                                    @blur="controlAmbito($event, nuevoCliente.ambito_cl, nuevoCliente.niva, nuevoCliente.pais)"
                                    v-model="nuevoCliente.ambito_cl">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_cl" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" name="tipo_cl" id="tipo_cl"
                                    @blur="controlTipo($event, nuevoCliente.tipo_cl, nuevoCliente.ambito_cl, nuevoCliente.nif)"
                                    v-model="nuevoCliente.tipo_cl">
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
                        <label for="observ" class="col-form-label">Observaciones</label>
                        <textarea class="form-control" name="observ" id="observ"
                                v-model="nuevoCliente.observ"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="/clientes/listar" class="btn btn-danger">Cancelar</a>
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
                tlfn: '',
                email: '',
                ambito_cl: '',
                tipo_cl: '',
                forma_pago: '',
                dias_pago: '',
                observ: ''
            },
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            enviado: false,
            errorcitos: []
        }
    },
    props:[
        'olds',
        'errors'
    ],
    created(){
        // console.log(this.errors);
        // console.log(this.enviado);
        //mostrar valores old si falla el envío en servidor
        if('razon_social' in this.olds) { this.nuevoCliente.razon_social = this.olds.razon_social; }
        if('nif' in this.olds) { this.nuevoCliente.nif = this.olds.nif; }
        if('niva' in this.olds) { this.nuevoCliente.niva = this.olds.niva; }
        if('direccion' in this.olds) { this.nuevoCliente.direccion = this.olds.direccion; }
        if('pais' in this.olds) { this.nuevoCliente.pais = this.olds.pais; }
        if('provincia' in this.olds) { this.nuevoCliente.provincia = this.olds.provincia; }
        if('cp' in this.olds) { this.nuevoCliente.cp = this.olds.cp; }
        if('tlfn' in this.olds) { this.nuevoCliente.tlfn = this.olds.tlfn; }
        if('email' in this.olds) { this.nuevoCliente.email = this.olds.email; }
        if('ambito_cl' in this.olds) { this.nuevoCliente.ambito_cl = this.olds.ambito_cl; }
        if('tipo_cl' in this.olds) { this.nuevoCliente.tipo_cl = this.olds.tipo_cl; }
        if('forma_pago' in this.olds) { this.nuevoCliente.forma_pago = this.olds.forma_pago; }
        if('dias_pago' in this.olds) { this.nuevoCliente.dias_pago = this.olds.dias_pago; }
        if('observ' in this.olds) { this.nuevoCliente.observ = this.olds.observ; }
        //mostrar errores del servidor si el form ya fue enviado
        if(this.enviado){
            this.errors.forEach(element => {
                this.$notification.error(element, {  timer: 2, position:'topRigth' });
            });
        }
        
    },
    methods:{
        //validaciones
        validarForm(e){
            if(this.nuevoCliente.ambito_cl !== 'NACIONAL'){
                console.log('aquí en validar no nacional '+this.nuevoCliente.ambito_cl);
                if(this.nuevoCliente.razon_social=='' ||  this.nuevoCliente.dni=='' ||  this.nuevoCliente.pais=='' ||  this.nuevoCliente.niva=='' ||  
                this.nuevoCliente.ambito_cl=='' || this.nuevoCliente.tipo_cl==''){
                    console.log('algo es false ');
                    this.$notification.error("Faltan campos obligatorios", {  timer: 2, position:'topRigth' });
                    e.preventDefault();
                }else{
                    this.enviado = true;
                }
            }
            else{
                if(this.nuevoCliente.razon_social=='' ||  this.nuevoCliente.dni=='' ||  this.nuevoCliente.pais=='' || this.nuevoCliente.ambito_cl==''
                || this.nuevoCliente.tipo_cl==''){
                    this.$notification.error("Faltan campos obligatorios", {  timer: 2, position:'topRigth' });
                    e.preventDefault();
                }else{
                    this.enviado = true;
                }
            }
        },
        controlRazonSocial(e, razon_social){
            if(!razon_social){
                $('#razon_social').focus();
                this.$notification.error("Campo razón social es obligatorio", {  timer: 2, position:'topRigth' });
                    e.preventDefault();
                return false;
            }else if (razon_social.length == 0 || razon_social.length > 50){
                this.$notification.error("Campo razón social máximo de caracteres: 50", {  timer: 2, position:'topRigth' });
                return false;
            }else{
                return true;
            }
        },
        controlNif(e, dni) {
            console.log('nifjijiji: '+dni)
            if(!dni){
                $('#nif').focus();
                this.$notification.error("Campo NIF es obligatorio", { timer: 2, position:'topRigth'});
                return false;
            }/*else if(dni){p`'
                
                return false
            }*/
            else{
                this.$notification.warning("Asegure el dato en AEAT", {  timer: 2, position:'topRigth' }); //TODO: meter link a la web de aeat¿?
                return true;
            }
        },
        controlEmail(e, email) {
            if(this.nuevoCliente.email){
               let emailPatron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
;
                if(!emailPatron.test(email)){
                    $('#email').focus();
                    this.$notification.error("Formato email inválido", {  timer: 2, position:'topRigth' });
                    return false;
                }else{
                    return true;
                }
            }
        },
        controlPais(e, pais){
            if(!pais){
                $('#pais').focus();
                this.$notification.error("Campo pais obligatorio", {  timer: 2, position:'topRigth' });
                return false;
            }
            else{
                console.log('pais ok: '+pais)
                return true;
            }
        },
        controlAmbito(e, ambito_cl, niva, pais){
            if(!ambito_cl){
                $('#ambito_cl').focus();
                this.$notification.error("Campo ámbito obligatorio", {  timer: 2, position:'topRigth' });
                return false;
            
            }else if(ambito_cl == 'NACIONAL' && pais!=='ESPAÑA'){
                $('#pais').focus();
                this.$notification.error("Revise campo PAIS", {  timer: 2, position:'topRigth' });
                return false;
            
            }else if(ambito_cl !== 'NACIONAL' && pais =='ESPAÑA'){
                $('#pais').focus();
                this.$notification.error("Revise campo PAIS", {  timer: 2, position:'topRigth' });
                return false;
            
            }else if(ambito_cl == 'INTRACOMUNITARIO' && !niva){
                $('#niva').focus();
                this.$notification.error("NIVA es campo obligatorio", {  timer: 2, position:'topRigth' });
                return false;

            }else if((ambito_cl == 'EXTRACOMUNITARIO') && !niva){
                $('#niva').focus();
                this.$notification.error("NIVA es campo obligatorio", {  timer: 2, position:'topRigth' });
                return false;

            }else{
                return true;
            }
        },
        controlTipo(e, tipo_cl, ambito_cl, nif){
            if(!tipo_cl){
                $('#tipo_cl').focus();
                this.$notification.error("Campo tipo cliente obligatorio", {  timer: 2, position:'topRigth' });
                return false;

            }else if(ambito_cl == 'NACIONAL' && tipo_cl == 'PERSONA FISICA'){
                var dniPatron1 = /^\d{8}[a-zA-Z]$/; //personas físicas
                var dniPatron2 = /[M|X-Z]^\d{7}[A-Z]$/; //extranjeros residentes
                var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
                if(dniPatron1.test(nif)){ // pfisicas
                    let numero = parseInt(nif.substr(0, nif.length - 1)) % 23;
                    let letraTeorica = letras.substring(numero, numero +1);
                    let letra = nif.substr(nif.length - 1, 1);
                    
                    if(letra != letraTeorica){
                        $('#nif').focus();
                        this.$notification.error("Formato NIF para NACIONAL + PERSONA FÍSICA inválido", {  timer: 10, position:'topRigth' });
                        return false;
                    
                    }else{
                        return true;
                    }

                }else if(dniPatron2.test(nif)){ //residentes extranjeros
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
                    
                    if(letra != letraTeorica){
                        $('#nif').focus();
                        this.$notification.error("Formato NIF para NACIONAL + PERSONA FÍSICA (RESIDENTE EXTRANJERO) inválido");
                        return false;
                    
                    }else{
                        return true;
                    }
                
                }//fin extranjeros residentes
                else{
                    $('#nif').focus();
                    this.$notification.error("Formato NIF para NACIONAL + PERSONA FÍSICA inválido");
                    return false;
                }
            }
        }
    } //end methods
}
</script>

<style>
/* mio */
.espacios {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>