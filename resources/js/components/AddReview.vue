<template>
    <div class="container py-5" id="appReviews">
        <div v-if="message != null" role='alert' class="alert alert-danger in center">{{ message }}</div>
        <h2 class="mb-5">Recenzie</h2>
        <div class="mb-5" v-if="!hasReview">
            <form @submit.prevent="addReview">
                <label for="reviewAdd" class="text-white">Tu napíšte recenziu...</label>
                <textarea v-model="reviewContent" id="reviewAdd" name="review" class="reviewInput mb-2" rows="4" required>
            </textarea>
                <button type="submit" class="btn btn-warning reviewButton">Odoslať recenziu</button>
            </form>
        </div>
        <div v-else>
            <div role='alert' class="alert alert-success in center mb-5"> Recenziu ste už úspešne uverejnili. </div>
        </div>

        <div v-if="reviews.length > 0">
            <div class="card bg-dark text-light mb-5" v-for="review in reviews" :key="review.id">
                <div class="card-header">
                    {{review.date}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ review.user.name + ' ' + review.user.surname }}</h5>
                    <p class="card-text">{{ review.review }}</p>
                </div>
            </div>
        </div>
        <div v-else>
            <p>Ešte nie sú žiadne recenzie na tejto stránke.</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            reviews: [],
            message: null,
            hasReview: false,
            reviewContent: '',
        };
    },
    mounted() {
        this.fetchReviews();
    },
    methods: {
        fetchReviews() {
            axios.get('/api/reviews')
                .then(response => {
                    this.reviews = response.data.reviews;
                    this.hasReview = response.data.hasReview;
                })
                .catch(error => {
                    console.error('Error pri získavaní recenzií.', error);
                });
        },
        addReview() {
            axios.post('/api/addReview', {review: this.reviewContent}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            })
                .then(response => {
                    //console.log(response);
                    this.fetchReviews();
                })
                .catch(error => {
                    console.error('Error pri pridávaní recenzie.', error);
                    this.message = 'Musíte sa prihlásiť, aby ste mohli pridať recenziu.';
                });
        },
    },
};
</script>
