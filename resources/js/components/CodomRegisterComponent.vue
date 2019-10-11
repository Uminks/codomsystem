<template>
  <div class="estates-container">
    <h2>Registro de condomonio</h2>

    <div class="form-group">
      <label for="codom_name">Nombre del condomonio</label>
      <input
        v-model="codom_name"
        type="text"
        name="codom_name"
        class="form-control"
        placeholder="Nombre del condomonio"
      />
    </div>

    <div class="form-group">
      <label for="codom_name">Monto de Reserva</label>
      <span class="per_input">
        <input
          v-model="reserve_amount"
          type="number"
          name="codom_name"
          class="form-control"
          value="5"
          min="5"
          max="15"
        /> %
      </span>
    </div>

    <div class="form-group">
      <label>Inmuebles</label>
      <div
        class="estates-container__estates form-group"
        :key="index"
        v-for="(field, index) in estates"
      >
        <div class="input-div">
          <input class="form-control" v-model="field.title" placeholder="Titulo del inmueble" />
          <input class="form-control" v-model="field.percentage" placeholder="Porcentaje alicuota" />
        </div>
        <picture-input
          ref="pictureInput"
          @change="onChange(field,index)"
          width="200"
          height="200"
          margin="16"
          accept="image/jpeg, image/png"
          size="4"
          buttonClass="btn"
          :customStrings="{
                    upload: '<h1>Foto del inmueble</h1>',
                    drag: 'Arrastra la foto😺'
                  }"
        ></picture-input>


      </div>
      <div class="group-buttons">
        <button class="btn btn-primary" @click="AddField">Nuevo inmueble</button>
        <button class="btn btn-danger" @click="DeleteField">Eliminar inmueble</button>
      </div>
    </div>

    <div>
      <div v-if="(calculatePercentage() == 100)" class="alert alert-primary" role="alert">
        <span>La suma es 100</span>

        <div class="register-codom">
          <button
            v-if="this.codom_name && this.reserve_amount"
            class="btn btn-success"
          >Registrar Condominio</button>
        </div>
      </div>
      <div v-else class="alert alert-danger" role="alert">
        <span>La sumatoria de los porcentajes debe dar 100 : Total de la suma {{ this.calculatePercentage() }}</span>
      </div>
    </div>

    <pre style="margin-top: 2em;">{{ $data }}</pre>
  </div>
</template>

<script>
import PictureInput from "vue-picture-input";

export default {
  components: {
    PictureInput
  },
  data() {
    return {
      codom_name: null,
      reserve_amount: null,
      estates: [{ title: "", percentage: "", image: "" }]
    };
  },
  mounted() {},
  methods: {
    onChange(field, index) {
      if (this.$refs.pictureInput[index].image) {
        field.image = this.$refs.pictureInput[index].image;
      } else {
        console.log("FileReader API not supported: use the <form>, Luke!");
      }
    },
    AddField() {
      let exist = true;

      this.estates.forEach(field => {
        if (field.title == "" || field.percentage == "") {
          exist = false;
        }
      });

      if (exist) {
        this.estates.push({ title: "", percentage: "", image: "" });
      }
    },
    DeleteField() {
      this.estates.pop({ title: "", percentage: "", image: "" });
    },
    calculatePercentage() {
      let total = 0;
      this.estates.forEach(field => {
        if (field.title) {
          total += parseFloat(field.percentage);
        }
      });
      return total;
    }
  }
};
</script>

<style lang="scss" scoped>
.estates-container {
  width: 50vw;
  margin: auto;
  padding: 5px;

  .input-div {
    width: 100%;
  }

  &__estates {
    margin-bottom: 8px;
    text-align: center;
    border: none;
    display: flex;

    input {
      margin-right: 10px;
      margin-top: 1.5em;
      margin-bottom: 1.5em;
    }
  }

  .register-codom {
    margin: 8px 0;
  }

  .per_input {
    display: flex;
    font-size: 20px;

    input {
      width: 60px !important;
      margin-right: 10px;
    }
  }

  .group-buttons {
    display: flex;
    justify-content: center;

    button {
      margin: 10px 10px;
    }
  }
}
</style>