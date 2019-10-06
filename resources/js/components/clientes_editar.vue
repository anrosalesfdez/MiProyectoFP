<template>
<div class="row" id="clientes_nuevo">
<!-- <span>------ {{editadocliente}}-----</span>
<span>------ {{clEditar}}-----</span> -->

    <div class="col-sm-12">
        <h1>Mantenimiento de Clientes</h1>
        <!-- <div>
            hola------------------
        </div> -->
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h2>Actualizar cliente </h2>
                <a class="btn btn-secondary pull-right" href="clientes">Volver</a>
            </div>
            <div class="card-body">
                <!--formulario editado cliente-->
                <form>
                    <div class="form-group">
                        <label for="razon_social" class="col-form-label">Razón social</label>      
                        <input type="text" class="form-control" name="razon_social" id="razon_social" v-model="clEditar.razon_social">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" disabled nif="nif" id="nif" v-model="clEditar.nif">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="niva" class="col-form-label">NIVA</label>      
                            <input type="text" class="form-control" disabled name="clienteEditar.niva" id="niva" v-model="clEditar.niva">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección</label>      
                        <input type="text" class="form-control" name="direccion" id="direccion" v-model="clEditar.direccion">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="provincia" class="col-form-label">Provincia</label>      
                            <input type="text" class="form-control" name="provincia" id="provincia" v-model="clEditar.provincia">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="pais" class="col-form-label">Pais</label>      
                            <input type="text" class="form-control" name="pais" id="pais" v-model="clEditar.pais">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp" class="col-form-label">Código Postal</label>      
                            <input type="text" class="form-control" name="cp" id="cp" v-model="clEditar.cp">
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
                            <select class="form-control" name="ambito_cl" id="ambito_cl" disabled v-model="clEditar.ambito_cl">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_cl" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" name="tipo_cl" id="tipo_cl" disabled v-model="clEditar.tipo_cl">
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

                    <span v-for="error in errores" v-bind:key="error.id" class="text-danger">{{ error }}</span>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="updateCliente">Actualizar</button>
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
            clEditar: this.editadocliente, //se le asigna el valor que nos da blade
            errores:[], //array para recoger errores en validación
        }
    },
    props:[
        'editadocliente' //prop que envía clientes_editar.blade
    ],
    created() {
        console.log('hola');
        console.log(this.clEditar);
    },
    methods:{
        updateCliente(){ //conecta con bd y actualiza cleinte seleccionado
        //TODO: añadir validaciones y notificaciones
            var url='/clientesData/'+this.clEditar.id;
            axios.put(url, this.clEditar) //envía valor del cliente editado
                .then(response => {
                    console.log(response);
                    location.back();
                })
                .catch(error => {
                    this.errores = error.response.data
                }
            );
        }
    }
}
</script>