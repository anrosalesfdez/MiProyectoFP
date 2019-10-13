<template>
<div class="row" id="clientes_nuevo">
<!-- <span>------ {{token}}-----</span> -->
<!-- <span>------ {{clEditar}}-----</span> -->

    <div class="col-sm-12">
        <h3>Mantenimiento de Clientes</h3>
        <!-- <div>
            hola------------------
        </div> -->
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 style="display: inline">Actualizando cliente ID: <strong>{{ this.clEditar.id }}</strong></h4>
                <div style="display: inline; float: right">
                    <button class="btn btn-primary" click="updateCliente">Actualizar</button>
                    <a href="/clientes/clientes" class="btn btn-danger pull-right">Cancelar</a>
                </div>
            </div>
            <div class="card-body">
                <!--formulario editado cliente-->
                <form>

                    <!-- html no acepta el verbo patch, lo pasamos con campo hidden -->
                    <!-- <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="csrf"> -->

                    <div class="form-group">
                        <label for="razon_social" class="col-form-label">Razón social</label>      
                        <input type="text" class="form-control" required name="razon_social" id="razon_social" v-model="clEditar.razon_social" v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" readonly name="nif" id="nif" v-model="clEditar.nif" v-touppercase> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="niva" class="col-form-label">NIVA</label>      
                            <input type="text" class="form-control" readonly name="niva" id="niva" v-model="clEditar.niva" v-touppercase>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección</label>      
                        <input type="text" class="form-control" name="direccion" id="direccion" v-model="clEditar.direccion" v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="provincia" class="col-form-label">Provincia</label>      
                            <input type="text" class="form-control" name="provincia" id="provincia" v-model="clEditar.provincia" v-touppercase>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="pais" class="col-form-label">Pais</label>      
                            <input type="text" class="form-control" required name="pais" id="pais" v-model="clEditar.pais" v-touppercase>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp" class="col-form-label">Código Postal</label>      
                            <input type="text" class="form-control" name="cp" id="cp" v-model="clEditar.cp" v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tlfn" class="col-form-label">Teléfono</label>      
                            <input type="tel" class="form-control" name="tlfn" id="tlfn" v-model="clEditar.tlfn"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">Email</label>      
                            <input type="email" class="form-control" name="email" id="email" v-model="clEditar.email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ambito_cl" class="col-form-label">Ámbito cliente</label>
                            <select class="form-control" name="ambito_cl" id="ambito_cl"  v-model="clEditar.ambito_cl">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_cl" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" name="tipo_cl" id="tipo_cl" v-model="clEditar.tipo_cl">
                                <option disabled selected value="">Tipo de cliente...</option>
                                <option value="PERSONA FISICA">PERSONA FISICA</option>
                                <option value="PERSONA JURIDICA">PERSONA JURIDICA</option>
                            </select>        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="forma_pago" class="col-form-label">Método de pago</label>
                            <select class="form-control" name="forma_pago" id="forma_pago" v-model="clEditar.forma_pago">
                                <option disabled selected value="">Elije método...</option>
                                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                <option value="PAY PAL">PAY PAL</option>
                                <option value="CONTADO">CONTADO</option>
                            </select>      
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dias_pago" class="col-form-label">Plazo para el pago</label>
                            <select class="form-control" name="dias_pago" id="dias_pago" v-model="clEditar.dias_pago">
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
                        <button class="btn btn-primary" click="updateCliente">Actualizar</button>
                        <!-- <button type="submit" class="btn btn-primary"> Submit Actualizar</button> -->
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
            clEditar: this.editadocliente, //se le asigna el valor que nos da blade
            errores:[], //array para recoger errores en validación
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            validado: false
        }
    },
    props:[
        'editadocliente', //prop que envía clientes_editar.blade
    ],
    created() {
        console.log(this.clEditar);
    },
    methods:{
        updateCliente(){ //conecta con bd y actualiza cleinte seleccionado
            //Validaciones del form en cliente
            this.validarForm();
            console.log(this.validado);
            //si validado
            if(this.validado == true){
                var url='/clientes/clientesData/'+this.clEditar.id;
                axios.post(url, this.clEditar) //envía valor del cliente editado
                    .then(response => {
                        console.log(response);
                        history.back();
                        // location.href() = '/clientes';
                    })
                    .catch(error => {
                        this.errores = error.response.data
                    }
                );
            }
            
        },
        validarForm(){
            if(this.controlRazonSocial(this.clEditar.razon_social) && this.controlPais(this.clEditar.pais)
                && this.controlAmbito(this.clEditar.ambito_cl) && this.controlTipo(this.clEditar.tipo_cl)){
                TODO://INCLUIR MÁS CONTROLES...
                this.validado = true;
                console.log('validarForm: '+this.validado);
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
        }
    }
}
</script>