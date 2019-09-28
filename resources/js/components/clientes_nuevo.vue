<template>
<div class="row" id="clientes_nuevo">
    <div class="col-sm-12">
        <h1>Mantenimiento de Clientes</h1>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Alta nuevo cliente
                <a class="btn btn-secondary pull-right" href="clientes">Volver</a>
                //TODO: colocar bien este botón
            </div>
            <div class="card-body">
                <!--formulario nuevo cliente-->
                <form>
                    <div class="form-group">
                        <label for="razon_social" class="col-form-label">Razón social</label>      
                        <input type="text" class="form-control" name="razon_social" id="razon_social" v-model="nuevoCliente.razon_social">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" nif="cliente" id="nif" v-model="nuevoCliente.nif">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="niva" class="col-form-label">NIVA</label>      
                            <input type="text" class="form-control" name="niva" id="niva" v-model="nuevoCliente.niva">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección</label>      
                        <input type="text" class="form-control" name="direccion" id="direccion" v-model="nuevoCliente.direccion">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="provincia" class="col-form-label">Provincia</label>      
                            <input type="text" class="form-control" name="provincia" id="provincia" v-model="nuevoCliente.provincia">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="pais" class="col-form-label">Pais</label>      
                            <input type="text" class="form-control" name="pais" id="pais" v-model="nuevoCliente.pais">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp" class="col-form-label">Código Postal</label>      
                            <input type="text" class="form-control" name="cp" id="cp" v-model="nuevoCliente.cp">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tlfn" class="col-form-label">Teléfono</label>      
                            <input type="tel" class="form-control" name="tlfn" id="tlfn" v-model="nuevoCliente.tlfn">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">Email</label>      
                            <input type="email" class="form-control" name="email" id="email" v-model="nuevoCliente.email">
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
                        <textarea class="form-control" name="observ" id="observ"></textarea>
                        <!--FIXME: no lo lleva a la bd, ni lo blaquea-->
                    </div>

                    <span v-for="error in errores" v-bind:key="error.id" class="text-danger">{{ error }}</span>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click.prevent="storeCliente">Guardar</button>
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
        storeCliente(){ //conecta con bd y guarda nuevo cliente
        //TODO: añadir validaciones y notificaciones, mejor desde laravel?
            var url='clientesData';
            console.log(this.nuevoCliente);
            axios.post(url, this.nuevoCliente) //envía valor nuevoCliente
                .then(response => {   
                    // this.getClientes(); //recarga listado
                    this.nuevoCliente = {   //blanquea var
                        razon_social:'',
                        nif:'',
                        niva:'',
                        direccion:'',
                        provincia:'',
                        pais:'',
                        cp:'',
                        tlfn:'',
                        email:'',
                        ambito_cl:'',
                        tipo_cl:'',
                        forma_pago:'',
                        dias_pago:'',
                        observ:''
                    };   
                    this.errores=[];    //blanquea var
                    //FIXME: regresar a clientes.vue
                })
                .catch(error => {
                    this.errores = error.response
                });
        }
    }
}
</script>