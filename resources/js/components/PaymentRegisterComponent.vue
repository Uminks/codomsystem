<template>
  <div class="estates-container">
    <h2>Cuentas por pagar</h2>

    <div class="form-group">
      <label for="estate_name">Nombre del inmueble</label>
      <input
        v-model="estate_name"
        type="text"
        name="estate_name"
        class="form-control"
        placeholder="Nombre del inmueble"
      />
    </div>

    <div class="form-group">
      <label for="codom_name">Mes del registro</label>
      <span class>
        <input v-model="date" class="form-control" type="month" id="datePicker2" />
      </span>
    </div>

    <div class="form-group">
      <label>Tipo de movimiento</label>
      <div
        class="estates-container__estates form-group"
        :key="index"
        v-for="(field, index) in movs"
      >
        <select @change="setInfo(field, field.type)" v-model="field.type" class="form-control">
          <option value="null" disabled selected>Tipo</option>
          <option v-for="(option, key) in options" :value="key" :key="key">{{ option }}</option>
        </select>

        <input type="text" class="form-control" v-model="field.title" placeholder="Detalles" />
        <input type="text" class="form-control" v-model="field.value" placeholder="Valor" />
      </div>
      <div class="group-buttons">
        <button class="btn btn-primary" @click="AddField">Nuevo movimiento</button>
        <button class="btn btn-danger" @click="DeleteField">Eliminar movimiento</button>
      </div>
    </div>

    <div
      class="text-center"
      v-if="allValuesExist() && this.estate_name && this.date && this.movs.length != 0"
    >
      <button class="btn btn-success">Registrar movimiento</button>
    </div>

    <pre style="margin-top: 2em;">{{ $data }}</pre>
  </div>
</template>

<script>
export default {
  data() {
    return {
      options: {
        1: "Facturas",
        2: "Pagos/Abonos",
        3: "Notas de Crédito",
        4: "Notas de Débito",
        5: "Anticipos"
      },
      estate_name: null,
      date: null,
      movs: [
        {
          type: null,
          info: null,
          title: null,
          value: null
        }
      ]
    };
  },
  mounted() {
    datePicker2.max = new Date().toISOString().split("T")[0];
  },
  methods: {
    AddField() {
      let exist = true;

      this.movs.forEach(field => {
        if (field.type == null || field.value == null || field.info == null) {
          exist = false;
        }
      });

      if (exist) {
        this.movs.push({
          type: null,
          info: null,
          title: null,
          value: null
        });
      }
    },
    setInfo(field, type) {
      field.info = this.options[field.type];
    },
    allValuesExist() {
      let isOk = true;

      this.movs.forEach(mov => {
        if (
          mov.type == null ||
          mov.info == null ||
          mov.value == null ||
          mov.title == null ||
          this.movs.length == 0
        ) {
          isOk = false;
        }
      });

      return isOk;
    },
    DeleteField() {
      this.movs.pop({
        type: null,
        info: null,
        value: null,
        title: null
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.estates-container {
  width: 50vw;
  margin: auto;
  padding: 5px;

  &__estates {
    margin-bottom: 8px;
    text-align: center;
    border: none;
    display: flex;

    input,
    select {
      margin-right: 10px;
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