<template>
    <div class='advertisement'>
        <div class="post-header">
            <h1>Dog Name</h1>
            <div class="post-utilities">
                <div class="report">
                    <img src="" alt="report">
                </div>
                <div class="print">
                    <img src="" alt="print">
                </div>
            </div>
        </div>
        <div class="post-body">
            <div class="album-space">
                <img src="" alt="main pic"> make a class for all images and edit using class
                <div class="album">
                    <img src="" alt="pic1">
                    <img src="" alt="pic2">
                    <img src="" alt="pic3">
                    <img src="" alt="pic4">
                </div>
            </div>
            <div class="details-space">
                <div class="line-detail">
                    <b><p>Location: </p></b> <p>Cebu City</p>
                </div>
                <div class="line-detail">
                    <b><p>Date Listed: </p></b> <p>01/33/23</p>
                </div>
                <div class="line-detail">
                    <b><p>Price: </p></b><p>SH33P</p>
                </div>
                <div class="line-detail">
                    <b><p>Description: </p></b> <p>I am a german sheepy.</p>
                </div>
                <div class="line-detail">
                    <b><p>Age: </p></b> <p>7</p>
                </div>
                <div class="line-detail">
                    <b><p>Gender: </p></b> <p>M/F</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.advertisement {
    width: 60%;
    max-width: 980px;
}

.post-header, .post-utilities {
    display: flex;
    border: 1px solid black;
    justify-content: space-between;
}

.post-body {
    display: flex;
}

.album-space {
    width: 50%;
    border: 1px solid black;
    height: 420px;
    max-height: 50%;
}

.details-space {
    margin-left: 8px;
}

.line-detail {
    display: flex;
}


</style>
