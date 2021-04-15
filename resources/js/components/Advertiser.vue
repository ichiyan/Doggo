<template>
    <div class="advertiser-space">
        <div class="advertiser-details block">
            <h1>Advertiser Details</h1>
            <div class="line-detail">
                <b><p>Name: </p></b> <p>Lel Ouch</p>
            </div>
            <div class="line-detail">
                <b><p>Account: </p></b> <p>User PCCI Member</p>
            </div>
            <div class="line-detail">
                <b><p>Date Listed: </p></b> <p>01/01/01</p>
            </div>
            <div class="line-detail">
                <b><p>Location: </p></b> <p>Cebu City</p>
            </div>
        </div>
        <div class="contact-information block">
            <div class="line-detail">
                <b><p>Contact Number: </p></b> <p>09777888777</p>
            </div>
            <div class="line-detail">
                <b><p>Address: </p></b> <p>Address</p>
            </div>
            <div class="line-detail">
                <b><p>Email: </p></b> <p>Lel Ouch</p>
            </div>

            <div class="send-message-btn">
                <img src="" alt="message">
                <p>Send a message</p>
            </div>
        </div>

        <div class="listings block">
            different posts of seller
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.advertiser-space {
    height: 500px;
    width: 38%;
    border: 1px solid salmon;
    float: right;
}

h1 {
    padding: 0px;
    margin: 0px;
    font-size: 33px;
}

.line-detail {
    display: flex;
}

.send-message-btn {
    cursor: pointer;
    display: flex;
    border: 1px solid black;
    width: 150px;
}

.send-message-btn img {
    width: 20px;
    height: 20px;
    border: 1px solid black;
}

.block {
    border-bottom: 1px solid gray;
    margin-bottom: 5px;
}
</style>
