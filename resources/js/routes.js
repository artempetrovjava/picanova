import PizzaCreate from "./views/PizzaCreate.vue";
import PizzaIndex from "./views/PizzaIndex.vue";
import PizzaEdit from "./views/PizzaEdit.vue";

export default {
    mode: "history",
    routes: [
        {
            path: "/pizza/create",
            name: "pizza-create",
            component: PizzaCreate
        },
        {
            path: "/pizza/index",
            name: "pizza-index",
            component: PizzaIndex
        },
        {
            path: "/pizza/:id",
            name: "pizza-edit",
            component: PizzaEdit,
            props: true
        }
    ]
};