<template>
  <DashboardComponent>
    <div class="content-pages">
      <slot>
        <h1 class="p-2">Cadastrar Categoria</h1>   <div >
        <header class="d-flex justify-content-center">
          <h1>Faça sua reserva !</h1>
        </header>
        <div class="d-flex justify-content-center">
          <form>
            <div class="form-group">
              <label for="data">Data </label>
              <input
                v-model="dta_reservation"
                type="date"
                class="form-control"
                id="date"
                aria-describedby="date"
                placeholder="Data"
              />
            </div>
            <div class="form-group">
              <label for="data">Hora </label>
              <input
                v-model="hr_reservation"
                type="time"
                class="form-control"
                id="date"
                aria-describedby="date"
                placeholder="20:30"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
              <input
                v-model="name"
                type="text"
                class="form-control"
                id="name"
                aria-describedby="name"
                placeholder="Seu nome"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Quantas pessoas ?</label>
              <input
                v-model="qtd"
                type="number"
                class="form-control"
                id="qtd"
                aria-describedby="qtd"
                placeholder="Quantas pessoas ?"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Seu telefone :</label>
              <input
                v-model="phone"
                type="phone"
                class="form-control"
                id="tel"
                aria-describedby="tel"
                placeholder="Telefone"
              />
            </div>            
            <div class="form-check"></div>
            <button
              type="submit"
              class="btn btn-primary"
              @click="submit"
            >
              Marcar reserva !
            </button>
          </form>
        </div>
      </div> 
      </slot>
    </div>
  </DashboardComponent>
</template>

<script>
import DashboardComponent from "../Dashboard/DashboardComponent.vue";

export default {
  components: {
    DashboardComponent,
  },
};
</script>
<style scoped></style>
