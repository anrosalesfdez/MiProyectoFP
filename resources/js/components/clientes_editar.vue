<template>
<div class="row" id="clientes_editado">
    <notifications classes="my-style" position="top right"/>

    <div class="col-sm-12">
        
        <div class="card">
        <!--formulario editado cliente-->
        
        <form method="post" v-bind:action="'/clientes/update/'+editadocliente.id" @submit="validarForm($event)">
            
            <div class="card-header">
                <h3 style="display: inline">Actualizando cliente: {{ this.razonvieja}}<strong></strong></h3>
                <div style="display: inline; float: right;">
                    <button type="submit" class="crearButton" style="padding:9px 38px;">Actualizar</button>
                    <a href="/clientes/listar" class="cancelarButton">Cancelar</a>
                </div>
            </div>

            <div class="card-body espacios">
                    <!-- html no acepta el verbo patch, lo pasamos con campo hidden -->
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" v-model="csrf">

                    <div class="form-row">
                        <!-- <div class="form-group col-md-1">
                            <label for="id" class="col-form-label">ID cliente</label>      
                            <input type="text" class="form-control" readonly name="id" id="id" v-model="editadocliente.id">
                        </div> -->
                        <div class="form-group col-md-12">
                            <label for="razon_social" class="col-form-label">Razón social</label>      
                            <input type="text" class="form-control" name="razon_social" id="razon_social"
                                        v-model="editadocliente.razon_social"
                                        v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" readonly name="nif" id="nif" v-model="editadocliente.nif"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="niva" class="col-form-label">NIVA</label>      
                            <input type="text" class="form-control" v-if="editadocliente.pais!=='ESPAÑA'" readonly name="niva" id="niva" v-model="editadocliente.niva">
                            <input type="text" class="form-control" v-else name="niva" id="niva" v-model="editadocliente.niva">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección</label>      
                        <input type="text" class="form-control" name="direccion" id="direccion"
                                v-model="editadocliente.direccion" 
                                v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="provincia" class="col-form-label">Provincia</label>      
                            <input type="text" class="form-control" name="provincia" id="provincia" 
                                    v-model="editadocliente.provincia" 
                                    v-touppercase>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="pais" class="col-form-label">Pais</label>      
                            <input type="text" class="form-control" name="pais" id="pais" 
                                    v-model="editadocliente.pais" 
                                    v-touppercase>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp" class="col-form-label">Código Postal</label>      
                            <input type="text" class="form-control" name="cp" id="cp" 
                                    v-model="editadocliente.cp" 
                                    v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefono" class="col-form-label">Teléfono</label>      
                            <input type="tel" class="form-control" name="telefono" id="telefono" v-model="editadocliente.telefono"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">Email</label>      
                            <input type="email" class="form-control" name="email" id="email"  
                                    v-model="editadocliente.email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ambito" class="col-form-label">Ámbito cliente</label>
                            <select class="form-control" name="ambito" id="ambito" 
                                    v-model="editadocliente.ambito">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" name="tipo" id="tipo"
                                    v-model="editadocliente.tipo">
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
                                    v-model="editadocliente.forma_pago">
                                <option disabled selected value="">Elije método...</option>
                                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                <option value="PAY PAL">PAY PAL</option>
                                <option value="CONTADO">CONTADO</option>
                            </select>      
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dias_pago" class="col-form-label">Plazo para el pago</label>
                            <select class="form-control" name="dias_pago" id="dias_pago" 
                                    v-model="editadocliente.dias_pago">
                                <option disabled selected value="">Elige días...</option>
                                <option value="0">0</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                            </select>        
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="observaciones" class="col-form-label">observacionesaciones</label>
                        <textarea class="form-control" name="observaciones" id="observaciones" 
                                v-model="editadocliente.observaciones"></textarea>
                    </div>

                    <div class="modal-footer">
                        <!-- <button class="btn btn-primary" click="updateCliente">Actualizar</button> -->
                        <button type="submit" class="crearButton">Actualizar</button>
                        <a href="/clientes/listar" class="cancelarButton">Cancelar</a>
                    </div>
            </div>
        </form>
        </div>

    </div>

</div>
</template> 


<script>

export default{
    data(){ //datos del componente
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            validado: '' //mensajes errores
        }
    },
    props:[
        'editadocliente', //prop que envía clientes_editar.blade ---- YA SE PUEDE USAR COMO UN DATA
        'olds',
        'razonvieja',
        'errors'
    ],
    created() {
        //mostrar valores old si falla el envío en servidor
        if('razon_social' in this.olds) { this.editadocliente.razon_social = this.olds.razon_social; }
        if('nif' in this.olds) { this.editadocliente.nif = this.olds.nif; }
        if('niva' in this.olds) { this.editadocliente.niva = this.olds.niva; }
        if('direccion' in this.olds) { this.editadocliente.direccion = this.olds.direccion; }
        if('pais' in this.olds) { this.editadocliente.pais = this.olds.pais; }
        if('provincia' in this.olds) { this.editadocliente.provincia = this.olds.provincia; }
        if('cp' in this.olds) { this.editadocliente.cp = this.olds.cp; }
        if('telefono' in this.olds) { this.editadocliente.telefono = this.olds.telefono; }
        if('email' in this.olds) { this.editadocliente.email = this.olds.email; }
        if('ambito' in this.olds) { this.editadocliente.ambito = this.olds.ambito; }
        if('tipo' in this.olds) { this.editadocliente.tipo = this.olds.tipo; }
        if('forma_pago' in this.olds) { this.editadocliente.forma_pago = this.olds.forma_pago; }
        if('dias_pago' in this.olds) { this.editadocliente.dias_pago = this.olds.dias_pago; }
        if('observaciones' in this.olds) { this.editadocliente.observaciones = this.olds.observaciones; }

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
        //validaciones
        validarForm(e){
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            this.controlRazonSocial(e, this.editadocliente.razon_social);
            this.controlPais(e, this.editadocliente.pais);
            this.controlAmbito(e, this.editadocliente.ambito, this.editadocliente.niva, this.editadocliente.pais);
            this.controlTipo(e, this.editadocliente.tipo, this.editadocliente.ambito, this.editadocliente.nif);
            this.controlEmail(e, this.editadocliente.email);

            if(this.validado !== ''){
                this.$notification.error(this.validado, {  timer: 4, position:'topRigth' });
                e.preventDefault();
                return;
            }          
        },
        //VALIDA EN CLIENTE. Se ejecutan todas de golpe al click en crear/actualizar
        controlRazonSocial(e, razon_social){
            if(!razon_social)
                this.validado += "RAZÓN SOCIAL es campo obligatorio<br>";
            else if(razon_social.length > 50)
                this.validado += "RAZÓN SOCIAL máximo de caracteres: 50<br>";
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

            if(ambito == 'NACIONAL' && pais!=='ESPAÑA')
                this.validado += "ÁMBITO: "+ambito+ " incorrecto para PAÏS: "+pais+"<br>";
            
            if(ambito !== 'NACIONAL' && pais =='ESPAÑA')
                this.validado += "ÁMBITO: "+ambito+ " incorrecto para PAÏS: "+pais+"<br>";

            if(ambito == 'INTRACOMUNITARIO' && !niva)
                this.validado += "NIVA es campo obligatorio para ÁMBITO: "+ambito+"<br>";

            if((ambito == 'EXTRACOMUNITARIO') && !niva)
                this.validado += "NIVA es campo obligatorio para ÁMBITO: "+ambito+"<br>";
        },
        controlTipo(e, tipo, ambito, nif){
            if(!tipo)
                this.validado += "TIPO es campo obligatorio\n";

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
    }
}
</script>