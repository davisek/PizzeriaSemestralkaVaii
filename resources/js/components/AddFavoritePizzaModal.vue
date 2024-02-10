<template>
    <div class="container py-5 text-center" id="appFavorite">
        <h2 class="mb-5">Zoznam obľúbených pizz</h2>
        <div v-if="message != null">
        <div role='alert' class="alert alert-success in center">{{message}}</div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="card text-white bg-dark mx-4 mb-5 favoriteCard" v-for="favorite in favorites" :key="favorite.id">
                <form @submit.prevent="deleteFavorite(favorite.id)">
                    <input type="submit" name="delete" class="btn btn-warning" value="Odstrániť">
                </form>
                <img class="card-img-top m-auto pt-3" :src="'storage/' + favorite.pizza.img" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{favorite.pizza.name}}</h5>
                    <p class="card-text">{{favorite.pizza.ingredients}}</p>
                </div>
            </div>

            <div class="d-flex justify-content-center mb-5 mx-4">
                <button class="btn btn-warning" data-toggle="modal" data-target="#addFavoritePizza">+</button>
            </div>
        </div>

        <!-- Modal na pridanie -->
        <div class="modal fade" id="addFavoritePizza" tabindex="-1" role="dialog" aria-labelledby="addFavoriteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="addFavoriteModalLabel">Pridanie obľúbenej pizze</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="addPizza">
                        <div class="modal-body">
                            <select v-model="selectedPizza" name="pizza_id" class="form-control" required>
                                <option v-for="pizza in pizzasAvailable" :key="pizza.id" :value="pizza.id">{{ pizza.name }}</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavrieť</button>
                            <button @click="addPizza" type="submit" class="btn btn-success">Pridať pizzu</button>
                        </div>
                    </form>
                </div>
            </div>
         </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedPizza: null,
            pizzasAvailable: [],
            favorites: [],
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            message: null,
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
                    console.error('Error pri získavaní pízz.', error);
                });
            axios.get('/api/favorites')
                .then(response => {
                    this.favorites = response.data;
                })
                .catch(error => {
                    console.error('Error pri získavaní pízz.', error);
                });
        },
        addPizza() {
            axios.post('/api/storeFavoritePizza', { pizza_id: this.selectedPizza }, {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                },
            })
                .then(response => {
                    this.message = response.data.message;
                    this.selectedPizza = null;
                    this.fetchPizzas();
                    this.active()
                })
                .catch(error => {
                    this.message = error.data.message;
                    this.active()
                });
        },
        deleteFavorite(id) {
            axios.delete(`/api/favorites/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': this.csrfToken,
                },
            })
                .then(response => {
                    this.message = response.data.message;
                    this.fetchPizzas();
                    this.active()
                })
                .catch(error => {
                    this.message = error.data.message;
                    this.active()
                });
        },
        active() {
            setTimeout(() => this.message = null, 3000);
        }
    }
}
</script>
