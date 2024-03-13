<template>
  <DashboardComponent>
    <div class="content-pages">
      <slot>
        <h1 class="p-2">Cadastrar Cardápio</h1>
           <div>            
        <div class="d-flex p-3">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Titulo</label>
              <input
                v-model="menu.title"
                type="text"
                class="form-control"
                id="description"
                aria-describedby="description"
                placeholder="Nome do prato"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Descrição</label>
              <input
                v-model="menu.description"
                type="text"
                class="form-control"
                id="description"
                aria-describedby="description"
                placeholder="Descrição"
              />
            </div>          
          
            <div class="form-group">
              <img :src="imageSrc" alt="" width="100">
              <br/>
              <label for="exampleInputEmail1">Imagem</label>
              <input
              @change="getImage"
                type="file"
                class="form-control"
                id="description"
                aria-describedby="description"
                placeholder="Descrição"
              />
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Preço</label>
              <input
                v-model="menu.price"
                type="number"
                class="form-control"
                id="description"
                aria-describedby="description"
                placeholder="Valor do prato"
              />
            </div>

             <div class="form-group">
              <label for="exampleInputEmail1">Categoria</label>
              <input
                v-model="menu.category"
                type="text"
                class="form-control"
                id="description"
                aria-describedby="description"
                placeholder="Tipo do prato"
              />
            </div>
                      
            <div class="form-check"></div>
            <button
              type="submit"
              class="btn btn-primary"
              @click.stop.prevent="submit"
            >
              Salvar prato !
            </button>
          </form>
        </div>
      </div> 
      </slot>
    </div>
  </DashboardComponent>
</template>

<script>
//import api from "../../api";

import axios from "axios";
import DashboardComponent from "../Dashboard/DashboardComponent.vue";

export default {
  name: "ReservationComponent",
  data() {
    return {
      menu: {
        title: '',
        description: '',
        image: '',
        price: '',
        category: '',
      } ,
      imageSrc: null,
    };
  },
 
 methods: {
  getImage($evt){
    this.menu.image = $evt.target.files[0];
    console.log($evt);
    this.imageSrc = URL.createObjectURL($evt.target.files[0]);
  },   
    async submit() {

      const payload = new FormData();      
      payload.append('title', this.menu.title);
      payload.append('description', this.menu.description);
      payload.append('image', this.menu.image);
      payload.append('price', this.menu.price);
      payload.append('category', this.menu.category);
      
      console.log('pay', payload);
      
      axios.post('http://localhost:8000/api/menus', payload);
      this.$router.push('/menu');
    },
  },
  components: {
    DashboardComponent,
  },
};
</script>
<style scoped>
.btn{
  color: #fff;
  background-color: red;
}</style>
