<template>
    <!-- Trigger/Open The Modal -->
    <!-- <button @click="myBtn">Open Modal</button> -->

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <input
                    type="text"
                    ref="name"
                    class="custom-input"
                />
        <slot name="context"></slot>
    </div>

    </div>

</template>

<script>
export default {
    methods: {
        myBtn() {
            console.log('Modal Hit');
            var modal = document.getElementById("myModal");
            modal.style.display="block";
        },
        close(){
            console.log('HIT');
            
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            modal.style.display = "none";
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            }
        }
    },
    mounted() {
        this.$refs.name.focus();
    },
}
</script>

<style lang="css">
body {font-family: Arial, Helvetica, sans-serif;}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.custom-input {
  font-family: 'Segoe UI';
  font-weight: bold;
  font-size: 16px;
  color: blue;
  height: 30px;
  width: 200px;
}
</style>