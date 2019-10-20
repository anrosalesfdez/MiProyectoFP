<template>
<div class="row" id="clientes_editado">
<!-- <span>------ {{token}}-----</span> -->
<!-- <span>------ {{editadocliente}}-----</span> -->

    <div class="col-sm-12">
        
        <div class="card">
        <!--formulario editado cliente-->
        
        <form method="post" v-bind:action="'/clientes/update/'+editadocliente.id">
            
            <div class="card-header espacios">
                <h3 style="display: inline">Actualizando cliente: <strong>{{ this.editadocliente.razon_social }}</strong></h3>
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
                            <input type="text" class="form-control" @focusout="controlRazonSocial($event, editadocliente.razon_social)" name="razon_social" id="razon_social" v-model="editadocliente.razon_social" v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" readonly name="nif" id="nif" v-model="editadocliente.nif"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="niva" class="col-form-label">NIVA</label>      
                            <input type="text" class="form-control" readonly name="niva" id="niva" v-model="editadocliente.niva">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección</label>      
                        <input type="text" class="form-control" name="direccion" id="direccion" v-model="editadocliente.direccion" v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="provincia" class="col-form-label">Provincia</label>      
                            <input type="text" class="form-control" name="provincia" id="provincia" v-model="editadocliente.provincia" v-touppercase>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="pais" class="col-form-label">Pais</label>      
                            <input type="text" class="form-control" @focusout="controlPais($event, editadocliente.pais)" name="pais" id="pais" v-model="editadocliente.pais" v-touppercase>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp" class="col-form-label">Código Postal</label>      
                            <input type="text" class="form-control" name="cp" id="cp" v-model="editadocliente.cp" v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tlfn" class="col-form-label">Teléfono</label>      
                            <input type="tel" class="form-control" name="tlfn" id="tlfn" v-model="editadocliente.tlfn"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">Email</label>      
                            <input type="email" class="form-control" name="email" id="email"  @focusout="controlEmail($event, editadocliente.email)" v-model="editadocliente.email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ambito_cl" class="col-form-label">Ámbito cliente</label>
                            <select class="form-control" @focusout="controlAmbito($event, editadocliente.ambito_cl)" name="ambito_cl" id="ambito_cl"  v-model="editadocliente.ambito_cl">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_cl" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" @focusout="controlTipo($event, editadocliente.tipo_cl)" name="tipo_cl" id="tipo_cl" v-model="editadocliente.tipo_cl">
                                <option disabled selected value="">Tipo de cliente...</option>
                                <option value="PERSONA FISICA">PERSONA FISICA</option>
                                <option value="PERSONA JURIDICA">PERSONA JURIDICA</option>
                            </select>        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="forma_pago" class="col-form-label">Método de pago</label>
                            <select class="form-control" name="forma_pago" id="forma_pago" v-model="editadocliente.forma_pago">
                                <option disabled selected value="">Elije método...</option>
                                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                <option value="PAY PAL">PAY PAL</option>
                                <option value="CONTADO">CONTADO</option>
                            </select>      
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dias_pago" class="col-form-label">Plazo para el pago</label>
                            <select class="form-control" name="dias_pago" id="dias_pago" v-model="editadocliente.dias_pago">
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
                        <textarea class="form-control" name="observ" id="observ"></textarea>
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
            errores:[], //array para recoger errores en validación
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    props:[
        'editadocliente' //prop que envía clientes_editar.blade ---- YA SE PUEDE USAR COMO UN DATA
    ],
    created() {
        console.log(this.editadocliente);
    },
    methods:{
        updateCliente(){ //conecta con bd y actualiza cleinte seleccionado
             if(this.editadocliente.razon_social == '' && this.editadocliente.pais == '' && this.editadocliente.ambito_cl == '' && this.editadocliente.tipo_cl == ''){
                    
                    this.$notification.error("Faltan campos obligatorios", {  timer: 2, position:'topRigth' });
                    console.log('Faltan campos obligatorios');
                    return false;
            }
            
        },
        controlRazonSocial(e, razon_social){
            
            if(!razon_social){
                console.log(razon_social+'Campo razón social es obligatorio');
                $('#razon_social').focus();
                this.$notification.error("Campo razón social es obligatorio", {  timer: 2, position:'topRigth' });
                return false;
            }else 
            if (razon_social.length == 0 || razon_social.length > 50){
                console.log(razon_social+'Campo razón social máximo de caracteres: 50');
                this.$notification.error("Campo razón social máximo de caracteres: 50", {  timer: 2, position:'topRigth' });
                return false;
            }else{
                console.log('razon social ok: '+razon_social);
                return true;
            }
        },
        controlEmail(e, email) {
            
            if(this.editadocliente.email){
               let emailPatron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
;

                if(!emailPatron.test(email)){
                    console.log(email+'email formato invalido');
                    $('#email').focus();
                    this.$notification.error("Formato email inválido", {  timer: 2, position:'topRigth' });
                    return false;

                }else{
                    console.log(email+'email oK');
                    return true;
                }
            }
        },
        controlPais(e, pais){
            
            if(!pais){
                console.log(pais+' pais es obligatorio');
                $('#pais').focus();
                this.$notification.error("Campo pais obligatorio", {  timer: 2, position:'topRigth' });
                return false;
            }
            else{
                console.log('pais ok: '+pais)
                return true;
            }
        },
        controlAmbito(e, ambito_cl){
            
            if(!ambito_cl){
                console.log(ambito_cl+' ambito_cl es obligatorio')
                $('#ambito_cl').focus();
                this.$notification.error("Campo ámbito obligatorio", {  timer: 2, position:'topRigth' });
                return false;
            }
            else{
                console.log('ambito_cl ok: '+ambito_cl)
                return true;
            }
        },
        controlTipo(e, tipo_cl){
            
            if(!tipo_cl){
                console.log(tipo_cl+' tipo_cl es obligatorio');
                $('#tipo_cl').focus();
                this.$notification.error("Campo tipo cliente obligatorio", {  timer: 2, position:'topRigth' });
                return false;
            }
            else{
                console.log('tipo_cl ok: '+tipo_cl)
                return true;
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