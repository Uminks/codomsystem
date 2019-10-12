<template>
  <div>
    
    <h2>Lista de inmuebles</h2>

    <div class="form-group">
      <label for="estate_name">Condominio</label>
      <select @change="updateEstates" v-model="codom_id" class="form-control">
        <option value="null" disabled selected>Seleccione inmueble</option>
        <option v-for="(codom, key) in this.codoms" :value="codom.id" :key="key">{{ codom.nombre }}</option>
      </select>
    </div> 


    <div v-for="(estate, key) in this.estates" :key="key">
        <!-- <img :src="'/storage/profile/'+estate.imagen" alt=""> -->
        <div>
            <span> {{ estate.nombre }} % </span> |
            <span> {{ estate.alicuota }} % </span>
        </div>
    </div>

  </div>
</template>

<script>
import PictureInput from "vue-picture-input";
import axios from 'axios';

export default {
  data() {
    return {
        codoms: null,
        codom_id : null,
        estates: []
    };
  },
  mounted() {
    axios
    .get('/condominios')
    .then(response => {
      this.codoms = response.data;
    })
    .catch(err => {
      console.log(err);
    });
  },
  methods: {
    updateEstates() {

        // 
        axios
        .get('/condominios/'+this.codom_id)
        .then(response => {
          this.estates = response.data
          console.log(this.estates)
        })
        .catch(err => {
          console.log(err)
        });
        
        //

    }
  }
}
</script>

<style lang="scss" scoped>
</style>