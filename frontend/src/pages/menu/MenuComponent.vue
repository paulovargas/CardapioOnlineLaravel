<template>
  <DashboardComponent>
    <div class="content-pages">
      <h1 class="p-2">Cardápio</h1>
      <div class="p-3">
        <slot
          ><CardsMenuComponent
            :dishName="'Batata frita'"
            :description="'Batata frita em oleo'"
            :price="'10,00'"
        /></slot>
      </div>
    </div>
  </DashboardComponent>
</template>

<script>
import DashboardComponent from "../Dashboard/DashboardComponent.vue";
import CardsMenuComponent from "../../components/CardsMenuComponent.vue";

export default {
  components: {
    DashboardComponent,
    CardsMenuComponent,
  },
};
</script>
<style scoped></style>
