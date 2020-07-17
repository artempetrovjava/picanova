<template>
  <div class="flex flex-col items-center my-3">
    <div v-if="pizza != null">
      <h6 class="px-3"><b>Pizza Name:</b> {{ pizza.name }}</h6>
      <p class="px-3"><b>Price:</b> {{ pizza.price.toFixed(2) }} eur</p>
      <p class="px-3"><b>Ingredients:</b></p>
      <span v-for="ingredient in pizza.ingredients" class="px-3">
        {{ ingredient.name }}
      </span>
    </div>
    <div class="flex mt-10 items-center">
      <h3 class="font-semibold">Pizza Name:</h3>
      <input
        v-model="name"
        class="py-2 mb-5"
        placeholder="Pizza Name"
      />
    </div>
    <div v-show="allIngredients.length > 0">
      <table class="table-auto">
        <thead class="table-bordered">
          <tr>
            <th class="px-3">Name</th>
            <th class="px-3">Price</th>
          </tr>
        </thead>
        <tbody class="table-bordered">
          <tr v-for="ingredient in allIngredients" :key="ingredient.id">
            <th class="px-3">{{ ingredient.name }}</th>
            <th class="px-3">{{ ingredient.price }} eur</th>
            <th><button @click="addIngredient(ingredient)">Add</button></th>
            <th class="px-3">{{ countIngredient(ingredient) }}</th>
            <th><button @click="removeIngredient(ingredient)">Remove</button></th>
          </tr>
        </tbody>
      </table>
      <div class="mt-5">
        <tr class="table-bordered">
          <th class="px-3">Pizza price:</th>
          <th class="px-3">{{ calculatePizzaPrice }}</th>
        </tr>
      </div>
    </div>
    <FlashMessage></FlashMessage>
    <p v-if="!name" class="mt-5 text-danger">{{ error_name }}</p>
    <p v-if="ingredients.length < 1" class="mt-2 text-danger">{{ error_ingredients }}</p>

    <button @click="submit" class="mt-3" :disabled="!name || ingredients.length < 1">Update Pizza</button>
  </div>
</template>

<script>
import PizzaService from "../services/PizzaService";
export default {
  props: ["id"],
  data() {
    return {
      name: "",
      allIngredients: [],
      pizza: null,
      ingredients: [],
      ingredient_ids: [],
      totalPrice: 0,
      error_name: "Pizza name is required!",
      error_ingredients: "Please select at least 1 ingredient",
    };
  },
  methods: {
    submit() {
      if (this.name) {
        self = this;
        this.ingredients.forEach(function(ingredient) {
          self.ingredient_ids.push(ingredient.id);
        });
        let pizzaRequest = {
          name: this.name,
          ingredients: this.ingredient_ids,
        };
        PizzaService.updatePizza(this.pizza.id, pizzaRequest)
          .then(response => {
            if (!response.error) {
              this.flashMessage.show({
                status: "info",
                title: "Pizza updated!",
                time: 3500,
                message: ""
              });
            }
          })
          .catch(error => {
            console.log(error);
          });
      }
    },
    addIngredient(ingredient) {
      this.ingredients.push(ingredient);
    },
    removeIngredient(ingredient) {
      self = this;
      for (const elem of this.ingredients) {
        if(ingredient.id == elem.id) {
          self.ingredients.splice(self.ingredients.indexOf(ingredient), 1);
          break;
        }
      }
      this.ingredients.forEach(function (elem) {

      });
    },
    countIngredient(ingredient) {
      let count = 0;
      self = this;
      this.ingredients.forEach(function(elem) {
        if (ingredient.id == elem.id) {
          count++;
        }
      });

      return count;
    },
  },
  computed: {
    calculatePizzaPrice() {
      self = this;
      if(this.ingredients.length < 1) {
        return 0;
      }

      this.totalPrice = 0;

      this.ingredients.forEach(function(ingredient) {
        self.totalPrice += ingredient.price;
      });

      this.totalPrice += this.totalPrice * 0.5;

      return this.totalPrice.toFixed(2);
    },
  },
  mounted() {
    PizzaService.getPizza(this.$route.params.id)
      .then(response => {
        this.pizza = response;
        this.name = this.pizza.name;
      })
      .catch(error => {
        console.log(error);
      });

    PizzaService.getIngredients()
      .then(response => {
        this.allIngredients = response;
      })
      .catch(error => {
        console.log(error);
      });
  }
};
</script>

<style scoped>
</style>
