  // Get the modal
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("close")[0];
  btn.onclick = function() {
    modal.style.display = "block";
  }
  // span.onclick = function() {
  //   modal.style.display = "none";
  // }

  span.addEventListener("click", () => {
    modal.style.display = "none";
});
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
    else if (event.target == modalEditeContact) {
      modalEditeContact.style.display = "none";
    }
  }

  var modalEditeContact = document.getElementById("myModalEditeCntact");
  var btnEditeContact = document.getElementsByClassName("myBtnEditeContact");
  var span1 = document.getElementsByClassName("close")[1];


  for (var i = 0; i < btnEditeContact.length; i++) {
    btnEditeContact[i].addEventListener('click', printDetails);
  }
  function printDetails(e) {
    modalEditeContact.style.display = "block";
  }

  // btnEditeContact.onclick = function() {
  //   modalEditeContact.style.display = "block";
  // }

  // span1.onclick = function() {
  //   modalEditeContact.style.display = "none";
  // }
  span1.addEventListener("click", () => {
    modalEditeContact.style.display = "none";
});
  // window.onclick = function(event) {
  //   if (event.target == modalEditeContact) {
  //     modalEditeContact.style.display = "none";
  //   }
  // }

  