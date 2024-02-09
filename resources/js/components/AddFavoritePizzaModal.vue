<template>
    <div class="modal-body">
        <select v-model="selectedPizza" name="pizza_id" class="form-control" required>
            <option v-for="pizza in pizzasAvailable" :key="pizza.id" :value="pizza.id">{{ pizza.name }}</option>
        </select>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavrieť</button>
        <button @click="addPizza" type="button" class="btn btn-success">Pridať pizzu</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedPizza: null,
            pizzasAvailable: [],
            pizzas: [],
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    mounted() {
        this.fetchPizzas();
    },
    methods: {
        fetchPizzas() {
            axios.get('/api/pizzas')
                .then(response => {
                    this.pizzasAvailable = response.data;
                })
                .catch(error => {
                    console.error('Error fetching pizzas.', error);
                });
            axios.get('/api/favorites')
                .then(response => {
                    this.pizzas = response.data;
                })
                .catch(error => {
                    console.error('Error fetching pizzas.', error);
                });
        },
        addPizza() {
            axios.post('/api/storeFavoritePizza', { pizza_id: this.selectedPizza }, {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                },
            })
                .then(response => {
                    console.log('Pizza added successfully');
                    this.selectedPizza = null;
                    this.fetchPizzas();
                })
                .catch(error => {
                    console.error('Error adding pizza', error.response);
                });
        },
    }
}
</script>
