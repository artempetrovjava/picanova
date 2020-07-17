import axios from "axios";

const apiClient = axios.create();

export default {
    getIngredients() {
        return apiClient.get("/api/ingredients")
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                throw error;
            });
    },
    getPizzas() {
        return apiClient.get("/api/pizza")
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                throw error;
            });
    },
    createPizza(pizzaRequest) {
        return apiClient.post("/api/pizza", pizzaRequest)
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                throw error;
            });
    },
    getPizza(pizzaId) {
        return apiClient.get(`/api/pizza/${pizzaId}`)
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                throw error;
            });
    },
    updatePizza(pizzaId, pizzaRequest) {
        return apiClient.post(`/api/pizza/${pizzaId}`, pizzaRequest)
            .then((response) => {
                return response.data;
            })
            .catch((error) => {
                throw error;
            });
    },
};
