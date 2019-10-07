<template>
<div class="row" id="clientes_nuevo">
    <div class="col-sm-12">
        <h1>Mantenimiento de Clientes</h1>
        <p v-if="errores.length">
            <b>Please correct the following error(s):</b>
            <ul>
            <li v-for="error in errores" :key="error">{{ error }}</li>
            </ul>
        </p>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h2>Alta nuevo cliente</h2>
                <a class="btn btn-secondary pull-right" href="/clientes">Volver</a>
            </div>
            <div class="card-body">
                <!--formulario nuevo cliente-->
                <form>
                    <div class="form-group">
                        <label for="razon_social" class="col-form-label">Razón social</label>      
                        <input type="text" class="form-control" name="razon_social" id="razon_social" v-model="nuevoCliente.razon_social" v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" nif="cliente" id="nif" v-model="nuevoCliente.nif" v-touppercase>
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
                            <input type="text" class="form-control" name="pais" id="pais" v-model="nuevoCliente.pais" v-touppercase>
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
                            <select class="form-control" name="ambito_cl" id="ambito_cl" v-model="nuevoCliente.ambito_cl">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_cl" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" name="tipo_cl" id="tipo_cl" v-model="nuevoCliente.tipo_cl">
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

                    <p v-for="error in errores" v-bind:key="error" class="text-danger">{{ error }}</p>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" @click.prevent="storeCliente">Guardar</button>
                        <!-- v-show="validacion" // mejor habilitar para que solo se muestre el botón si todo ok-->
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
            errores:[], //array para recoger errores en validación
        }
    },
    methods:{
        storeCliente(){
        //Validaciones del form en cliente
        var enviar = this.checkForm();
        //Si superamos validaciones, envía nuevoCLiente a BD
        if(enviar){
            var url='clientesData';
            // console.log(this.nuevoCliente);
            axios.post(url, this.nuevoCliente)
                .then(response => {   
                    console.log(this.nuevoCliente);
                    history.back(); //location.href()
                })
                .catch(error => {
                    this.errores = error.response
                });
            }
        },
        checkForm: function () {
            this.errores = [];

            //chequeo errores
            if (!this.nuevoCliente.razon_social) {
                console.log(this.nuevoCliente.razon_social);
                this.errores.push("Razón social es campo obligatorio.");
                toastr.info('Are you the 6 fingered man?');
            }
            if (!this.nuevoCliente.nif) {
                console.log(this.nuevoCliente.nif);
                this.errores.push('NIF es campo obligatorio.');
            } else if (!this.comprobarNif(this.nuevoCliente.nif)) {
                this.errores.push('Formato NIF no válido.');
            }
            if (!this.nuevoCliente.email) {
                console.log(this.nuevoCliente.email);
                this.errores.push('Email es campo obligatorio.');
            } else if (!this.validEmail(this.nuevoCliente.email)) {
                this.errores.push('Formato email no válido.');
            }
            //si no hay errores
            if (!this.errores.length) {
                return true;
            }
        },
        validEmail: function (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
        },
        comprobarNif: function(dni) {
            //https://es.stackoverflow.com/questions/194879/validar-un-dni-nif-en-php
            //https://www.agenciatributaria.es/AEAT.internet/Inicio/La_Agencia_Tributaria/Campanas/Censos__NIF_y_domicilio_fiscal/Empresas_y_profesionales__Declaracion_censal__Modelos_036_y_037/Informacion/NIF_de_personas_juridicas_y_entidades.shtml
            if (dni.length != 9) {
                return false;
            }
            /* Ajustamos las letras especiales "x", "y" y "z" */
            // switch(dni.charAt(0).toLowerCase()) {
            //     case 'x':
            //         dni = '0' + dni.substr(1);
            //         break;
            //     case 'y':
            //         dni = '1' + dni.substr(1);
            //         break;
            //     case 'z':
            //         dni = '2' + dni.substr(1);
            //         break;
            // }
            if(parseInt(dni.substr(0, dni.length - 1))){  //letra al final determina persona fisica
                console.log(parseInt(dni.substr(0, dni.length - 1)));
                console.log(dni.substr(dni.length - 1, 1));
                var numero = parseInt(dni.substr(0, dni.length - 1)) % 23;
                var letra = dni.substr(dni.length - 1, 1);
            }else{//letra al final determina persona juridica
                console.log(dni.substr(1, dni.length));
                console.log(dni.substr(0, 1));
                var numero = (dni.substr(1, dni.length)) % 23;
                var letra = dni.substr(0, 1);
            }
            return letra != 'TRWAGMYFPDXBNJZSQVHLCKET'.substring(numero, numero + 1);
        }
    }//end methods
}
</script>