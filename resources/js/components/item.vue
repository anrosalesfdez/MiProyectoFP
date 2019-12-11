<template>

    <tr>
        <td style="width: 20%">
            <div class="delete-wpr">
                <select class="form-control-plaintext form-control-sm editable" v-model="linea.producto">
                    <option disabled value="null">Seleccione un producto</option>
                    <option v-for="producto in productos" :key="producto.producto_id" :value="producto"> {{ producto.nombre }} </option>
                </select>
                <a class="delete" role="button" v-on:click="$emit('elimina', 'index')" title="Eliminar línea">X</a>
            </div>
        </td>
        <td style="width: 20%">
            <input type="text" class="editable" maxlength="50" size="16" v-model="linea.producto.descripcion">
        </td>
        <td style="width: 15%">
            <input type="number" class="editable dcha" style="width: 100%" step="0.01" v-model="linea.producto.precio">
        </td>
        <td style="width: 15%">
            <input type="text" class="editable" maxlength="18" size="11" tabindex="-1" v-model="linea.producto.unidad">
        </td>
        <td style="width: 15%">
            <input type="number" class="editable dcha" style="width: 100%" v-model="linea.cantidad" value="1">
        </td>
        <td style="width: 15%">
            <input type="number" readonly class="dcha" style="width: 100%" tabindex="-1" v-model="subtotal">
        </td>
            <input type="hidden"  readonly maxlength="10" size="10" tabindex="-1" v-model="linea.producto.actividades_impuesto">
    </tr>
</template>


<script>
export default {
    name: "item",
    props: [
        'productos',
        'linea',
    ],
    computed: {
        subtotal: function() { //este dato no se almacena
            let impto = this.linea.producto.actividades_impuesto;
            this.$emit('calcula', impto);
            return parseFloat(this.linea.producto.precio * this.linea.cantidad).toFixed(2);;
        }
    }
}
</script>
