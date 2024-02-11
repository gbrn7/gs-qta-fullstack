const body = document.querySelector("body");
const preloader = document.querySelector(".loading-wrapper");

$(".sidebar ul li").on("click", function () {
  $(".sidebar ul li.active").removeClass("active");
  $(this).addClass("active");
});

$('.open-btn').on('click', function () {
  $('.sidebar').addClass('active');
});

$('.content-right').on('click', function () {
  $('.sidebar').removeClass('active');
});

$('#jqTable').DataTable({
  "bAutoWidth": false, // Disable the auto width calculation 
  "aoColumns": [
    { "width": "5%" },
    { "width": "20%" },
    { "width": "40%" },
    { "width": "20%" },
    { "width": "15%" },
  ]
});

$('#jqTableSosmed').DataTable();


const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

$(document).ready(function () {
  preloader.classList.add("d-none");
});

function startLoading() {
  preloader.classList.remove('d-none');
  document.querySelector("html").style.cursor = "wait";
}


function endLoading() {
  preloader.classList.add("d-none");
  document.querySelector("html").style.cursor = "default";
}