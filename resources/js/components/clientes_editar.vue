<template>
<div class="row" id="clientes_editado">
<!-- <span>------ {{token}}-----</span> -->
<!-- <span>------ {{editadocliente}}-----</span> -->

    <div class="col-sm-12">
        
        <div class="card">
        <!--formulario editado cliente-->
        
        <form method="post" v-bind:action="'/clientes/update/'+editadocliente.id" @submit="validarForm($event)">
            
            <div class="card-header">
                <h3 style="display: inline" v-html="this.razonvieja">Actualizando cliente: <strong></strong></h3>
                <div style="display: inline; float: right">
                    <!-- <button class="btn btn-primary" @click="updateCliente">Actualizar</button> -->
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="/clientes/listar" class="btn btn-danger pull-right">Cancelar</a>
                </div>
            </div>

            <div class="card-body espacios">
                    <!-- html no acepta el verbo patch, lo pasamos con campo hidden -->
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" v-model="csrf">

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="id" class="col-form-label">ID cliente</label>      
                            <input type="text" class="form-control" readonly name="id" id="id" v-model="editadocliente.id">
                        </div>
                        <div class="form-group col-md-11">
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
                            <label for="tlfn" class="col-form-label">Teléfono</label>      
                            <input type="tel" class="form-control" name="tlfn" id="tlfn" v-model="editadocliente.tlfn"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">Email</label>      
                            <input type="email" class="form-control" name="email" id="email"  
                                    v-model="editadocliente.email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ambito_cl" class="col-form-label">Ámbito cliente</label>
                            <select class="form-control" name="ambito_cl" id="ambito_cl" 
                                    v-model="editadocliente.ambito_cl">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_cl" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" name="tipo_cl" id="tipo_cl"
                                    v-model="editadocliente.tipo_cl">
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
                        <label for="observ" class="col-form-label">Observaciones</label>
                        <textarea class="form-control" name="observ" id="observ" 
                                v-model="editadocliente.observ"></textarea>
                    </div>

                    <div class="modal-footer">
                        <!-- <button class="btn btn-primary" click="updateCliente">Actualizar</button> -->
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="/clientes/listar" class="btn btn-danger">Cancelar</a>
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
        if('tlfn' in this.olds) { this.editadocliente.tlfn = this.olds.tlfn; }
        if('email' in this.olds) { this.editadocliente.email = this.olds.email; }
        if('ambito_cl' in this.olds) { this.editadocliente.ambito_cl = this.olds.ambito_cl; }
        if('tipo_cl' in this.olds) { this.editadocliente.tipo_cl = this.olds.tipo_cl; }
        if('forma_pago' in this.olds) { this.editadocliente.forma_pago = this.olds.forma_pago; }
        if('dias_pago' in this.olds) { this.editadocliente.dias_pago = this.olds.dias_pago; }
        if('observ' in this.olds) { this.editadocliente.observ = this.olds.observ; }

        //si form validado en cliente pero falla en servidor.
        console.log('enviado true, devuelve errors: '+this.errors);
        if(this.errors.length !== 0){
            this.validado = '';
            for(let i=0; i < this.errors.length; i++){
                this.validado += this.errors[i];
            }
            
            this.$notification.error(this.validado, {  timer: 2, position:'topRigth' });
        }
    },
    methods:{
        //validaciones
        validarForm(e){
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            this.controlRazonSocial(e, this.editadocliente.razon_social);
            this.controlPais(e, this.editadocliente.pais);
            this.controlAmbito(e, this.editadocliente.ambito_cl, this.editadocliente.niva, this.editadocliente.pais);
            this.controlTipo(e, this.editadocliente.tipo_cl, this.editadocliente.ambito_cl, this.editadocliente.nif);
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
                this.validado += "RAZÓN SOCIAL es campo obligatorio\n";
            else if(razon_social.length > 50)
                this.validado += "RAZÓN SOCIAL máximo de caracteres: 50\n";
        },
        controlEmail(e, email) {
            if(email){
               let emailPatron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(!emailPatron.test(email))
                    this.validado += "Formato email inválido\n";
            }
        },
        controlPais(e, pais){
            if(!pais)
                this.validado += "Campo pais obligatorio\n";
        },
        controlAmbito(e, ambito_cl, niva, pais){
            if(!ambito_cl)
                this.validado += "ÁMBITO es campo obligatorio\n";

            if(ambito_cl == 'NACIONAL' && pais!=='ESPAÑA')
                this.validado += "ÁMBITO: "+ambito_cl+ " incorrecto para PAÏS: "+pais+"\n";
            
            if(ambito_cl !== 'NACIONAL' && pais =='ESPAÑA')
                this.validado += "ÁMBITO: "+ambito_cl+ " incorrecto para PAÏS: "+pais+"\n";

            if(ambito_cl == 'INTRACOMUNITARIO' && !niva)
                this.validado += "NIVA es campo obligatorio para ÁMBITO: "+ambito_cl+"\n";

            if((ambito_cl == 'EXTRACOMUNITARIO') && !niva)
                this.validado += "NIVA es campo obligatorio para ÁMBITO: "+ambito_cl+"\n";
        },
        controlTipo(e, tipo_cl, ambito_cl, nif){
            if(!tipo_cl)
                this.validado += "TIPO es campo obligatorio\n";

            if(ambito_cl == 'NACIONAL' && tipo_cl == 'PERSONA FISICA'){
                let dniPatron1 = /^\d{8}[a-zA-Z]$/; //personas físicas
                let dniPatron2 = /[M|X-Z]^\d{7}[A-Z]$/; //extranjeros residentes
                let letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
                
                if(dniPatron1.test(nif)){ // pfisicas
                    let numero = parseInt(nif.substr(0, nif.length - 1)) % 23;
                    let letraTeorica = letras.substring(numero, numero +1);
                    let letra = nif.substr(nif.length - 1, 1);
                    
                    if(letra != letraTeorica)
                        this.validado += "Formato NIF para NACIONAL + PERSONA FÍSICA inválido\n";
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
                        this.validado += "Formato NIF para NACIONAL + PERSONA FÍSICA (RESIDENTE EXTRANJERO) inválido\n";
                }   
            }
        }
    }
}
</script>

<style>
/* mio */
.espacios{
    margin-top: 10px;
}
</style>