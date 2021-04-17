<template>
    <div class="card-post">
        <a :href="url">
            <div class="image-slot">
                <img src="" alt="dog">
            </div>
            <div class="details-slot">
                <!-- <h2>{{post.registered_number}}</h2> -->
                <p>description</p>
                <div class="breed-price">
                    <div class="breed">

                    </div>
                    <div class="price">

                    </div>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    // props: ['post'],
    // data: {
    //     url: '/'+post.id,
    // },
    // mounted: function() {
    //     console.log('I got posted!')
    // }
}
</script>

<style scoped>
.card-post {
    max-width: 30%;
    min-width: 30%;
    width: 270px;
    min-height: 320px;
    height: 320px;
    border: 1px solid black;
    margin-bottom: 40px;
}

.image-slot {
    height: 50%;
    width: 100%;
}

img {
    height: 100%;
    width: 100%;
    border: 1px solid red;
}

.breed-price {
    display: flex;
    justify-content: space-evenly;
}
</style>
