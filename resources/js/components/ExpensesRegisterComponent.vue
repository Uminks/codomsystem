<template>
  <div class="estates-container">
    <h2>Registro de gastos del mes</h2>

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
        <input v-model="date" class="form-control" type="month" id="datePicker" />
      </span>
    </div>

    <div class="form-group">
      <label>Gastos</label>
      <div
        class="estates-container__estates form-group"
        :key="index"
        v-for="(field, index) in expenses"
      >
        <select @change="setInfo(field, field.type)" v-model="field.type" class="form-control">
          <option value="null" disabled selected>Tipo de gasto</option>
          <option v-for="(option, key) in options" :value="key" :key="key">{{ option }}</option>
        </select>

        <input class="form-control" v-model="field.value" placeholder="Valor" />
      </div>
      <div class="group-buttons">
        <button class="btn btn-primary" @click="AddField">Nuevo gasto</button>
        <button class="btn btn-danger" @click="DeleteField">Eliminar gasto</button>
      </div>
    </div>

    <div class="text-center" v-if="allValuesExist() && this.estate_name && this.date">
      <button class="btn btn-success">Registrar Gastos</button>
    </div>

    <pre style="margin-top: 2em;">{{ $data }}</pre>
  </div>
</template>

<script>
export default {
  data() {
    return {
      options: {
        1: "Transaccion Ordinaria",
        2: "Transaccion Extraordinaria",
        3: "Transaccion Individual",
        4: "Previsiones",
        5: "Coutas Extras"
      },
      estate_name: null,
      date: null,
      expenses: [
        {
          type: null,
          info: null,
          value: null
        }
      ]
    };
  },
  mounted() {
    datePicker.max = new Date().toISOString().split("T")[0];
  },
  methods: {
    AddField() {
      let exist = true;

      this.expenses.forEach(field => {
        if (field.type == null || field.value == null) {
          exist = false;
        }
      });

      if (exist) {
        this.expenses.push({
          type: null,
          info: null,
          value: null
        });
      }
    },
    setInfo(field, type) {
      field.info = this.options[field.type];
    },
    allValuesExist() {
      let isOk = true;

      this.expenses.forEach(extense => {
        if (
          extense.type == null ||
          extense.info == null ||
          extense.value == null
        ) {
          isOk = false;
        }
      });

      return isOk;
    },
    DeleteField() {
      this.expenses.pop({
        type: null,
        info: null,
        value: null
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