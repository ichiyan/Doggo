<template>
    <div class="card-post">
        <a :href="link">
            <div class="image-slot">
                <img src="" alt="img">
            </div>
            <div class="details-slot">
                <h2>title</h2>
                <p>description</p>
                <div class="breed-price">
                    <div class="breed">
                        German Sheepy
                    </div>
                    <div class="price">
                        P12
                    </div>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    props: ['link'],
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
