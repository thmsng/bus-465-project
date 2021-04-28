function clubSearch () {
  var club_name_search_str = document.getElementById("clubname-autocomplete").value;
  window.location='https://datalab3.bus.sfu.ca/ttn25/project/clubpage.php?club=' + encodeURIComponent(club_name_search_str);
  console.log("my script is working");
}

function populateClubs (array) {
  document.getElementById('club-listing').innerHTML ='';
  var clubList = document.getElementById('club-listing'),
      li = document.createElement('li'),
      clone;
  array.forEach(function (array_element, index) {
      clone = li.cloneNode();
      clone.classList.add("list-group-item");
      clone.textContent = array_element;
      clone.innerHTML = '<a href="https://datalab3.bus.sfu.ca/ttn25/project/clubpage.php?club=' + array_element + '">' + array_element + '</a>';
      clubList.appendChild(clone);
  });
}

function modalActive () {
  var myModal = document.getElementById('myModal')
  var myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
  })
}
modalActive();

function removeable () {
  alert("your request to remove this club is sent!");
  document.getElementById("removeable").innerHTML = "Request pending";
}

function sendRequestToBeClubAdmin () {
  alert("your request to become admin is sent!");
}
