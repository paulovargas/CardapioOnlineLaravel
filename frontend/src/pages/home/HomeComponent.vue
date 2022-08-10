<template>
  <DashboardComponent>
    <ion-refresher>
      <div slot="slot-pages">
        <p>Home</p>
      </div>
    </ion-refresher>
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
