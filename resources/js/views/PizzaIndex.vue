<template>
  <div class="flex flex-col items-center">
    <div class="flex mt-10 items-center">
      <div v-show="pizzas.data" v-for="pizza in pizzas.data" class="table-bordered py-3 my-3 flex flex-row">
        <div>
          <h6 class="px-3"><b>Pizza Name:</b> {{ pizza.name }}</h6>
          <p class="px-3"><b>Price:</b> {{ pizza.price.toFixed(2) }} eur</p>
        </div>
        <div class="text-right mr-3">
          <router-link :to="{ name: 'pizza-edit', params: {id: pizza.id} }" class="btn btn-primary">Pizza Edit</router-link>
        </div>
        <p class="px-3"><b>Ingredients:</b></p>
        <span v-for="ingredient in pizza.ingredients" class="px-3">
          {{ ingredient.name }}
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import PizzaService from "../services/PizzaService";
export default {
  data() {
    return {
      pizzas: [],
    };
  },
  methods: {
  },
  computed: {
  },
  mounted() {
    PizzaService.getPizzas()
      .then(response => {
        this.pizzas = response;
      })
      .catch(error => {
        console.log(error);
      });
  }
};
</script>

<style scoped>
</style>