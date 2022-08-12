<template>
  <DeliveryComponent>
    <div class="p-3">
      <slot>
        
      <div >
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
  </DeliveryComponent>
</template>

<script>
import api from "../../../api";
import DeliveryComponent from "../DeliveryComponent.vue";

export default {
  name: "ReservationComponent",
  data() {
    return {
      reserva: {},
    };
  },
 
 methods: {    
    async submit() {
      const data = {
        name:this.name,
        dta_reservation:this.dta_reservation,
        hr_reservation:this.hr_reservation,
        qtd:this.qtd,
        phone:this.phone,
        };
      console.log('Reserva :',data);

      const response = api.post("reservations", data);

        console.log('Reserva :',response)

      /* api.post('/login', data).then((response)=>{
      console.log(response)
      localStorage.setItem('token', response.data.access_token)

      })
      .catch((error)=>{
        console.log('Erro', error.response)
      }) */





/* 
      .post("/login", data)
      .then((res) => {
        this.token = res.data.access_token;
        console.log('menus',this.token)
      })
      .catch((error) => {
        console.log(error)
      }); */
    },
  },
  components: {
    DeliveryComponent,
  },
};
</script>
<style scoped></style>
